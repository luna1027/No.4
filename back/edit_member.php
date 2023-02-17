<?php
$table = "Member";
$stable = lcfirst($table);
$row = $$table->find($_GET['id']);
?>
<h2 class="ct">會員編輯</h2>
<form action="./api/reg.php" method="post">
    <!-- table.all>tr*6>td.tt.ct+td.pp>input:text -->
    <table class="all">
        <tr>
            <td class="tt ct">帳號</td>
            <td class="pp"><?= $row['acc']; ?></td>
        </tr>
        <tr>
            <td class="tt ct">密碼</td>
            <td class="pp"><?= str_repeat("*", strlen($row['pw'])); ?></td>
        </tr>
        <tr>
            <td class="tt ct">累積交易額</td>
            <td class="pp"></td>
        </tr>
        <tr>
            <td class="tt ct">姓名</td>
            <td class="pp"><input type="text" class="name" name="name" id="" value="<?= $row['name']; ?>"></td>
        </tr>
        <tr>
            <td class="tt ct">電子信箱</td>
            <td class="pp"><input type="text" class="mail" name="mail" id="" value="<?= $row['mail']; ?>"></td>
        </tr>
        <tr>
            <td class="tt ct">住址</td>
            <td class="pp"><input type="text" class="addr" name="addr" id="" value="<?= $row['addr']; ?>"></td>
        </tr>
        <tr>
            <td class="tt ct">電話</td>
            <td class="pp"><input type="text" class="tel" name="tel" id="" value="<?= $row['tel']; ?>"></td>
        </tr>
    </table>
    <div class="ct">
        <input type="hidden" name="id" value="<?= $row['id']; ?>">
        <input type="hidden" name="table" value="<?= $table; ?>">
        <input type="submit" value="編輯">
        <input type="reset" value="重置">
        <button type="button" onclick="lof('?do=member')">取消</button>
    </div>
</form>