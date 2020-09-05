<?php


namespace App\Controller;

use App\Entity\CatClass;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CatClassController extends AbstractController {
    /**
     * @Route("/api/class", methods={"GET"})
     * @param Request $request
     * @return JsonResponse
     */
    public function getCatClasses(Request $request) {
        $statuses = $this->getDoctrine()->getRepository(CatClass::class)->findAll();
        $context = SerializationContext::create();
        $context->setSerializeNull(true);
        $context->enableMaxDepthChecks();
        $json = SerializerBuilder::create()->build()->serialize($statuses, 'json', $context);
        return new JsonResponse($json, 200, [], true);
    }
}
