<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\ArticleRepository;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\{Request, JsonResponse};
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class CrudController extends AbstractFOSRestController
{
    private $repository;

    public function __construct(ArticleRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get list
     *
     * @Route("api/article/create", name="article_create", methods={"POST"})
     *
     * @SWG\Get(tags={"public"})
     * @SWG\Response(response=200, description="")
     *
     * @param Request $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function create(Request $request): JsonResponse
    {
        return $this->json([]);
    }

    /**
     * Update entity
     *
     * @Route("api/article/update", name="article_update", methods={"POST"})
     *
     * @SWG\Get(tags={"public"})
     * @SWG\Response(response=200, description="")
     *
     * @param Request $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function update(Request $request): JsonResponse
    {
        return $this->json([]);
    }

    /**
     * Get list
     *
     * @Route("api/article/delete", name="article_delete", methods={"POST"})
     *
     * @SWG\Get(tags={"public"})
     * @SWG\Response(response=200, description="")
     *
     * @param Request $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function delete(Request $request): JsonResponse
    {
        return $this->json([]);
    }
}
