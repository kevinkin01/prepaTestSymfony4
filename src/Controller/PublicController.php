<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
// use entity sections.php
use App\Entity\Sections;
// use entity articles.php
use App\Entity\Articles;

class PublicController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index()
    {   // get doctrine manager for all entities
        $entityManager = $this->getDoctrine()->getManager();
        //get all section in DB
        $rub = $entityManager->getRepository(Sections::class)->findAll();
        // get all articles in DB
        $art = $entityManager->getRepository(Articles::class)->findAll();
        return $this->render('public/index.html.twig', [
            'Sections' => $rub,
            'Articles' => $art,
        ]);
    }
}
