<?php
if (isset($_GET['th']) && $_GET['th'] != 0) {
    $th = $Th->find($_GET['th']);
    if ($th['parent'] == 0) {
        $nav = $th['name'];
        $rows = $Products->all(['sh' => 1, 'big' => $th['id']]);
        // prr($rows);
    } else {
        $big = $Th->find($th['parent']);
        $nav = $big['name'] . ">" . $th['name'];
        $rows = $Products->all(['sh' => 1, 'mid' => $th['id']]);
        // prr($rows);
    }
} else {
    $nav = '全部商品';
    $rows = $Products->all(['sh' => 1]);
}

?>
<h2><?= $nav; ?></h2>
<div class="all ">
    <?php
    foreach ($rows as $row) {
    ?>
        <div class="flexCenterCenter pp bor-wh">
            <div style="width: 35%;box-sizing:border-box;" class="flexCenterCenter pp ct">
                <a href="?do=detail&id=<?= $row['id']; ?>">
                    <img style="object-fit:cover; width:90%; " src="./upload/<?= $row['img']; ?>" alt="">
                </a>
            </div>
            <div style="width: 65%;box-sizing:border-box">
                <div class="pd ct tt bor-wh bor-bt-none bor-tp-none"><?= $row['name']; ?> </div>
                <div class="pd pp bor-wh bor-bt-none">價錢 : <?= $row['price']; ?><a href="?do=detail&id=<?= $row['id']; ?>" style="float: right;"><img src="./icons/0402.jpg" alt=""></a></div>
                <div class="pd pp bor-wh bor-bt-none">規格 : <?= $row['spec']; ?></div>
                <div class="pd pp bor-wh bor-bt-none single-ellipsis">簡介 : <?= $row['intro']; ?></div>
            </div>
        </div>
    <?php
    }
    ?>
</div>