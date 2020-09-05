<?php

namespace App\Controller;

use App\Entity\Cat;
use App\Entity\CatStatus;
use App\Entity\Media;
use App\Service\AvatarLoader;
use DateTime;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CatController extends AbstractController {

    /**
     * @Route("/api/cat", methods={"GET"})
     * @param Request $request
     * @return JsonResponse
     */
    public function getBy(Request $request) {
        $post = json_decode($request->getContent(), true);
        $criteria = $post['criteria'] ?? [];
        $limit = $post['limit'] ?? null;
        $offset = $post['offset'] ?? null;
        $order = $post['order'] ?? null;
        $cats = $this->getDoctrine()->getRepository(Cat::class)->findBy($criteria, $order, $limit, $offset);
        $context = SerializationContext::create();
        $context->setSerializeNull(true);
        $context->enableMaxDepthChecks();
        $json = SerializerBuilder::create()->build()->serialize($cats, 'json', $context);
        return new JsonResponse($json, 200, [], true);
    }

    /**
     * @Route("/api/cat/genders", methods={"GET"})
     * @return JsonResponse
     */
    public function getGenders() {
        return new JsonResponse([
            ["value" => 'female', "name" => "Кошка"],
            ["value" => 'male', "name" => "Кот"],
        ]);
    }

    /**
     * @Route("/api/cat/statuses", methods={"GET"})
     * @return JsonResponse
     */
    public function getStatuses() {
        $statuses = $this->getDoctrine()->getRepository(CatStatus::class)->findAll();
        $context = SerializationContext::create();
        $context->setSerializeNull(true);
        $context->enableMaxDepthChecks();
        $json = SerializerBuilder::create()->build()->serialize($statuses, 'json', $context);
        return new JsonResponse($json, 200, [], true);
    }

    /**
     * @Route("/api/cat/count", methods={"GET"})
     * @param Request $request
     * @return JsonResponse
     */
    public function getCount(Request $request) {
        $post = json_decode($request->getContent(), true);
        $criteria = $post['criteria'] ?? [];
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
        $context = SerializationContext::create();
        $context->setSerializeNull(true);
        $context->enableMaxDepthChecks();
        $json = SerializerBuilder::create()->build()->serialize($cat, 'json', $context);
        return new JsonResponse($json, 200, [], true);
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
        return new JsonResponse();
    }

    /**
     * @Route("/api/cat/{id}/avatar", methods={"POST"})
     * @param Request $request
     * @param int $id
     * @param AvatarLoader $loader
     * @return Response
     * @throws \Exception
     */
    public function loadImage(Request $request, int $id, AvatarLoader $loader) {
        $files = $request->files->all();
        if(count($files) != 1) {
            return new Response("", 400);
        }
        $name = $loader->upload($files['avatar']);
        if($name != null) {
            /**
             * @var Cat $cat
             */
            $cat = $this->getDoctrine()->getRepository(Cat::class)->find($id);
            if($cat->getAvatar() !== null) {
                if(substr($cat->getAvatar()->getDestination(), 0, 1) === "/") {
                    $loader->delete($cat->getAvatar()->getDestination());
                }
                $this->getDoctrine()->getManager()->remove($cat->getAvatar());
                $cat->setAvatar(null);
            }
            $avatar = new Media();
            $avatar->setCat($cat);
            $avatar->setDestination($this->getParameter('avatar_web') . $name);
            $avatar->setUploadDate(new DateTime());
            $cat->setAvatar($avatar);
            $this->getDoctrine()->getManager()->persist($avatar);
            $this->getDoctrine()->getManager()->persist($cat);
            $this->getDoctrine()->getManager()->flush();
            return new Response('uploaded');
        }
        return new Response("Ошибка загрузки", 500);
    }

//    /**
//     * @Route("/api/cat/{id}/edit")
//     * @param Request $request
//     * @param Cat $cat
//     * @return Response
//     */
//    public function edit(Request $request, Cat $cat) {
//        $post = json_decode($request->getContent(), true);
//        $this->getDoctrine()->getManager()->persist($this->makeColor($cat->getColor(), $post['color']));
//        $this->getDoctrine()->getManager()->persist($this->makeCat($cat, $post));
//        return new JsonResponse();
//    }

//    /**
//     * @Route("/api/cat/create")
//     * @param Request $request
//     * @return Response
//     */
//    public function create(Request $request) {
//        $em = $this->getDoctrine()->getManager();
//        $post = json_decode($request->getContent(), true);
//        $color = $this->makeColor(new Color(), $post['color']);
//        $em->persist($color);
//        $cat = new Cat();
//        $cat->setColor($color);
//        $cat = $this->makeCat($cat, $post);
//        $em->persist($cat);
//        return new JsonResponse();
//    }

//    public function makeCat(Cat $cat, $post) {
//        if (isset($post['title'])) {
//            $title = $loader->loadRepository(TitleRepository::class)->getById($post['title']);
//            $cat->setTitle($title);
//        }
//        $cat->setName($post['name']);
//        if (isset($post['litter'])) {
//            $litter = $loader->loadRepository(LitterRepository::class)->getById($post['litter']);
//            $cat->setLitter($litter);
//        }
//        $cat->setStatus($post['status']);
//        if (isset($post['community'])) {
//            $community = $loader->loadRepository(CommunityRepository::class)->getById($post['community']);
//            $cat->setCommunity($community);
//        }
//        $cat->setGender($post['gender']);
//        if (isset($post['owner'])) {
//            $owner = $loader->loadRepository(OwnerRepository::class)->getById($post['owner']);
//            $cat->setOwner($owner);
//        }
//        if (isset($post['cat_class'])) {
//            $class = $loader->loadRepository(CatClassRepository::class)->getById($post['cat_class']);
//            $cat->setCatClass($class);
//        }
//        return $cat;
//    }
//
//    public function makeColor(Color $color, $data) {
//        if (isset($data['base_color'])) {
//            $entity = $loader->loadRepository(BaseColorRepository::class)->getById($data['base_color']);
//            $color->setBaseColor($entity);
//        }
//        if (isset($data['breed'])) {
//            $entity = $loader->loadRepository(BreedRepository::class)->getById($data['breed']);
//            $color->setBreed($entity);
//        }
//        if (isset($data['base_color_additional'])) {
//            $entity = $loader->loadRepository(BaseColorRepository::class)->getById($data['base_color_additional']);
//            $color->setBaseColorAdditional($entity);
//        }
//
//        if (isset($data['ears'])) {
//            $entity = $loader->loadRepository(ColorCodeRepository::class)->getById($data['ears']);
//            $color->setEars($entity);
//        }
//
//        if (isset($data['code0'])) {
//            $entity = $loader->loadRepository(ColorCodeRepository::class)->getById($data['code0']);
//            $color->setCode0($entity);
//        }
//
//        if (isset($data['code1'])) {
//            $entity = $loader->loadRepository(ColorCodeRepository::class)->getById($data['code1']);
//            $color->setCode1($entity);
//        }
//
//        if (isset($data['code2'])) {
//            $entity = $loader->loadRepository(ColorCodeRepository::class)->getById($data['code2']);
//            $color->setCode2($entity);
//        }
//
//        if (isset($data['code3'])) {
//            $entity = $loader->loadRepository(ColorCodeRepository::class)->getById($data['code3']);
//            $color->setCode3($entity);
//        }
//
//        if (isset($data['tail'])) {
//            $entity = $loader->loadRepository(ColorCodeRepository::class)->getById($data['tail']);
//            $color->setTail($entity);
//        }
//
//        if (isset($data['eyes'])) {
//            $entity = $loader->loadRepository(ColorCodeRepository::class)->getById($data['eyes']);
//            $color->setEyes($entity);
//        }
//
//        return $color;
//
//    }


}
