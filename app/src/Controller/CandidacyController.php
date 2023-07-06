<?php

namespace App\Controller;

use App\Entity\Candidacy;
use App\Entity\Enterprise;
use App\Entity\Offers;
use App\Entity\User;
use App\Form\AcceptCandidacyType;
use App\Form\SearchType;
use App\Form\SendCandidacyType;
use App\Form\SendSpontaneousCandidacyType;
use App\MailService\Candidacies\Mailer;
use App\Repository\CandidacyRepository;
use App\Repository\OffersRepository;
use App\Repository\StatusRepository;
use App\Repository\StudentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class CandidacyController extends AbstractController
{
    private CandidacyRepository $candidacyRepository;
    private StudentRepository $studentRepository;
    private StatusRepository $statusRepository;
    private OffersRepository $offersRepository;
    private Mailer $mailer;

    public function __construct(CandidacyRepository $candidacyRepository,
                                StudentRepository   $studentRepository,
                                StatusRepository    $statusRepository,
                                OffersRepository    $offersRepository,
                                Mailer              $mailer)
    {
        $this->candidacyRepository = $candidacyRepository;
        $this->studentRepository = $studentRepository;
        $this->statusRepository = $statusRepository;
        $this->offersRepository = $offersRepository;
        $this->mailer = $mailer;
    }

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
    public function new(Offers  $offer, Session $session, Request $request): Response
    {
        /** @var User $current_user */
        $current_user = $this->getUser();

        $form = $this->createForm(SendCandidacyType::class, null, [
            'offer' => $offer
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $student = $this->studentRepository->findOneBy(['email' => $current_user->getEmail()]);
            $status = $this->statusRepository->findOneBy(['status' => 'En attente']);

            $candidacy = (new Candidacy())
                ->setStudent($student)
                ->setOffer($offer)
                ->setStatus($status);

            $this->candidacyRepository->save($candidacy, true);

            $this->mailer->sendPostedCandidacyMessage($current_user, $offer);
            $this->mailer->sendCandidacyMessage($offer->getEnterprise(), $offer, $form->getData()['content']);


            $session->getFlashBag()->add('success',
                "Votre candidature a bien été prise en compte. Vous pouvez la consulter sur votre page 
            'Mes candidatures'");

            return $this->redirectToRoute('app_home');
        }
        return $this->render('candidacies/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/candidacies/delete/{id}', name: 'app_delete_candidacy')]
    public function delete(Offers  $offer,
                           Session $session): Response
    {
        /** @var User $user */
        $user = $this->getUser();

        $student = $this->studentRepository->findOneBy(['email' => $user->getEmail()]);

        $candidacy = $this->candidacyRepository->findOneBy([
            'offer' => $offer,
            'student' => $student
        ]);

        $this->candidacyRepository->remove($candidacy, true);

        $session->getFlashBag()->add('success',
            "Votre candidature a bien été supprimée.");

        return $this->redirectToRoute('app_home');
    }

    #[Route('/candidacies/accept/student/{id}', name: 'app_candidacy_accept')]
    public function acceptCandidacy(Candidacy $candidacy, Request $request): Response
    {
        $form = $this->createForm(AcceptCandidacyType::class, null, [
            'offer' => $candidacy->getOffer()
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $offer = $candidacy->getOffer();
            $allCandidacies = $offer->getCandidacies();

            foreach ($allCandidacies as $otherCandidacy) {
                if ($otherCandidacy->getId() !== $candidacy->getId()) {
                    $otherCandidacy->setStatus($this->statusRepository->findOneBy(["status" => "Refusée"]));
                    $this->candidacyRepository->save($otherCandidacy);

                    $this->mailer->sendDenyCandidacyMessage($otherCandidacy->getStudent(), $offer);
                }
            }

            $candidacy->setStatus($this->statusRepository->findOneBy(["status" => "Validée"]));
            $offer->setStatus($this->statusRepository->findOneBy(["status" => "Pourvue"]));

            $this->mailer->sendAcceptCandidacyMessage($candidacy->getStudent(), $offer, $form->getData()['content']);

            $this->candidacyRepository->save($candidacy, true);
            $this->offersRepository->save($offer, true);

            return $this->redirectToRoute('app_enterprise_offers_candidacies', [
                "id" => $candidacy->getOffer()->getId()
            ]);
        }

        return $this->render('candidacies/accept.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/candidacies/deny/student/{id}', name: 'app_candidacy_deny')]
    public function denyCandidacy(Candidacy $candidacy): Response
    {
        $candidacy->setStatus($this->statusRepository->findOneBy(["status" => "Refusée"]));
        $this->candidacyRepository->save($candidacy, true);

        $this->mailer->sendDenyCandidacyMessage($candidacy->getStudent(), $candidacy->getOffer());

        return $this->redirectToRoute('app_enterprise_offers_candidacies', ["id" => $candidacy->getOffer()->getId()]);
    }

    #[Route('/candidacies/new/spontaneous/{id}', name: 'app_spontaneous_candidacy')]
    public function newSpontaneous(Session $session, Enterprise $enterprise, Request $request): Response
    {
        /** @var User $current_user */
        $current_user = $this->getUser();

        $form = $this->createForm(SendSpontaneousCandidacyType::class, null, [
            'enterprise' => $enterprise
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $student = $this->studentRepository->findOneBy(['email' => $current_user->getEmail()]);

            $this->mailer->sendSpontaneousCandidacyMessage($student, $enterprise);
            $this->mailer->receivedSpontaneousCandidacyMessage($student,
                $enterprise,
                $this->getParameter('kernel.project_dir'),
                $form->getData()['content']);

            $session->getFlashBag()->add('success',
                "Votre candidature a bien été prise en compte. Un mail a été envoyé à " . $enterprise->getName());

            return $this->redirectToRoute('app_home');
        }

        return $this->render('candidacies/send_spontaneous.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
