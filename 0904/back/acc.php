<fieldset>
    <legend>帳號管理</legend>
    <form action="./api/acc_del.php" method="post">
        <table class="tab" style="text-align:center">
            <tr class="clo">
                <td>帳號</td>
                <td>密碼</td>
                <td>刪除</td>
            </tr>
            <?php
            $rows = $User->all();
            foreach ($rows as $row):
            ?>
                <tr>
                    <td><?=$row['name']?></td>
                    <td><?= str_repeat("*",strlen($row['pw'])); ?></td>
                    <td><input type="checkbox" name="del[]" value="<?=$row['id']?>"></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <div class="ct cent">
            <button type="submit">確定刪除</button>
            <button type="reset">清空選取</button>
        </div>
    </form>
</fieldset>
<fieldset>
    <legend>新增會員</legend>
    <div class="cent ct" style="color: red;">*請設定您要註冊的帳號及密碼(最常12個字元)</div>
    <table class="tab">
        <tr>
            <td class="clo">Step1:登入帳號</td>
            <td><input type="text" name="name" id="name"></td>
        </tr>
        <tr>
            <td class="clo">Step2:登入密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td class="clo">Step3:再次確認</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td class="clo">Step4:信箱(忘記密碼時確認)</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
    </table>
    <div class="cent ct">
        <button onclick="reg()">註冊</button>
        <button onclick="clean()">清除</button>
    </div>
</fieldset>
<script>
    function reg() {
        let acc = {
            name: $("#name").val(),
            pw: $("#pw").val(),
            pw2: $("#pw2").val(),
            email: $("#email").val(),
        }
        if (acc.name == '' || acc.pw == '' || acc.pw2 == '' || acc.email == '') {
            alert("不可空白");
            location.reload();
        } else if (acc.pw != acc.pw2) {
            alert("密碼錯誤");
            location.reload();
        } else {
            $.post("./api/chk_acc.php", acc, (res) => {
                if (res > 0) {
                    alert("帳號重複");
                    location.reload();
                } else {
                    $.post("./api/reg.php", acc, () => {
                        alert("歡迎加入");
                        location.href = "?do=acc";
                    })
                }
            })


            // $.post("./api/reg.php", acc, (res) => {
            //     if (res > 0) {
            //         alert("歡迎加入");
            //         location.href = "?do=login";
            //     } else {
            //         alert("帳號重複");
            //         location.reload();
            //     }
            // })
        }
    }
</script>