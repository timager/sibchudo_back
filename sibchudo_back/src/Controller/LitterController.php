<?php

namespace App\Controller;

use App\Entity\Cat;
use App\Repository\CatRepository;
use App\Repository\LitterRepository;
use App\Service\RepositoryLoader;
use Exception;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Routing\Annotation\Route;
use TypeError;

class LitterController extends AbstractController {

    /**
     * @Route("/api/litter/get", name="api_litter_get")
     * @param RepositoryLoader $loader
     * @param Request $request
     * @return JsonResponse
     */
    public function getBy(RepositoryLoader $loader, Request $request) {
        $post = json_decode($request->getContent(), true);
        $criteria = $post['criteria'] ?? [];
        $limit = $post['limit'] ?? null;
        $offset = $post['offset'] ?? null;
        $order = $post['order'] ?? null;
        $cats = $loader->loadRepository(LitterRepository::class)->getBy($criteria, $limit, $offset,$order);
        $context = SerializationContext::create();
        $context->setSerializeNull(true);
        $context->enableMaxDepthChecks();
        $json = SerializerBuilder::create()->build()->serialize($cats, 'json', $context);
        return new JsonResponse($json, 200, [], true);
    }

    /**
     * @Route("/api/litter/count", name="api_litter_count")
     * @param RepositoryLoader $loader
     * @param Request $request
     * @return JsonResponse
     */
    public function count(RepositoryLoader $loader, Request $request) {
        $post = json_decode($request->getContent(), true);
        $criteria = $post['criteria'] ?? [];
        $limit = $post['limit'] ?? null;
        $offset = $post['offset'] ?? null;
        $litters = $loader->loadRepository(LitterRepository::class)->count($criteria, $limit, $offset);
        return new JsonResponse($litters);
    }

    /**
     * @Route("/api/litter/{id}/get", name="api_get_litter_by_id", requirements={"id"="\d+"})
     * @param $id
     * @param RepositoryLoader $loader
     * @return JsonResponse
     */
    public function getById($id, RepositoryLoader $loader) {
        $cat = $loader->loadRepository(LitterRepository::class)->getById($id);
        $context = SerializationContext::create();
        $context->setSerializeNull(true);
        $context->enableMaxDepthChecks();
        $json = SerializerBuilder::create()->build()->serialize($cat, 'json', $context);
        return new JsonResponse($json, 200, [], true);
    }
}
