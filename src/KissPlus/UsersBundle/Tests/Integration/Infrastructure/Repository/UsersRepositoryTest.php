<?php

namespace KissPlus\UsersBundle\Tests\Integration\Infrastructure\Repository;

use Doctrine\ORM\EntityManager;
use KissPlus\UsersBundle\Domain\User;
use KissPlus\UsersBundle\Infrastructure\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UsersRepositoryTest extends KernelTestCase
{
    const EMAIL = 'johndoe@example.com';
    /**
     * @var EntityManager
     */
    private $entityManager;
    /**
     * @var UsersRepository
     */
    private $repository;

    public static function setUpBeforeClass()
    {
        self::bootKernel();
    }

    public function setUp()
    {
        $this->entityManager = self::$kernel->getContainer()->get('doctrine')->getManager();
        $this->repository = self::$kernel->getContainer()->get(UsersRepository::class);
    }

    public function testPersistence()
    {
        $email = self::EMAIL;
        $user = new User('John', 'samplepass', $email, true);
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        $fetched = $this->repository->findByEmail($email);
        foreach ($fetched as $user) {
            $this->assertNotEmpty($user);
            $this->assertNotEmpty($user->getCreationTime());
        }
    }

    public function tearDown()
    {
        foreach ($this->repository->findByEmail(self::EMAIL) as $user) {
            $this->entityManager->remove($user);
        }
        $this->entityManager->flush();
    }
}
