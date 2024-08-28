<fieldset width="80%">
    <legend>帳號管理</legend>

    <table class="ct" width="80%">
        <tr>
            <td class='clo'>帳號</td>
            <td class='clo'>密碼</td>
            <td class='clo'>刪除</td>
        </tr>
        <?php
        $user = $User->all();
        // dd($user);
        foreach ($user as $u):
        ?>
            <tr>
                <td><?= $u['acc']; ?></td>
                <td><?= str_repeat("*", strlen($u['pw'])); ?></td>
                <td><input type="checkbox" name="del" value="<?= $u['id'] ?>"></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div class="ct">
        <button onclick="del()">確定刪除</button>
        <button onclick="clear()">清空選取</button>
    </div>
</fieldset>
<fieldset>
    <legend>新增會員</legend>
    <div class="ct" style="color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</div>
    <table class="cent" width="80%">
        <tr>
            <td class="clo">Step 1: 登入帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td class="clo">Step 2: 登入密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td class="clo">Step 3: 確認密碼</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td class="clo">Step 4: 信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
    </table>
    <div class="ct">
        <button onclick="reg()">註冊</button>
        <button onclick="clear()">清除</button>
    </div>

</fieldset>
<script>
    function reg() {
        let user = {
            acc: $("#acc").val(),
            pw: $("#pw").val(),
            pw2: $("#pw2").val(),
            email: $("#email").val(),
        }

        if (user.acc == '' || user.pw == '' || user.pw2 == '' || user.email == '') {
            alert("不可空白")
        } else if (user.pw != user.pw2) {
            alert("密碼錯誤")
        } else {
            $.post('./api/chk_acc.php', {
                acc: user.acc
            }, (chk) => {
                if (chk == 1) {
                    alert("帳號重複")
                } else {
                    $.post("./api/reg.php",
                        user, () => {
                            location.reload();
                        }
                    )
                }

            })
        }
    }

    function del() {
        let chks = $("input[type='checkbox']:checked")
        let ids = new Array();
        if (chks.length > 0) {
            for (let i = 0; i < chks.length; i++) {
                ids.push(chks[i].value)
            }
            console.log(ids);

            $.post("./api/del.php", {
                ids
            }, () => {
                location.reload();
            })
        } else {
            alert("沒有帳號要刪除")
        }
    }
</script>