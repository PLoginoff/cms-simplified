<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Service\ArticleService;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\{Request, JsonResponse};
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations\View;

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
     * @SWG\Post(tags={"CRUD"})
     * @SWG\Response(response=200, description="create", examples={{}})
     *
     * @SWG\Parameter(
     *      name="body",
     *      in="body",
     *      description="JSON Payload",
     *      required=true,
     *      format="application/json",
     *      @SWG\Schema(
     *          type="object",
     *          @SWG\Property(property="title", type="string", example="title"),
     *          @SWG\Property(property="body", type="string", example="body")
     *          )
     *      )
     * )
     *
     * @View(statusCode=200)
     * @param Request $request
     * @return Article
     */
    public function create(Request $request) : Article
    {
        $params = json_decode($request->getContent(), true); // todo $request->request todo doesn't work :-(

        return $this->service->create(
            $params['title'],
            $params['body']
        );
    }

    /**
     * Update
     *
     * @Route("api/article/update/{id}", name="article_update", methods={"POST"})
     * @SWG\Post(tags={"CRUD"})
     * @SWG\Response(response=200, description="update")
     * @SWG\Parameter(
     *      name="body",
     *      in="body",
     *      description="JSON Payload",
     *      required=true,
     *      format="application/json",
     *      @SWG\Schema(
     *          type="object",
     *          @SWG\Property(property="title", type="string", example="title"),
     *          @SWG\Property(property="body", type="string", example="body")
     *          )
     *      )
     * )
     * @View(statusCode=200)
     * @param string $id
     * @param Request $request
     * @return Article
     */
    public function update(string $id, Request $request) : Article
    {
        $params = json_decode($request->getContent(), true);  // todo $request->request todo doesn't work :-(
        return $this->service->update($this->repository->find($id), $params['title'], $params['body']);
    }

    /**
     * Delete
     *
     * @Route("api/article/delete/{id}", name="article_delete", methods={"POST"})
     * @SWG\Post(tags={"CRUD"})
     * @SWG\Response(response=200, description="delete")
     * @View(statusCode=200)
     *
     * @param Request $request
     * @return JsonResponse
     * @throws \Exception
     * @return Article
     */
    public function delete(string $id, Request $request): Article
    {
        return $this->service->delete($this->repository->find($id));
    }
}
