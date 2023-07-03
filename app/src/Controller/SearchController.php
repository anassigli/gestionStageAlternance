<?php

namespace App\Controller;

use App\Entity\Offers;
use App\Entity\User;
use App\Repository\OffersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Meilisearch\Bundle\SearchService;

class SearchController extends AbstractController
{
    #[Route('/search', name: 'app_search')]
    public function search(SearchService          $searchService,
                           Request                $request,
                           EntityManagerInterface $doctrine,
                           OffersRepository       $offersRepository): Response
    {
        $searchQuery = $request->query->get('query') ?? '';
        $searchService->index($doctrine, $offersRepository->findAll());

        $hits = $searchService->search($doctrine, Offers::class, $searchQuery);

        if ($this->getUser()) {
            /** @var User $current_user */
            $current_user = $this->getUser();

            if (in_array('ROLE_STUDENT', $current_user->getRoles())) {
                $candidacies = $current_user->getStudent()->getCandidacies();
            }
        }

        return $this->render(
            'search/index.html.twig',
            [
                'quotes' => $hits,
                'candidacies' => $candidacies ?? null
            ]
        );
    }
}
