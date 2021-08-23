<?php


namespace App\Form\DataTransformer;


use DateTime;
use Exception;
use Symfony\Component\Form\DataTransformerInterface;

class DateTransformer implements DataTransformerInterface
{

    public function transform($value)
    {
        if ($value === null) {
            return (new DateTime())->format('Y-m-d\TH:i:s.u\Z');
        }
        return $value->format('Y-m-d\TH:i:s.u\Z');
    }

    /**
     * @throws Exception
     */
    public function reverseTransform($value): DateTime
    {
        return new DateTime($value);
    }
}