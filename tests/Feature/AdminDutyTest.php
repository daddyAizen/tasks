<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('allows an admin to create a new user', function () {
    // Create an admin user
    $admin = User::factory()->create([
        'role' => 'admin',
    ]);

    // Log in as admin
    $this->actingAs($admin);

    // Simulate form submission to create a user
    $response = $this->post('/users', [
        'name' => 'Tom',
        'email' => 'tom@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'role' => 'user',
    ]);

    // Assert the user was created in the database
    $this->assertDatabaseHas('users', [
        'name' => 'Tom',
        'email' => 'tom@example.com',
        'role' => 'user',
    ]);


    $response->assertRedirect();
});

