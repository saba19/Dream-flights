<?php

namespace FlightsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * AirplaneHistory
 *
 * @ORM\Table(name="airplane_history")
 * @ORM\Entity(repositoryClass="FlightsBundle\Repository\AirplaneHistoryRepository")
 */
class AirplaneHistory
{


    /**
     * @ORM\ManyToOne(targetEntity="Airplane", inversedBy="airplaneHistories")
     * @ORM\JoinColumn(name="airplane_id", referencedColumnName="id")
     * @Assert\NotBlank
     */
    private $airplane;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


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
     * @ORM\Column(name="airport_departures",  type="string")
     *
     * @Assert\Length(
     *      min = 3,
     *      max = 500,
     *      minMessage = "Name of manufacturer must be at least {{ limit }} characters long",
     *      maxMessage = "Name of manufacturer cannot be longer than {{ limit }} characters"
     * )
     */
    private $airportDepartures;


    /**
     * @ORM\Column(name="flight_duration", type="time")
     *
     *
     */
    private $flightDuration;


    public function __toString()
    {
        return "Airport departures: " .$this->airportDepartures . ", flight duration: " . $this->flightDuration;
    }


    /**
     * Set airportDepartures
     *
     * @param string $airportDepartures
     *
     * @return AirplaneHistory
     */
    public function setAirportDepartures($airportDepartures)
    {
        $this->airportDepartures = $airportDepartures;

        return $this;
    }

    /**
     * Get airportDepartures
     *
     * @return string
     */
    public function getAirportDepartures()
    {
        return $this->airportDepartures;
    }

    /**
     * Set flightDuration
     *
     * @param \DateTime $flightDuration
     *
     * @return AirplaneHistory
     */
    public function setFlightDuration($flightDuration)
    {
        $this->flightDuration = $flightDuration;

        return $this;
    }

    /**
     * Get flightDuration
     *
     * @return \DateTime
     */
    public function getFlightDuration()
    {
        return $this->flightDuration;
    }

    /**
     * Set airplane
     *
     * @param \FlightsBundle\Entity\Airplane $airplane
     *
     * @return AirplaneHistory
     */
    public function setAirplane(\FlightsBundle\Entity\Airplane $airplane = null)
    {
        $this->airplane = $airplane;

        return $this;
    }

    /**
     * Get airplane
     *
     * @return \FlightsBundle\Entity\Airplane
     */
    public function getAirplane()
    {
        return $this->airplane;
    }
}
