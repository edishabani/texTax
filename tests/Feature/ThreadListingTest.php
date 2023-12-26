<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Thread;
use App\Models\User;

class ThreadListingTest extends TestCase
{
    use RefreshDatabase;

    public function test_thread_listing_page_displays_threads()
    {
        $user = User::factory()->create();
        $thread = Thread::factory()->create(['user_id' => $user->id, 'title' => 'Specific title']);

        $threads = Thread::factory()->count(20)->create();

        $response = $this->get('/threads');

        $response->assertStatus(200);

        foreach ($threads as $thread) {
            $response->assertSee($thread->title);
        }
    }

    public function test_thread_listing_page_paginates_threads()
    {
        $threads = Thread::factory()->count(30)->create();

        $response = $this->get('/threads');

        $response->assertStatus(200);

        // Check that the first page contains the first 15 threads
        foreach ($threads->take(15) as $thread) {
            $response->assertSee($thread->title);
        }

        // Check that the second page contains the next 15 threads
        $response = $this->get('/threads?page=2');

        foreach ($threads->slice(15) as $thread) {
            $response->assertSee($thread->title);
        }
    }
}