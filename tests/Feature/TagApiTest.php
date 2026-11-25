<?php

use App\Models\Post;
use App\Models\Tag;

it('lists the tags with expected structure and post count', function () {
    $tag = Tag::factory()->create();
    $publishedPosts = Post::factory()->published()->count(2)->create();
    $tag->posts()->attach($publishedPosts);

    $draftPost = Post::factory()->create();
    $tag->posts()->attach($draftPost);

    $this->getJson('/api/tags')
        ->assertOk()
        ->assertJsonCount(1, 'data')
        ->assertJsonStructure([
            'data' => [
                '*' => ['id', 'name', 'slug', 'posts_count'],
            ],
        ])
        ->assertJsonPath('data.0.slug', $tag->slug)
        ->assertJsonPath('data.0.posts_count', 2);
});

it('filters the posts by tag slug', function () {
    $tag = Tag::factory()->create();
    $postWithTag = Post::factory()->published()->create(['title' => 'Article avec tag']);
    $postWithTag->tags()->attach($tag);

    Post::factory()->published()->create(['title' => 'Article sans tag']);

    $this->getJson('/api/posts?tag='.$tag->slug)
        ->assertOk()
        ->assertJsonCount(1, 'data')
        ->assertJsonPath('data.0.id', $postWithTag->id)
        ->assertJsonPath('data.0.title', 'Article avec tag');
});

it('returns a JSON 404 for an unknown tag', function () {
    $this->getJson('/api/tags/999')
        ->assertNotFound()
        ->assertJsonStructure(['message']);
});

it('shows a single tag with its published post count', function () {
    $tag = Tag::factory()->create();
    $publishedPost = Post::factory()->published()->create();
    $tag->posts()->attach($publishedPost);

    $this->getJson('/api/tags/'.$tag->id)
        ->assertOk()
        ->assertJsonStructure([
            'data' => ['id', 'name', 'slug', 'posts_count'],
        ])
        ->assertJsonPath('data.id', $tag->id)
        ->assertJsonPath('data.posts_count', 1);
});
