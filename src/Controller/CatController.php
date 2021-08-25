<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Cat;
use App\Entity\CatStatus;
use App\Entity\Media;
use App\Form\CatType;
use App\Service\CatService;
use App\Service\MediaLoader;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CatController extends RestFormController
{

    /**
     * @Route("/api/cat", methods={"GET"})
     * @return JsonResponse
     */
    public function getBy(CatService $service): JsonResponse
    {
        $data = $this->getRequestQueryParams();
        $filters = $data['filters'] ?? "[]";
        $filters = json_decode($filters, true);
        $search = $data['search'] ?? "[]";
        $search = json_decode($search, true);
        $sort = $data['sort'] ?? "[]";
        $sort = json_decode($sort, true);
        $limit = $data['limit'] ?? 10;
        $offset = $data['offset'] ?? 0;
        $cats = $service->getCats($service->buildBaseQuery($filters), $limit, $offset, $search, $sort);
        return $this->makeJsonResponse($cats);
    }

    /**
     * @Route("/api/gender", methods={"GET"})
     * @return JsonResponse
     */
    public function getGenders(): JsonResponse
    {
        $data = [
            ["value" => 'female', "name" => "Кошка"],
            ["value" => 'male', "name" => "Кот"],
        ];
        return new JsonResponse($data);
    }

    /**
     * @Route("/api/status", methods={"GET"})
     * @return JsonResponse
     */
    public function getStatuses(): JsonResponse
    {
        $statuses = $this->getDoctrine()->getRepository(CatStatus::class)->findAll();
        return $this->makeJsonResponse($statuses);
    }

    /**
     * @Route("/api/cat/count", methods={"GET"})
     * @param CatService $service
     * @return JsonResponse
     */
    public function getCount(CatService $service): JsonResponse
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
     * @Route("/api/cat/{id}", requirements={"id"="\d+"}, methods={"GET"})
     * @param int $id
     * @return JsonResponse
     */
    public function getById(int $id): JsonResponse
    {
        $cat = $this->getDoctrine()->getRepository(Cat::class)->find($id);
        return $this->makeJsonResponse($cat);
    }

    /**
     * @Route("/api/cat/{id}", methods={"DELETE"})
     * @IsGranted(User::ROLE_ADMIN)
     * @param int $id
     * @return JsonResponse
     */
    public function deleteById(int $id): JsonResponse
    {
        $cat = $this->getDoctrine()->getRepository(Cat::class)->find($id);
        $this->getDoctrine()->getManager()->remove($cat);
        $this->getDoctrine()->getManager()->flush();
        return $this->makeJsonResponse($cat);
    }

    /**
     * @Route("/api/cat/{id}/media", methods={"POST"})
     * @IsGranted(User::ROLE_ADMIN)
     * @param Request $request
     * @param Cat $cat
     * @param MediaLoader $loader
     *
     * @return Response
     */
    public function loadImage(Request $request, Cat $cat, MediaLoader $loader): Response
    {
        $files = $request->files->all();
        $medias = $loader->uploadArray($files);
        foreach ($medias as $media) {
            if ($media !== null) {
                $cat->addMedia($media);
                $this->getManager()->persist($media);
            }
        }
        $this->getManager()->flush();
        return $this->makeJsonResponse($medias);
    }

    /**
     * @Route("/api/cat/{id}/media/{id2}", methods={"PATCH"})
     * @IsGranted(User::ROLE_ADMIN)
     * @ParamConverter("cat", options={"id"="id"})
     * @ParamConverter("media", options={"id"="id2"})
     * @param Cat $cat
     * @param Media $media
     * @return Response
     */
    public function setAvatar(Cat $cat, Media $media): Response
    {
        $cat->setAvatar($media);
        $this->getManager()->flush();
        return $this->makeJsonResponse($cat);
    }


    /**
     * @Route("/api/cat", methods={"POST"})
     * @IsGranted(User::ROLE_ADMIN)
     * @return Response
     */
    public function create(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $cat = new Cat();
        $this->useForm(CatType::class, $cat);
        $em->persist($cat);
        $em->flush();
        return $this->makeJsonResponse($cat);
    }

    /**
     * @Route("/api/cat/{id}", methods={"PUT"})
     * @IsGranted(User::ROLE_ADMIN)
     * @param Cat $cat
     *
     * @return Response
     */
    public function edit(Cat $cat): Response
    {
        $em = $this->getDoctrine()->getManager();
        $this->useForm(CatType::class, $cat);
        $em->persist($cat);
        $em->flush();
        return $this->makeJsonResponse($cat);
    }

}
