<?php

namespace Tests\Http;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PageAccessTest extends TestCase
{
    use RefreshDatabase;
    private const TESTING_CREATE_EMAIL = 'pageaccesscreate@test.com';
    private const TESTING_DELETE_EMAIL = 'pageaccessdelete@test.com';

    public function testIndexPageAccess()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testCreatePageAccess()
    {
        $user = factory(User::class)->make([
            'email' => self::TESTING_CREATE_EMAIL
        ]);

        $this->assertDatabaseMissing('users', [
            'email' => self::TESTING_CREATE_EMAIL
        ]);

        $response = $this->post('/create-user', [
            'name' => $user->name,
            'surname' => $user->surname,
            'email' => $user->email,
            'position' => $user->position,
        ]);

        // Redirect back to index page
        $response->assertStatus(302);
        $this->assertNotFalse(
            strpos(
                $response->getContent(),
                sprintf('url=%s"', route('user_index'))
            ),
            'Not redirecting to index page.'
        );

        $this->assertDatabaseHas('users', [
            'email' => self::TESTING_CREATE_EMAIL,
        ]);
    }

    public function testDeletePageStringKey()
    {
        //try to delete user with string id
        $response = $this->post(sprintf('/delete-user/%s', 'asd'));

        // Redirect back to index page to display error
        $response->assertStatus(302);
    }

    public function testDeletePageAccess()
    {
        $user = factory(User::class)->create([
            'email' => self::TESTING_DELETE_EMAIL
        ]);

        $this->assertDatabaseHas('users', [
            'email' => self::TESTING_DELETE_EMAIL
        ]);

        $response = $this->post(sprintf('/delete-user/%d', $user->id));

        // Redirect back to index page on successful delete
        $response->assertStatus(302);

        $this->assertDatabaseMissing('users', [
            'email' => self::TESTING_DELETE_EMAIL
        ]);
    }
}