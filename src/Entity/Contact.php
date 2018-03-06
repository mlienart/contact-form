<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="contacts")
 * @ORM\Entity(repositoryClass="App\Repository\ContactRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Contact {

    public function __construct() {

        $this->setCreatedAt(new \Datetime());
    }

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Votre nom doit faire plus de {{ limit }} caractères",
     *      maxMessage = "Votre nom ne doit pas dépasser {{ limit }} caractères"
     * )
     * @ORM\Column(name="username", type="string", length=50)
     */
    protected $username;

    /**
     * @var string
     * 
     * @ORM\Column(name="email", type="string", length=50)
     * @Assert\Email(
     *      message = "Votre email '{{ value }}' n'est pas valide",
     * )
     */
    protected $email;

    /**
     * @var string
     * 
     * @ORM\Column(name="subject", type="string", length=50)
     * @Assert\Length(
     *      min = 1,
     *      max = 50,
     *      minMessage = "Votre sujet doit faire plus de {{ limit }} caractères",
     *      maxMessage = "Votre sujet ne doit pas dépasser {{ limit }} caractères"
     * )
     */
    protected $subject;

    /**
     * @var string
     * 
     * @ORM\Column(name="message", type="string", length=255)
     * @Assert\Length(
     *      min = 2,
     *      max = 255,
     *      minMessage = "Votre question doit faire plus de {{ limit }} caractères",
     *      maxMessage = "Votre question ne doit pas dépasser {{ limit }} caractères"
     * )
     */
    protected $message;

    /**
     * @ORM\Column(name="done", type="boolean")
     */
    private $done = false;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return Contact
     */
    public function setUsername($username) {
        $this->username = $username;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Contact
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string
     */
    public function getSubject() {
        return $this->subject;
    }

    /**
     * Set subject
     *
     * @param string $subject
     *
     * @return Contact
     */
    public function setSubject($subject) {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage() {
        return $this->message;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return Contact
     */
    public function setMessage($message) {
        $this->message = $message;

        return $this;
    }

    /**
     * Get done
     *
     * @return string
     */
    public function getDone() {
        return $this->done;
    }

    /**
     * Set done
     *
     * @param string $done
     *
     * @return Contact
     */
    public function setDone($done) {
        $this->done = $done;

        return $this;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Contact
     */
    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt() {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Contact
     */
    public function setUpdatedAt(\Datetime $updatedAt) {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    /**
     * @ORM\PreUpdate
     */
    public function updateDate() {
        $this->setUpdatedAt(new \Datetime());
    }

}
