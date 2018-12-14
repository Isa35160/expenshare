<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ShareGroup
 *
 * @ORM\Table(name="share_group", uniqueConstraints={@ORM\UniqueConstraint(name="slug_UNIQUE", columns={"slug"})})
 * @ORM\Entity
 */
class ShareGroup
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
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=false)
     */
    private $slug;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var bool
     *
     * @ORM\Column(name="closed", type="boolean", nullable=false)
     */
    private $closed = '0';


}
