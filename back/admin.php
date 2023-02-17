<?php
$table = "Admin";
$stable = lcfirst($table);
?>
<div class="ct"><button type="" onclick="location.href='?do=new_admin'">新增管理員</button></div>
<form action="./api/add.php" method="post">
    <table class="all">
        <tr class="tt ct">
            <td>帳號</td>
            <td>密碼</td>
            <td>管理</td>
        </tr>
        <?php
        $rows = $Admin->all();
        foreach ($rows as $row) {
        ?>
            <tr class="pp">
                <td class="ct"><?= $row['acc']; ?></td>
                <td class="ct"><?= $row['pw']; ?></td>
                <td class="ct">
                    <?php
                    if ($row['acc'] == 'admin') {
                        echo "此帳號為最高權限";
                    } else {
                    ?>
                        <button type="button" onclick="location.href='?do=edit_admin&id=<?= $row['id']; ?>'">修改</button>
                        <button type="button" onclick="location.href='./api/del.php?table=<?= $table; ?>&id=<?= $row['id']; ?>'">刪除</button>
                    <?php
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div class="ct">
        <button type="button" onclick="location.href='./index.php'">返回</button>
    </div>
</form>

<script>

</script>