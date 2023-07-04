<?php

namespace App\Controller;

use App\Entity\Candidacy;
use App\Entity\Offers;
use App\Entity\User;
use App\MailService\Candidacies\Mailer;
use App\Repository\CandidacyRepository;
use App\Repository\OffersRepository;
use App\Repository\StatusRepository;
use App\Repository\StudentRepository;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/candidacies/new/{id}', name: 'app_new_candidacy')]
    public function new(Offers              $offer,
                        CandidacyRepository $candidacyRepository,
                        StudentRepository   $studentRepository,
                        StatusRepository    $statusRepository,
                        Session             $session,
                        Mailer              $mailer): Response
    {
        /** @var User $current_user */
        $current_user = $this->getUser();

        $student = $studentRepository->findOneBy(['email' => $current_user->getEmail()]);
        $status = $statusRepository->findOneBy(['status' => 'En attente']);

        $candidacy = (new Candidacy())
            ->setStudent($student)
            ->setOffer($offer)
            ->setStatus($status);

        $candidacyRepository->save($candidacy, true);

        $mailer->sendPostedCandidacyMessage($current_user, $offer);

        $session->getFlashBag()->add('success',
            "Votre candidature a bien été prise en compte. Vous pouvez la consulter sur votre page 'Mes candidatures'");

        return $this->redirectToRoute('app_home');
    }

    #[Route('/candidacies/delete/{id}', name: 'app_delete_candidacy')]
    public function delete(Offers              $offer,
                           StudentRepository   $studentRepository,
                           CandidacyRepository $candidacyRepository,
                           Session             $session): Response
    {
        /** @var User $user */
        $user = $this->getUser();

        $student = $studentRepository->findOneBy(['email' => $user->getEmail()]);

        $candidacy = $candidacyRepository->findOneBy([
            'offer' => $offer,
            'student' => $student
        ]);

        $candidacyRepository->remove($candidacy, true);

        $session->getFlashBag()->add('success',
            "Votre candidature a bien été supprimée.");

        return $this->redirectToRoute('app_home');
    }

    #[Route('/candidacies/accept/student/{id}', name: 'app_candidacy_accept')]
    public function acceptCandidacy(Candidacy           $candidacy,
                                    StatusRepository    $statusRepository,
                                    CandidacyRepository $candidacyRepository,
                                    OffersRepository    $offersRepository,
                                    Mailer              $mailer): Response
    {
        $offer = $candidacy->getOffer();
        $allCandidacies = $offer->getCandidacies();

        foreach ($allCandidacies as $otherCandidacy) {
            if ($otherCandidacy->getId() !== $candidacy->getId()) {
                $otherCandidacy->setStatus($statusRepository->findOneBy(["status" => "Refusée"]));
                $candidacyRepository->save($otherCandidacy);

                $mailer->sendDenyCandidacyMessage($otherCandidacy->getStudent(), $offer);
            }
        }

        $candidacy->setStatus($statusRepository->findOneBy(["status" => "Validée"]));
        $offer->setStatus($statusRepository->findOneBy(["status" => "Pourvue"]));

        $mailer->sendAcceptCandidacyMessage($candidacy->getStudent(), $offer);

        $candidacyRepository->save($candidacy, true);
        $offersRepository->save($offer, true);

        return $this->redirectToRoute('app_enterprise_offers_candidacies', ["id" => $candidacy->getOffer()->getId()]);
    }

    #[Route('/candidacies/deny/student/{id}', name: 'app_candidacy_deny')]
    public function denyCandidacy(Candidacy           $candidacy,
                                  StatusRepository    $statusRepository,
                                  CandidacyRepository $candidacyRepository,
                                  Mailer              $mailer): Response
    {
        $candidacy->setStatus($statusRepository->findOneBy(["status" => "Refusée"]));
        $candidacyRepository->save($candidacy, true);

        $mailer->sendDenyCandidacyMessage($candidacy->getStudent(), $candidacy->getOffer());

        return $this->redirectToRoute('app_enterprise_offers_candidacies', ["id" => $candidacy->getOffer()->getId()]);
    }
}
