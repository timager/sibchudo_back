<?php


namespace App\Controller;


use App\Entity\Media;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MediaController extends RestController
{
    /**
     * @Route("/api/media/{id}", methods={"DELETE"})
     * @param  Media    $media
     * @return Response
     */
    public function delete(Media $media) {
        $this->getManager()->remove($media);
        $this->getManager()->flush();
        return $this->makeJsonResponse($media);
    }
}