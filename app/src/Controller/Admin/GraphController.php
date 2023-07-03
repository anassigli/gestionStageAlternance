<?php

namespace App\Controller\Admin;

use App\Repository\CandidacyRepository;
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
    private function createBarGraph(ChartBuilderInterface $chartBuilder, array $labels, array $data): Chart
    {
        $graph = $chartBuilder->createChart(Chart::TYPE_BAR);
        $graph->setData([
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => "Etudiants | Entreprises",
                    'backgroundColor' => ['rgb(255, 99, 132, .4)', 'rgb(120, 99, 132, .4)'],
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => $data,
                    'tension' => 0.4,
                ]
            ],
        ]);
        return $graph;
    }

    private function createLineGraph(ChartBuilderInterface $chartBuilder, array $labels, array $data): Chart
    {
        $graph = $chartBuilder->createChart(Chart::TYPE_LINE);
        $graph->setData([
            'labels' => ['Septembre', 'Octobre', 'Novembre', "Décembre", 'Janvier',
                "Frévrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août"],
            'datasets' => [
                [
                    'label' => 'Ont trouvé un contrat',
                    'backgroundColor' => 'rgb(255, 99, 132)',
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => [0, 10, 5, 2, 20, 30, 45, 0, 10, 5, 2, 20, 30, 45],
                ],
                [
                    'label' => "N'ont toujours pas trouvé de contrat",
                    'backgroundColor' => 'rgb(120, 99, 132, .4)',
                    'borderColor' => 'rgb(120, 99, 132, .4)',
                    'data' => [100, 70, 45, 32, 20, 10, 10, 100, 70, 45, 32, 20, 10, 10],
                ],
            ],
        ]);
        return $graph;
    }

    #[Route('/admin/graph', name: 'app_admin_graph')]
    public function index(EnterpriseRepository  $enterpriseRepository,
                          StudentRepository     $studentRepository,
                          TagsRepository        $tagsRepository,
                          CandidacyRepository   $candidacyRepository,
                          ChartBuilderInterface $chartBuilder): Response
    {
        //Data
        $studentsCount = sizeof($studentRepository->findAll());
        $companiesCount = sizeof($enterpriseRepository->findAll());

        // new Students and Enterprises
        $newCompanies = sizeof($enterpriseRepository->findNewCompaniesInLastWeek());
        $newStudents = sizeof($studentRepository->findNewStudentsInLastWeek());

        $lastStudentsAndEnterprises = $chartBuilder->createChart(Chart::TYPE_PIE);

        $allStudentsAndEnterprises = $this->createBarGraph($chartBuilder, ["Total étudiants", "Total entreprises"], [$studentsCount, $companiesCount]);

        $allTagsChart = $chartBuilder->createChart(Chart::TYPE_BAR);

        $acceptedCandidacyPerMonth = $candidacyRepository->getCandidacyByMonth();
        $studentsFoundStage = $this->createLineGraph($chartBuilder, [], $acceptedCandidacyPerMonth);

        //tags
        $tagsCount = sizeof($tagsRepository->findAll());
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
            'allTagsChart' => $allTagsChart
        ]);
    }
}
