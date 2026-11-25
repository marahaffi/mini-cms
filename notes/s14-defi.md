# Session 14 - Défi

Connexion enregistre le jeton toute seule : oui

Créer un article répond 201 sans copier le jeton : oui

Le fichier exporté ne contient aucun jeton : oui

**1. Que risquez-vous si le fichier exporté contient un jeton, et comment l'annuler ?**

Si le fichier exporté contient un jeton, n'importe qui peut agir en mon nom tant que le jeton n'est pas révoqué. Pour l'annuler, je peux appeler `/api/logout` avec ce jeton ou supprimer sa ligne dans `personal_access_tokens`.

**2. Pourquoi les écritures de l'API passent-elles par les Form Requests et PostPolicy plutôt que par des règles écrites dans Api\PostController ?**

Les Form Requests permettent de centraliser la validation des données. La PostPolicy centralise les règles d'autorisation. Ainsi, le site et l'API utilisent les mêmes règles et ne risquent pas de se contredire.