<?php

namespace App\Controller;

use App\Entity\Offers;
use App\Entity\User;
use App\Repository\EnterpriseRepository;
use App\Repository\OffersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(OffersRepository     $offersRepository,
                          Session              $session,
                          EnterpriseRepository $enterpriseRepository): Response
    {
        $offers = $offersRepository->findAll();

        if ($this->getUser()) {
            /** @var User $current_user */
            $current_user = $this->getUser();
            $current_user_id = $current_user->getId();
            $current_user_role = $current_user->getRoles();

            if (in_array('ROLE_STUDENT', $current_user_role)) {
                $candidacies = $current_user->getStudent()->getCandidacies();
            }

            if (in_array('ROLE_ENTERPRISE', $current_user_role)) {
                $enterprise = $enterpriseRepository->findOneBy(['email' => $current_user->getEmail()]);

                if ($enterprise->getStatus()->getStatus() === 'En attente') {
                    $session->getFlashBag()->add('warning',
                        "Votre entreprise est en attente de confirmation d'un administrateur. Vous ne pouvez pas poster d'offre pour l'instant. ");
                }
            }
        }
        return $this->render('home/index.html.twig', [
            'offers' => $offers,
            'current_user_role' => $current_user_role ?? null,
            'candidacies' => $candidacies ?? null,
            'current_user_id' => $current_user_id ?? null
        ]);
    }
}
