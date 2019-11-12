<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UpvoteRepository")
 */
class Upvote
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $userId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $postId;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Upvote", inversedBy="post")
     * @ORM\JoinTable(name="upvotes",
     * joinColumns={
        @ORM\JoinColumn(name="user_id", referencedColumnName="id")
       },
       inverseJoinColumns={
        @ORM\JoinColumn(name="post_id", referencedColumnName="id")
       }
       )
     */
    private $upvotes;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?string
    {
        return $this->userId;
    }

    public function setUserId(string $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getPostId(): ?string
    {
        return $this->postId;
    }

    public function setPostId(string $postId): self
    {
        $this->postId = $postId;

        return $this;
    }
}