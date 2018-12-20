<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Query\Expr\From;

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
     * @ORM\ManyToOne(targetEntity="ShareGroup", inversedBy="person")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="share_group_id", referencedColumnName="id")
     * })
     */
    private $shareGroup;

    /**
     * @var from
     *
     * @ORM\OneToMany(targetEntity="Debt", mappedBy="from")

     */
    private $from;



    /**
     * @var to
     *
     * @ORM\OneToMany(targetEntity="Debt", mappedBy="to")
     */
    private $to;

    /**
     * @return Collection
     */
    public function getExpense(): Collection
    {
        return $this->expense;
    }

    /**
     * @param Collection $expense
     */
    public function setExpense(Collection $expense): void
    {
        $this->expense = $expense;
    }


    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="Expense", mappedBy="person")
     */

    private $expense;

    /**
     * Person constructor.
     * @param Collection $expense
     */
    public function __construct()
    {
        $this->expense = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): self
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

    public function __toString()
    {
        return $this->getFirstname();
    }


}
