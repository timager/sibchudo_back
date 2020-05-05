<?php


namespace App\Controller;


use App\Entity\Owner;
use App\Entity\Title;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TitleController extends AbstractController {
    /**
     * @Route("/api/title/get")
     * @param Request $request
     * @return JsonResponse
     */
    public function getTitles(Request $request) {
        $statuses = $this->getDoctrine()->getRepository(Title::class)->findAll();
        $context = SerializationContext::create();
        $context->setSerializeNull(true);
        $context->enableMaxDepthChecks();
        $json = SerializerBuilder::create()->build()->serialize($statuses, 'json', $context);
        return new JsonResponse($json, 200, [], true);
    }
}
