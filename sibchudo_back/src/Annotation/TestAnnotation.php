<?php


namespace App\Annotation;

/**
 *
 * @Annotation
 * @Target({"METHOD", "PROPERTY"})
 *
 */

class TestAnnotation
{

    private $tima;

    public function __construct(array $data)
    {
        $this->tima = $data['tima'];
    }

    /**
     * @return mixed
     */
    public function getTima()
    {
        return $this->tima;
    }



}