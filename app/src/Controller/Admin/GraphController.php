<?php

namespace App\Controller\Admin;

use App\Repository\EnterpriseRepository;
use App\Repository\StudentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class GraphController extends AbstractController
{
    #[Route('/admin/graph', name: 'app_admin_graph')]
    public function index(EnterpriseRepository  $enterpriseRepository,
                          StudentRepository     $studentRepository,
                          ChartBuilderInterface $chartBuilder): Response
    {
        //Data
        $studentsCount = sizeof($enterpriseRepository->findAll());
        $companiesCount = sizeof($studentRepository->findAll());

        // new Students and Enterprises
        $newCompanies = sizeof($enterpriseRepository->findNewCompaniesInLastWeek());
        $newStudents = sizeof($studentRepository->findNewStudentsInLastWeek());

        $lastStudentsAndEnterprises = $chartBuilder->createChart(Chart::TYPE_PIE);
        $allStudentsAndEnterprises = $chartBuilder->createChart(Chart::TYPE_BAR);

        if ($newCompanies !== 0 || $newStudents !== 0) {

            $lastStudentsAndEnterprises->setData([
                'labels' => ["Nouveaux étudiants cette semaine", "Nouvelles entreprises cette semaine"],
                'datasets' => [
                    [
                        'backgroundColor' => ['rgb(255, 99, 132, .4)', 'rgb(120, 99, 132, .4)'],
                        'borderColor' => 'rgb(255, 99, 132)',
                        'data' => [$newStudents, $newCompanies],
                        'tension' => 0.4,
                    ],
                ],
            ]);

            $allStudentsAndEnterprises->setData([
                'labels' => ["Total étudiants", "Total entreprises"],
                'datasets' => [
                    [
                        'backgroundColor' => ['rgb(255, 99, 132, .4)', 'rgb(120, 99, 132, .4)'],
                        'borderColor' => 'rgb(255, 99, 132)',
                        'data' => [$studentsCount, $companiesCount],
                        'tension' => 0.4,
                    ],
                ],
            ]);

            // aspect ratio
            $lastStudentsAndEnterprises->setOptions([
                'maintainAspectRatio' => false,
            ]);
            $allStudentsAndEnterprises->setOptions([
                'maintainAspectRatio' => false,
            ]);
        }

        return $this->render('admin/graph/index.html.twig', [
            'newStudents' => $newStudents,
            'newCompanies' => $newCompanies,
            'lastStudentsAndEnterprises' => $lastStudentsAndEnterprises,
            'allStudentsAndEnterprises' => $allStudentsAndEnterprises
        ]);
    }
}
