<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class)
            ->add('telephone', TelType::class)
            ->add('email', EmailType::class)
            ->add('date', DateType::class)
            ->add('selection', ChoiceType::class, [
                'choices' => [
                    'Midi' => [
                        '1er Service' => 'service1m',
                        '2eme Service' => 'service2m',
                        
                    ],
                    'Soir' => [
                        '1er Service' => 'service1s',
                        '2eme Service' => 'service2s',
                    ],
                ],
            ])
            ->add('personne', NumberType::class)
            ->add('terrasse', CheckboxType::class,[
                'required' => false,
            ])
            ->add('message', TextareaType::class)
            ->add('valider', CheckboxType::class, ['mapped' => false])
            ->add('envoyer', SubmitType::class, [
                'attr' => ['class' => 'book-a-table-btn'],
                ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
