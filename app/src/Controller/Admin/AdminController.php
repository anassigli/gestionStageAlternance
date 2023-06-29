<?php

namespace App\Controller\Admin;
use App\Entity\Offers;
use App\Entity\Student;
use App\Entity\Tags;
use App\Entity\Candidacy;
use App\Entity\User;
use App\Repository\EnterpriseRepository;
use App\Repository\StudentRepository;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class AdminController extends AbstractDashboardController
{
    private StudentRepository $studentRepository;
    private ChartBuilderInterface $chartBuilder;
    private EnterpriseRepository $entrepriseRepository;

    public function __construct(StudentRepository $studentRepository ,EnterpriseRepository $entrepriseRepository, ChartBuilderInterface $chartBuilder)
    {
        $this->studentRepository = $studentRepository;
        $this->chartBuilder = $chartBuilder;
        $this->entrepriseRepository = $entrepriseRepository;
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $er = $this->entrepriseRepository->findTodaysNewCompanies();
        $sr = $this->studentRepository->findAll();

        $chart2 = $this->chartBuilder->createChart(Chart::TYPE_PIE);
        $chart2->setData([
            'labels' => ['Nouveaux étudiants',"Nouvelles entreprises"],
            'datasets' => [
                [
                    'labels' => ['Nouveaux Candidats ' , 'Nouvelles Entreprises'],
                    'backgroundColor' => ['rgb(255, 99, 132, .4)','rgb(120, 99, 132, .4)'],
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => [2, 7],
                    'tension' => 0.4,
                ],
            ],
        ]);

        $chart2->setOptions([
            'maintainAspectRatio' => false,
        ]);

        return $this->render('admin/index.html.twig' , ['sr'=>$sr,'chart2'=>$chart2]);


    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Dashboard Admin')
            ->setLocales(['fr']);
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Gestion Des Offres', 'fas fa-list', Offers::class);
        yield MenuItem::linkToCrud('Gestion Des Candidatures', 'fas fa-list', Candidacy::class);
        yield MenuItem::linkToCrud('Gestion Des Utilisateurs', 'fas fa-list', User::class);
        yield MenuItem::linkToCrud('Gestion Des Tags', 'fas fa-list', Tags::class);
    }



    public function configureAssets(): \EasyCorp\Bundle\EasyAdminBundle\Config\Assets
    {
        return parent::configureAssets()
            ->addWebpackEncoreEntry('app');
    }
}
