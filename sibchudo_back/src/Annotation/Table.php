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

    public function __construct(array $data) {
        foreach($data as $k => $v) {
            $this->{$k} = $v;
        }
    }

    public function getName(): string {
        return $this->name;
    }


}