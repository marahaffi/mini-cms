<?php

use App\Models\Category;
beforeEach(function () {
    $this->withoutVite();
});

it('shows the styled 404 page for an unknown URL', function () {
    $this->get('/page-inexistante')
        ->assertNotFound()
        ->assertSee('Page introuvable')
        ->assertSee("Retour à l'accueil", false);
});

it('shows the styled 503 page when the site is read-only', function () {
    config(['site.read_only' => true]);

    $this->post(route('posts.store'), [])
        ->assertStatus(503)
        ->assertSee('Service momentanément indisponible')
        ->assertSee("Retour à l'accueil", false);
});
it('shows available categories when a category slug is not found', function () {
    Category::factory()->create([
        'name' => 'Laravel',
        'slug' => 'laravel',
    ]);

    $this->get('/posts/categorie/inconnue')
        ->assertNotFound()
        ->assertSee('Catégorie introuvable')
        ->assertSee('Laravel')
        ->assertSee(route('posts.category', 'laravel'), false);
});