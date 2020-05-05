<?php


namespace App\Controller;


use App\Entity\Community;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CommunityController extends AbstractController {

    /**
     * @Route("/api/community/get")
     * @param Request $request
     * @return JsonResponse
     */
    public function getCommunity(Request $request) {
        $statuses = $this->getDoctrine()->getRepository(Community::class)->findAll();
        $context = SerializationContext::create();
        $context->setSerializeNull(true);
        $context->enableMaxDepthChecks();
        $json = SerializerBuilder::create()->build()->serialize($statuses, 'json', $context);
        return new JsonResponse($json, 200, [], true);
    }
}
