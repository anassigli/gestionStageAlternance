<?php

namespace App\Controller;

use App\Entity\Student;
use App\Form\StudentFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{
    #[Route('/student/{id}/show', name: 'app_student_show_profile')]
    public function showProfile(
        Student $student
    ): Response
    {
        $formStudent = $this->createForm(StudentFormType::class, $student);
        return $this->render('student/show.html.twig', [
            'form' => $formStudent,
        ]);
    }
}
