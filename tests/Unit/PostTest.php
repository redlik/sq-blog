<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function test_if_create_form_page_is_not_visible_to_guests()
    {
        $response = $this->post('/post/create');

        $response->assertStatus(302);
    }

    public function test_if_post_displayed_on_homepage()
    {
        $user = User::factory()->create();

        $post = Post::create([
            'title' => 'Lorem Ipsum',
            'description' => 'Very long description',
            'publication_date' => now(),
            'user_id' => $user->id,
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee($post->title);

    }

    public function test_if_posts_has_single_page()
    {
        $post = Post::factory()->create();

        $response = $this->get('/post/'.$post->id);

        $response->assertStatus(200);
        $response->assertSee($post->title);

    }
}
