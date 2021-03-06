<?php

namespace Worldskills\CareBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * SubjectRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SubjectRepository extends EntityRepository
{
    public function getHottest($limit = 10)
    {
        return $this
            ->getEntityManager()
            ->getRepository('WorldskillsCareBundle:Subject')
            ->createQueryBuilder('s')
            ->orderBy('s.id', 'desc')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    public function queryTitle($keywords, $limit = 10)
    {
        $query = $this
            ->getEntityManager()
            ->getConnection()
            ->createQueryBuilder()
            ->addSelect('*')
            ->addSelect('MATCH(s.title) AGAINST (:keywords IN NATURAL LANGUAGE MODE) AS score')
            ->from('subject', 's')
//                 ->where('score > 0')
            ->setParameter('keywords', $keywords)
            ->setMaxResults($limit)
            ->orderBy('score', 'DESC');

        return $query
            ->execute()
            ->fetchAll(\PDO::FETCH_CLASS, "Worldskills\\CareBundle\\Entity\\Subject");
    }
}
