<?php


namespace App\Controller;

use App\Entity\CatClass;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CatClassController extends RestController {
    /**
     * @Route("/api/class", methods={"GET"})
     * @return JsonResponse
     */
    public function getCatClasses(): JsonResponse
    {
        $statuses = $this->getDoctrine()->getRepository(CatClass::class)->findAll();
        return $this->makeJsonResponse($statuses);
    }
}
