<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $heading ?></title>
</head>
<body>
    <form method = "POST" action = "/login" >
        <label for = "email">Login</label>
        <input id="email" name="email" value="<?=  old('email')  ?>"> <br>
                <a><?= isset($errors['email']) ? $errors['email'] : '' ?></a><br><br>
        <label for = "password">Password</label>
        <input id = "password" name="password"><br>
                <a><?= isset($errors['password']) ? $errors['password'] : '' ?></a><br>
        <button>Log in</button>
    </form><br>

    <a href = "/register">Register</a>
    
</body>
</html>