<?php

namespace Common\EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gite
 *
 * @ORM\Table(name="gite")
 * @ORM\Entity(repositoryClass="Common\EntityBundle\Repository\GiteRepository")
 */
class Gite
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
     * @var string
     *
     * @ORM\Column(name="owner", type="string", length=255)
     */
    private $owner;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255)
     */
    private $location;

    /**
     * @var float
     *
     * @ORM\Column(name="area", type="float")
     */
    private $area;

    /**
     * @var int
     *
     * @ORM\Column(name="bedrooms", type="integer")
     */
    private $bedrooms;

    /**
     * @var int
     *
     * @ORM\Column(name="bathrooms", type="integer", nullable=true)
     */
    private $bathrooms;

    /**
     * @var int
     *
     * @ORM\Column(name="garages", type="integer", nullable=true)
     */
    private $garages;

    /**
     * @var array
     *
     * @ORM\Column(name="features", type="array", nullable=true)
     */
    private $features;

    /**
     * @var int
     *
     * @ORM\Column(name="yearBuilt", type="integer", nullable=true)
     */
    private $yearBuilt;

    /**
     * @var float
     *
     * @ORM\Column(name="size", type="float", nullable=true)
     */
    private $size;

    /**
     * @var int
     *
     * @ORM\Column(name="roomCount", type="integer", nullable=true)
     */
    private $roomCount;

    /**
     * @var string
     *
     * @ORM\Column(name="viewType", type="string", length=255, nullable=true)
     */
    private $viewType;

    /**
     * @var bool
     *
     * @ORM\Column(name="garden", type="boolean", nullable=true)
     */
    private $garden;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=1500)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="reviews", type="string", length=255, nullable=true)
     */
    private $reviews;


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
     * Set owner
     *
     * @param string $owner
     *
     * @return Gite
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return string
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Gite
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set location
     *
     * @param string $location
     *
     * @return Gite
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set area
     *
     * @param float $area
     *
     * @return Gite
     */
    public function setArea($area)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get area
     *
     * @return float
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Set bedrooms
     *
     * @param integer $bedrooms
     *
     * @return Gite
     */
    public function setBedrooms($bedrooms)
    {
        $this->bedrooms = $bedrooms;

        return $this;
    }

    /**
     * Get bedrooms
     *
     * @return int
     */
    public function getBedrooms()
    {
        return $this->bedrooms;
    }

    /**
     * Set bathrooms
     *
     * @param integer $bathrooms
     *
     * @return Gite
     */
    public function setBathrooms($bathrooms)
    {
        $this->bathrooms = $bathrooms;

        return $this;
    }

    /**
     * Get bathrooms
     *
     * @return int
     */
    public function getBathrooms()
    {
        return $this->bathrooms;
    }

    /**
     * Set garages
     *
     * @param integer $garages
     *
     * @return Gite
     */
    public function setGarages($garages)
    {
        $this->garages = $garages;

        return $this;
    }

    /**
     * Get garages
     *
     * @return int
     */
    public function getGarages()
    {
        return $this->garages;
    }

    /**
     * Set features
     *
     * @param array $features
     *
     * @return Gite
     */
    public function setFeatures($features)
    {
        $this->features = $features;

        return $this;
    }

    /**
     * Get features
     *
     * @return array
     */
    public function getFeatures()
    {
        return $this->features;
    }

    /**
     * Set yearBuilt
     *
     * @param integer $yearBuilt
     *
     * @return Gite
     */
    public function setYearBuilt($yearBuilt)
    {
        $this->yearBuilt = $yearBuilt;

        return $this;
    }

    /**
     * Get yearBuilt
     *
     * @return int
     */
    public function getYearBuilt()
    {
        return $this->yearBuilt;
    }

    /**
     * Set size
     *
     * @param float $size
     *
     * @return Gite
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return float
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set roomCount
     *
     * @param integer $roomCount
     *
     * @return Gite
     */
    public function setRoomCount($roomCount)
    {
        $this->roomCount = $roomCount;

        return $this;
    }

    /**
     * Get roomCount
     *
     * @return int
     */
    public function getRoomCount()
    {
        return $this->roomCount;
    }

    /**
     * Set viewType
     *
     * @param string $viewType
     *
     * @return Gite
     */
    public function setViewType($viewType)
    {
        $this->viewType = $viewType;

        return $this;
    }

    /**
     * Get viewType
     *
     * @return string
     */
    public function getViewType()
    {
        return $this->viewType;
    }

    /**
     * Set garden
     *
     * @param boolean $garden
     *
     * @return Gite
     */
    public function setGarden($garden)
    {
        $this->garden = $garden;

        return $this;
    }

    /**
     * Get garden
     *
     * @return bool
     */
    public function getGarden()
    {
        return $this->garden;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Gite
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set reviews
     *
     * @param string $reviews
     *
     * @return Gite
     */
    public function setReviews($reviews)
    {
        $this->reviews = $reviews;

        return $this;
    }

    /**
     * Get reviews
     *
     * @return string
     */
    public function getReviews()
    {
        return $this->reviews;
    }
}
