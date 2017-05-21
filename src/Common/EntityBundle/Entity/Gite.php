<?php

namespace Common\EntityBundle\Entity;

use Common\EntityBundle\CommonEntityBundle;
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
     * @ORM\ManyToOne(targetEntity="User", inversedBy="gites")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $owner;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var array
     *
     * @ORM\Column(name="kind", type="array", nullable=true)
     */
    private $kind;

    /**
     * @var int
     *
     * @ORM\Column(name="capacity", type="integer", nullable=true)
     */
    private $capacity;

    /**
     * @var int
     *
     * @ORM\Column(name="beds", type="integer", nullable=true)
     */
    private $beds;

    /**
     * @var int
     *
     * @ORM\Column(name="bedrooms", type="integer", nullable=true)
     */
    private $bedrooms;

    /**
     * @var int
     *
     * @ORM\Column(name="bathrooms", type="integer", nullable=true)
     */
    private $bathrooms;

    /**
     * @var float
     *
     * @ORM\Column(name="size", type="float", nullable=true)
     */
    private $size;

    /**
     * @var array
     *
     * @ORM\Column(name="features", type="array", nullable=true)
     */
    private $features;

    /**
     * @var array
     *
     * @ORM\Column(name="safety_features", type="array", nullable=true)
     */
    private $safety_features;

    /**
     * @var array
     *
     * @ORM\Column(name="spaces", type="array", nullable=true)
     */
    private $spaces;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=1500)
     */
    private $description;

    /**
     * @var Array
     *
     * @ORM\Column(type="array", nullable=true)
     */
    private $photos;

    /**
     * @var string
     *
     * @ORM\Column(name="reviews", type="string", length=255, nullable=true)
     */
    private $reviews;

    /**
     * @var object
     *
     * @ORM\Column(name="geometry", type="object", nullable=true)
     */
    private $geometry;

    /**
     * @var string
     *
     * @ORM\Column(name="airbnb", type="string", nullable=true)
     */
    private $airbnb;

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
     * @return mixed
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param mixed $owner
     */
    public function setOwner(User $owner)
    {
        $this->owner = $owner;
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
     * Set address
     *
     * @param string $address
     *
     * @return Gite
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->photos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set kind
     *
     * @param array $kind
     *
     * @return Gite
     */
    public function setKind($kind)
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * Get kind
     *
     * @return array
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * Get prettyKind
     *
     * @return string
     */
    public function getPrettyKind()
    {
        switch ($this->kind) {
            case 'HOUSE':
                return 'maison';
            case 'FLAT':
                return 'appartement';
            case 'BUNGALOW':
                return 'bungalow';
        }
    }

    /**
     * Set capacity
     *
     * @param integer $capacity
     *
     * @return Gite
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * Get capacity
     *
     * @return integer
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Set beds
     *
     * @param integer $beds
     *
     * @return Gite
     */
    public function setBeds($beds)
    {
        $this->beds = $beds;

        return $this;
    }

    /**
     * Get beds
     *
     * @return integer
     */
    public function getBeds()
    {
        return $this->beds;
    }

    /**
     * Set safetyFeatures
     *
     * @param array $safetyFeatures
     *
     * @return Gite
     */
    public function setSafetyFeatures($safetyFeatures)
    {
        $this->safety_features = $safetyFeatures;

        return $this;
    }

    /**
     * Get safetyFeatures
     *
     * @return array
     */
    public function getSafetyFeatures()
    {
        return $this->safety_features;
    }

    /**
     * Set spaces
     *
     * @param array $spaces
     *
     * @return Gite
     */
    public function setSpaces($spaces)
    {
        $this->spaces = $spaces;

        return $this;
    }

    /**
     * Get spaces
     *
     * @return array
     */
    public function getSpaces()
    {
        return $this->spaces;
    }

    public function getUploadRootDir()
    {
        // absolute path to your directory where images must be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    public function getUploadDir()
    {
        return 'uploads/photos';
    }

    public function getAbsolutePath()
    {
        return null === $this->image ? null : $this->getUploadRootDir().'/'.$this->image;
    }

    public function getWebPath()
    {
        return null === $this->image ? null : '/'.$this->getUploadDir().'/'.$this->image;
    }

    public function getGalleryPath()
    {
        return $this->getUploadDir() . '/' . $this->getOwner()->getId() . '/gallery';
    }

    /**
     * Set photos
     *
     * @param array $photos
     *
     * @return Gite
     */
    public function setPhotos($photos)
    {
        $this->photos = $photos;

        return $this;
    }

    /**
     * Get photos
     *
     * @return array
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * @return object
     */
    public function getGeometry()
    {
        return $this->geometry;
    }

    /**
     * @param object $geometry
     */
    public function setGeometry($geometry)
    {
        $this->geometry = $geometry;
    }

    /**
     * @return string
     */
    public function getAirbnb()
    {
        return $this->airbnb;
    }

    /**
     * @param string $airbnb
     */
    public function setAirbnb($airbnb)
    {
        $this->airbnb = $airbnb;
    }

    /**
     * @return int
     */
    public function getBedrooms()
    {
        return $this->bedrooms;
    }

    /**
     * @param int $bedrooms
     */
    public function setBedrooms($bedrooms)
    {
        $this->bedrooms = $bedrooms;
    }
}
