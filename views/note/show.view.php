<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $heading ?></title>
</head>

<body>
    <h1>Show a note</h1>
    <p><?= htmlspecialchars($note['body']) ?></p>
    <a href="/notes"> go back </a><br><br>
    <form method="POST">
        <input hidden name="note_id" value = "<?= $note['note_id'] ?>">
        <input hidden name="__method" value="DELETE">
        <button>Delete</button>
    </form>
</body>

</html>