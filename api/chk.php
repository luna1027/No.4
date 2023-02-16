<?php
include_once "./base.php";

$table = $_POST['table'];
unset($_POST['table']);
$stable = lcfirst($table);
if (isset($_POST)) {
    if (!isset($_POST['pw'])) {
        echo $$table->count($_POST);
    } else {
        if ($$table->count($_POST) == 1) {
            $_SESSION[$stable] = $_POST['acc'];
        }
        echo $$table->count($_POST);
    }
}
?>