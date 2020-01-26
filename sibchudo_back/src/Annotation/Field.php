<?php


namespace App\Annotation;

use App\Repository\RepositoryInterface;

/**
 *
 * @Annotation
 * @Target({"PROPERTY"})
 *
 */
class Field {
    private ?string $type = null;
    private ?string $name = null;
    private ?string $invertedName = null;


    public function __construct(array $data) {
        foreach($data as $k => $v) {
            $this->{$k} = $v;
        }
    }

    /**
     * @return string
     */
    public function getInvertedName(): ?string {
        return $this->invertedName;
    }



    public function getType(): ?string {
        return $this->type;
    }

    public function getName(): ?string {
        return $this->name;
    }


}