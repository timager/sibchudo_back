<?php


namespace App\Controller;


use App\Entity\User;
use LogicException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class SessionController extends RestController
{

    /**
     * @Route("/api/session", name="session_create", methods={"POST"})
     * @IsGranted(User::ROLE_USER)
     */
    public function createSession(): void
    {
        throw new LogicException();
    }

    /**
     * @Route("/api/session", methods={"GET"})
     * @IsGranted(User::ROLE_USER)
     * @return JsonResponse
     */
    public function getSession(): JsonResponse
    {
        return $this->makeJsonResponse($this->getUser());
    }

}