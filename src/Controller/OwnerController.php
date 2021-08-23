<?php


namespace App\Controller;

use App\Entity\Owner;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class OwnerController extends RestController {
    /**
     * @Route("/api/owner", methods={"GET"})
     * @return JsonResponse
     */
    public function getOwners(): JsonResponse
    {
        $owners = $this->getDoctrine()->getRepository(Owner::class)->findAll();
        return $this->makeJsonResponse($owners);
    }
}
