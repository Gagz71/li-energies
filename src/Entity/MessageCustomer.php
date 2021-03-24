<?php

namespace App\Entity;

use App\Repository\MessageCustomerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MessageCustomerRepository::class)
 */
class MessageCustomer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $subject;

    /**
     * @ORM\Column(type="text")
     */
    private $message;

    /**
     * @ORM\Column(type="datetime")
     */
    private $messageDate;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class, inversedBy="messages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $messageAuthor;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getMessageDate(): ?\DateTimeInterface
    {
        return $this->messageDate;
    }

    public function setMessageDate(\DateTimeInterface $messageDate): self
    {
        $this->messageDate = $messageDate;

        return $this;
    }

    public function getMessageAuthor(): ?Customer
    {
        return $this->messageAuthor;
    }

    public function setMessageAuthor(?Customer $messageAuthor): self
    {
        $this->messageAuthor = $messageAuthor;

        return $this;
    }
}
