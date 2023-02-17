<?php
$table = "Member";
$stable = lcfirst($table);

// if (!empty($_POST)) {
//     $$table->save(['bottom' => $_POST['bottom'], 'id' => 1]);
// }

?>
<h2 class="ct">會員註冊</h2>
<form action="" method="post">
    <!-- table.all>tr*6>td.tt.ct+td.pp>input:text -->
    <table class="all">
        <tr>
            <td class="tt ct">姓名</td>
            <td class="pp"><input type="text" class="name" name="name" id=""></td>
        </tr>
        <tr>
            <td class="tt ct">帳號</td>
            <td class="pp"><input type="text" class="acc" name="acc" id="" require><button type="button" class="check">檢測帳號</button></td>
        </tr>
        <tr>
            <td class="tt ct">密碼</td>
            <td class="pp"><input type="password" class="pw" name="pw" id=""></td>
        </tr>
        <tr>
            <td class="tt ct">電話</td>
            <td class="pp"><input type="text" class="tel" name="tel" id=""></td>
        </tr>
        <tr>
            <td class="tt ct">住址</td>
            <td class="pp"><input type="text" class="addr" name="addr" id=""></td>
        </tr>
        <tr>
            <td class="tt ct">電子信箱</td>
            <td class="pp"><input type="text" class="mail" name="mail" id=""></td>
        </tr>
    </table>
    <div class="ct">
        <input type="hidden" name="table" value="<?= $table; ?>">
        <input type="submit" value="註冊">
        <input type="reset" value="重製">
    </div>
</form>

<script>
    $(".check").on("click", function() {
        chkAcc();
    })

    $("form").submit(function(e) {
        e.preventDefault();
        reg();
    })

    function chkAcc() {
        let acc = $(".acc").val();
        let table = 'Member';
        $.post('./api/chk.php', {
            acc,
            table
        }, (res) => {
            console.log(res);
            if (parseInt(res) || acc == 'admin') {
                alert("此帳號已存在");
                $(".acc").css('background', 'pink');
            } else {
                alert("此帳號可使用");
                $(".acc").css('background', '#F3F3F3');
            }
        })
    }

    function reg() {
        let mem = {
            name: $(".name").val(),
            acc: $(".acc").val(),
            pw: $(".pw").val(),
            tel: $(".tel").val(),
            addr: $(".addr").val(),
            mail: $(".mail").val(),
            table: 'Member'
        }
        let acc = $(".acc").val();
        let table = 'Member';
        $.post('./api/chk.php', {
            acc,
            table
        }, (res) => {
            console.log(res);
            if (parseInt(res) || acc == 'admin') {
                alert("此帳號已存在");
                $(".acc").css('background', 'pink');
            } else {
                $.post('./api/reg.php', mem, (chk) => {
                    console.log(chk);
                    alert("註冊成功");
                    location.href = '?do=login';
                })
            }
        })
    }
</script>