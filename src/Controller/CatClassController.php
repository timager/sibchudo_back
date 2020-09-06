<?php


namespace App\Controller;

use App\Entity\CatClass;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CatClassController extends RestController {
    /**
     * @Route("/api/class", methods={"GET"})
     * @param Request $request
     * @return JsonResponse
     */
    public function getCatClasses(Request $request) {
        $statuses = $this->getDoctrine()->getRepository(CatClass::class)->findAll();
        return $this->makeJsonResponse($statuses);
    }
}
