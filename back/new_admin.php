<?php
$table = "Admin";
$stable = lcfirst($table);
?>
<h2 class="ct">新增管理帳號</h2>
<!-- form>table.all>tr*3>td.tt.ct+td.pp -->
<form action="./api/reg.php" method="post">
    <table class="all">
        <tr>
            <td class="tt ct">帳號</td>
            <td class="pp"><input class="acc" type="text" name="acc"></td>
        </tr>
        <tr>
            <td class="tt ct">密碼</td>
            <td class="pp"><input class="pw" type="password" name="pw"></td>
        </tr>
        <tr>
            <td class="tt ct">權限</td>
            <td class="pp">
                <div><input type="checkbox" name="pr[]" id="" value="1">商品分類與管理</div>
                <div><input type="checkbox" name="pr[]" id="" value="2">訂單管理</div>
                <div><input type="checkbox" name="pr[]" id="" value="3">會員管理</div>
                <div><input type="checkbox" name="pr[]" id="" value="4">頁尾版權管理</div>
                <div><input type="checkbox" name="pr[]" id="" value="5">最新消息管理</div>
            </td>
        </tr>
    </table>
    <div class="ct">
        <input type="hidden" name="table" value="<?= $table; ?>">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>