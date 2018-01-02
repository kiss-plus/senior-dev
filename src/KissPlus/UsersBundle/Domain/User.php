<?php
namespace KissPlus\UsersBundle\Domain;

class User
{
    /**
     * @var string
     *
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $password;
    /**
     * @var string
     */
    private $email;
    /**
     * @var bool
     */
    private $active;
    /**
     * @var \DateTimeImmutable
     */
    private $creationTime;

    /**
     * User constructor.
     * @param string $name
     * @param string $password
     * @param string $email
     * @param bool $active
     */
    public function __construct(
        string $name,
        string $password,
        string $email,
        bool $active
    ) {
        $this->name = $name;
        $this->password = $password;
        $this->email = $email;
        $this->active = $active;
        if (!$this->creationTime) {
            $this->creationTime = new \DateTimeImmutable();
        }
    }


    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getCreationTime(): \DateTimeImmutable
    {
        return $this->creationTime;
    }
}