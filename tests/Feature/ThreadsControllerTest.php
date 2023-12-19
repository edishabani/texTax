<?php
namespace Tests\Feature;

use App\Models\Thread;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ThreadsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get(route('threads.index'));

        $response->assertStatus(200);
    }

    public function testCreate()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('threads.create'));

        $response->assertStatus(200);
    }

    public function testStore()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('threads.store'), [
            'title' => 'Test Thread',
            'body' => 'This is a test thread.',
        ]);

        $response->assertRedirect(route('threads.show', Thread::first()));
    }

    // Add more tests for show, edit, update, and destroy methods...
}
?>