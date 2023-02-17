<?php
$table = "Bottom";
$stable = lcfirst($table);

if (!empty($_POST)) {
    $$table->save(['bottom' => $_POST['bottom'], 'id' => 1]);
}

?>
<h2 class="ct">編輯頁尾版權區</h2>
<form action="?do=<?= $stable; ?>" method="post">
    <table class="all">
        <tr>
            <td class="tt ct">頁尾宣告內容</td>
            <td class="pp"><input type="text" name="bottom" value="<?= $$table->find(1)['bottom']; ?>" style="width:90%"></td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="編輯">
        <input type="reset" value="重製">
    </div>
</form>