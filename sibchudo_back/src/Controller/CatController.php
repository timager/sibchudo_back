<?php

namespace App\Controller;

use App\Entity\Cat;
use App\Repository\CatRepository;
use App\Service\RepositoryLoader;
use Exception;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Routing\Annotation\Route;
use TypeError;

class CatController extends AbstractController
{
    /**
     * @Route("/cat", name="cat")
     */
    public function index()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/CatController.php',
        ]);
    }

    /**
     * @Route("/api/cat/{id}/get",name="api_get_cat_by_id")
     * @param $id
     * @param RepositoryLoader $loader
     * @return JsonResponse
     */
    public function getById($id, RepositoryLoader $loader)
    {
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
    public function deleteById($id, RepositoryLoader $loader)
    {
        $cat = $loader->loadRepository(CatRepository::class)->getById($id);
        try {
            $res = $loader->loadRepository(CatRepository::class)->delete($cat);
            return new JsonResponse($res);
        } catch (TypeError $e) {
            return new JsonResponse($e->getMessage(), 404);
        }
    }

    /**
     * @Route("/api/cat/test/update")
     * @param RepositoryLoader $loader
     * @return JsonResponse
     */
    public function testUpdate(RepositoryLoader $loader)
    {
        /**
         * @var Cat[] $cats
         */
        $repository = $loader->loadRepository(CatRepository::class);
        $cats = $repository->getAll();
        $cat = array_pop($cats);
        dump($cat);
        if ($cat->getStatus() == Cat::RESERVED) {
            $cat->setStatus(Cat::SALE);
        } else {
            $cat->setStatus(Cat::RESERVED);

        }
        dump($cat);
        $res = $repository->update($cat);
        return new JsonResponse($res);
    }

    /**
     * @Route("/api/cat/test/insert")
     * @param RepositoryLoader $loader
     * @return Response
     */
    public function testInsert(RepositoryLoader $loader)
    {
        $cat = new Cat();
        $cat->setColorId(1);
        $cat->setCommunityId(1);
        $cat->setLitterId(1);
        $cat->setName('Дегробайт');
        $cat->setGender(Cat::MALE);
        $cat->setStatus(Cat::SALE);
        $result = $loader->loadRepository(CatRepository::class)->insert($cat);
        dump($cat);
        return new Response($result);
    }


}
