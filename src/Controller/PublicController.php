<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
// use entity sections.php
use App\Entity\Sections;

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
        return $this->render('public/index.html.twig', [
            'Sections' => $rub,
        ]);
    }
}
