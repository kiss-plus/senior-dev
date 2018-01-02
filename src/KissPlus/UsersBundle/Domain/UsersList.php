<?php
namespace KissPlus\UsersBundle\Domain;

class UsersList extends \ArrayObject
{
    /**
     * @var array
     */
    private $users;

    /**
     * @param User[] $users
     */
    public function __construct(array $users)
    {
        $this->users = $users;
    }

    public function users(): \ArrayObject
    {
        return new \ArrayObject($this->users);
    }
}
