<?php


namespace App\Form\DataTransformer;


use DateTime;
use Symfony\Component\Form\DataTransformerInterface;

class DateTransformer implements DataTransformerInterface
{

    public function transform($value)
    {
        if($value == null){
            return (new DateTime())->format('Y-m-d\TH:i:s.u\Z');
        }
        return $value->format('Y-m-d\TH:i:s.u\Z');
    }

    public function reverseTransform($value)
    {
        return new DateTime($value);
    }
}