<?php

namespace App\Controller;

use App\Repository\InstitutionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InstitutionController extends AbstractController
{
    #[Route('/institution', name: 'institution_index')]
    public function index(InstitutionRepository $registry)
    {
        
        $institutions = $registry->findAll(); // querybuilder permet d'utiliser les 4 fonction parmi les quels on a 
        // findAll 
         dd($institutions); // die and dump permet de stop la fonction et donner les resultats sur l'écran de ce qui est récupéré
        
        return $this->render('\welcome.html.twig', [
            'institutions' => $institutions,
        ]);
    }
}