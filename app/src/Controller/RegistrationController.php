<?php

namespace App\Controller;

use App\Entity\Enterprise;
use App\Entity\Student;
use App\Entity\User;
use App\Form\EnterpriseFormType;
use App\Form\RegistrationFormType;
use App\Form\StudentFormType;
use App\MailService\VerifyUser\Mailer;
use App\Repository\EnterpriseRepository;
use App\Repository\StatusRepository;
use App\Repository\StudentRepository;
use App\Repository\UserRepository;
use App\Service\FileUploader;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use SymfonyCasts\Bundle\VerifyEmail\VerifyEmailHelperInterface;

class RegistrationController extends AbstractController
{
    private VerifyEmailHelperInterface $verifyEmailHelper;
    private UserRepository $userRepository;

    public function __construct(VerifyEmailHelperInterface $helper, UserRepository $userRepository)
    {
        $this->verifyEmailHelper = $helper;
        $this->userRepository = $userRepository;
    }

    #[Route('/register', name: 'app_register')]
    public function register(Request                     $request,
                             Session                     $session,
                             UserPasswordHasherInterface $userPasswordHasher,
                             Mailer                      $mailer,
                             EnterpriseRepository        $enterpriseRepository,
                             StatusRepository            $statusRepository,
                             StudentRepository           $studentRepository): Response
    {
        $enterprise = new Enterprise();
        $student = new Student();
        $formEnterprise = $this->createForm(EnterpriseFormType::class, $enterprise);
        $formStudent = $this->createForm(StudentFormType::class, $student);

        $formEnterprise->handleRequest($request);
        $formStudent->handleRequest($request);

        if ($formEnterprise->isSubmitted() && $formEnterprise->isValid()) {
            $enterprise->setStatus($statusRepository->findOneBy(['status' => 'En attente']));

            $user = (new User())
                ->setEmail($enterprise->getEmail())
                ->setRoles(['ROLE_ENTERPRISE'])
                ->setEnterprise($enterprise);

            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $formEnterprise->get('plainPassword')->getData()
                )
            );

            $this->userRepository->save($user, true);
            $enterpriseRepository->save($enterprise, true);

            $signatureComponents = $this->verifyEmailHelper->generateSignature(
                'registration_confirmation_route',
                $user->getId(),
                $user->getEmail(),
                ['id' => $user->getId()]
            );

            $mailer->sendConfirmEmailMessage($user, $signatureComponents->getSignedUrl());

            $session->getFlashBag()->add('success', 'Un mail de confirmation vous a été envoyé');

            $this->redirectToRoute('app_home');
        } elseif ($formStudent->isSubmitted() && $formStudent->isValid()) {
            $user = (new User())
                ->setEmail($student->getEmail())
                ->setRoles(['ROLE_STUDENT'])
                ->setStudent($student);

            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $formStudent->get('plainPassword')->getData()
                )
            );

            $this->userRepository->save($user, true);
            $studentRepository->save($student, true);

            $signatureComponents = $this->verifyEmailHelper->generateSignature(
                'registration_confirmation_route',
                $user->getId(),
                $user->getEmail(),
                ['id' => $user->getId()]
            );

            $mailer->sendConfirmEmailMessage($user, $signatureComponents->getSignedUrl());

            $session->getFlashBag()->add('success', 'Un mail de confirmation vous a été envoyé');

            $this->redirectToRoute('app_home');
        }

        return $this->render('registration/register.html.twig', [
            'enterprise_form' => $formEnterprise->createView(),
            'student_form' => $formStudent->createView(),
        ]);
    }

    #[
        Route('/verify/email', name: 'registration_confirmation_route')]
    public function verifyUserEmail(Request $request,
                                    Session $session): Response
    {
        $user = $this->userRepository->find($request->query->get('id'));
        if (!$user) {
            throw $this->createNotFoundException();
        }
        // Do not get the User's id or Email Address from the Request object
        try {
            $this->verifyEmailHelper->validateEmailConfirmation(
                $request->getUri(),
                $user->getId(),
                $user->getEmail(),
            );
        } catch (VerifyEmailExceptionInterface $e) {
            $session->getFlashBag()->add('error', $e->getReason());
            return $this->redirectToRoute('app_register');
        }
        $user->setIsVerified(true);

        $this->userRepository->save($user, true);

        $session->getFlashBag()->add('success', 'Votre compte est bien vérifié');

        return $this->redirectToRoute('app_home');
    }
}
