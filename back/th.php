<?php
$table = "Th";
$stable = lcfirst($table);
?>

<h2 class="ct">商品分類</h2>
<div class="ct">
    新增大分類
    <input type="text" class="big" name="big" id="">
    <button onclick="addTh('big')">新增</button>
</div>
<div class="ct">
    新增中分類
    <select name="mid" class="bigList" id=""></select>
    <input type="text" class="mid" name="big" id="">
    <button onclick="addTh('mid')">新增</button>
</div>
<form action="" style="height:301px;overflow:auto;">
    <table class="all">
        <?php
        $rows = $Th->all(['parent' => 0]);
        foreach ($rows as $row) {
        ?>
            <tr class="tt">
                <td><?= $row['name']; ?></td>
                <td class="ct">
                    <button type="button" data-table="<?= $table; ?>" data-id="<?= $row['id']; ?>" onclick="editTh(this)">修改</button>
                    <button type="button" onclick="lof('./api/del.php?table=<?= $table; ?>&id=<?= $row['id']; ?>&parent=<?= $row['id']; ?>')">刪除</button>
                </td>
            </tr>
            <?php
            if ($Th->count(['parent' => $row['id']]) !== 0) { // 先判斷是否有資料再抓，不是因為會不會報錯， //
                $mids = $Th->all(['parent' => $row['id']]); // 而是在回傳32行時資料量會少於直接撈出空陣列 //
                foreach ($mids as $mid) {
            ?>
                    <tr class="pp ct">
                        <td><?= $mid['name']; ?></td>
                        <td class="ct">
                            <button type="button" data-table="<?= $table; ?>" data-id="<?= $mid['id']; ?>" onclick="editTh(this)">修改</button>
                            <button type="button" onclick="lof('./api/del.php?table=<?= $table; ?>&id=<?= $mid['id']; ?>')">刪除</button>
                        </td>
                    </tr>
        <?php
                }
            }
        }
        ?>
    </table>
</form>

<h2 class="ct">商品管理</h2>
<div class="ct">
    <button type="button" onclick="lof('?do=add_product')">新增商品</button>
</div>
<table class="all">
    <tr class="tt ct">
        <td>編號</td>
        <td>商品名稱</td>
        <td>庫存量</td>
        <td>狀態</td>
        <td>操作</td>
    </tr>
    <?php
    $products = $Products->all();
    foreach ($products as $product) {
        $sh = $product['sh'] == 1 ? '販售中' : '已下架';
    ?>
        <tr class="pp ct">
            <td><?= $product['no']; ?></td>
            <td><?= $product['name']; ?></td>
            <td><?= $product['stock']; ?></td>
            <td><?= $sh; ?></td>
            <td class="flexCenterCenter">
                <button class="small_button" type="button" onclick="lof('?do=edit_product&id=<?= $product['id']; ?>')">修改</button>
                <button class="small_button" type="button" onclick="lof('./api/del.php?table=Products&id=<?= $product['id']; ?>')">刪除</button>
                <button class="small_button" type="button" data-table="Products" data-id="<?= $product['id']; ?>" onclick="sh(this,1)">上架</button>
                <button class="small_button" type="button" data-table="Products" data-id="<?= $product['id']; ?>" onclick="sh(this,0)">下架</button>
            </td>
        </tr>
    <?php
    }
    ?>
</table>

<script>
    getTh('big');
    $(".bigList").on("change", function() {
        console.log($(".bigList option:selected").val());
    })
</script>