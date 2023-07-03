<?php

namespace App\Controller;

use App\Entity\Candidacy;
use App\Entity\Student;
use App\Form\StudentFormType;
use App\Repository\CandidacyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{
    #[Route('/candidacy/{candidacyId}/student/{id}/show', name: 'app_student_show_profile')]
    public function showProfile(
        Request             $request,
        Student             $student,
        CandidacyRepository $candidacyRepository
    ): Response
    {
        $routeParams = $request->attributes->get('_route_params');
        $candidacy = $candidacyRepository->findOneBy(["id" => $routeParams["candidacyId"]]);

        $formStudent = $this->createForm(StudentFormType::class, $student);
        return $this->render('student/show.html.twig', [
            'form' => $formStudent,
            'candidacy' => $candidacy
        ]);
    }
}
