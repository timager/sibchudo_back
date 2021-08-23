<?php


namespace App\Controller;


use App\Service\Serializer;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

abstract class RestController extends AbstractController
{
    protected Serializer $serializer;
    protected ?Request $request;

    public function __construct(Serializer $serializer, RequestStack $request)
    {
        $this->serializer = $serializer;
        $this->request = $request->getCurrentRequest();
    }

    protected function makeJsonResponse($data, int $status = 200, array $headers = []): JsonResponse
    {
        return new JsonResponse($this->serializer->serialize($data), $status, $headers, true);
    }

    protected function getRequestJSON(): ?array
    {
        return json_decode($this->request->getContent(), true);
    }

    protected function getRequestQueryParams(): ?array
    {
        return $this->request->query->all();
    }

    protected function getRequestFiles(): ?array
    {
        return $this->request->files->all();
    }

    protected function find($type, $id)
    {
        if (is_null($id)) {
            return null;
        }
        return $this->getManager()->find($type, $id);
    }


    protected function getManager(): ObjectManager
    {
        return $this->getDoctrine()->getManager();
    }
}