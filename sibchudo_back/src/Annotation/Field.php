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
    private $name;


    public function __construct(array $data)
    {
        foreach ($data as $k => $v){
            $this->{$k} = $v;
        }
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }


}