<?php

namespace App\Controller;

use App\Entity\Candidacy;
use App\Entity\Offers;
use App\Entity\User;
use App\Repository\CandidacyRepository;
use App\Repository\OffersRepository;
use App\Repository\StatusRepository;
use App\Repository\StudentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class CandidacyController extends AbstractController
{
    #[Route('/candidacies', name: 'app_candidacies_show', methods: ['GET'])]
    public function candidacies(): Response
    {
        /** @var User $current_user */
        $current_user = $this->getUser();
        $candidacies = $current_user->getStudent()->getCandidacies();

        return $this->render('candidacies/index.html.twig', [
            'candidacies' => $candidacies,
        ]);
    }

    #[Route('/candidacy/new/{id}', name: 'app_new_candidacy')]
    public function new(Offers              $offer,
                        CandidacyRepository $candidacyRepository,
                        StudentRepository   $studentRepository,
                        StatusRepository    $statusRepository,
                        Session             $session): Response
    {
        $student = $studentRepository->findOneBy(['email' => $this->getUser()->getEmail()]);
        $status = $statusRepository->findOneBy(['status' => 'En attente']);

        $candidacy = (new Candidacy())
            ->setStudent($student)
            ->setOffer($offer)
            ->setStatus($status);

        $candidacyRepository->save($candidacy, true);

        $session->getFlashBag()->add('success',
            "Votre candidature a bien été prise en compte. Vous pouvez la consulter sur votre page 'Mes candidatures'");

        return $this->redirectToRoute('app_home');
    }
}
