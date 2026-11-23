
<x-layout>
    <x-slot:title>Utilisateurs - Mini-CMS</x-slot:title>

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Gestion des utilisateurs</h1>
    </div>

    @if (session('success'))
        <div class="mb-6 rounded-md bg-green-100 p-4 text-sm text-green-800">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="border-b border-gray-200 text-gray-600">
                <tr>
                    <th scope="col" class="py-2 pr-4 font-medium">Nom</th>
                    <th scope="col" class="py-2 pr-4 font-medium">E-mail</th>
                    <th scope="col" class="py-2 pr-4 font-medium">Rôle</th>
                    <th scope="col" class="py-2 font-medium">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($users as $user)
                    <tr class="border-b border-gray-100 align-top">
                        <td class="py-3 pr-4 font-medium text-gray-900">
                            {{ $user->name }}
                        </td>

                        <td class="py-3 pr-4 text-gray-600">
                            {{ $user->email }}
                        </td>

                        <td class="py-3 pr-4 text-gray-600">
                            {{ $user->role }}
                        </td>

                        <td class="py-3">
                            <form method="POST" action="{{ route('admin.users.role', $user) }}">
                                @csrf
                                @method('PATCH')

                                <button type="submit"
                                    class="rounded-md border border-indigo-600 px-4 py-2 text-sm font-medium text-indigo-600 hover:bg-indigo-50">
                                    {{ $user->role === 'admin' ? 'Rétrograder en auteur' : 'Promouvoir en admin' }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="py-6 text-center text-gray-500">
                            Aucun utilisateur pour l'instant.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layout>
