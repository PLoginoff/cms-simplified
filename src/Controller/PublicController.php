<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\ArticleRepository;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\{Request, JsonResponse};
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class PublicController extends AbstractFOSRestController
{
    private $repository;

    public function __construct(ArticleRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get list
     *
     * @Route("api/article/list", name="article_list", methods={"GET"})
     *
     * @SWG\Get(tags={"public"})
     * @SWG\Response(response=200, description="")
     *
     * @param Request $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function list(Request $request): JsonResponse
    {
        return $this->json([]);
    }




}
