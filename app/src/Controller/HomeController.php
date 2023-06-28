<?php

namespace App\Controller;

use App\Entity\Offers;
use App\Repository\OffersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(OffersRepository $offersRepository): Response
    {
        $offers = $offersRepository->findAll();
        return $this->render('home/index.html.twig',
            ['offers' => $offers]
        );
    }
}
