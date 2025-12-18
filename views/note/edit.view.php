<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $heading ?></title>
</head>

<body>
    <form method="POST" action = "/note" >
        <input hidden name = "__method" value = "PATCH">
        <input hidden name = "id" value="<?= $note['note_id'] ?>">
        <label for="body">Description</label><br>
        <textarea id="body" name="body"  style = "width: 500px; height: 100px;">  <?= htmlspecialchars($note['body']) ?></textarea><br>
        <a><?= isset($errors['message']) ? $errors['message'] : '' ?></a><br>
        <a href = "/notes"> Cancel </a>
        <button>Save</button>
    </form>
    <br><br>

    <a href="/notes"> go back </a><br><br>
</body>

</html>