<?php

namespace Core\Middleware;

use Core\App;


class Authenticator
{

    public function attempt($email, $password)
    {
        $user = App::container()->resolve("Core\Database")
            ->query("select * from users where email = :email", [
                "email" => $email,
            ])->fetch();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['user'] = [
                    "id" => $user['id'],
                ];

                return true;
            }

            return false;
        }
    }
}
