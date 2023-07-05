<?php

namespace App\Controller\Admin;

use App\Entity\Tags;
use App\Repository\CandidacyRepository;
use App\Repository\EnterpriseRepository;
use App\Repository\OffersRepository;
use App\Repository\StudentRepository;
use App\Repository\TagsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class GraphController extends AbstractController
{
    private $months = ['Janvier', "Frévrier", "Mars", "Avril", "Mai", "Juin",
        "Juillet", "Août", 'Septembre', 'Octobre', 'Novembre', "Décembre"];

    #[
        Route('/admin/graph', name: 'app_admin_graph')]
    public function index(EnterpriseRepository  $enterpriseRepository,
                          StudentRepository     $studentRepository,
                          TagsRepository        $tagsRepository,
                          CandidacyRepository   $candidacyRepository,
                          OffersRepository      $offersRepository,
                          ChartBuilderInterface $chartBuilder): Response
    {
        $studentsCount = sizeof($studentRepository->findAll());

        // Nouveaux étudiants inscrits et dernière entreprises inscrite
        $lastStudentsAndEnterprises = $this->createNewSubscribesChart($chartBuilder, $enterpriseRepository, $studentRepository);

        // Nb étudiants et entreprises
        $allStudentsAndEnterprises = $this->createNbStudentsAndEnterprise($chartBuilder, $enterpriseRepository, $studentsCount);

        // Tags par offres et Tags par candidatures
        $allTagsChart = $this->createTagsGraph($chartBuilder, $candidacyRepository, $tagsRepository, $offersRepository);

        $studentsFoundContract = $this->createNbCandidacyGraph($chartBuilder, $candidacyRepository, $studentsCount);

        $candidaciesAndOffersByMonth = $this->createCandidaciesAndOffersGraph($chartBuilder, $candidacyRepository, $offersRepository);

        return $this->render('admin/graph/index.html.twig', [
            'lastStudentsAndEnterprises' => $lastStudentsAndEnterprises,
            'allStudentsAndEnterprises' => $allStudentsAndEnterprises,
            'studentsFoundStage' => $studentsFoundContract,
            'allTagsChart' => $allTagsChart,
            'candidaciesAndOffersByMonth' => $candidaciesAndOffersByMonth
        ]);
    }

    private function createNbStudentsAndEnterprise(ChartBuilderInterface $chartBuilder,
                                                   EnterpriseRepository  $enterpriseRepository,
                                                   int                   $studentsCount): Chart
    {
        $companiesCount = sizeof($enterpriseRepository->findAll());
        $allStudentsAndEnterprises = $this->createBarGraph($chartBuilder, ["Total étudiants", "Total entreprises"], [$studentsCount, $companiesCount]);
        $allStudentsAndEnterprises->setOptions([
            'maintainAspectRatio' => false,
        ]);
        return $allStudentsAndEnterprises;
    }

    private function createBarGraph(ChartBuilderInterface $chartBuilder,
                                    array                 $labels,
                                    array                 $data): Chart
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

    private function createLineGraph(ChartBuilderInterface $chartBuilder,
                                     array                 $nbStudentsPerMonth,
                                     array                 $acceptedCandidacyPerMonth,
                                     array                 $lineLabels): Chart
    {
        $graph = $chartBuilder->createChart(Chart::TYPE_LINE);
        $graph->setData([
            'labels' => $this->months,
            'datasets' => [
                [
                    'label' => $lineLabels[0],
                    'backgroundColor' => 'rgb(255, 99, 132)',
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => $nbStudentsPerMonth,
                ],
                [
                    'label' => $lineLabels[1],
                    'backgroundColor' => 'rgb(120, 99, 132, .4)',
                    'borderColor' => 'rgb(120, 99, 132, .4)',
                    'data' => $acceptedCandidacyPerMonth,
                ],
            ],
        ]);
        return $graph;
    }

    private function createNbCandidacyGraph(ChartBuilderInterface $chartBuilder,
                                            CandidacyRepository   $candidacyRepository,
                                            int                   $studentsCount)
    {
        $acceptedCandidacyPerMonth = $candidacyRepository->getValidatesCandidaciesByMonth();
        $studentsCountRemains = $studentsCount;
        $nbStudentsPerMonth = [];
        $nbAcceptedCandidaciesPerMonth = [];
        foreach ($acceptedCandidacyPerMonth as $month) {
            $studentsCountRemains = $studentsCountRemains - $month;
            $nbStudentsPerMonth[] = $studentsCountRemains;
            $nbAcceptedCandidaciesPerMonth[] = end($nbAcceptedCandidaciesPerMonth) + $month;
        }
        return $this->createLineGraph($chartBuilder, $nbStudentsPerMonth, $nbAcceptedCandidaciesPerMonth, ["N'ont pas trouvé de contrat","Ont trouvé un contrat"]);
    }

    private function createTagsGraph(ChartBuilderInterface $chartBuilder,
                                     CandidacyRepository   $candidacyRepository,
                                     TagsRepository        $tagsRepository,
                                     OffersRepository      $offersRepository)
    {
        $allTagsChart = $chartBuilder->createChart(Chart::TYPE_BAR);
        $allTags = $tagsRepository->findAll();
        $tagsByOffers = $this->getAllTags($allTags);
        $tagsByCandidacies = $this->getAllTags($allTags);

        $tagsByOffers = $this->getTagsByOffers($offersRepository, $tagsByOffers);
        $tagsByCandidacies = $this->getTagsByCandidacies($candidacyRepository, $tagsByCandidacies);

        $dataForGraph = $this->orderDataTags($tagsByOffers, $tagsByCandidacies);

        $allTagsChart->setData([
            'labels' => $dataForGraph[0],
            'datasets' => [
                [
                    'label' => "Par offres",
                    'backgroundColor' => ['rgb(255, 99, 132, .4)'],
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => $dataForGraph[1],
                    'tension' => 0.4,
                ],
                [
                    'label' => "Par candidatures",
                    'backgroundColor' => ['rgb(120, 99, 132, .4)'],
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => $dataForGraph[2],
                    'tension' => 0.4,
                ]
            ],
        ]);
        return $allTagsChart;
    }

    private function orderDataTags(array $tagsByOffers, array $tagsByCandidacies)
    {
        $dataForGraph = [];
        $offer = [];
        $candidacies = [];
        $tagsName = [];
        foreach ($tagsByOffers as $tagName => $value) {
            $tagsName[] = $tagName;
            $offer[] = $value;
            $candidacies[] = $tagsByCandidacies[$tagName];
        }
        $dataForGraph[0] = $tagsName;
        $dataForGraph[1] = $offer;
        $dataForGraph[2] = $candidacies;
        return $dataForGraph;
    }

    private function getAllTags(array $allTags)
    {
        $tags = [];
        foreach ($allTags as $tag) {
            /** @var Tags $tag */
            $tags[$tag->getTag()] = 0;
        }
        return $tags;
    }

    private function getTagsByOffers(OffersRepository $offersRepository,
                                     array            $tagsPerOffers): array
    {
        foreach ($offersRepository->findAll() as $offer) {
            foreach ($offer->getTags() as $tag) {
                if (array_key_exists($tag->getTag(), $tagsPerOffers)) {
                    $tagsPerOffers[$tag->getTag()]++;
                } else {
                    $tagsPerOffers[$tag->getTag()] = 1;
                }
            }
        }
        asort($tagsPerOffers);
        return $tagsPerOffers;
    }

    private function getTagsByCandidacies(CandidacyRepository $candidacyRepository,
                                          array               $tagsPerValidatesCandidacies): array
    {
        foreach ($candidacyRepository->findAll() as $candidacy) {
            foreach ($candidacy->getOffer()->getTags() as $tag) {
                if (array_key_exists($tag->getTag(), $tagsPerValidatesCandidacies)) {
                    $tagsPerValidatesCandidacies[$tag->getTag()]++;
                } else {
                    $tagsPerValidatesCandidacies[$tag->getTag()] = 1;
                }
            }
        }
        return $tagsPerValidatesCandidacies;
    }

    private
    function createNewSubscribesChart(ChartBuilderInterface $chartBuilder,
                                      EnterpriseRepository  $enterpriseRepository,
                                      StudentRepository     $studentRepository): Chart
    {
        $lastStudentsAndEnterprises = $chartBuilder->createChart(Chart::TYPE_PIE);

        $newCompanies = sizeof($enterpriseRepository->findNewCompaniesInLastWeek());
        $newStudents = sizeof($studentRepository->findNewStudentsInLastWeek());

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
        }
        return $lastStudentsAndEnterprises;
    }

    private function createCandidaciesAndOffersGraph(ChartBuilderInterface $chartBuilder,
                                                     CandidacyRepository   $candidacyRepository,
                                                     OffersRepository      $offersRepository): Chart
    {
        $candaciesPerMonth = $candidacyRepository->getCandidaciesByMonth();
        $offersPerMonth = $offersRepository->getOffersByMonth();

        $candaciesPerMonthGraph = [];
        $offersPerMonthGraph = [];
        foreach ($candaciesPerMonth as $nbCandidacies) {
            $candaciesPerMonthGraph[] = $nbCandidacies;
        }
        foreach ($offersPerMonth as $nbOffers) {
            $offersPerMonthGraph[] = $nbOffers;
        }

        return $this->createLineGraph($chartBuilder, $candaciesPerMonthGraph, $offersPerMonthGraph, ["Nombre de candidatures par mois", "Nombre d'offres déposées par mois"]);
    }
}
