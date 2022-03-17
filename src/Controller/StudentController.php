<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Student;


class StudentController extends AbstractController
{
    #[Route('/student', name: 'app_student')]
    public function index(ManagerRegistry $doctrine) : Response
    {
        $students = $doctrine->getRepository(Student::class)->findAll();


        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
            'students' => $students
        ]);
    }
}