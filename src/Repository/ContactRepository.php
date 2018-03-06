<?php

namespace App\Repository;

use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * ContactRepository
 *
 */
class ContactRepository extends \Doctrine\ORM\EntityRepository {

    /**
     * 
     * @param int $iPage
     * @param int $iNbPerPage
     * @return \Doctrine\ORM\Tools\Pagination\Paginator
     * @throws InvalidArgumentException
     */
    public function getAllContactsPaginator($iPage, $iNbPerPage) {

        if (!is_numeric($iPage)) {
            throw new InvalidArgumentException('La valeur de l\'argument $iPage est incorrecte (valeur : ' . $iPage . ').');
        }
        if (!is_numeric($iNbPerPage)) {
            throw new InvalidArgumentException('La valeur de l\'argument $iNbPerPage est incorrecte (valeur : ' . $iNbPerPage . ').');
        }

        $oQuery = $this->createQueryBuilder('c')->orderBy('c.email', 'ASC')->getQuery();

        $oQuery
                ->setFirstResult(($iPage - 1) * $iNbPerPage)
                ->setMaxResults($iNbPerPage);

        return new Paginator($oQuery, false);
    }

}
