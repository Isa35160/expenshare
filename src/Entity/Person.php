<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Person
 *
 * @ORM\Table(name="person", indexes={@ORM\Index(name="fk_person_share_group_idx", columns={"share_group_id"})})
 * @ORM\Entity
 */
class Person
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255, nullable=false)
     */
    private $lastname;

    /**
     * @var ShareGroup
     *
     * @ORM\ManyToOne(targetEntity="ShareGroup" )
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="share_group_id", referencedColumnName="id")
     * })
     */
    private $shareGroup;

    /**
     * @var from
     *
     * @ORM\OneToMany(targetEntity="shareGroup", mappedBy="person")

     */
    private $from;

    /**
     * @return from
     */
    public function getFrom(): from
    {
        return $this->from;
    }

    /**
     * @param from $from
     * @return Person
     */
    public function setFrom(from $from): Person
    {
        $this->from = $from;
        return $this;
    }

    /**
     * @return to
     */
    public function getTo(): to
    {
        return $this->to;
    }

    /**
     * @param to $to
     * @return Person
     */
    public function setTo(to $to): Person
    {
        $this->to = $to;
        return $this;
    }

    /**
     * @var to
     *
     * @ORM\OneToMany(targetEntity="shareGroup", mappedBy="person")
     */
    private $to;

    /**
     * @return mixed
     */
    public function getExpense()
    {
        return $this->expense;
    }

    /**
     * @param mixed $expense
     * @return Person
     */
    public function setExpense($expense)
    {
        $this->expense = $expense;
        return $this;
    }

    /**
     * @var
     * @ORM\OneToMany(targetEntity="Expense", mappedBy="person")
     */

    private $expense;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getShareGroup(): ?ShareGroup
    {
        return $this->shareGroup;
    }

    public function setShareGroup(?ShareGroup $shareGroup): self
    {
        $this->shareGroup = $shareGroup;

        return $this;
    }


}
