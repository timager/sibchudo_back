<?php


namespace App\Entity;


class TestTable
{
    private $id;
    private $mocha;
    private $govno;

    function printSelf(){
        dump($this);
    }
}