<?php

namespace App\Controller;

use App\Entity\TestEntity;
use App\Repository\TestRepository;
use App\Service\RepositoryLoader;
use App\Service\TableEditor;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Annotation\TestAnnotation;

class KolebnController extends AbstractController
{


    /**
     * @Route("/api/kolebn", name="kolebn")
     * @TestAnnotation(tima="pidor")
     * @return JsonResponse
     */
    public function index(TableEditor $editor)
    {
        $editor->updateTable(TestEntity::class);
//        $repos = $loader->loadRepository(TestRepository::class);
//        dump($repos->getAll());
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/TestController.php'
        ]);
    }
}
