<?php


namespace Tests\Feature;

use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class TestApi extends TestCase
{
    /**
     * Get api token
     *
     * @return string
     */
    protected function getToken(): string
    {
        $response = $this->json('post', '/api/auth/login', [
            'email' => 'admin@email.com',
            'password' => 'base_app',
        ]);

        $response_content = json_decode($response->getContent());

        return $response_content->access_token;
    }

    /**
     * Initialize migration
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        Artisan::call('migrate:fresh');
        Artisan::call('db:seed', ['--class' => 'TestDatabaseSeeder']);
    }

}
