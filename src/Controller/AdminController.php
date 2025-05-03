<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Categories;
use App\Form\CategoryTypeForm;
use App\Entity\Membre;
use App\Form\MembreTypeForm;
use App\Entity\Livres;
use App\Form\LivreTypeForm;
use Doctrine\ORM\Tools\Console\EntityManagerProvider;


final class AdminController extends AbstractBaseController
{


    #[Route('/admin/home', name: 'adminHome')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $livres = $entityManager->getRepository(Livres::class)->findAll();

        return $this->render(
            'admin/index.html.twig',
            array_merge(
                [
                    'controller_name' => 'AdminController',
                    'livres' => $livres,

                ],
                $this->getBasicData()
            )
        );
    }

    #[Route('/book/view/{id}', name: 'bookview')]
    public function bookview(EntityManagerInterface $entity, int $id): Response
    {
    
        $livreRepo = $entity->getRepository(Livres::class);
        $livres = $livreRepo->findOneBy(['id' => $id]);

        //Recpérer les catégories
        $livreCategories = $livres->getCategories();

        return $this->render('admin/bookview.html.twig', array_merge(
            ['controller_name' => 'AdminController',
                'book' => $livres,
                'livreCategories' => $livreCategories,
            ],
            $this->getBasicData()
        ));
    }

    #[Route('/category/add', name: 'addcategory')]
    public function addcategory(Request $request, EntityManagerInterface $entityManager): Response
    {
        $category = new Categories();
        $form = $this->createForm(CategoryTypeForm::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($category);
            $entityManager->flush();

            return $this->redirectToRoute('adminHome');
        }

        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            $this->getBasicData()
        ]);
    }

    #[Route('/member/add', name: 'addMember')]
    public function addMember(Request $request, EntityManagerInterface $entityManager): Response
    {
        $membre = new Membre();
        $form = $this->createForm(MembreTypeForm::class, $membre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($membre);
            $entityManager->flush();

            return $this->redirectToRoute('adminHome');
        }
        return $this->render('admin/index.html.twig', array_merge(
            ['controller_name' => 'AdminController'],
            $this->getBasicData()
        ));
    }
    #[Route('/livres/add', name: 'addLivres')]
    public function addLivres(Request $request, EntityManagerInterface $entityManager): Response
    {
        $livres = new Livres();
        $form = $this->createForm(LivreTypeForm::class, $livres);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($livres);
            $entityManager->flush();

            return $this->redirectToRoute('adminHome');
        }
        return $this->render('admin/index.html.twig', array_merge(
            ['controller_name' => 'AdminController'],
            $this->getBasicData()
        ));
    }
}
