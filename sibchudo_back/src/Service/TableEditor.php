<?php


namespace App\Service;


use App\Annotation\Field;
use App\Annotation\Table;
use App\DatabaseConnector\Database;
use App\Repository\AbstractRepository;
use Doctrine\Common\Annotations\Reader;
use ReflectionClass;

class TableEditor
{
    private $reader;

    /**
     * RepositoryLoader constructor.
     * @param $reader
     */
    public function __construct(Reader $reader)
    {
        $this->reader = $reader;
    }


    public function updateTable(string $entityClass){
        $data = [];
        $reflection = new ReflectionClass($entityClass);
        $table = $this->reader->getClassAnnotation($reflection, Table::class);
        $data['table'] = $table;
        $data['fields'] = AbstractRepository::getFieldPropertiesAnnotation($this->reader, $entityClass);
        $this->makeQuery($data);
    }

    private function makeQuery($data){
        $fieldParts = [];
        $primaryPart = "";
        foreach ($data['fields'] as $field){
            $fieldQuery = $field->getName() . " " . $field->getType();
            if(!$field->isNull()){
                $fieldQuery .= " NOT NULL";
            }
            $fieldParts[] = $fieldQuery;
            if($field->getPrimary()){
                $primaryPart = "ALTER TABLE ONLY public." . $data['table']->getName() . " ADD CONSTRAINT ". $data['table']->getName() ."_pkey PRIMARY KEY (". $field->getName() .")";
            }
        }

        $query = "CREATE TABLE public." . $data['table']->getName() . " (" . join(", ", $fieldParts) . ")";
        Database::getInstance()->makeQuery($query);
        Database::getInstance()->makeQuery($primaryPart);
    }

}