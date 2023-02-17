<?php
$table = "Admin";
$stable = lcfirst($table);
$row = $$table->find($_GET['id']);
$pr = unserialize($row['pr']);
?>
<h2 class="ct">修改管理權限</h2>
<!-- form>table.all>tr*3>td.tt.ct+td.pp -->
<form action="./api/reg.php" method="post">
    <table class="all">
        <tr>
            <td class="tt ct">帳號</td>
            <td class="pp"><input type="text" name="acc" value="<?= $row['acc']; ?>"></td>
        </tr>
        <tr>
            <td class="tt ct">密碼</td>
            <td class="pp"><input type="password" name="pw" value="<?= $row['pw']; ?>"></td>
        </tr>
        <tr>
            <td class="tt ct">權限</td>
            <td class="pp">
                <div><input type="checkbox" name="pr[]" id="" value="1" <?= in_array(1, $pr) ? 'checked' : ''; ?>>商品分類與管理</div>
                <div><input type="checkbox" name="pr[]" id="" value="2" <?= in_array(2, $pr) ? 'checked' : ''; ?>>訂單管理</div>
                <div><input type="checkbox" name="pr[]" id="" value="3" <?= in_array(3, $pr) ? 'checked' : ''; ?>>會員管理</div>
                <div><input type="checkbox" name="pr[]" id="" value="4" <?= in_array(4, $pr) ? 'checked' : ''; ?>>頁尾版權管理</div>
                <div><input type="checkbox" name="pr[]" id="" value="5" <?= in_array(5, $pr) ? 'checked' : ''; ?>>最新消息管理</div>
            </td>
        </tr>
    </table>
    <div class="ct">
        <input type="hidden" name="id" value="<?= $row['id']; ?>">
        <input type="hidden" name="table" value="<?= $table; ?>">
        <input type="submit" value="修改">
        <input type="reset" value="重置">
    </div>
</form>