
<?php

use App\Models\User;

test('admin can promote an author to admin', function () {
    $admin = User::factory()->admin()->create();
    $author = User::factory()->create(['role' => 'author']);

    $this->actingAs($admin)
        ->patch(route('admin.users.role', $author))
        ->assertRedirect(route('admin.users.index'));

    expect($author->fresh()->role)->toBe('admin');
});

test('admin cannot change their own role', function () {
    $admin = User::factory()->admin()->create();

    $this->actingAs($admin)
        ->patch(route('admin.users.role', $admin))
        ->assertForbidden();

    expect($admin->fresh()->role)->toBe('admin');
});
