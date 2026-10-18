<?php

use App\Models\Post;

beforeEach(function () {
    $this->withoutVite();
});

it('shows the posts list', function () {
    Post::create([
        'title' => 'Premier article',
        'slug' => 'premier-article',
        'body' => 'Contenu du premier article de test.',
        'is_published' => true,
        'published_at' => now(),
    ]);

    $this->get(route('posts.index'))
        ->assertOk()
        ->assertSee('Premier article');
});

it('shows a message when there is no post', function () {
    $this->get(route('posts.index'))
        ->assertOk()
        ->assertSee('Aucun article');
});

it('shows a single post', function () {
    $post = Post::create([
        'title' => 'Article complet',
        'slug' => 'article-complet',
        'body' => 'Texte complet de cet article de test.',
        'is_published' => true,
        'published_at' => now(),
    ]);

    $this->get(route('posts.show', $post))
        ->assertOk()
        ->assertSee('Texte complet de cet article de test.');
});

it('returns 404 for an unknown post', function () {
    $this->get('/posts/999')->assertNotFound();
});

it('shows the create form', function () {
    $this->get(route('posts.create'))
        ->assertOk()
        ->assertSee('Nouvel article');
});
it('affiche les articles publies mais pas les brouillons sur l accueil', function () {
    Post::create([
        'title' => 'Article publie sur accueil',
        'slug' => 'article-publie-accueil',
        'body' => 'Contenu publie suffisamment long pour le test.',
        'is_published' => true,
        'published_at' => now(),
    ]);

    Post::create([
        'title' => 'Brouillon cache sur accueil',
        'slug' => 'brouillon-cache-accueil',
        'body' => 'Contenu brouillon suffisamment long pour le test.',
        'is_published' => false,
        'published_at' => null,
    ]);

    $this->get(route('home'))
        ->assertOk()
        ->assertSee('Article publie sur accueil')
        ->assertDontSee('Brouillon cache sur accueil');
});