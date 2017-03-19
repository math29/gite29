<?php

namespace Common\EntityBundle\Entity;

use Common\EntityBundle\CommonEntityBundle;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Photo
 *
 * @ORM\Table(name="photo")
 * @ORM\Entity(repositoryClass="Common\EntityBundle\Repository\PhotoRepository")
 */
class Photo
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @Assert\Image(
     *     minWidth = 200,
     *     maxWidth = 400,
     *     minHeight = 200,
     *     maxHeight = 400,
     *     allowLandscape = false,
     *     allowPortrait = false
     * )
     */
    protected $image;

    /**
     * @ORM\ManyToOne(targetEntity="Gite", inversedBy="photos")
     * @ORM\JoinColumn(name="gite_id", referencedColumnName="id")
     */
    protected $gite;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set gite
     *
     * @param \Common\EntityBundle\Entity\Gite $gite
     *
     * @return Photo
     */
    public function setGite(\Common\EntityBundle\Entity\Gite $gite = null)
    {
        $this->gite = $gite;

        return $this;
    }

    /**
     * Get gite
     *
     * @return \Common\EntityBundle\Entity\Gite
     */
    public function getGite()
    {
        return $this->gite;
    }
}
