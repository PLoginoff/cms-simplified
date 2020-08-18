<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    public function getList($sort = 'createdAt', $direction = 'asc', int $limit = 10, int $offset = 0)
    {
        if (!in_array($sort, ['createdAt', 'title'])) {
            $sort = 'createdAt';
        }
        if (!in_array($direction, ['asc', 'desc'])) {
            $direction = 'asc';
        }
        $qb = $this->createQueryBuilder('a')
            ->andWhere('a.deletedAt is null')
            ->orderBy('a.' . $sort, $direction);
        return $qb->getQuery()->setFirstResult($offset)->setMaxResults($limit)->getResult();
    }
}
