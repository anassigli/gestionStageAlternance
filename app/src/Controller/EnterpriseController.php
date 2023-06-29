<?php

namespace App\Controller;

use App\Entity\Offers;
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
            'offers' => $enterprise->getOffers()
        ]);
    }

    #[Route('/enterprise/offers/{id}/candidacies', name: 'app_enterprise_offers_candidacies')]
    public function showOfferCandidacies(
        Offers $offer,
        EnterpriseRepository $enterpriseRepository): Response
    {
        return $this->render('enterprise/show_offers_candidacies.html.twig', [
            'offer' => $offer
        ]);
    }
}
