<?php


namespace App\Entity;

use App\Annotation\Field;
use App\Annotation\Table;
use JMS\Serializer\Annotation\Accessor;

/**
 * Class Color
 * @package App\Entity
 * @Table(name="color",repository="App\Repository\ColorRepository")
 */
class Color extends AbstractEntity {
    /**
     * @Field(name="id")
     */
    private int $id;
    /**
     * @Field(name="breed", type="App\Entity\Breed")
     * @Accessor(getter="getBreed")
     */
    private EntityInterface $breed;
    /**
     * @Field(name="base_color", type="App\Entity\BaseColor")
     * @Accessor(getter="getBaseColor")
     */
    private EntityInterface $baseColor;
    /**
     * @Field(name="base_color_add", type="App\Entity\BaseColor")
     * @Accessor(getter="getBaseColorAdditional")
     */
    private ?EntityInterface $baseColorAdditional;
    /**
     * @Field(name="code_0", type="App\Entity\ColorCode")
     * @Accessor(getter="getCode0")
     */
    private ?EntityInterface $code0;
    /**
     * @Field(name="code_1", type="App\Entity\ColorCode")
     * @Accessor(getter="getCode1")
     */
    private ?EntityInterface $code1;
    /**
     * @Field(name="code_2", type="App\Entity\ColorCode")
     * @Accessor(getter="getCode2")
     */
    private ?EntityInterface $code2;
    /**
     * @Field(name="code_3", type="App\Entity\ColorCode")
     * @Accessor(getter="getCode3")
     */
    private ?EntityInterface $code3;
    /**
     * @Field(name="tail", type="App\Entity\ColorCode")
     * @Accessor(getter="getTail")
     */
    private ?EntityInterface $tail;
    /**
     * @Field(name="eyes", type="App\Entity\ColorCode")
     * @Accessor(getter="getEyes")
     */
    private ?EntityInterface $eyes;
    /**
     * @Field(name="ears", type="App\Entity\ColorCode")
     * @Accessor(getter="getEars")
     */
    private ?EntityInterface $ears;

    /**
     * @return Breed|EntityInterface
     */
    public function getBreed(): Breed {
        return $this->load($this->breed);
    }

    /**
     * @param Breed $breed
     */
    public function setBreed(Breed $breed): void {
        $this->breed = $breed;
    }

    /**
     * @return BaseColor|EntityInterface
     */
    public function getBaseColor(): BaseColor {
        return $this->load($this->baseColor);
    }

    /**
     * @param mixed $baseColor
     */
    public function setBaseColor(BaseColor $baseColor): void {
        $this->baseColor = $baseColor;
    }

    /**
     * @return BaseColor|EntityInterface
     */
    public function getBaseColorAdditional(): ?BaseColor {
        return $this->load($this->baseColorAdditional);
    }

    /**
     * @param BaseColor $baseColorAdditional
     */
    public function setBaseColorAdditional(BaseColor $baseColorAdditional): void {
        $this->baseColorAdditional = $baseColorAdditional;
    }

    /**
     * @return mixed
     */
    public function getCode0() {
        return $this->load($this->code0);
    }

    /**
     * @param mixed $code0
     */
    public function setCode0($code0): void {
        $this->code0 = $code0;
    }

    /**
     * @return mixed
     */
    public function getCode1() {
        return $this->load($this->code1);
    }

    /**
     * @param mixed $code1
     */
    public function setCode1($code1): void {
        $this->code1 = $code1;
    }

    /**
     * @return mixed
     */
    public function getCode2() {
        return $this->load($this->code2);
    }

    /**
     * @param mixed $code2
     */
    public function setCode2($code2): void {
        $this->code2 = $code2;
    }

    /**
     * @return mixed
     */
    public function getCode3() {
        return $this->load($this->code3);
    }

    /**
     * @param mixed $code3
     */
    public function setCode3($code3): void {
        $this->code3 = $code3;
    }

    /**
     * @return mixed
     */
    public function getTail() {
        return $this->load($this->tail);
    }

    /**
     * @param mixed $tail
     */
    public function setTail($tail): void {
        $this->tail = $tail;
    }

    /**
     * @return mixed
     */
    public function getEyes() {
        return $this->load($this->eyes);
    }

    /**
     * @param mixed $eyes
     */
    public function setEyes($eyes): void {
        $this->eyes = $eyes;
    }

    /**
     * @return mixed
     */
    public function getEars() {
        return $this->load($this->ears);
    }

    /**
     * @param mixed $ears
     */
    public function setEars($ears): void {
        $this->ears = $ears;
    }

    /**
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

}