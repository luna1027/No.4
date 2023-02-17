<?php
$table = "Products";
$stable = lcfirst($table);
?>
<h2 class="ct">新增商品</h2>
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
            <td class="pp">完成分類後自動分配</td>
        </tr>
        <tr>
            <td class="tt ct">商品名稱</td>
            <td class="pp"><input type="text" class="name" name="name" id=""></td>
        </tr>
        <tr>
            <td class="tt ct">商品價格</td>
            <td class="pp"><input type="number" class="price" name="price" id=""></td>
        </tr>
        <tr>
            <td class="tt ct">規格</td>
            <td class="pp"><input type="text" class="spec" name="spec" id=""></td>
        </tr>
        <tr>
            <td class="tt ct">庫存量</td>
            <td class="pp"><input type="number" class="stock" name="stock" id=""></td>
        </tr>
        <tr>
            <td class="tt ct">商品圖片</td>
            <td class="pp"><input type="file" class="img" name="img" id=""></td>
        </tr>
        <tr>
            <td class="tt ct">商品介紹</td>
            <td class="pp"><textarea class="intro" name="intro" id="" cols="30" rows="10"></textarea></td>
        </tr>
    </table>
    <div class="ct">
        <input type="hidden" class="table" name="table" value="<?= $table; ?>">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
        <button type="button">返回</button>
    </div>
</form>

<script>
    getTh('big');
    $(".bigList").on("change", function() {
        getTh('mid');
    })

    $("form").submit(function(e) {
        e.preventDefault();
        let all = new FormData(this);
        console.log($(".img")[0].files[0]);
        all.append('img', $(".img")[0].files[0]);
        all.append('no', (Math.random() * 1000000).toFixed(0));
        console.log(all);
        $.ajax({
            type: 'post',
            url: './api/reg.php',
            data: all,
            cache: false,
            processData: false,
            contentType: false,
            success: function() {
                lof('?do=th');
            },
            error: function() {
                console.log(error);
            }
        })
    })
</script>