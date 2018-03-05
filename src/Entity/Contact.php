<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="contacts")
 * @ORM\Entity(repositoryClass="App\Repository\ContactRepository")
 */
class Contact {

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
     *      minMessage = "Le nom doit faire plus de {{ limit }} caractères",
     *      maxMessage = "Le nom ne doit pas dépasser {{ limit }} caractères"
     * )
     * @ORM\Column(name="username", type="string", length=50)
     */
    protected $username;

    /**
     * @var string
     * 
     * @ORM\Column(name="email", type="string", length=50)
     * @Assert\Email(
     *      message = "Le email '{{ value }}' n'est pas valide",
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
     *      minMessage = "Le sujet doit faire plus de {{ limit }} caractères",
     *      maxMessage = "Le sujet ne doit pas dépasser {{ limit }} caractères"
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
     *      minMessage = "Le message doit faire plus de {{ limit }} caractères",
     *      maxMessage = "Le message ne doit pas dépasser {{ limit }} caractères"
     * )
     */
    protected $message;

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

}
