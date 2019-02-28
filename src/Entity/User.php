<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields={"name"}, message="There is already an account with this name")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30, unique=true, nullable=false)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=256, nullable=false)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=256, nullable=false)
     */
    private $roles = 'ROLE_USER';

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * One User has Many UserScore.
     * @ORM\OneToMany(targetEntity="UserScore", mappedBy="user")
     */
    private $userScores;

    /**
     * @ORM\Column(type="integer", options={"default" : 0})
     */

    private $chosenOrder;

    /**
     * @return mixed
     */
    public function getChosenOrder()
    {
        return $this->chosenOrder;
    }

    /**
     * @param mixed $chosenOrder
     */
    public function setChosenOrder($chosenOrder): void
    {
        $this->chosenOrder = $chosenOrder;
    }

    public function __construct()
    {
        $this->userScores = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->name;
    }

    /**
     * @return null|string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles[] = $this->roles;
        $roles[] = 'ROLE_USER';
        return array_unique($roles);
    }

    public function setRoles(string $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return mixed
     */
    public function getUserScores()
    {
        return $this->userScores;
    }

    /**
     * @param UserScore $userScore
     * @return User
     */
    public function addUserScores(UserScore $userScore): User
    {
        $this->userScores->add($userScore);

        return $this;
    }
}
