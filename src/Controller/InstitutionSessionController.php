<?php


namespace App\Controller;

use App\Repository\InstitutionSessionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InstitutionSessionController extends AbstractController
{
    #[Route('/Sessions', name: 'institutionSession_index')]
    public function index(SessionRepository $registry)
    {
        
        $sessions = $registry->findAll(); // querybuilder permet d'utiliser les 4 fonction parmi les quels on a 
        // findAll 
         dd($sessions); // die and dump permet de stop la fonction et donner les resultats sur l'écran de ce qui est récupéré
        
        // return $this->render('\sessions.html.twig', [
        //     'institution_sessions' => $institution_sessions,
        // ]);
    }
}