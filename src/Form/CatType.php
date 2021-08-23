<?php

namespace App\Form;

use App\Entity\Cat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('gender')
            ->add('color', ColorType::class)
            ->add('catClass')
            ->add('title')
            ->add('litter')
            ->add('community')
            ->add('owner')
            ->add('status');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $defaults = [
            'data_class' => Cat::class,
            'csrf_protection' => false,
            'allow_extra_fields' => true
        ];
        $resolver->setDefaults($defaults);
    }
}
