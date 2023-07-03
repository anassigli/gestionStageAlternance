<?php

namespace App\Controller;


use App\Entity\User;
use App\Form\EnterpriseFormType;
use App\Form\SearchType;
use App\Form\StudentFormType;
use App\Model\SearchData;
use App\Repository\CandidacyRepository;
use App\Repository\CategoryRepository;
use App\Repository\EnterpriseRepository;
use App\Repository\OffersRepository;
use App\Repository\StatusRepository;
use App\Repository\StudentRepository;
use App\Repository\TagsRepository;
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
    private StatusRepository $statusRepository;
    private CategoryRepository $categoryRepository;
    private TagsRepository $tagsRepository;

    public function __construct(EnterpriseRepository $enterpriseRepository,
                                StudentRepository    $studentRepository,
                                OffersRepository     $offersRepository,
                                StatusRepository     $statusRepository,
                                CategoryRepository   $categoryRepository,
                                TagsRepository       $tagsRepository)
    {
        $this->enterpriseRepository = $enterpriseRepository;
        $this->studentRepository = $studentRepository;
        $this->offersRepository = $offersRepository;
        $this->statusRepository = $statusRepository;
        $this->categoryRepository = $categoryRepository;
        $this->tagsRepository = $tagsRepository;
    }

    #[Route('/', name: 'app_home')]
    public function index(Session $session, Request $request): Response
    {
        $offers = $this->offersRepository->findBy([
            'status' => $this->statusRepository->findOneBy(['status' => 'Validée'])
        ]);

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
                        "Votre entreprise est en attente de confirmation d'un administrateur. 
                        Vous ne pouvez pas poster d'offre pour l'instant.");
                }
            }
        }

        $searchData = new SearchData();
        $form = $this->createForm(SearchType::class, $searchData);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $offers = $this->offersRepository->findBySearch($searchData);

            return $this->render('home/index.html.twig', [
                'form' => $form->createView(),
                'offers' => $offers,
                'candidacies' => $candidacies ?? null,
            ]);
        }

        return $this->render('home/index.html.twig', [
            'offers' => $offers,
            'candidacies' => $candidacies ?? null,
            'form' => $form,
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
            $offers = $this->offersRepository->findBy(["enterprise" => $enterprise]);
            $nbTotalCandidacies = 0;
            foreach ($offers as $offer) {
                $nbTotalCandidacies += $offer->getCandidacies()->count();
            }
            return $this->render('enterprise/show.html.twig', [
                'form' => $formEnterprise,
                'nb_offers' => count($offers),
                'nb_postulations' => $nbTotalCandidacies
            ]);
        }

        return $this->render('student/show.profil.html.twig', [
            'form' => $formStudent
        ]);
    }
}
