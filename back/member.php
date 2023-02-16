<?php
$table = "Member";
$stable = lcfirst($table);

?>
<h2 class="ct">會員管理</h2>
<form action="./api/add.php" method="post">
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
                <td class="ct"><?= $row['reg_date']; ?></td>
                <td class="ct">
                    <button type="button">修改</button>
                    <button type="button">刪除</button>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div class="ct">
        <input type="submit" value="確認">
        <input type="reset" value="重製">
    </div>
</form>

<script>
    $(".plus")

    $.post('./api/add.php', {}, (chk) => {
        console.log(chk);
    })
</script>