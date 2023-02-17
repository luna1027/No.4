<?php
include_once "./base.php";

$table = $_GET['table'];
$stable = (lcfirst($table) !== 'products') ? lcfirst($table) : 'th';
if (isset($_GET)) {
    if (isset($_GET['parent'])) {
        $$table->del(['parent' => $_GET['parent']]);
    }
    $$table->del($_GET['id']);
}

to("../back.php?do=$stable");
?>