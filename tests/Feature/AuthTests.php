<?php

use App\Models\User;

it('can register', function () {
    $response = $this->post(route('auth.register'), [
        'name' => 'John Doe',
        'email' => 'john@doe.com',
        'password' => 'password',
    ]);

    $response->assertOk();
});

it('can login', function () {
    $user = User::factory()->create();

    $response = $this->post(route('auth.login'), [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $response->assertOk();
});
