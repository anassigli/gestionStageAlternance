<?php

namespace App\Controller;


use App\Entity\User;
use App\Form\EnterpriseFormType;
use App\Form\StudentFormType;
use App\Repository\EnterpriseRepository;
use App\Repository\OffersRepository;
use App\Repository\StudentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private EnterpriseRepository $enterpriseRepository;
    private StudentRepository $studentRepository;
    private OffersRepository $offersRepository;

    public function __construct(EnterpriseRepository $enterpriseRepository,
                                StudentRepository    $studentRepository,
                                OffersRepository     $offersRepository)
    {
        $this->enterpriseRepository = $enterpriseRepository;
        $this->studentRepository = $studentRepository;
        $this->offersRepository = $offersRepository;
    }

    #[Route('/', name: 'app_home')]
    public function index(Session $session, Request $request): Response
    {
        $offers = $this->offersRepository->findAll();

        if ($this->getUser()) {
            /** @var User $current_user */
            $current_user = $this->getUser();
            $current_user_role = $current_user->getRoles();

            if (in_array('ROLE_STUDENT', $current_user_role)) {
                $candidacies = $current_user->getStudent()->getCandidacies();
            }

            if (in_array('ROLE_ENTERPRISE', $current_user_role)) {
                $enterprise = $this->enterpriseRepository->findOneBy(['email' => $current_user->getEmail()]);

                if ($enterprise->getStatus()->getStatus() === 'En attente') {
                    $session->getFlashBag()->add('warning',
                        "Votre entreprise est en attente de confirmation d'un administrateur. Vous ne pouvez pas poster d'offre pour l'instant. ");
                }
            }
        }

        return $this->render('home/index.html.twig', [
            'offers' => $offers,
            'candidacies' => $candidacies ?? null,
        ]);
    }

    #[Route('/profil', name: 'app_home_profil')]
    public function show(): Response
    {
        $enterprise = $this->enterpriseRepository->findOneBy(
            ['email' => $this->getUser()->getUserIdentifier()]
        );
        $student = $this->studentRepository->findOneBy(
            ['email' => $this->getUser()->getUserIdentifier()]
        );

        $formEnterprise = $this->createForm(EnterpriseFormType::class, $enterprise);
        $formStudent = $this->createForm(StudentFormType::class, $student);

        if (isset($enterprise)) {
            $offers = $offersRepository->findBy(["enterprise" => $enterprise]);
            $nbTotalCandidacies = 0;
            foreach ($offers as $offer){
                $nbTotalCandidacies += $offer->getCandidacies()->count();
            }
            return $this->render('enterprise/show.html.twig', [
                'form' => $formEnterprise,
                'nb_offers' => count($offers),
                'nb_postulations' => $nbTotalCandidacies
            ]);
        }

        return $this->render('student/show.html.twig', [
            'form' => $formStudent
        ]);
    }
}
