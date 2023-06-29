<?php

namespace App\Controller;

use App\Entity\Candidacy;

use App\Entity\Offers;
use App\Form\OffersType;
use App\Entity\Status;
use App\Entity\Student;
use App\Repository\EnterpriseRepository;
use App\Repository\OffersRepository;
use App\Repository\StatusRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/offers')]
class OffersController extends AbstractController
{
    #[Route('/add', name: 'app_offers_create', methods: ['GET', 'POST'])]
    public function create(Request              $request,
                           OffersRepository     $offersRepository,
                           EnterpriseRepository $enterpriseRepository,
                           StatusRepository     $statusRepository): Response
    {
        $newOffer = new Offers();
        $form = $this->createForm(OffersType::class, $newOffer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $enterprise = $enterpriseRepository->findOneBy(
                ['email' => $this->getUser()->getUserIdentifier()]
            );
            $newOffer->setEnterprise($enterprise);
            $newOffer->setStatus($statusRepository->findOneBy(["status" => "Validée"]));
            $offersRepository->save($newOffer, true);

            return $this->redirectToRoute('app_home');
        }

        return $this->render('offers/new.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/{id}', name: 'app_offers_show', methods: ['GET'])]
    public function show(Offers $offer): Response
    {
        return $this->render('offers/show.html.twig', [
            'offer' => $offer,
        ]);
    }

}
