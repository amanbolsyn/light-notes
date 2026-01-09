<?php

use Core\Session;

Session::destroy();
redirect("/register");