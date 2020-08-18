<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Service\ArticleService;
use FOS\RestBundle\Request\ParamFetcherInterface;
use Swagger\Annotations as SWG;
use FOS\RestBundle\Controller\Annotations\RequestParam;
use Symfony\Component\HttpFoundation\{Request, JsonResponse};
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\AbstractFOSRestController;

class CrudController extends AbstractFOSRestController
{
    private $repository;

    private $service;

    public function __construct(ArticleRepository $repository, ArticleService $service)
    {
        $this->repository = $repository;
        $this->service    = $service;
    }

    /**
     * Create
     *
     * @Route("api/article/create", name="article_create", methods={"POST"})
     * @SWG\Post(tags={"public"})
     * @SWG\Response(response=200, description="create", examples={{}})
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request)
    {
        // dd($request->request); todo doesn't work :-(
        $params = json_decode($request->getContent(), true);

        $article = $this->service->create(
            $params['title'],
            $params['body']
        );

        return $this->json($article, 200);
    }

    /**
     * Update
     *
     * @Route("api/article/update/{id}", name="article_update", methods={"POST"})
     * @SWG\Post(tags={"public"})
     * @SWG\Response(response=200, description="update")
     *
     * @param string $id
     * @param Request $request
     * @return JsonResponse
     */
    public function update(string $id, Request $request): JsonResponse
    {
        // dd($request->request); todo doesn't work :-(
        $params = json_decode($request->getContent(), true);
        $article = $this->service->update($this->repository->find($id), $params['title'], $params['body']);
        return $this->json($article, 200);
    }

    /**
     * Delete
     *
     * @Route("api/article/delete/{id}", name="article_delete", methods={"POST"})
     * @SWG\Post(tags={"public"})
     * @SWG\Response(response=200, description="delete")
     *
     * @param Request $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function delete(string $id, Request $request): JsonResponse
    {
        // dd($request->request); todo doesn't work :-(
        $params = json_decode($request->getContent(), true);
        $article = $this->service->delete($this->repository->find($id));
        return $this->json($article, 200);
    }
}
