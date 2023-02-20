<?php
if (!isset($_SESSION['member'])) {
    to('./index.php?do=login');
} else {
?>
    <h2 class="ct"><?= $_SESSION['member']; ?>的購物車</h2>
    <form action="" method="post">
        <table class="width100">
            <tr class="tt ct">
                <td>編號</td>
                <td>商品名稱</td>
                <td>數量</td>
                <td>庫存量</td>
                <td>單價</td>
                <td>小計</td>
                <td>刪除</td>
            </tr>
            <?php
            if (isset($_GET['id'])) {
                // $_SESSION['cart'][$_GET['id']] = [];
                $_SESSION['cart'][$_GET['id']] = ['qt' => $_GET['qt']];
            }

            if (!isset($_SESSION['cart'])) {
                echo "<div class='ct'>快去買東西</div>";
            } else {

                foreach ($_SESSION['cart'] as $key => $value) {
                    $row = $Products->find($key);
            ?>
                    <tr class="pp ct">
                        <td><?= $row['no']; ?></td>
                        <td><?= $row['name']; ?></td>
                        <td> <?= $value['qt']; ?> </td>
                        <td><?= $row['stock']; ?></td>
                        <td><?= $row['price']; ?></td>
                        <td><?= $value['qt'] * $row['price']; ?></td>
                        <td><img src="./icons/0415.jpg" alt="" onclick="delSess(<?= $row['id']; ?>,this)"></td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
        <div class="ct flexCenterCenter">
            <div class="pd"><img src="./icons/0411.jpg" alt="" onclick="lof('?do=main')"></div>
            <div class="pd"><img src="./icons/0412.jpg" onclick="lof('?do=buylist')"></div>

        </div>
    </form>
<?php
}
?>