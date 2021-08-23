<?php

namespace App\Controller;

use App\Entity\Litter;
use App\Form\LitterType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class LitterController extends RestFormController
{

    /**
     * @Route("/api/litter", methods={"GET"})
     * @return JsonResponse
     */
    public function getBy(): JsonResponse
    {
        $data = $this->getRequestQueryParams();
        $criteria = $data['criteria'] ?? "[]";
        $criteria = json_decode($criteria, true);
        $limit = $data['limit'] ?? null;
        $offset = $data['offset'] ?? null;
        $order = $data['order'] ?? "[]";
        $order = json_decode($order, true);
        $litters = $this->getDoctrine()->getRepository(Litter::class)->findBy($criteria, $order, $limit, $offset);
        return $this->makeJsonResponse($litters);
    }

    /**
     * @Route("/api/litter/count", methods={"GET"})
     * @return JsonResponse
     */
    public function count(): JsonResponse
    {
        $data = $this->getRequestQueryParams();
        $criteria = $data['criteria'] ?? "[]";
        $criteria = json_decode($criteria, true);
        $litters = $this->getDoctrine()->getRepository(Litter::class)->count($criteria);
        return new JsonResponse($litters);
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
