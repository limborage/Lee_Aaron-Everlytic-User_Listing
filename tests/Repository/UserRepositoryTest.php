<?php

namespace Tests\Repository;

use App\Repository\UserRepository;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\MockObject\MockObject;
use Tests\TestCase;

class UserRepositoryTest extends TestCase
{
    use RefreshDatabase;

    private const GOOD_USER_DATA = [
        'name' => 'Test',
        'surname' => 'User',
        'email' => 'test@fake.com',
        'position' => 'Fake Position'
    ];

    /**
     * @var UserRepository|MockObject
     */
    private $userRepoMock;

    /**
     * @var Model|mixed
     */
    private $user;

    protected function setUp()
    {
        parent::setUp();
        $this->userRepoMock = $this->createMock(UserRepository::class);
        $this->user = factory(User::class)->make(
            self::GOOD_USER_DATA
        );
    }

    public function testCreateUser()
    {
        $this->userRepoMock
            ->expects($this->once())
            ->method('createEntity')
            ->withConsecutive([self::GOOD_USER_DATA])
            ->willReturn($this->user);

        $userObj = $this->userRepoMock->createEntity(self::GOOD_USER_DATA);
        $this->assertInstanceOf(User::class, $userObj);
        $this->assertEquals(self::GOOD_USER_DATA['name'], $userObj->name, ' user object has correct name');
    }

    public function testFindUserById()
    {
        $facUser = factory(User::class)->create(
            self::GOOD_USER_DATA
        );

        $this->userRepoMock
            ->expects($this->once())
            ->method('findById')
            ->withConsecutive([$facUser->getKey()])
            ->willReturn($facUser);

        $userObj = $this->userRepoMock->findById($facUser->getKey());
        $this->assertInstanceOf(User::class, $userObj);
        $this->assertEquals(self::GOOD_USER_DATA['name'], $userObj->name, ' user object has correct name');
    }
}
