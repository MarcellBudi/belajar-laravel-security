<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Todo;
use App\Models\User;
use Database\Seeders\TodoSeeder;
use Illuminate\Support\Facades\Auth;
use Database\Seeders\UserSeeder;

class TodoControllerTest extends TestCase
{
    public function testTodo()
    {
        $this->seed([UserSeeder::class, TodoSeeder::class]);

        $this->post("/api/todo")
            ->assertStatus(403);

        $user = User::where("email", "cell@gmail.com")->firstOrFail();
        $this->actingAs($user)
            ->post("/api/todo")
            ->assertStatus(200);
    }

    public function testView()
    {
        $this->seed([UserSeeder::class, TodoSeeder::class]);
        $user = User::where("email", "cell@gmail.com")->firstOrFail();
        Auth::login($user);

        $todos = Todo::query()->get();

        $this->view("todos", [
            "todos" => $todos
        ])->assertSeeText("Edit")
            ->assertSeeText("Delete")
            ->assertDontSeeText("No Edit")
            ->assertDontSeeText("No Delete");
    }

    public function testViewGuest()
    {
        $this->seed([UserSeeder::class, TodoSeeder::class]);

        $todos = Todo::query()->get();

        $this->view("todos", [
            "todos" => $todos
        ])->assertSeeText("No Edit")
            ->assertSeeText("No Delete");
    }
}
