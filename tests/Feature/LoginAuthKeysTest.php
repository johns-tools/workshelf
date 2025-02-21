<?php

use App\Models\LoginAuthKey;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

uses(RefreshDatabase::class);

it('can create and delete a login auth key', function () {
    // Create a new login auth key value pair record.
    $loginAuthKey = LoginAuthKey::create([
        'key_01' => Str::uuid(),
        'key_02' => Str::uuid(),
    ]);

    // Assert that the record exists in the database.
    expect($loginAuthKey)->toBeInstanceOf(LoginAuthKey::class);
    expect($loginAuthKey->id)->not->toBeNull();
    $this->assertDatabaseHas('login_auth_keys', [
        'id' => $loginAuthKey->id,
    ]);

    // Delete the record.
    $loginAuthKey->delete();

    // Assert that the record is no longer in the database.
    $this->assertDatabaseMissing('login_auth_keys', [
        'id' => $loginAuthKey->id,
    ]);
});
