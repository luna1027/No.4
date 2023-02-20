<?php
$row = $Products->find($_GET['id']);
$type = $Th->find($row['big'])['name'];
$type .= ">";
$type .= $Th->find($row['mid'])['name'];
?>
<h2 class="ct"><?= $row['name']; ?></h2>
<div class="all">
    <div class=" pp flexCenterCenter bor-wh">
        <div class="flexCenterCenter" style="width:60%; "><img style="object-fit: cover;width:90%" src="./upload/<?= $row['img']; ?>" alt=""></div>
        <div style="width:40%;">
            <div class="bor-wh">分類 :<?= $type; ?></div>
            <div class="bor-wh">編號 :<?= $row['no']; ?></div>
            <div class="bor-wh">價格 :<?= $row['price']; ?> </div>
            <div class="bor-wh">詳細說明 :<br><?= nl2br($row['intro']); ?></div>
            <div class="bor-wh">庫存量 :<?= $row['stock']; ?></div>
        </div>
    </div>
    <div class="tt ct bor-wh">
        購買數量
        <input type="number" class="qt" name="qt" value="1">
        <img src="./icons/0402.jpg" alt="" onclick="buyCart()">
    </div>
</div>
<div class="ct"><button type="button" onclick="history.go(-1)">返回</button></div>

<script>
    function buyCart() {
        let qt = $(".qt").val();
        lof(`?do=buycart&id=<?= $row['id']; ?>&qt=${qt}`);
    }
</script>