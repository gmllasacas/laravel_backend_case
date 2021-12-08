<?php

namespace Tests\Feature;

use http\Client\Response;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

/**
 * Class AuthControllerTest
 *
 * Run these specific tests
 * php artisan test tests/Feature/AuthControllerTest.php
 *
 * @package Tests\Feature\
 */
class AuthControllerTest extends TestApi
{
    /**
     * API endpoint
     */
    const ENDPOINT_AUTH = '/api/auth';

    /**
     * @test
     *
     * @return void
     */
    public function login_error_with_wrong_credentials()
    {
        $response = $this->json('post', self::ENDPOINT_AUTH . '/login', [
            'email' => 'wrong_email@mydomain.com',
            'password' => 'wrong_password',
        ]);

        $response->assertStatus(401);
        $response->assertJsonPath('message', 'Invalid login credentials');
    }

    /**
     * @test
     *
     * @return void
     */
    public function login_error_with_empty_credentials()
    {
        $response = $this->json('post', self::ENDPOINT_AUTH . '/login', []);

        $response->assertStatus(401);
        $response->assertJsonPath('message', 'Invalid login credentials');
    }
}
