<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/program', name: 'program_')]
class ProgramController extends AbstractController
{
    #[Route('/{id}', methods: ['GET'], name: 'program_show')]
    public function show(int $id): Response
    {
        return $this->render('program/show.html.twig', [
            'program_id' => $id,
        ]);
    }
}







