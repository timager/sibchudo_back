<?php


namespace App\Controller;


use App\Entity\Community;
use App\Entity\Owner;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class OwnerController extends AbstractController {
    /**
     * @Route("/api/owner/get")
     * @param Request $request
     * @return JsonResponse
     */
    public function getOwners(Request $request) {
        $statuses = $this->getDoctrine()->getRepository(Owner::class)->findAll();
        $context = SerializationContext::create();
        $context->setSerializeNull(true);
        $context->enableMaxDepthChecks();
        $json = SerializerBuilder::create()->build()->serialize($statuses, 'json', $context);
        return new JsonResponse($json, 200, [], true);
    }
}
