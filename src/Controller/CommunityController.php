<?php


namespace App\Controller;


use App\Entity\Community;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CommunityController extends RestController {

    /**
     * @Route("/api/community", methods={"GET"})
     * @param Request $request
     * @return JsonResponse
     */
    public function getCommunity(Request $request) {
        $communities = $this->getDoctrine()->getRepository(Community::class)->findAll();
        return $this->makeJsonResponse($communities);
    }
}
