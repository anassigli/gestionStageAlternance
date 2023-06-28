<?php

namespace App\Controller;
use App\Entity\Candidacy;
use App\Entity\Offers;
use App\Entity\Status;
use App\Entity\Student;
use App\Entity\User;
use App\Form\OffersType;
use App\Repository\OffersRepository;
use App\Repository\StatusRepository;
use App\Repository\StudentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/offers')]
class OffersController extends AbstractController
{
    #[Route('/{id}', name: 'app_offers_show', methods: ['GET'])]
    public function show(Offers $offer): Response
    {
        return $this->render('offers/show.html.twig', [
            'offer' => $offer,
        ]);
    }

    #[Route('/{id}/apply', name: 'app_offers_apply', methods: ['GET', 'POST'])]
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
}
