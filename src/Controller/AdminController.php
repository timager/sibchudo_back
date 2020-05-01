<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController {

//    /**
//     * @Route("/login", name="/login", methods={"POST"})
//     */
//    public function login(Request $request)
//    {
//        $user = $this->getUser();
//
//        return $this->json([
//            'username' => $user->getUsername(),
//            'roles' => $user->getRoles(),
//        ]);
//    }

//    /**
//     * @Route("/api/login/check", name="login")
//     * @param Request $request
//     * @return Response
//     */
//    public function login(Request $request) {
//        $post = json_decode($request->getContent(), true);
//        if($post['username'] == "timager")
//            return new Response("",200);
//        else{
//            return new Response("",401);
//        }
//    }
}
