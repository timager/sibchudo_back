<?php

namespace App\Controller;

use App\Entity\Cat;
use App\Entity\Litter;
use App\Form\CatType;
use App\Form\LitterType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LitterController extends RestFormController {

    /**
     * @Route("/api/litter", methods={"GET"})
     * @param Request $request
     * @return JsonResponse
     */
    public function getBy(Request $request) {
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
     * @param Request $request
     * @return JsonResponse
     */
    public function count(Request $request) {
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
    public function getById(int $id) {
        $litter = $this->getDoctrine()->getRepository(Litter::class)->find($id);
        return $this->makeJsonResponse($litter);
    }

    /**
     * @Route("/api/litter", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function create(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $litter = new Litter();
        $this->useForm(LitterType::class, $litter);
        $em->persist($litter);
        $em->flush();
        return $this->makeJsonResponse($litter);
    }

    /**
     * @Route("/api/litter/{id}", methods={"PUT"})
     * @param  Request  $request
     * @param  Litter   $litter
     *
     * @return Response
     */
    public function edit(Request $request, Litter $litter) {
        $em = $this->getDoctrine()->getManager();
        $this->useForm(LitterType::class, $litter);
        $em->persist($litter);
        $em->flush();
        return $this->makeJsonResponse($litter);
    }
}
