<?php

namespace App\Form;

use App\Entity\Athlete;
use App\Entity\Gender;
use App\Entity\Country;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class AthleteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('gender', EntityType::class, [
                'class' => Gender::class,
                'choice_label' => 'name',
                'label' => ' ',
                'placeholder' => ' ',
            ])

            ->add('country', EntityType::class, [
                'class' => Country::class,
                'choice_label' => 'name',
                'label' => ' ',
                'placeholder' => ' ',
            ])

            ->add('submit', SubmitType::class, [
                'label' => 'Go',
            ],
        );
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Athlete::class,
        ]);
    }
}
