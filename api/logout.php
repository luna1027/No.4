<?php
include_once "./base.php";
session_destroy();
unset($_SESSION[$_GET['table']]);
to('../index.php');
?>