<?php

namespace App\Controller;

use App\Entity\Cat;
use App\Entity\User;
use App\Entity\CatStatus;
use App\Entity\Media;
use App\Form\CatType;
use App\Service\MediaLoader;
use DateTime;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CatController extends RestFormController {

    /**
     * @Route("/api/cat", methods={"GET"})
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
        $cats = $this->getDoctrine()->getRepository(Cat::class)->findBy($criteria, $order, $limit, $offset);
        return $this->makeJsonResponse($cats);
    }

    /**
     * @Route("/api/gender", methods={"GET"})
     * @return JsonResponse
     */
    public function getGenders() {
        return new JsonResponse([
            ["value" => 'female', "name" => "Кошка"],
            ["value" => 'male', "name" => "Кот"],
        ]);
    }

    /**
     * @Route("/api/status", methods={"GET"})
     * @return JsonResponse
     */
    public function getStatuses() {
        $statuses = $this->getDoctrine()->getRepository(CatStatus::class)->findAll();
        return $this->makeJsonResponse($statuses);
    }

    /**
     * @Route("/api/cat/count", methods={"GET"})
     * @param Request $request
     * @return JsonResponse
     */
    public function getCount(Request $request) {
        $data = $this->getRequestQueryParams();
        $criteria = $data['criteria'] ?? "[]";
        $criteria = json_decode($criteria);
        $cats = $this->getDoctrine()->getRepository(Cat::class)->findBy($criteria);
        return new JsonResponse(count($cats));
    }

    /**
     * @Route("/api/cat/{id}", requirements={"id"="\d+"}, methods={"GET"})
     * @param int $id
     * @return JsonResponse
     */
    public function getById(int $id) {
        $cat = $this->getDoctrine()->getRepository(Cat::class)->find($id);
        return $this->makeJsonResponse($cat);
    }

    /**
     * @Route("/api/cat/{id}", methods={"DELETE"})
     * @param int $id
     * @return JsonResponse
     */
    public function deleteById(int $id) {
        $cat = $this->getDoctrine()->getRepository(Cat::class)->find($id);
        $this->getDoctrine()->getManager()->remove($cat);
        $this->getDoctrine()->getManager()->flush();
        return $this->makeJsonResponse($cat);
    }

    /**
     * @Route("/api/cat/{id}/media", methods={"POST"})
     * @param  Request      $request
     * @param  Cat          $cat
     * @param  MediaLoader  $loader
     *
     * @return Response
     */
    public function loadImage(Request $request, Cat $cat, MediaLoader $loader) {
        $files = $request->files->all();
        $medias = $loader->uploadArray($files);
        foreach ($medias as $media){
            if($media !== null){
                $cat->addMedia($media);
                $this->getManager()->persist($media);
            }
        }
        $this->getManager()->flush();
        return $this->makeJsonResponse($medias);
    }

    /**
     * @Route("/api/cat/{id}/media/{id2}", methods={"PATCH"})
     * @ParamConverter("cat", options={"id"="id"})
     * @ParamConverter("media", options={"id"="id2"})
     * @param  Cat      $cat
     * @param  Media    $media
     * @return Response
     */
    public function setAvatar(Cat $cat, Media $media) {
        $cat->setAvatar($media);
        $this->getManager()->flush();
        return $this->makeJsonResponse($cat);
    }


    /**
     * @Route("/api/cat", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function create(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $cat = new Cat();
        $this->useForm(CatType::class, $cat);
        $em->persist($cat);
        $em->flush();
        return $this->makeJsonResponse($cat);
    }

    /**
     * @Route("/api/cat/{id}", methods={"PUT"})
     * @param  Request  $request
     * @param  Cat      $cat
     *
     * @return Response
     */
    public function edit(Request $request, Cat $cat) {
        $em = $this->getDoctrine()->getManager();
        $this->useForm(CatType::class, $cat);
        $em->persist($cat);
        $em->flush();
        return $this->makeJsonResponse($cat);
    }

}
