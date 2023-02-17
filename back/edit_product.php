<?php
$table = "Products";
$stable = lcfirst($table);
$row = $$table->find($_GET['id']);
?>
<h2 class="ct">修改商品</h2>
<form action="" method="post" style="height:400px;overflow:auto;" enctype="multipart/form-data">
    <table class="all">
        <tr>
            <td class="tt ct">所屬大分類</td>
            <td class="pp"><select class="bigList" name="big" id=""></select></td>
        </tr>
        <tr>
            <td class="tt ct">所屬中分類</td>
            <td class="pp"><select class="midList" name="mid" id=""></select></td>
        </tr>
        <tr>
            <td class="tt ct">商品編號</td>
            <td class="pp"><?= $row['no']; ?></td>
        </tr>
        <tr>
            <td class="tt ct">商品名稱</td>
            <td class="pp"><input type="text" name="name" id="" value="<?= $row['name']; ?>"></td>
        </tr>
        <tr>
            <td class="tt ct">商品價格</td>
            <td class="pp"><input type="text" name="price" id="" value="<?= $row['price']; ?>"></td>
        </tr>
        <tr>
            <td class="tt ct">規格</td>
            <td class="pp"><input type="text" name="spec" id="" value="<?= $row['spec']; ?>"></td>
        </tr>
        <tr>
            <td class="tt ct">庫存量</td>
            <td class="pp"><input type="text" name="stock" id="" value="<?= $row['stock']; ?>"></td>
        </tr>
        <tr>
            <td class="tt ct">商品圖片</td>
            <td class="pp"><input type="file" name="img" id="" value="<?= $row['img']; ?>"></td>
        </tr>
        <tr>
            <td class="tt ct">商品介紹</td>
            <td class="pp"><textarea name="intro" id="" cols="30" rows="10"><?= $row['intro']; ?></textarea></td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="修改">
        <input type="reset" value="重置">
        <button type="button" onclick="history.go(-1)">返回</button>
    </div>
</form>

<script>
    getTh('big');
    console.log($(".bigList option:selected").val());
    getTh('mid');
</script>