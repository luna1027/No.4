<?php
if (!isset($_GET['id'])) {
    to('?do=order');
} else {
    $row = $Orders->find($_GET['id']);
    $sum = 0;
    $carts = unserialize($row['cart']);
?>
    <h2 class="ct">訂單編號<span style="color:red;"> <?= $row['no']; ?> </span>的詳細資料</h2>
    <form action="">
        <table class="width100">
            <tr>
                <td class="ct tt">登入帳號</td>
                <td class="pp" colspan="4"><?= $row['acc']; ?></td>
            </tr>
            <tr>
                <td class="ct tt">姓名</td>
                <td class="pp" colspan="4"><?= $row['name']; ?></td>
            </tr>
            <tr>
                <td class="ct tt">電子信箱</td>
                <td class="pp" colspan="4"><?= $row['mail']; ?></td>
            </tr>
            <tr>
                <td class="ct tt">聯絡地址</td>
                <td class="pp" colspan="4"><?= $row['addr']; ?></td>
            </tr>
            <tr>
                <td class="ct tt">連絡電話</td>
                <td class="pp" colspan="4"><?= $row['tel']; ?></td>
            </tr>
            <tr class="tt ct">
                <td>商品名稱</td>
                <td>編號</td>
                <td>數量</td>
                <td>單價</td>
                <td>小計</td>
            </tr>
            <?php
            foreach ($carts as $key => $value) {
                $row = $Products->find($key);
            ?>
                <tr class="pp ct">
                    <td><?= $row['name']; ?></td>
                    <td><?= $row['no']; ?></td>
                    <td><?= $value['qt']; ?></td>
                    <td><?= $row['price']; ?></td>
                    <td><?= $row['price'] * $value['qt']; ?></td>

                <?php
                $sum += $row['price'] * $value['qt'];
            }
                ?>
                <tr class="ct tt">
                    <td colspan="5">
                        總價 :&nbsp;<?= $sum; ?>
                    </td>
                </tr>
        </table>
        <div class="ct">
            <button type="button" onclick="lof('?do=order')">返回</button>
        </div>
    </form>
<?php
}
?>