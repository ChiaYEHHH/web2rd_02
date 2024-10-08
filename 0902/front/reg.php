<fieldset style="width: 60%; margin:50px auto">
    <legend>會員註冊</legend>
    <table class="tab cent">
        <tr>
            <td class="clo" style="width:60%">Step1:登入帳號</td>
            <td><input type="text" name="name" id="name"></td>
        </tr>
        <tr>
            <td class="clo" style="width:60%">Step2:登入密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td class="clo" style="width:60%">Step3:再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td class="clo" style="width:60%">Step4:信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
    </table>
    <div>
        <div class="ct cent">
            <button onclick="reg()">註冊</button>
            <button onclick="clean()">清除</button>
        </div>
    </div>
</fieldset>
<script>
    function reg() {
        let user = {
            name: $("#name").val(),
            pw: $("#pw").val(),
            pw2: $("#pw2").val(),
            email: $("#email").val(),
        };
        if (user.name == '' || user.pw == '' || user.pw2 == '' || user.email == '') {
            alert("不可空白");
            location.reload();
        } else if (user.pw != user.pw2) {
            alert("密碼錯誤");
            location.reload();
        } else {
            $.post("./api/reg.php",
                user, (res) => {
                    if (res >= 1) {
                        alert("帳號重複");
                        location.reload();
                    } else {
                        alert("註冊完成，歡迎加入");
                        location.href = "?do=login";
                    }
                })
        }

    }
</script>