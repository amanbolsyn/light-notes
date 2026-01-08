<?php

use core\Middleware\Session;

Session::destroy();
redirect("/register");