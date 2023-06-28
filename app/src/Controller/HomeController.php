<?php

namespace App\Controller;

use App\Entity\Offers;
use App\Entity\User;
use App\Repository\OffersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(OffersRepository $offersRepository): Response
    {
        /** @var User $current_user */
        $current_user = $this->getUser();
        $current_user_id = $current_user->getId();
        $current_user_role = $current_user->getRoles();
        $candidacies = $current_user->getStudent()->getCandidacies();
        $offers = $offersRepository->findAll();
        return $this->render('home/index.html.twig',[
            'offers'=>$offers,
            'current_user_role'=>$current_user_role,
            'candidacies'=>$candidacies,
            'current_user_id'=>$current_user_id
        ]);
    }
}
