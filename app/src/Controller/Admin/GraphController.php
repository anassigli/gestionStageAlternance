<?php

namespace App\Controller\Admin;

use App\Repository\EnterpriseRepository;
use App\Repository\StudentRepository;
use App\Repository\TagsRepository;
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
                          TagsRepository $tagsRepository,
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
        $allTagsChart = $chartBuilder->createChart(Chart::TYPE_BAR);


        //--------
        $studentsFoundAlternance = $chartBuilder->createChart(Chart::TYPE_LINE);
        $studentsFoundStage = $chartBuilder->createChart(Chart::TYPE_LINE);


        $studentsFoundAlternance->setData([
            'labels' => ['Janv', 'Fev', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.'],
            'datasets' => [
                [
                    'label' => 'Ont trouvé une alternance',
                    'backgroundColor' => 'rgb(255, 99, 132)',
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => [0, 20, 45, 22, 20, 30, 45],
                ],
                [
                    'label' => "N'ont toujours pas trouvé d'alternance",
                    'backgroundColor' => 'rgb(120, 99, 132, .4)',
                    'borderColor' => 'rgb(120, 99, 132, .4)',
                    'data' => [70, 63, 41, 33, 2, 1, 1],
                ],
            ],
        ]);


        $studentsFoundStage->setData([
            'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            'datasets' => [
                [
                    'label' => 'Ont trouvé un stage',
                    'backgroundColor' => 'rgb(255, 99, 132)',
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => [0, 10, 5, 2, 20, 30, 45],
                ],
                [
                    'label' => "N'ont toujours pas trouvé de stage",
                    'backgroundColor' => 'rgb(120, 99, 132, .4)',
                    'borderColor' => 'rgb(120, 99, 132, .4)',
                    'data' => [100, 70, 45, 32, 20, 10, 10],
                ],
            ],
        ]);


//tags

        $companiesCount = sizeof($tagsRepository->findAll());
        $tagsCountResults = $tagsRepository->getTagUsageCounts();

        $tagUsageCounts = [];
        foreach ($tagsCountResults as $tagCountResult) {
            $tagName = $tagCountResult['tag'];
            $usageCount = $tagCountResult['usageCount'];
            $tagUsageCounts[$tagName] = $usageCount;
        }

        $keys = array_keys($tagsCountResults);
        $values = array_values($tagsCountResults);
        $v = [];

        for ($i = 0; $i < sizeof($values); $i++) {
            array_push($v, $values[$i]["tag"]);
        }





        $allTagsChart->setData([
            'labels' => $v,
                'datasets' => [
                    [
                        'backgroundColor' => ['rgb(255, 99, 132, .4)', 'rgb(120, 99, 132, .4)'],
                        'borderColor' => 'rgb(255, 99, 132)',
                        'data' => $keys,
                        'tension' => 0.4,
                    ],
                ],
        ]);



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
            $lastStudentsAndEnterprises->setOptions([
                'maintainAspectRatio' => false,
            ]);
        }

        return $this->render('admin/graph/index.html.twig', [
            'newStudents' => $newStudents,
            'newCompanies' => $newCompanies,
            'lastStudentsAndEnterprises' => $lastStudentsAndEnterprises,
            'allStudentsAndEnterprises' => $allStudentsAndEnterprises,
            'studentsFoundStage' => $studentsFoundStage,
            'studentsFoundAlternance' => $studentsFoundAlternance,
            'allTagsChart' => $allTagsChart
        ]);
    }
}
