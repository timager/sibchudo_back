<?php


namespace App\Controller;

use App\Entity\Owner;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class OwnerController extends RestController {
    /**
     * @Route("/api/owner", methods={"GET"})
     * @param Request $request
     * @return JsonResponse
     */
    public function getOwners(Request $request) {
        $owners = $this->getDoctrine()->getRepository(Owner::class)->findAll();
        return $this->makeJsonResponse($owners);
    }
}
