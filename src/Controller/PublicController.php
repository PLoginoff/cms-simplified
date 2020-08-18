<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\ArticleRepository;
use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\{Request, JsonResponse};
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\AbstractFOSRestController;

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
     * @param ParamFetcherInterface $fetcher
     *
     * @QueryParam(name="sort",        default="createdAt", description="createdAt|title")
     * @QueryParam(name="direction",   default="asc",       description="asc|desc")
     * @QueryParam(name="limit",       default="10",        description="limit", requirements="\d+")
     * @QueryParam(name="offset",      default="0",         description="offset", requirements="\d+")
     *
     * @param Request $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function list(Request $request, ParamFetcherInterface $fetcher): JsonResponse
    {
        $articles = $this->repository->getList(
            $fetcher->get('sort'),
            $fetcher->get('direction'),
            (int) $fetcher->get('limit'),
            (int) $fetcher->get('offset')
        );
        return $this->json($articles, 200);
    }
}
