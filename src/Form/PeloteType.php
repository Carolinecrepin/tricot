<?php

namespace App\Form;

use App\Entity\Pelote;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class PeloteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('material', TextType::class)
            ->add('meters', NumberType::class)
            ->add('tailleAiguilles', NumberType::class)
            ->add('couleur', TextType::class)
            ->add('image', TextType::class)
            ->add('Modele', null, ['choice_label' => 'name']);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Pelote::class,
        ]);
    }
}
