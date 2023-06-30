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

    #[Route('/edit/{id}', name: 'app_offers_edit', methods: ['GET', 'POST'])]
    public function edit(Request          $request,
                         Offers           $offer,
                         OffersRepository $offersRepository): Response
    {
        $form = $this->createForm(OffersType::class, $offer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $offersRepository->save($offer, true);
            return $this->redirectToRoute('app_home');
        }

        return $this->render('offers/edit.html.twig', [
            'offer' => $offer,
            'form' => $form
        ]);
    }

    #[Route('/delete/{id}', name: 'app_offers_delete', methods: ['POST'])]
    public function delete(Request          $request,
                           Offers           $offer,
                           OffersRepository $offersRepository): Response
    {

        $offersRepository->remove($offer, true);
        // Permet de revenir sur la page précédente
        $route = $request->headers->get('referer');

        return $this->redirect($route);
    }

    #[Route('{id}/apply', name: 'app_offers_apply', methods: ['GET', 'POST'])]
    public function apply(Offers $offer, EntityManagerInterface $entityManager): Response
    {
        $current_user = $this->getUser();

        $student = $entityManager->getRepository(Student::class)->findOneBy(['email' => $current_user->getUserIdentifier()]);

        // Retrieve the "Pending" status from the database
        $status = $entityManager->getRepository(Status::class)->findOneBy(['status' => 'En attente']);

        if (!$status) {
            // Handle the case when the "Pending" status is not found
            throw $this->createNotFoundException('Aucun statut.');
        }

        // Create a new candidacy
        $candidacy = new Candidacy();
        $candidacy->setStudent($student)
            ->setOffer($offer)
            ->setStatus($status);

        // Save the candidacy to the database
        $entityManager->persist($candidacy);
        $entityManager->flush();

        // Redirect to a success page or do further processing as needed
        return $this->redirectToRoute('app_offers_show');
    }

    #[Route('/{id}', name: 'app_offers_show', methods: ['GET'])]
    public function show(Offers $offer): Response
    {
        return $this->render('offers/show.html.twig', [
            'offer' => $offer,
        ]);
    }

}
