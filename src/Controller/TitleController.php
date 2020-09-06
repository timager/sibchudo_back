<?php


namespace App\Controller;

use App\Entity\Title;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TitleController extends RestController {
    /**
     * @Route("/api/title", methods={"GET"})
     * @param Request $request
     * @return JsonResponse
     */
    public function getTitles(Request $request) {
        $titles = $this->getDoctrine()->getRepository(Title::class)->findAll();
        return $this->makeJsonResponse($titles);
    }
}
