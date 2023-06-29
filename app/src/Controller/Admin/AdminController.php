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

        //Data
        $studentsCount = $this->entrepriseRepository->countAll();
        $companiesCount = $this->studentRepository->countAll();

            // new Students and Entreprises
        $newCompanies = $this->entrepriseRepository->findNewCompaniesInLastWeek();
        $newStudents = $this->studentRepository->findNewStudentsInLastWeek();




        $chart1 = $this->chartBuilder->createChart(Chart::TYPE_PIE);
        $chart2 = $this->chartBuilder->createChart(Chart::TYPE_DOUGHNUT);

        if ($newCompanies !== 0 || $newStudents !== 0 ){

            /**
             * @author Anass IGLI
             *
             * Graphe Camembert (Pie Chart) afin de montrer les nouveaux candidats de cette semaine
             */
            $chart1->setData([
                'labels' => ["Nouveaux étudiants cette semaine","Nouvelles entreprises cette semaine"],
                'datasets' => [
                    [
                        'labels' => ['Nouveaux Candidats ' , 'Nouvelles Entreprises'],
                        'backgroundColor' => ['rgb(255, 99, 132, .4)','rgb(120, 99, 132, .4)'],
                        'borderColor' => 'rgb(255, 99, 132)',
                        'data' => [$newStudents,$newCompanies],
                        'tension' => 0.4,
                    ],
                ],
            ]);

            /**
             * @author Anass IGLI
             *
             * Graphe doughnut (doughnut Chart) afin de montrer les nouveaux candidats de cette semaine
             */

            $chart2->setData([
                'labels' => ["Total étudiants","Total entreprises"],
                'datasets' => [
                    [
                        'labels' => ['Total Etudiants ' , 'Total Entreprises'],
                        'backgroundColor' => ['rgb(255, 99, 132, .4)','rgb(120, 99, 132, .4)'],
                        'borderColor' => 'rgb(255, 99, 132)',
                        'data' => [$studentsCount,$companiesCount],
                        'tension' => 0.4,
                    ],
                ],
            ]);


            // aspect ratio

            $chart1->setOptions([
                'maintainAspectRatio' => false,
            ]);
            $chart2->setOptions([
                'maintainAspectRatio' => false,
            ]);
        }



        return $this->render('admin/index.html.twig' , ['newStudents'=>$newStudents , 'newCompanies'=>$newCompanies,'chart1'=>$chart1, 'chart2'=>$chart2]);


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
