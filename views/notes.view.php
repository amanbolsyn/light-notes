<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $heading ?></title>
</head>
<body>
    <h1>Show notes</h1>

    <?php foreach($notes as $note): ?>
        <a href = "/note?id=<?= $note['note_id'] ?>" > <?= htmlspecialchars( $note['body']) ?> </a><br>
    <?php endforeach; ?>

    <br>
    <a href = "/note/create" >Create a note</a>
</body>
</html>