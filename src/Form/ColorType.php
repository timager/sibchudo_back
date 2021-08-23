<?php

namespace App\Form;

use App\Entity\Color;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ColorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('breed')
            ->add('baseColor')
            ->add('baseColorAdditional')
            ->add('code0')
            ->add('code1')
            ->add('code2')
            ->add('code3')
            ->add('tail')
            ->add('eyes')
            ->add('ears');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $defaults = [
            'data_class' => Color::class,
            'allow_extra_fields' => true,
            'csrf_protection' => false
        ];
        $resolver->setDefaults($defaults);
    }
}
