<?php


namespace App\Controller;


use App\Entity\Community;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CommunityController extends RestController
{

    /**
     * @Route("/api/community", methods={"GET"})
     * @return JsonResponse
     */
    public function getCommunity(): JsonResponse
    {
        $communities = $this->getDoctrine()->getRepository(Community::class)->findAll();
        return $this->makeJsonResponse($communities);
    }
}
