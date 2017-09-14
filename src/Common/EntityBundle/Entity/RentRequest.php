<?php

namespace Common\EntityBundle\Entity;

use Doctrine\DBAL\Types\DateTimeType;
use Common\EntityBundle\CommonEntityBundle;
use Doctrine\ORM\Mapping as ORM;

/**
 * RentRequest
 *
 * @ORM\Table(name="rent_request")
 * @ORM\Entity(repositoryClass="Common\EntityBundle\Repository\RentRequestRepository")
 */
class RentRequest
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
     * @ORM\ManyToOne(targetEntity="Gite", inversedBy="rent_requests")
     * @ORM\JoinColumn(name="gite_id", referencedColumnName="id")
     */
    protected $gite;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255)
     */
    private $lastName;

    /**
     * @var DateTimeType
     *
     * @ORM\Column(name="start_date", type="datetime")
     */
    private $startDate;

    /**
     * @var DateTimeType
     *
     * @ORM\Column(name="end_date", type="datetime")
     */
    private $endDate;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="datetime", type="string", length=255)
     */
    private $comment;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getGite()
    {
        return $this->gite;
    }

    /**
     * @param mixed $gite
     */
    public function setGite($gite)
    {
        $this->gite = $gite;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return DateTimeType
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param DateTimeType $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @return DateTimeType
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param DateTimeType $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }
}
