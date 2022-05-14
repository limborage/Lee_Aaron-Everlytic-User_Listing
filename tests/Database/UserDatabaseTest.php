<?php

namespace Tests\Database;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserDatabaseTest extends TestCase
{
    use RefreshDatabase;
    private const TESTING_EMAIL = 'database@test.com';

    public function testCreateUser()
    {
        $this->assertDatabaseMissing('users', [
            'email' => self::TESTING_EMAIL
        ]);

        factory(User::class)->create([
            'email' => self::TESTING_EMAIL
        ]);

        $this->assertDatabaseHas('users', [
            'email' => self::TESTING_EMAIL
        ]);
    }

    public function testCreateUserValidationFailsDoesNotSaveRecord()
    {
        // implement
    }

    public function testEditUser()
    {
    }
}