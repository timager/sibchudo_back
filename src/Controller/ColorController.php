<?php


namespace App\Controller;

use App\Entity\BaseColor;
use App\Entity\Breed;
use App\Entity\ColorCode;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ColorController extends AbstractController {
    /**
     * @Route("/api/base_color", methods={"GET"})
     * @param Request $request
     * @return JsonResponse
     */
    public function getBaseColors(Request $request) {
        $statuses = $this->getDoctrine()->getRepository(BaseColor::class)->findAll();
        $context = SerializationContext::create();
        $context->setSerializeNull(true);
        $context->enableMaxDepthChecks();
        $json = SerializerBuilder::create()->build()->serialize($statuses, 'json', $context);
        return new JsonResponse($json, 200, [], true);
    }

    /**
     * @Route("/api/breed", methods={"GET"})
     * @param Request $request
     * @return JsonResponse
     */
    public function getBreeds(Request $request) {
        $statuses = $this->getDoctrine()->getRepository(Breed::class)->findAll();
        $context = SerializationContext::create();
        $context->setSerializeNull(true);
        $context->enableMaxDepthChecks();
        $json = SerializerBuilder::create()->build()->serialize($statuses, 'json', $context);
        return new JsonResponse($json, 200, [], true);
    }

    /**
     * @Route("/api/color_code", methods={"GET"})
     * @param Request $request
     * @return JsonResponse
     */
    public function getColorCodes(Request $request) {
        $statuses = $this->getDoctrine()->getRepository(ColorCode::class)->findAll();
        $context = SerializationContext::create();
        $context->setSerializeNull(true);
        $context->enableMaxDepthChecks();
        $json = SerializerBuilder::create()->build()->serialize($statuses, 'json', $context);
        return new JsonResponse($json, 200, [], true);
    }
}
