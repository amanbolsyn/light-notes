<?php

namespace Core\Middleware; 

class Guest
{
    public function handle()
    {
        if (!empty($_SESSION['user'])) {
            header("location: /notes");
            exit();
        }
    }
}
