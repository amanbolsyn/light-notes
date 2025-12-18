<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $heading ?></title>
</head>
<body>
    <form method = "POST" action = "/register" >
        <label for = "email">Login</label>
        <input id="email" name="email"> <br>
                <a><?= isset($errors['email']) ? $errors['email'] : '' ?></a><br><br>
        <label for = "password">Password</label>
        <input id = "password" name="password"><br>
                <a><?= isset($errors['password']) ? $errors['password'] : '' ?></a><br>
        <button>Register</button>
    </form>
    
</body>
</html>