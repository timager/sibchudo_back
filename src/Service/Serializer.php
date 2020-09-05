<?php


namespace App\Service;


use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;

class Serializer
{
    public function serialize($data):string{
        return $this->makeSerializer()->serialize($data, 'json', $this->makeContext());
    }

    public function normalize($data):array{
        return $this->makeSerializer()->toArray($data, $this->makeContext());

    }

    protected function makeSerializer() : ?\JMS\Serializer\Serializer {
        $builder = SerializerBuilder::create();
        $namingStrategy = new SerializedNameAnnotationStrategy(new IdenticalPropertyNamingStrategy());
        $builder->setPropertyNamingStrategy($namingStrategy);
        $serializer = $builder->build();
        if($serializer instanceof \JMS\Serializer\Serializer){
            return $serializer;
        }else{
            return null;
        }
    }

    protected function makeContext() : SerializationContext{
        $context = SerializationContext::create()->enableMaxDepthChecks();
        $context->setSerializeNull(true);
        return $context;
    }
}
