<?php

namespace Tests\Feature;

use http\Client\Response;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

/**
 * Class UserControllerTest
 *
 * Run these specific tests
 * php artisan test tests/Feature/UserControllerTest.php
 *
 * @package Tests\Feature\
 */
class UserControllerTest extends TestApi
{
    /**
     * API endpoint
     */
    const ENDPOINT_AUTH = '/api/user';

    /**
     * @test
     *
     * @return void
     */
    public function register_a_new_user()
    {
        $new_data = [
            'name' => 'Test Name',
            'email' => 'test@myadomain.com',
            'password' => 'base_app',
        ];

        $response = $this->withHeader('Authorization', 'Bearer ' . $this->getToken())->json('POST', self::ENDPOINT_AUTH . '/register', $new_data);

        $response->assertStatus(200);
        $response->assertJsonPath('message', 'User registered successfully');
    }

    /**
     * @test
     *
     * @return void
     */
    public function user_register_fails_with_an_email_on_use()
    {
        $new_data = [
            'name' => 'Test Name',
            'email' => 'admin@email.com',
            'password' => 'base_app',
        ];

        $response = $this->withHeader('Authorization', 'Bearer ' . $this->getToken())->json('POST', self::ENDPOINT_AUTH . '/register', $new_data);

        $response->assertStatus(422);
        $response->assertJsonStructure(['message','errors' => ['email']]);
    }
}
