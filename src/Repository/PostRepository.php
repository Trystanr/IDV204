<?php

namespace App\Repository;

use App\Entity\Post;
use App\Entity\Comment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;


/**
 * @method Post|null find($id, $lockMode = null, $lockVersion = null)
 * @method Post|null findOneBy(array $criteria, array $orderBy = null)
 * @method Post[]    findAll()
 * @method Post[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Post::class);
    }

    public function findPostWithCategory(int $cat){   

        $qb = $this->createQueryBuilder('p')
            ->where('p.category = :cat')
            ->setParameter('cat', $cat);

        $query = $qb->getQuery();

        return $query->execute();
    }

    public function findPostWithUser(int $id){   

        $qb = $this->createQueryBuilder('p')
            ->where('p.user = :id')
            ->setParameter('id', $id);

        $query = $qb->getQuery();

        return $query->execute();
    }

    public function findUserPostCount(int $id):?int {   

        $qb = $this->createQueryBuilder('p')
            ->where('p.user = :id')
            ->setParameter('id', $id);

        $query = $qb->getQuery();

        return count($query->execute());
    }

    public function findSingle(int $cat){   

        $qb = $this->createQueryBuilder('p')
            ->where('p.category = :cat')
            ->setParameter('cat', $cat)
            ->setMaxResults(1);

        $query = $qb->getQuery();

        $res = $query->getOneOrNullResult();

        if ($res == null) {
            return "Empty Category" . $cat;
        } else {
            return $res->getCategory()->getName();

        }

    }

    public function addComment(string $CommentString) {
        $com = Comment;

        $com->setComment("Hello");
        $com->setUser($this->getUser());
    }

    // /**
    //  * @return Post[] Returns an array of Post objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Post
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
