<?php

namespace Tests\Feature;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic smoke test: the public pages respond successfully.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_public_pages_respond_successfully(): void
    {
        $this->seed(DatabaseSeeder::class);

        foreach (['/about', '/menu', '/reservation', '/login', '/register'] as $path) {
            $this->get($path)->assertStatus(200);
        }
    }
}
