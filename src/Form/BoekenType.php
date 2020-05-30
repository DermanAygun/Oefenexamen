<?php

namespace App\Form;

use App\Entity\Seizoen;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class BoekenType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Incheck', DateType::class, [
                'placeholder' => [
                    'year' => 'Jaar', 'month' => 'Maand', 'day' => 'Dag',
                ],
                'widget' => 'choice',
                'format' => 'dd MM yyyy',
            ])
            ->add('Uitcheck', DateType::class, [
                'placeholder' => [
                    'year' => 'Jaar', 'month' => 'Maand', 'day' => 'Dag',
                ],
                'widget' => 'choice',
                'format' => 'dd MM yyyy',
            ])
            ->add('Personen', ChoiceType::class, [
                'choices' => [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',
                ]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class',
        ]);
    }
}
