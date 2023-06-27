<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChooseIdentityController extends AbstractController
{
    #[Route('/choose', name: 'app_choose_identity')]
    public function index(): Response
    {
        return $this->render('choose_identity/index.html.twig', [
            'controller_name' => 'ChooseIdentityController',
        ]);
    }
}
