<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue - Mini-CMS</title>
    <style>
        body {
            font-family: system-ui, sans-serif;
            max-width: 40rem;
            margin: 3rem auto;
            padding: 0 1rem;
            color: #1f2937;
            line-height: 1.6;
        }

        h1 {
            color: #e6291b;
        }
    </style>
</head>
<body>
    <h1>Bienvenue sur Mini-CMS</h1>

    <p>Étudiant : {{ $etudiant }}</p>
    <p>Groupe : {{ $groupe }}</p>
    <p>Cours : {{ $cours }}</p>

    <p>
        <a href="/">Accueil</a> |
        <a href="/a-propos">À propos</a>
    </p>
</body>
</html>