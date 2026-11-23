<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function updateRole(User $user): RedirectResponse
    {
        abort_if(Auth::id() === $user->id, 403);

        $user->role = $user->role === 'author' ? 'admin' : 'author';
        $user->save();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Le rôle de l’utilisateur a été modifié.');
    }
}
