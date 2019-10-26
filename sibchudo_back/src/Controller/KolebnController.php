<?php

namespace App\Controller;

use App\Repository\TestRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class KolebnController extends AbstractController
{
    /**
     * @Route("/api/kolebn", name="kolebn")
     */
    public function index()
    {
        $repos = new TestRepository();
        dump($repos->getAll());
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/TestController.php'
        ]);
    }
}
