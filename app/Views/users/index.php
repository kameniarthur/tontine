<!DOCTYPE html>
<html>

<head>
    <title>Utilisateurs</title>
</head>

<body>
    <h1>Liste des utilisateurs</h1>
    <form method="POST" action="/users">
        <input type="text" name="name" placeholder="Nom">
        <input type="email" name="email" placeholder="Email">
        <button type="submit">Ajouter</button>
    </form>
    <ul>
        <?php foreach ($users as $user): ?>
            <li><?= $user->name ?> (<?= $user->email ?>)</li>
        <?php endforeach; ?>
    </ul>
</body>

</html>