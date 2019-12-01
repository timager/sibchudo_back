<?php


namespace App\Entity;

use App\Annotation\Field;
use App\Annotation\Table;

/**
 * Class Color
 * @package App\Entity
 * @Table(name="color")
 */
class Color implements EntityInterface {
    /**
     * @Field(name="id")
     */
    private int $id;
    /**
     * @Field(name="breed")
     */
    private string $breedCode;
    /**
     * @Field(name="base_color")
     */
    private string $baseColorCode;
    /**
     * @Field(name="base_color_add")
     */
    private string $baseColorAdditionalCode;
    /**
     * @Field(name="code_0")
     */
    private string $code0Code;
    /**
     * @Field(name="code_1")
     */
    private string $code1Code;
    /**
     * @Field(name="code_2")
     */
    private string $code2Code;
    /**
     * @Field(name="code_3")
     */
    private string $code3Code;
    /**
     * @Field(name="tail")
     */
    private string $tailCode;
    /**
     * @Field(name="eyes")
     */
    private string $eyesCode;
    /**
     * @Field(name="ears")
     */
    private string $earsCode;

    /**
     * @return string
     */
    public function getBreedCode(): string {
        return $this->breedCode;
    }

    /**
     * @param string $breedCode
     */
    public function setBreedCode(string $breedCode): void {
        $this->breedCode = $breedCode;
    }

    /**
     * @return string
     */
    public function getBaseColorCode(): string {
        return $this->baseColorCode;
    }

    /**
     * @param string $baseColorCode
     */
    public function setBaseColorCode(string $baseColorCode): void {
        $this->baseColorCode = $baseColorCode;
    }

    /**
     * @return string
     */
    public function getBaseColorAdditionalCode(): string {
        return $this->baseColorAdditionalCode;
    }

    /**
     * @param string $baseColorAdditionalCode
     */
    public function setBaseColorAdditionalCode(string $baseColorAdditionalCode): void {
        $this->baseColorAdditionalCode = $baseColorAdditionalCode;
    }

    /**
     * @return string
     */
    public function getCode0Code(): string {
        return $this->code0Code;
    }

    /**
     * @param string $code0Code
     */
    public function setCode0Code(string $code0Code): void {
        $this->code0Code = $code0Code;
    }

    /**
     * @return string
     */
    public function getCode1Code(): string {
        return $this->code1Code;
    }

    /**
     * @param string $code1Code
     */
    public function setCode1Code(string $code1Code): void {
        $this->code1Code = $code1Code;
    }

    /**
     * @return string
     */
    public function getCode2Code(): string {
        return $this->code2Code;
    }

    /**
     * @param string $code2Code
     */
    public function setCode2Code(string $code2Code): void {
        $this->code2Code = $code2Code;
    }

    /**
     * @return string
     */
    public function getCode3Code(): string {
        return $this->code3Code;
    }

    /**
     * @param string $code3Code
     */
    public function setCode3Code(string $code3Code): void {
        $this->code3Code = $code3Code;
    }

    /**
     * @return string
     */
    public function getTailCode(): string {
        return $this->tailCode;
    }

    /**
     * @param string $tailCode
     */
    public function setTailCode(string $tailCode): void {
        $this->tailCode = $tailCode;
    }

    /**
     * @return string
     */
    public function getEyesCode(): string {
        return $this->eyesCode;
    }

    /**
     * @param string $eyesCode
     */
    public function setEyesCode(string $eyesCode): void {
        $this->eyesCode = $eyesCode;
    }

    /**
     * @return string
     */
    public function getEarsCode(): string {
        return $this->earsCode;
    }

    /**
     * @param string $earsCode
     */
    public function setEarsCode(string $earsCode): void {
        $this->earsCode = $earsCode;
    }

    /**
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

}