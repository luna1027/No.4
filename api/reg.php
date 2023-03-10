<?php
include_once "./base.php";
prr($_POST);
$table = $_POST['table'];
$stable = (lcfirst($table) !== 'products') ? lcfirst($table) : 'th';

unset($_POST['table']);
if (!empty($_FILES['img']['tmp_name'])) {
    move_uploaded_file($_FILES['img']['tmp_name'], '../upload/' . $_FILES['img']['name']);
    $_POST['img'] = $_FILES['img']['name'];
}

if (isset($_POST)) {
    if (isset($_POST['pr'])) {
        $_POST['pr'] = serialize($_POST['pr']);
    }
    if (isset($_POST['total'])) {
        $_POST['cart'] = serialize($_SESSION['cart']);
    }
    
    $$table->save($_POST);
    to("../back.php?do=$stable");
}
