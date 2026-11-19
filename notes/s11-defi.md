
# Session 11 - Défi

/mes-articles ne montre que mes articles, brouillons compris : oui
Un visiteur qui ouvre /mes-articles arrive sur /connexion : oui
Le cookie remember_web_ apparaît quand la case est cochée : non
Les deux nouveaux tests passent et php artisan test est vert : non

Pourquoi partir de $request->user()->posts() plutôt que de Post::where('user_id', $request->user()->id) ?

Pourquoi la case remember ne doit-elle pas être dans le tableau passé à Auth::attempt() ?
