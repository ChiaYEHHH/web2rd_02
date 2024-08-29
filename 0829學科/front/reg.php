<fieldset class="cent" style="width:60%;margin:20px auto;">
    <legend>會員註冊</legend>
    <table class="tab cent">
        <div class="ct" style="font-size: 18px;color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</div>
        <tr>
            <td width="50%" class="clo">帳號 : </td>
            <td><input type="text" name="name" id="name"></td>
        </tr>
        <tr>
            <td class="clo">密碼 : </td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td class="clo">確認密碼 : </td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td class="clo">信箱 : </td>
            <td><input type="password" name="email" id="email"></td>
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
            name: $("#name").val(),
            pw: $("#pw").val(),
            pw2: $("#pw2").val(),
            email: $("#email").val(),
        }

        if (user.name == '' || user.pw == '' || user.pw2 == '' || user.email == '') {
            alert("不可空白");
            location.reload();
        } else if (user.pw != user.pw2) {
            alert("密碼錯誤");
            location.reload();
        } else {
            $.post("./api/reg.php",
                user, (res) => {
                    alert(res);
                    location.href = "./?do=login";
                })
        }
    }
</script>