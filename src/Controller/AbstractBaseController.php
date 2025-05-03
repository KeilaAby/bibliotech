<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Form\CategoryTypeForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Membre;
use App\Form\MembreTypeForm;
use App\Entity\Livres;
use App\Form\LivreTypeForm;

abstract class AbstractBaseController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {}

    protected function getBasicData(): array
    {
        //Génération du formulaire
        $category = new Categories();
        $form = $this->createForm(CategoryTypeForm::class, $category);

        $membre = new Membre();
        $formMembre = $this->createForm(MembreTypeForm::class, $membre);

        $livres = new Livres();
        $formLivre = $this->createForm(LivreTypeForm::class, $livres);



         // Récupérer toutes les catégories
         $categories = $this->entityManager->getRepository(Categories::class)->findAll();
        
        return [
            'form' => $form->createView(),
            'formMembre' => $formMembre->createView(),
            'formLivre' => $formLivre->createView(),
            'categories' => $categories,

        ];
    }
}
