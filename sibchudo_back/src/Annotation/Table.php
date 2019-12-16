<?php


namespace App\Annotation;

/**
 *
 * @Annotation
 * @Target({"CLASS"})
 *
 */
class Table {
    private string $name;
    private string $repository;

    public function __construct(array $data) {
        foreach($data as $k => $v) {
            $this->{$k} = $v;
        }
    }

    public function getName(): string {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getRepository(): string {
        return $this->repository;
    }



}