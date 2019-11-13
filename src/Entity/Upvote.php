<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    public function __construct()
    {
        $this->upvotes = new ArrayCollection();
    }

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

    /**
     * @return Collection|Upvote[]
     */
    public function getUpvotes(): Collection
    {
        return $this->upvotes;
    }

    public function addUpvote(Upvote $upvote): self
    {
        if (!$this->upvotes->contains($upvote)) {
            $this->upvotes[] = $upvote;
        }

        return $this;
    }

    public function removeUpvote(Upvote $upvote): self
    {
        if ($this->upvotes->contains($upvote)) {
            $this->upvotes->removeElement($upvote);
        }

        return $this;
    }
}
