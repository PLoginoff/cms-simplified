<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Article
{
    /**
     * @var int
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $body;

    /**
     * @var \DateTimeInterface|null
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetimetz")
     */
    protected $createdAt;

    /**
     * @var \DateTimeInterface|null
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetimetz")
     */
    protected $updatedAt;

    /**
     * @var \DateTimeInterface|null
     * @ORM\Column(type="datetimetz")
     */
    protected $deletedAt;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Article
     */
    public function setId(int $id): Article
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Article
     */
    public function setTitle(string $title): Article
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $body
     * @return Article
     */
    public function setBody(string $body): Article
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTimeInterface|null $createdAt
     * @return Article
     */
    public function setCreatedAt(?\DateTimeInterface $createdAt): Article
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTimeInterface|null $updatedAt
     * @return Article
     */
    public function setUpdatedAt(?\DateTimeInterface $updatedAt): Article
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDeletedAt(): ?\DateTimeInterface
    {
        return $this->deletedAt;
    }

    /**
     * @param \DateTimeInterface|null $deletedAt
     * @return Article
     */
    public function setDeletedAt(?\DateTimeInterface $deletedAt): Article
    {
        $this->deletedAt = $deletedAt;
        return $this;
    }
}
