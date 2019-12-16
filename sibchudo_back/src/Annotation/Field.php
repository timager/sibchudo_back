<?php


namespace App\Annotation;

/**
 *
 * @Annotation
 * @Target({"PROPERTY"})
 *
 */
class Field {
    private ?string $type = null;
    private string $name;
//    private bool $primary = false;
//    private bool $isNull = false;

    public function __construct(array $data) {
        foreach($data as $k => $v) {
            $this->{$k} = $v;
        }
    }

    public function getType(): ?string {
        return $this->type;
    }

    public function getName(): string {
        return $this->name;
    }
//
//    public function getPrimary(): bool {
//        return $this->primary;
//    }
//
//    public function isNull(): bool {
//        return $this->isNull;
//    }


}