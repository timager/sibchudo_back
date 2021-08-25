<?php

namespace App\Controller;

use App\Entity\Litter;
use App\Form\LitterType;
use App\Service\LitterService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class LitterController extends RestFormController
{

    /**
     * @Route("/api/litter", methods={"GET"})
     * @return JsonResponse
     */
    public function getBy(LitterService $service): JsonResponse
    {
        $data = $this->getRequestQueryParams();
        $filters = $data['filters'] ?? "[]";
        $filters = json_decode($filters, true);
        $search = $data['search'] ?? "[]";
        $search = json_decode($search, true);
        $sort = $data['sort'] ?? "[]";
        $sort = json_decode($sort, true);
        $limit = $data['limit'] ?? PHP_INT_MAX;
        $offset = $data['offset'] ?? 0;
        $litters = $service->getLitters($service->buildBaseQuery($filters), $limit, $offset, $search, $sort);
        return $this->makeJsonResponse($litters);
    }

    /**
     * @Route("/api/litter/count", methods={"GET"})
     * @return JsonResponse
     */
    public function count(LitterService $service): JsonResponse
    {
        $data = $this->getRequestQueryParams();
        $filters = $data['filters'] ?? "[]";
        $filters = json_decode($filters, true);
        $search = $data['search'] ?? "[]";
        $search = json_decode($search, true);
        $count = $service->getCount($service->buildBaseQuery($filters), $search);
        return new JsonResponse($count);
    }

    /**
     * @Route("/api/litter/{id}", requirements={"id"="\d+"}, methods={"GET"})
     * @param int $id
     * @return JsonResponse
     */
    public function getById(int $id): JsonResponse
    {
        $litter = $this->getDoctrine()->getRepository(Litter::class)->find($id);
        return $this->makeJsonResponse($litter);
    }

    /**
     * @Route("/api/litter", methods={"POST"})
     * @return JsonResponse
     */
    public function create(): JsonResponse
    {
        $em = $this->getDoctrine()->getManager();
        $litter = new Litter();
        $this->useForm(LitterType::class, $litter);
        $em->persist($litter);
        $em->flush();
        return $this->makeJsonResponse($litter);
    }

    /**
     * @Route("/api/litter/{id}", methods={"PUT"})
     * @param Litter $litter
     *
     * @return JsonResponse
     */
    public function edit(Litter $litter): JsonResponse
    {
        $em = $this->getDoctrine()->getManager();
        $this->useForm(LitterType::class, $litter);
        $em->persist($litter);
        $em->flush();
        return $this->makeJsonResponse($litter);
    }

    /**
     * @Route("/api/litter/{id}", methods={"DELETE"})
     * @param Litter $litter
     *
     * @return JsonResponse
     */
    public function delete(Litter $litter): JsonResponse
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($litter);
        $em->flush();
        return $this->makeJsonResponse($litter);
    }
}
