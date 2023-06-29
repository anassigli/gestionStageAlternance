<?php

namespace App\Controller;

use App\Repository\EnterpriseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EnterpriseController extends AbstractController
{
    #[Route('/enterprise/offers', name: 'app_enterprise_offers')]
    public function showOffers(EnterpriseRepository $enterpriseRepository): Response
    {
        $currentUser = $this->getUser();
        $enterprise = $enterpriseRepository->findOneBy(['email' => $currentUser->getUserIdentifier()]);

        return $this->render('enterprise/show_offers.html.twig', [
            'offers' => $enterprise->getOffers(),
            'current_user_role' => $currentUser->getRoles()
        ]);
    }
}
