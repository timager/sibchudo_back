<?php

namespace App\Form;

use App\Entity\Litter;
use App\Form\DataTransformer\DateTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LitterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('letter')
            ->add('birthday', TextType::class)
            ->add('mother')
            ->add('father')
            ->add('community');
        $builder->get('birthday')->addModelTransformer(new DateTransformer());
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $defaults = [
            'data_class' => Litter::class,
            'csrf_protection' => false,
            'allow_extra_fields' => true
        ];
        $resolver->setDefaults($defaults);
    }
}
