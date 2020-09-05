<?php


namespace App\Controller;

use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

abstract class RestFormController extends RestController
{
    protected function useForm(string $type, object $entity, array $advancedData = [], array $options = []){
        $data = $this->getRequestJSON();
        $form = $this->createForm($type, $entity, $options);
        $form->submit(array_merge($data, $advancedData), true);
        if($form->isValid()){
            return $form->getData();
        }else{
            $error = $form->getErrors(true)->current();
            throw new BadRequestHttpException($error->getOrigin()->getName() . " " . $error->getMessage());
        }
    }
}