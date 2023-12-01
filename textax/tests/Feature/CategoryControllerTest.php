<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function authenticated_user_can_see_categories_index()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->get('/categories');

        $response->assertStatus(200);
        $response->assertViewIs('categories.index');
        // Add more assertions as needed
    }

    /** @test */
    public function authenticated_user_can_see_threads_in_a_category()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();

        $this->actingAs($user);

        $response = $this->get('/categories/'.$category->id);

        $response->assertStatus(200);
        $response->assertViewIs('categories.show');
        // Add more assertions as needed
    }
}
