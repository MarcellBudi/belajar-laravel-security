<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HashTest extends TestCase
{
    public function testHash()
    {
        $password = "123456789";
        $hash = Hash::make($password);

        $result = Hash::check("123456789", $hash);
        self::assertTrue($result);

    }
}
