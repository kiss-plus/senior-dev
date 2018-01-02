<?php
namespace KissPlus\UsersBundle\Infrastructure\Repository;

use Doctrine\ORM\EntityManagerInterface;
use KissPlus\UsersBundle\Application\UserNotFoundException;
use KissPlus\UsersBundle\Domain\User;
use KissPlus\UsersBundle\Domain\UsersList;

class UsersRepository
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param string $email
     * @return \ArrayObject|User[]
     */
    public function findByEmail(string $email) : \ArrayObject
    {
        $objectRepository = $this->entityManager->getRepository(User::class);
        return new \ArrayObject($objectRepository->findBy(['email' => $email]));
    }

    public function persist(User $user)
    {
        $this->entityManager->persist($user);
    }

    /**
     * @return UsersList
     */
    public function findAll() : UsersList
    {
        $repository = $this->entityManager->getRepository(User::class);
        return new UsersList($repository->findAll());
    }

    public function findById(string $id) : User
    {
        $objectRepository = $this->entityManager->getRepository(User::class);
        $user = $objectRepository->find($id);
        if (!$user) {
            throw new UserNotFoundException('User does not exists');
        }
        return $user;
    }
}