<x-layout>
    <x-slot:title>Catégorie introuvable - Mini-CMS</x-slot:title>

    <h1 class="text-3xl font-bold text-gray-900">Catégorie introuvable</h1>
    <p class="mt-2 mb-8 text-gray-600">
        La catégorie demandée n'existe pas ou a été supprimée.
    </p>

    <x-alert type="info" title="Erreur 404" class="max-w-2xl">
        Choisissez une catégorie existante dans la liste ci-dessous.
    </x-alert>

    <div class="mt-8">
        <h2 class="mb-4 text-xl font-semibold text-gray-900">Catégories disponibles</h2>

        <ul class="space-y-3">
            @forelse ($categories as $category)
                <li>
                    <a href="{{ route('posts.category', $category->slug) }}"
                       class="font-medium text-indigo-600 hover:underline">
                        {{ $category->name }}
                    </a>
                </li>
            @empty
                <li class="text-gray-500">Aucune catégorie disponible.</li>
            @endforelse
        </ul>
    </div>

    <p class="mt-8">
        <a href="{{ route('home') }}" class="font-medium text-indigo-600 hover:underline">
            Retour à l'accueil
        </a>
    </p>
</x-layout>