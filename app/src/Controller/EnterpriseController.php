<?php

namespace App\Controller;

use App\Entity\Enterprise;
use App\Form\EnterpriseFormType;
use App\Repository\EnterpriseRepository;
use App\Repository\StatusRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EnterpriseController extends AbstractController
{
    #[Route('/enterprise/new', name: 'app_new_enterprise')]
    public function index(Request              $request,
                          EnterpriseRepository $enterpriseRepository,
                          StatusRepository     $statusRepository): Response
    {
        $enterprise = new Enterprise();
        $form = $this->createForm(EnterpriseFormType::class, $enterprise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $enterprise->setStatus($statusRepository->findOneBy(['status' => 'En attente']));

            $enterpriseRepository->save($enterprise, true);

            $this->redirectToRoute('app_home');
        }

        return $this->render('enterprise/new.html.twig', [
            'form' => $form
        ]);
    }

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
