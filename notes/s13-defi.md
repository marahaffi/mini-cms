
# Session 13 - Défi

/api/posts/3 affiche tags avec des noms : oui
/api/posts ne contient aucun body, /api/posts/3 en contient un : oui
Aucune LazyLoadingViolationException : oui

## Question 1

Pourquoi ne pas envoyer body dans la liste, et qui en profite ?

On ne renvoie pas le body dans la liste pour réduire la taille de la réponse JSON et éviter de transférer des données inutiles. Cela permet d'économiser la bande passante et d'améliorer les performances. Les applications clientes, notamment les applications mobiles et les utilisateurs avec une connexion lente, en profitent.

## Question 2

Un brouillon renvoie 403. Quel avantage aurait un 404 pour un brouillon ?

Un code 404 permettrait de cacher l'existence du brouillon. Ainsi, un utilisateur non autorisé ne pourrait pas savoir si l'article existe réellement ou s'il est inexistant. Cela améliore la confidentialité et limite la découverte des ressources privées.
