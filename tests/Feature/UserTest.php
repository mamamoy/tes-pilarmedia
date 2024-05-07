<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function register(){
        $this->withoutExceptionHandling();

        $response = $this->post('/register', [
            'name'=> 'New User',
            'email' => 'user@email.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);
        
        $response->assertRedirect('/home');
        $this->assertCount(1, User::all());
    }
}
