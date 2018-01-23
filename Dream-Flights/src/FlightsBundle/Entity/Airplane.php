<?php

namespace FlightsBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Airplane
 *
 * @ORM\Table(name="airplane")
 * @ORM\Entity(repositoryClass="FlightsBundle\Repository\AirplaneRepository")
 */
class Airplane
{
    /**
     * @ORM\OneToMany(targetEntity="AirplaneHistory", mappedBy="airplane")
     */
    private $airplaneHistories;

    public function __construct()
    {
        $this->airplaneHistories = new ArrayCollection();
        //$this->production = new \DateTime();
    }



    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @ORM\Column(name= "name", type="string")
     *
     * @Assert\Length(
     *      min = 3,
     *      max = 300,
     *      minMessage = "Name of airplane must be at least {{ limit }} characters long",
     *      maxMessage = "Name of airplane cannot be longer than {{ limit }} characters"
     * )
     */
    private $name;

    /**
     * @ORM\Column(name="production", type="integer")
     *
     * @Assert\Length(
     *      min = 4,
     *      max = 4,
     *      exactMessage = "Production year must be exactly {{ limit }} digits long"
     * )
     *
     *@Assert\GreaterThan(
     *     value = 0
     * )
     */
    private $production;

    /**
     * @ORM\Column(name="manufacturer", type="string")
     *
     * @Assert\Length(
     *      min = 3,
     *      max = 500,
     *      minMessage = "Name of manufacturer must be at least {{ limit }} characters long",
     *      maxMessage = "Name of manufacturer cannot be longer than {{ limit }} characters"
     * )
     */
    private $manufacturer;

    /**
     * @ORM\Column(name="model", type="string")
     *
     * @Assert\Length(
     *      min = 3,
     *      max = 300,
     *      minMessage = "Name of model must be at least {{ limit }} characters long",
     *      maxMessage = "Name of model cannot be longer than {{ limit }} characters"
     * )
     */
    private $model;

    /**
     * @ORM\Column(name="max_passanger", type="integer")
     *
     * @Assert\GreaterThan(
     *     value = 0
     * )
     */
    private $maxPassanger;


    /**
     * @ORM\Column(name="max_carr_capacity_in_tons", type="integer")
     *
     * @Assert\GreaterThan(
     *     value = 0
     * )
     */
    private $maxCarrCapacityInTons;

    public function __toString()
    {
        return $this->name;
    }


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

    /**
     * Add airplaneHistory
     *
     * @param \FlightsBundle\Entity\AirplaneHistory $airplaneHistory
     *
     * @return Airplane
     */
    public function addAirplaneHistory(\FlightsBundle\Entity\AirplaneHistory $airplaneHistory)
    {
        $this->airplaneHistories[] = $airplaneHistory;

        return $this;
    }

    /**
     * Remove airplaneHistory
     *
     * @param \FlightsBundle\Entity\AirplaneHistory $airplaneHistory
     */
    public function removeAirplaneHistory(\FlightsBundle\Entity\AirplaneHistory $airplaneHistory)
    {
        $this->airplaneHistories->removeElement($airplaneHistory);
    }

    /**
     * Get airplaneHistories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAirplaneHistories()
    {
        return $this->airplaneHistories;
    }


}
