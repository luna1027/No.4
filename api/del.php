<?php
include_once "./base.php";

if (!isset($_GET['table'])) {
    // prr($_POST);
    unset($_SESSION['cart'][$_POST['id']]);
} else {

    $table = $_GET['table'];
    $stable = (lcfirst($table) !== 'products') ? lcfirst($table) : 'th';
    if (isset($_GET)) {
        if (isset($_GET['parent'])) {
            $$table->del(['parent' => $_GET['parent']]);
        }
        $$table->del($_GET['id']);
    }

    to("../back.php?do=$stable");
}
