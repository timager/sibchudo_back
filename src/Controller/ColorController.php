<?php


namespace App\Controller;

use App\Entity\BaseColor;
use App\Entity\Breed;
use App\Entity\ColorCode;
use Doctrine\Common\Collections\Criteria;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ColorController extends RestController
{
    /**
     * @Route("/api/base_color", methods={"GET"})
     * @return JsonResponse
     */
    public function getBaseColors(): JsonResponse
    {
        $baseColors = $this->getDoctrine()->getRepository(BaseColor::class)->findAll();
        return $this->makeJsonResponse($baseColors);
    }

    /**
     * @Route("/api/breed", methods={"GET"})
     * @return JsonResponse
     */
    public function getBreeds(): JsonResponse
    {
        $breeds = $this->getDoctrine()->getRepository(Breed::class)->findAll();
        return $this->makeJsonResponse($breeds);
    }

    /**
     * @Route("/api/color_code", methods={"GET"})
     * @return JsonResponse
     */
    public function getColorCodes(): JsonResponse
    {
        $data = $this->getRequestQueryParams();
        $custom = $data['custom'] ?? "[]";
        $custom = json_decode($custom, true);
        $firstNumber = $custom["firstNumber"] ?? null;
        $criteria = Criteria::create();
        if (!is_null($firstNumber)) {
            $criteria->andWhere(Criteria::expr()->startsWith('code', $firstNumber));
        }
        $statuses = $this->getDoctrine()->getRepository(ColorCode::class)->matching($criteria)->toArray();
        return $this->makeJsonResponse($statuses);
    }
}
