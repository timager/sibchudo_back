<?php


namespace App\Controller;

use App\Entity\Title;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class TitleController extends RestController
{
    /**
     * @Route("/api/title", methods={"GET"})
     * @return JsonResponse
     */
    public function getTitles(): JsonResponse
    {
        $titles = $this->getDoctrine()->getRepository(Title::class)->findAll();
        return $this->makeJsonResponse($titles);
    }
}
