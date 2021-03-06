<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * LoanRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class LoanRepository extends EntityRepository {

    public function findAllByBorrower($borrower) {
        $em = $this->getEntityManager();
        $query = $em->createQuery(
                'SELECT l FROM AppBundle:Loan l, AppBundle:User u, AppBundle:Tool t WHERE u.id = :id AND l.borrower = u.id AND l.tool = t.id'
            )->setParameter('id', $borrower->getId());

        return $query->getResult();
    }

}
