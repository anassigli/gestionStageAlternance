<?php

namespace App\Controller\Admin;
use App\Entity\Offers;
use App\Entity\Student;
use App\Entity\Tags;
use App\Entity\Candidacy;
use App\Entity\User;
use App\Repository\StudentRepository;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class AdminController extends AbstractDashboardController
{
    private StudentRepository $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {

        $sr = $this->studentRepository->findAll();
        return $this->render('admin/index.html.twig' , ['students'=>$sr]);
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
}
