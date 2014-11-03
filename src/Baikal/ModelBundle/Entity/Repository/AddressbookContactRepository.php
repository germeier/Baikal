<?php

namespace Baikal\ModelBundle\Entity\Repository;

use Doctrine\ORM\EntityManager;

use Baikal\ModelBundle\Entity\Addressbook;

/**
 * AddressbookRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AddressbookContactRepository {

    protected $em;
    
    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function countAll() {
        $query = $this->em->createQuery('SELECT count(o) FROM BaikalModelBundle:AddressbookContact o');
        return $query->getSingleScalarResult();
    }

    public function find($id) {
        $query = $this->em->createQuery('SELECT o FROM BaikalModelBundle:AddressbookContact o WHERE o.id = :id')
            ->setParameter('id', $id);

        return $query->getSingleResult();
    }

    public function findByAddressbook(Addressbook $addressbook) {
        $query = $this->em->createQuery('SELECT o FROM BaikalModelBundle:AddressbookContact o WHERE o.addressbook = :addressbook')
            ->setParameter('addressbook', $addressbook);

        return $query->getResult();
    }
}
