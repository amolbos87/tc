<?php

namespace Tests\Feature;

use Illuminate\Http\Response;
use Tests\TestCase;
use App\Models\User;

use Illuminate\Support\Facades\Artisan;
class ApiAuthControllerTest extends TestCase
{

    public function testIncorrectApiLoginCredentials() {
        $body = [
            'username' => 'admin@admin.com',
            'password' => 'admin'
        ];
        $this->json('POST','/api/v1/login',$body,['Accept' => 'application/json'])->assertStatus(Response::HTTP_FORBIDDEN);
    }

    public function testCorrectApiLoginCredentials() {
        
        $payload = [
            'name' => $this->faker->name,
            'email'  => $this->faker->email,
            'password'      => $this->faker->password
        ];
        //Enable use of passport with sqlite db
        // Artisan::call('passport:install');

        $this->json('POST', '/api/v1/register', $payload);
        unset($payload['name']);
        $this->json('POST','/api/v1/login',$payload,['Accept' => 'application/json'])->assertStatus(Response::HTTP_OK);
    }

    public function testUserIsCreatedSuccessfully()
    {

        $payload = [
            'name' => $this->faker->name,
            'email'  => $this->faker->email,
            'password'      => $this->faker->password
        ];
        //Enable use of passport with sqlite db
        // Artisan::call('passport:install');

        $this->json('POST', '/api/v1/register', $payload)
            ->assertStatus(Response::HTTP_CREATED);
    }

}
