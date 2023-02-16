<?php
include_once "./base.php";

$table = $_POST['table'];
unset($_POST['table']);
if (isset($_POST)) {
    if (isset($_POST['reg_date'])) {
        $_POST['reg_date'] = date("Y/m/d");
        $$table->save($_POST);
    } elseif (isset($_POST['pr'])) {
        $_POST['pr'] = serialize($_POST['pr']);
        $$table->save($_POST);
        to("../back.php?do=admin");
    }
}
?>