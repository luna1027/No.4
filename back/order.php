<?php
$rows = $Orders->all();
?>
<h2 class="ct">訂單管理</h2>
<form action="" method="post">
    <table class="width100">
        <tr class="ct tt">
            <td>訂單編號</td>
            <td>金額</td>
            <td>會員帳號</td>
            <td>姓名</td>
            <td>下單時間</td>
            <td>操作</td>
        </tr>
        <?php
        foreach ($rows as  $row) {
        ?>
            <tr class="ct pp">
                <td><a href="?do=orderlist&id=<?= $row['id']; ?>"><?= $row['no']; ?></a></td>
                <td><?= $row['total']; ?></td>
                <td><?= $row['acc']; ?></td>
                <td><?= $row['name']; ?></td>
                <td><?= $row['ord_date']; ?></td>
                <td>
                    <button type="button" onclick="del('Orders',<?= $row['id']; ?>)">刪除</button>
                </td>
            </tr>
        <?php
        }

        ?>
    </table>
</form>