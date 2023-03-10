<?php
$table = "Member";
$stable = lcfirst($table);
?>
<h2 class="ct">會員管理</h2>
<form action="./api/reg.php" method="post">
    <table class="all">
        <tr class="tt ct">
            <td>姓名</td>
            <td>會員帳號</td>
            <td>註冊日期</td>
            <td>操作</td>
        </tr>
        <?php
        $rows = $Member->all();
        foreach ($rows as $row) {
        ?>
            <tr class="pp">
                <td class="ct"><?= $row['name']; ?></td>
                <td class="ct"><?= $row['acc']; ?></td>
                <td class="ct"><?= str_replace("-", "/", $row['reg_date']); ?></td>
                <td class="ct">
                    <button type="button" onclick="location.href='?do=edit_member&id=<?= $row['id']; ?>'">修改</button>
                    <button type="button" onclick="lof('./api/del.php?table=<?= $table; ?>&id=<?= $row['id']; ?>')">刪除</button>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</form>