<?php

namespace App\Controller;

use App\Entity\Litter;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LitterController extends AbstractController {

    /**
     * @Route("/api/litter", methods={"GET"})
     * @param Request $request
     * @return JsonResponse
     */
    public function getBy(Request $request) {
        $post = json_decode($request->getContent(), true);
        $criteria = $post['criteria'] ?? [];
        $limit = $post['limit'] ?? null;
        $offset = $post['offset'] ?? null;
        $order = $post['order'] ?? null;
        $litters = $this->getDoctrine()->getRepository(Litter::class)->findBy($criteria, $order, $limit, $offset);
        $context = SerializationContext::create();
        $context->setSerializeNull(true);
        $context->enableMaxDepthChecks();
        $json = SerializerBuilder::create()->build()->serialize($litters, 'json', $context);
        return new JsonResponse($json, 200, [], true);
    }

    /**
     * @Route("/api/litter/count", methods={"GET"})
     * @param Request $request
     * @return JsonResponse
     */
    public function count(Request $request) {
        $post = json_decode($request->getContent(), true);
        $criteria = $post['criteria'] ?? [];
        $litters = $this->getDoctrine()->getRepository(Litter::class)->count($criteria);
        return new JsonResponse($litters);
    }

    /**
     * @Route("/api/litter/{id}", requirements={"id"="\d+"}, methods={"GET"})
     * @param int $id
     * @return JsonResponse
     */
    public function getById(int $id) {
        $litter = $this->getDoctrine()->getRepository(Litter::class)->find($id);
        $context = SerializationContext::create();
        $context->setSerializeNull(true);
        $context->enableMaxDepthChecks();
        $json = SerializerBuilder::create()->build()->serialize($litter, 'json', $context);
        return new JsonResponse($json, 200, [], true);
    }
}
