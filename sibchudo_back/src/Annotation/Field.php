<?php


namespace App\Annotation;

/**
 *
 * @Annotation
 * @Target({"PROPERTY"})
 *
 */

class Field
{
    private $type;
    private $name;
    private $primary = false;
    private $isNull = false;

    public function __construct(array $data)
    {
        foreach ($data as $k => $v){
            $this->{$k} = $v;
        }
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPrimary()
    {
        return $this->primary;
    }

    /**
     * @return bool
     */
    public function isNull(): bool
    {
        return $this->isNull;
    }



}