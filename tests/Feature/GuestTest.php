<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class GuestTest extends TestCase
{
    public function testGuest()
    {
        self::assertTrue(Gate::allows("create", User::class));
    }

    public function testUser()
    {
        $this->seed([UserSeeder::class]);

        $user = User::where("email", "cell@gmail.com")->firstOrFail();
        Auth::login($user);

        self::assertFalse(Gate::allows("create", User::class));
    }
}
