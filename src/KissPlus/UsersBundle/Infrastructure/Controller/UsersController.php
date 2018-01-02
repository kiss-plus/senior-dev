<?php
namespace KissPlus\UsersBundle\Infrastructure\Controller;

use KissPlus\UsersBundle\Domain\User;
use KissPlus\UsersBundle\Infrastructure\Repository\UsersRepository;
use Symfony\Component\HttpFoundation\Request;


class UsersController
{
    /**
     * @var UsersRepository
     */
    private $usersRepository;

    public function __construct(UsersRepository $usersRepository) {
        $this->usersRepository = $usersRepository;
    }

    /**
     *
     * @ApiDoc(
     *  resource=true,
     *  description="This is a description of your API method",
     *  filters={
     *      {"name"="a-filter", "dataType"="integer"},
     *      {"name"="another-filter", "dataType"="string", "pattern"="(foo|bar) ASC|DESC"}
     *  }
     * )
     */
    public function getUsersAction()
    {
        return $this->usersRepository->findAll();
    }

    public function getUserAction(string $userId) : User
    {
        return $this->usersRepository->findById($userId);
    }

    public function postUserAction(Request $user)
    {
        return $user;
    }
}
