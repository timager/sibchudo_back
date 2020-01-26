<?php

namespace App\Controller;

use App\Entity\Cat;
use App\Entity\Color;
use App\Entity\Media;
use App\Repository\BaseColorRepository;
use App\Repository\BreedRepository;
use App\Repository\CatClassRepository;
use App\Repository\CatRepository;
use App\Repository\ColorCodeRepository;
use App\Repository\ColorRepository;
use App\Repository\CommunityRepository;
use App\Repository\LitterRepository;
use App\Repository\MediaRepository;
use App\Repository\OwnerRepository;
use App\Repository\TitleRepository;
use App\Service\AvatarLoader;
use App\Service\RepositoryLoader;
use DateTime;
use Exception;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use TypeError;

class CatController extends AbstractController {
    /**
     * @Route("/cat", name="cat")
     */
    public function index() {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/CatController.php',
        ]);
    }

    /**
     * @Route("/api/cat/get", name="api_cat_get")
     * @param RepositoryLoader $loader
     * @param Request $request
     * @return JsonResponse
     */
    public function getBy(RepositoryLoader $loader, Request $request) {
        $post = json_decode($request->getContent(), true);
        $criteria = $post['criteria'] ?? [];
        $limit = $post['limit'] ?? 100;
        $offset = $post['offset'] ?? null;
        $order = $post['order'] ?? null;
        $cats = $loader->loadRepository(CatRepository::class)->getBy($criteria, $limit, $offset,$order);
        $context = SerializationContext::create();
        $context->setSerializeNull(true);
        $context->enableMaxDepthChecks();
        $json = SerializerBuilder::create()->build()->serialize($cats, 'json', $context);
        return new JsonResponse($json, 200, [], true);
    }

    /**
     * @Route("/api/cat/genders/get", name="api_cat_genders_get")
     * @param Request $request
     * @return JsonResponse
     */
    public function getGenders(Request $request) {
        return new JsonResponse(Cat::GET_GENDERS());
    }

    /**
     * @Route("/api/cat/statuses/get", name="api_cat_statuses_get")
     * @param Request $request
     * @return JsonResponse
     */
    public function getStatuses(Request $request) {
        return new JsonResponse(Cat::GET_STATUSES());
    }

    /**
     * @Route("/api/cat/count", name="api_cat_count")
     * @param RepositoryLoader $loader
     * @param Request $request
     * @return JsonResponse
     */
    public function getCount(RepositoryLoader $loader, Request $request) {
        $post = json_decode($request->getContent(), true);
        $criteria = $post['criteria'] ?? [];
        $limit = $post['limit'] ?? null;
        $offset = $post['offset'] ?? null;
        $cats = $loader->loadRepository(CatRepository::class)->count($criteria, $limit, $offset);
        return new JsonResponse($cats);
    }

    /**
     * @Route("/api/cat/{id}/get", name="api_get_cat_by_id", requirements={"id"="\d+"})
     * @param $id
     * @param RepositoryLoader $loader
     * @return JsonResponse
     */
    public function getById($id, RepositoryLoader $loader) {
        $cat = $loader->loadRepository(CatRepository::class)->getById($id);
        $context = SerializationContext::create();
        $context->setSerializeNull(true);
        $context->enableMaxDepthChecks();
        $json = SerializerBuilder::create()->build()->serialize($cat, 'json', $context);
        return new JsonResponse($json, 200, [], true);
    }

    /**
     * @Route("/api/cat/{id}/delete",name="api_delete_cat_by_id")
     * @param $id
     * @param RepositoryLoader $loader
     * @return JsonResponse
     * @throws Exception
     */
    public function deleteById($id, RepositoryLoader $loader) {
        $cat = $loader->loadRepository(CatRepository::class)->getById($id);
        try {
            $res = $loader->loadRepository(CatRepository::class)->delete($cat);
            return new JsonResponse($res);
        } catch (TypeError $e) {
            return new JsonResponse($e->getMessage(), 404);
        }
    }

    /**
     * @Route("/api/cat/{id}/avatar", name="cat_load_avatar")
     * @param Request $request
     * @param int $id
     * @param AvatarLoader $loader
     * @param RepositoryLoader $repositoryLoader
     * @return Response
     * @throws Exception
     */
    public function loadImage(Request $request, int $id, AvatarLoader $loader, RepositoryLoader $repositoryLoader)
    {
        $files = $request->files->all();
        if (count($files) != 1) {
            return new Response("", 400);
        }
        $name = $loader->upload($files['avatar']);
        $cat = $repositoryLoader->loadRepository(CatRepository::class)->getById($id);
        if ($name != null) {
            if($cat->getAvatar() !== null){
                if(substr($cat->getAvatar()->getDestination(), 0, 1) === "/")
                    $loader->delete($cat->getAvatar()->getDestination());
                $repositoryLoader->loadRepository(MediaRepository::class)->delete($cat->getAvatar());
                $cat->setAvatar(null);
            }
            $avatar = new Media();
            $avatar->setCat($cat);
            $avatar->setDestination($this->getParameter('avatar_web') . $name);
            $avatar->setUploadDate(new DateTime());
            $repositoryLoader->loadRepository(MediaRepository::class)->insert($avatar);
            $cat->setAvatar($avatar);
            $repositoryLoader->loadRepository(CatRepository::class)->update($cat);
            return new Response('uploaded');
        }
        return new Response("Ошибка загрузки", 500);
    }

    /**
     * @Route("/api/cat/{id}/edit")
     * @param Request $request
     * @param int $id
     * @param RepositoryLoader $loader
     * @return Response
     */
    public function edit(Request $request, int $id, RepositoryLoader $loader) {
        $post = json_decode($request->getContent(), true);
        $cat = $loader->loadRepository(CatRepository::class)->getById($id);
        $color = $this->setColor($cat->getColor(), $post['color'],  $loader);
        $loader->loadRepository(ColorRepository::class)->update($color);
        $cat = $this->setCat($cat, $post, $loader);
        $result = $loader->loadRepository(CatRepository::class)->update($cat);
        return new Response($result);
    }

    /**
     * @Route("/api/cat/create")
     * @param Request $request
     * @param RepositoryLoader $loader
     * @return Response
     */
    public function create(Request $request, RepositoryLoader $loader) {
        $post = json_decode($request->getContent(), true);
        $color = $this->setColor(new Color(), $post['color'],  $loader);
        $loader->loadRepository(ColorRepository::class)->insert($color);
        $cat = new Cat();
        $cat->setColor($color);
        $cat = $this->setCat($cat, $post, $loader);
        $result = $loader->loadRepository(CatRepository::class)->insert($cat);
        return new Response($result);
    }

    public function setCat(Cat $cat, $post, RepositoryLoader $loader){
        if(isset($post['title'])){
            $title = $loader->loadRepository(TitleRepository::class)->getById($post['title']);
            $cat->setTitle($title);
        }
        $cat->setName($post['name']);
        if(isset($post['litter'])){
            $litter = $loader->loadRepository(LitterRepository::class)->getById($post['litter']);
            $cat->setLitter($litter);
        }
        $cat->setStatus($post['status']);
        if(isset($post['community'])){
            $community = $loader->loadRepository(CommunityRepository::class)->getById($post['community']);
            $cat->setCommunity($community);
        }
        $cat->setGender($post['gender']);
        if(isset($post['owner'])){
            $owner = $loader->loadRepository(OwnerRepository::class)->getById($post['owner']);
            $cat->setOwner($owner);
        }
        if(isset($post['cat_class'])){
            $class = $loader->loadRepository(CatClassRepository::class)->getById($post['cat_class']);
            $cat->setCatClass($class);
        }
        return $cat;
    }

    public function setColor(Color $color, $data, RepositoryLoader $loader){
        if(isset($data['base_color'])){
            $entity = $loader->loadRepository(BaseColorRepository::class)->getById($data['base_color']);
            $color->setBaseColor($entity);
        }
        if(isset($data['breed'])){
            $entity = $loader->loadRepository(BreedRepository::class)->getById($data['breed']);
            $color->setBreed($entity);
        }
        if(isset($data['base_color_additional'])){
            $entity = $loader->loadRepository(BaseColorRepository::class)->getById($data['base_color_additional']);
            $color->setBaseColorAdditional($entity);
        }

        if(isset($data['ears'])){
            $entity = $loader->loadRepository(ColorCodeRepository::class)->getById($data['ears']);
            $color->setEars($entity);
        }

        if(isset($data['code0'])){
            $entity = $loader->loadRepository(ColorCodeRepository::class)->getById($data['code0']);
            $color->setCode0($entity);
        }

        if(isset($data['code1'])){
            $entity = $loader->loadRepository(ColorCodeRepository::class)->getById($data['code1']);
            $color->setCode1($entity);
        }

        if(isset($data['code2'])){
            $entity = $loader->loadRepository(ColorCodeRepository::class)->getById($data['code2']);
            $color->setCode2($entity);
        }

        if(isset($data['code3'])){
            $entity = $loader->loadRepository(ColorCodeRepository::class)->getById($data['code3']);
            $color->setCode3($entity);
        }

        if(isset($data['tail'])){
            $entity = $loader->loadRepository(ColorCodeRepository::class)->getById($data['tail']);
            $color->setTail($entity);
        }

        if(isset($data['eyes'])){
            $entity = $loader->loadRepository(ColorCodeRepository::class)->getById($data['eyes']);
            $color->setEyes($entity);
        }

        return $color;

    }


}
