<?php

namespace App\Form;

use App\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [

                'label' => 'Quel nom souhaitez-vous donner à votre adresse?',
                'attr' => [
                    'placeholder' => 'nommez votre adresse'
                ]
            ])
            ->add('firstname', TextType::class, [

                'label' => 'votre prénom?',
                'attr' => [
                    'placeholder' => 'votre prénom'
                ]
            ])
            ->add('lastname', TextType::class, [

                'label' => 'votre nom?',
                'attr' => [
                    'placeholder' => 'votre nom'
                ]
            ])
            ->add('company', TextType::class, [

                'label' => 'votre compagnie?',
                'attr' => [
                    'placeholder' => '(facultatif) nommez votre compagnie'
                ]
            ])
            ->add('address', TextType::class, [

                'label' => 'votre adresse?',
                'attr' => [
                    'placeholder' => 'nommez votre adresse'
                ]
            ])
            ->add('postal', TextType::class, [

                'label' => 'votre code postal?',
                'attr' => [
                    'placeholder' => 'Entrez votre code postal'
                ]
            ])
            ->add('city', TextType::class, [

                'label' => 'votre ville?',
                'attr' => [
                    'placeholder' => 'votre ville'
                ]
            ])
            ->add('country', CountryType::class, [

                'label' => 'votre pays?',
                'attr' => [
                    'placeholder' => 'nommez votre pays'
                ]
            ])
            ->add('phone', TelType::class, [

                'label' => 'votre téléphone?',
                'attr' => [
                    'placeholder' => 'nommez votre téléphone'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Valider mon adresse',
                'attr' => [
                    'class' => 'book-a-table-btn scrollto d-none d-lg-flex my-2'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }
}
