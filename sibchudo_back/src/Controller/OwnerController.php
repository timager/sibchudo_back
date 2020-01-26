<?php

namespace App\Controller;

use App\Entity\Cat;
use App\Repository\CatRepository;
use App\Repository\LitterRepository;
use App\Repository\OwnerRepository;
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

class OwnerController extends AbstractController
{

    /**
     * @Route("/api/owner/get", name="api_owner_get")
     * @param RepositoryLoader $loader
     * @param Request $request
     * @return JsonResponse
     */
    public function getBy(RepositoryLoader $loader, Request $request) {
        $post = json_decode($request->getContent(), true);
        $criteria = $post['criteria'] ?? [];
        $limit = $post['limit'] ?? null;
        $offset = $post['offset'] ?? null;
        $cats = $loader->loadRepository(OwnerRepository::class)->getBy($criteria, $limit, $offset);
        $context = SerializationContext::create();
        $context->setSerializeNull(true);
        $context->enableMaxDepthChecks();
        $json = SerializerBuilder::create()->build()->serialize($cats, 'json', $context);
        return new JsonResponse($json, 200, [], true);
    }


}
