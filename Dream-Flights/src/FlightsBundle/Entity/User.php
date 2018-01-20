<?php

namespace FlightsBundle\Entity;


use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use FlightsBundle\Entity\Airplane;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\OneToMany(targetEntity="Airplane", mappedBy="users")
     */
    private $airplane;


    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;



    public function __construct()
    {
        parent::__construct();
        $this->airplane= new ArrayCollection();

    }


    /**
     * Add airplane
     *
     * @param \FlightsBundle\Entity\Airplane $airplane
     *
     * @return User
     */
    public function addAirplane(\FlightsBundle\Entity\Airplane $airplane)
    {
        $this->airplane[] = $airplane;

        return $this;
    }

    /**
     * Remove airplane
     *
     * @param \FlightsBundle\Entity\Airplane $airplane
     */
    public function removeAirplane(\FlightsBundle\Entity\Airplane $airplane)
    {
        $this->airplane->removeElement($airplane);
    }

    /**
     * Get airplane
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAirplane()
    {
        return $this->airplane;
    }
}
