<?php

namespace App\Form;

use App\Entity\Membre;
use Doctrine\DBAL\Types\Type;
use Dom\Text;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class MembreTypeForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'Entrez votre nom',
                    'class' => 'w-full input rounded-md p-2 focus:outline-none mt-4',
                ],
              
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prénom',
                'attr' => [
                    'placeholder' => 'Entrez votre prénom',
                    'class' => 'w-full input rounded-md p-2 focus:outline-none mt-4',
                ],
            ])
            ->add('birthday', DateType::class, [
                'label' => 'Date de naissance',
                'attr' => [
                    'placeholder' => 'Entrez votre date de naissance',
                    'class' => 'w-full input rounded-md p-2 focus:outline-none mt-4',
                ],
            ])
            ->add('adress', TextType::class, [
                'label' => 'Adresse',
                'attr' => [
                    'placeholder' => 'Adresse',
                    'class' => 'w-full input rounded-md p-2 focus:outline-none mt-4',
                ],
            ])
            ->add('mail', TextType::class, [
                'label' => 'Email',
                'attr' => [
                    'placeholder' => 'Email',
                    'class' => 'w-full input rounded-md p-2 focus:outline-none mt-4',
                ],
            ])
            ->add('Button', SubmitType::class, [
                'label' => "S'inscrire",
                'attr' => [
                    'class' => 'btn btn-primary',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Membre::class,
        ]);
    }
}
