<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EnterpriseController extends AbstractController
{
    #[Route('/enterprise', name: 'app_enterprise')]
    public function index(): Response
    {
        return $this->render('enterprise/new.html.twig', [
            'controller_name' => 'EnterpriseController',
        ]);
    }
}
