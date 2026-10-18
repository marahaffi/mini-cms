<x-layout>
    <x-slot:title>Accueil - Mini-CMS</x-slot:title>

    <section class="mt-10">
    <h2 class="mb-6 text-2xl font-bold">
        Derniers articles publiés
    </h2>

    <div class="grid gap-6 md:grid-cols-2">
        @forelse ($latestPosts as $post)
            <x-post-card :post="$post" />
        @empty
            <x-alert type="info" title="Aucun article publié">
                Aucun article publié pour le moment.
            </x-alert>
        @endforelse
    </div>

    <div class="mt-6">
        <a href="{{ route('posts.index') }}"
           class="text-indigo-600 hover:underline">
            Voir tous les articles
        </a>
    </div>
</section>

    <x-alert type="success" title="Sprint en cours">
        Les composants Blade évitent de recopier le même code HTML dans chaque page.
    </x-alert>
</x-layout>