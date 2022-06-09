<?php

session_start();

unset($_SESSION['user']);

session_destroy();

header("Location: /shop2/index.php");