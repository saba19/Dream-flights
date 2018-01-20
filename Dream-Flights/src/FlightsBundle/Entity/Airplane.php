<?php

namespace FlightsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Airplane
 *
 * @ORM\Table(name="airplane")
 * @ORM\Entity(repositoryClass="FlightsBundle\Repository\AirplaneRepository")
 */
class Airplane
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @ORM\Column(name= "name", type="string", length=300)
     *
     */
    private $name;

    /**
     * @ORM\Column(name="production", type="date")
     */
    private $production;

    /**
     * @ORM\Column(name="manufacturer", type="string", length=600)
     */
    private $manufacturer;

    /**
     * @ORM\Column(name="model", type="string", length=300)
     */
    private $model;

    /**
     * @ORM\Column(name="max_passanger", type="integer")
     */
    private $maxPassanger;


    /**
     * @ORM\Column(name="max_carr_capacity_in_tons", type="integer")
     */
    private $maxCarrCapacityInTons;



    


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Airplane
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set production
     *
     * @param \DateTime $production
     *
     * @return Airplane
     */
    public function setProduction($production)
    {
        $this->production = $production;

        return $this;
    }

    /**
     * Get production
     *
     * @return \DateTime
     */
    public function getProduction()
    {
        return $this->production;
    }

    /**
     * Set manufacturer
     *
     * @param string $manufacturer
     *
     * @return Airplane
     */
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    /**
     * Get manufacturer
     *
     * @return string
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * Set model
     *
     * @param string $model
     *
     * @return Airplane
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set maxPassanger
     *
     * @param integer $maxPassanger
     *
     * @return Airplane
     */
    public function setMaxPassanger($maxPassanger)
    {
        $this->maxPassanger = $maxPassanger;

        return $this;
    }

    /**
     * Get maxPassanger
     *
     * @return integer
     */
    public function getMaxPassanger()
    {
        return $this->maxPassanger;
    }

    /**
     * Set maxCarrCapacityInTons
     *
     * @param integer $maxCarrCapacityInTons
     *
     * @return Airplane
     */
    public function setMaxCarrCapacityInTons($maxCarrCapacityInTons)
    {
        $this->maxCarrCapacityInTons = $maxCarrCapacityInTons;

        return $this;
    }

    /**
     * Get maxCarrCapacityInTons
     *
     * @return integer
     */
    public function getMaxCarrCapacityInTons()
    {
        return $this->maxCarrCapacityInTons;
    }
}
