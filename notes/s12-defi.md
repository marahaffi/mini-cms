
# Défi Session 12 — Gestion des rôles

## 1. Pourquoi `role` n'est-il pas dans `#[Fillable]` et comment le contrôleur peut-il quand même le modifier ?

L'attribut `role` n'est pas dans `#[Fillable]` pour éviter qu'un utilisateur puisse modifier son rôle lors d'une affectation de masse et obtenir des privilèges administrateur.

Le contrôleur peut quand même modifier le rôle en affectant directement la valeur à l'attribut :

```php
$user->role = 'admin';
$user->save();
```

Cette affectation directe ne passe pas par l'affectation de masse.

## 2. Pourquoi `Gate::before` doit-il retourner `null` et non `false` pour un auteur ?

`null` signifie que `Gate::before` ne prend pas de décision et laisse Laravel continuer la vérification normale des autorisations avec les Gates ou les Policies.

En revanche, `false` refuse directement l'autorisation et empêche la vérification normale.
