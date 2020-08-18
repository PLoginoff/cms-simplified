<?php

namespace App\Service;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;

class ArticleService
{
    /** @var EntityManagerInterface */
    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    public function create(string $title, string $body): Article
    {
        $article = new Article();
        $article->setTitle($title);
        $article->setBody($body);

        $this->em->persist($article);
        $this->em->flush();

        return $article;
    }

    public function update(Article $article, string $title, string $body): Article
    {
        $article->setTitle($title);
        $article->setBody($body);
        $this->em->persist($article);
        $this->em->flush();
        return $article;
    }

    public function delete(Article $article): Article
    {
        $article->setDeletedAt(new \DateTime());
        $this->em->persist($article);
        $this->em->flush();
        return $article;
    }
}
