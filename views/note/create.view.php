<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $heading ?></title>
</head>
<body>
    <form method = "POST">
        <label for = "body">Description</label><br>
        <textarea id = "body" name = "body"></textarea><br>
        <a><?= isset($errors['message']) ? $errors['message'] : '' ?></a><br>
        <button>Create</button>
    </form>
</body>
</html>