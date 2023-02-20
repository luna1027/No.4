<?php
$user = $Member->find(['acc' => $_SESSION['member']]);
?>

<h2 class="ct">填寫資料</h2>
<form action="">
    <table class="all">
        <tr>
            <td class="ct tt">登入帳號</td>
            <td class="pp" colspan="4"><?= $user['acc']; ?></td>
            <input type="hidden" class="acc" value="<? $_SESSION['member']; ?>">
        </tr>
        <tr>
            <td class="ct tt">姓名</td>
            <td class="pp" colspan="4"><input type="text" name="name" value="<?= $user['name']; ?>"></td>
        </tr>
        <tr>
            <td class="ct tt">電子信箱</td>
            <td class="pp" colspan="4"><input type="text" name="name" value="<?= $user['mail']; ?>"></td>
        </tr>
        <tr>
            <td class="ct tt">聯絡地址</td>
            <td class="pp" colspan="4"><input type="text" name="name" value="<?= $user['addr']; ?>"></td>
        </tr>
        <tr>
            <td class="ct tt">連絡電話</td>
            <td class="pp" colspan="4"><input type="text" name="name" value="<?= $user['tel']; ?>"></td>
        </tr>
        <tr class="tt ct">
            <td>商品名稱</td>
            <td>編號</td>
            <td>數量</td>
            <td>單價</td>
            <td>小計</td>
        </tr>
        <?php
        $sum = 0;
        foreach ($_SESSION['cart'] as $key => $value) {
            $row = $Products->find($key);
        ?>
            <tr class="pp ct">
                <td><?= $row['name']; ?></td>
                <td><?= $row['no']; ?></td>
                <td><?= $value['qt']; ?></td>
                <td><?= $row['price']; ?></td>
                <td><?= $value['qt'] * $row['price']; ?></td>
            </tr>
        <?php
            $sum += $value['qt'] * $row['price'];
        }
        ?>
        <tr class="ct tt">
            <td colspan="5">
                總價 :&nbsp;<?= $sum; ?>
            </td>
        </tr>
    </table>
    <div class="ct">
        <button type="button">確定送出</button>
        <button type="button" onclick="lof('?do=buycart')">返回修改訂單</button>
    </div>
</form>