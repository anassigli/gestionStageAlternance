<?php

namespace App\Controller\Admin;

use App\Entity\Offers;
use App\Entity\Tags;
use App\Entity\Candidacy;
use App\Entity\User;
use App\Repository\EnterpriseRepository;
use App\Repository\StudentRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;

class AdminController extends AbstractDashboardController
{
    private StudentRepository $studentRepository;
    private ChartBuilderInterface $chartBuilder;
    private EnterpriseRepository $entrepriseRepository;

    public function __construct(StudentRepository     $studentRepository,
                                EnterpriseRepository  $entrepriseRepository,
                                ChartBuilderInterface $chartBuilder)
    {
        $this->studentRepository = $studentRepository;
        $this->chartBuilder = $chartBuilder;
        $this->entrepriseRepository = $entrepriseRepository;
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Dashboard Admin')
            ->setLocales(['fr']);
    }

    public function configureMenuItems(): iterable
    {
        //yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToDashboard('Graphs', 'fas fa-list', 'app_admin_graph');
        yield MenuItem::linkToCrud('Gestion Des Offres', 'fas fa-list', Offers::class);
        yield MenuItem::linkToCrud('Gestion Des Candidatures', 'fas fa-list', Candidacy::class);
        yield MenuItem::linkToCrud('Gestion Des Utilisateurs', 'fas fa-list', User::class);
        yield MenuItem::linkToCrud('Gestion Des Tags', 'fas fa-list', Tags::class);
        yield MenuItem::linkToRoute('Graphique', 'fas fa-list', 'app_admin_graph');
    }


    public function configureAssets(): Assets
    {
        return parent::configureAssets()
            ->addWebpackEncoreEntry('app');
    }
}
