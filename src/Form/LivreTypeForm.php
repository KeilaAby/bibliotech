<?php

namespace App\Form;

use App\Entity\Categories;
use App\Entity\Livres;
use Dom\Text;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class LivreTypeForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre',
                'attr' => [
                    'placeholder' => 'Entrez le titre du livre',
                    'class' => 'w-full input rounded-md p-2 focus:outline-none mt-4',
                ],
            ])
            ->add('Author', TextType::class, [
                'label' => 'Auteur',
                'attr' => [
                    'placeholder' => 'Entrez le nom de l\'auteur',
                    'class' => 'w-full input rounded-md p-2 focus:outline-none mt-4',
                ],
            ])
            ->add('price', TextType::class, [
                'label' => 'Prix',
                'attr' => [
                    'placeholder' => 'Entrez le prix du livre',
                    'class' => 'w-full input rounded-md p-2 focus:outline-none mt-4',
                ],
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'attr' => [
                    'placeholder' => 'Entrez une description du livre',
                    'class' => 'w-full input rounded-md p-2 focus:outline-none mt-4',
                ],
            ])
            ->add('isbn', TextType::class, [
                'label' => 'ISBN',
                'attr' => [
                    'placeholder' => 'Entrez le numéro ISBN',
                    'class' => 'w-full input rounded-md p-2 focus:outline-none mt-4',
                ],
            ])
            ->add('datePub', DateType::class, [
                'label' => 'Date de publication',
                'widget' => 'single_text',
                'attr' => [
                    'placeholder' => 'Sélectionnez la date de publication',
                    'class' => 'w-full input rounded-md p-2 focus:outline-none mt-4',
                ],
            ])
            ->add('lang', TextType::class, [
                'label' => 'Langue',
                'attr' => [
                    'placeholder' => 'Entrez la langue du livre',
                    'class' => 'w-full input rounded-md p-2 focus:outline-none mt-4',
                ],
            ])
            ->add('editor', TextType::class, [
                'label' => 'Éditeur',
                'attr' => [
                    'placeholder' => 'Entrez le nom de l\'éditeur',
                    'class' => 'w-full input rounded-md p-2 focus:outline-none mt-4',
                ],
            ])
            ->add('poids', TextType::class, [
                'label' => 'Poids',
                'attr' => [
                    'placeholder' => 'Entrez le poids du livre',
                    'class' => 'w-full input rounded-md p-2 focus:outline-none mt-4',
                ],
            ])  
            ->add('dimension', TextType::class, [
                'label' => 'Dimensions',
                'attr' => [
                    'placeholder' => 'Entrez les dimensions du livre',
                    'class' => 'w-full input rounded-md p-2 focus:outline-none mt-4',
                ],
            ])
            ->add('categories', EntityType::class, [
                'class' => Categories::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
                'attr' => [
                    'class' => 'form-check-input',
                ],
                'label' => 'Catégories',
            ])
            ->add('image', TextType::class, [
                'label' => 'Image',
                'attr' => [
                    'placeholder' => 'Entrez l\'URL de l\'image',
                    'class' => 'w-full input rounded-md p-2 focus:outline-none mt-4',
                ],
            ])
            ->add('Button', SubmitType::class, [
                'label' => "Ajouter",
                'attr' => [
                    'class' => 'btn btn-primary',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Livres::class,
        ]);
    }
}
