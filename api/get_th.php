<?php
include_once "./base.php";

$table = $_POST['table'];
unset($_POST['table']);
$stable = lcfirst($table);
if (isset($_POST)) {
    $rows = $$table->all(['parent' => $_POST['parent']]);
    echo json_encode($rows);
}
?>