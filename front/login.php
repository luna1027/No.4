<h2 class="">第一次購物</h2>
<a href="?do=reg"><img src="./icons/0413.jpg" alt=""></a>
<h2 class="">會員登入</h2>
<form action="" method="post">
    <table class="all">
        <tr>
            <td class="tt ct">帳號</td>
            <td class="pp"><input type="text" class="acc" name="acc"></td>
        </tr>
        <tr>
            <td class="tt ct">密碼</td>
            <td class="pp"><input type="password" class="pw" name="pw"></td>
        </tr>
        <tr>
            <td class="tt ct">驗證碼</td>
            <td class="pp">
                <?php
                $a = rand(10, 99);
                $b = rand(10, 99);
                $_SESSION['plus'] = $a + $b;
                echo $a . '+' . $b . '=';
                ?>
                <input type="number" class="count" name="">
            </td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="確認">
        <input type="reset" value="重製">
    </div>
</form>

<script>
    $("form").submit(function(e) {
        e.preventDefault();
        chk();
    })

    function chk() {
        if (<?= $_SESSION['plus']; ?> !== $(".count").val() * 1) {
            alert("驗證碼錯誤");
        } else {
            console.log('ok');
            let acc = $(".acc").val();
            let pw = $(".pw").val();
            let table = 'Member';
            $.post('./api/chk.php', {
                acc,
                pw,
                table
            }, (chk) => {
                if (parseInt(chk)) {
                    alert("登入成功");
                    location.href = "?do=main";
                } else {
                    alert("帳號或密碼錯誤");
                }
                console.log(chk);
            })
        }
    }
</script>