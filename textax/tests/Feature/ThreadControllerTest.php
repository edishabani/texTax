<?php

namespace Tests\Feature;

use App\Models\Thread;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ThreadControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function authenticated_user_can_see_threads_index()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->get('/threads');

        $response->assertStatus(200);
        $response->assertViewIs('threads.index');
        // Add more assertions as needed
    }

    /** @test */
    public function authenticated_user_can_see_single_thread()
    {
        $user = User::factory()->create();
        $thread = Thread::factory()->create();

        $this->actingAs($user);

        $response = $this->get('/threads/'.$thread->id);

        $response->assertStatus(200);
        $response->assertViewIs('threads.show');
        // Add more assertions as needed
    }
}
