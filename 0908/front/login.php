<fieldset>
    <legend>會員登入</legend>
    <table class="tab">
        <tr>
            <td class="clo">帳號</td>
            <td><input type="text" name="name" id="name"></td>
        </tr>
        <tr>
            <td class="clo">密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
    </table>
    <div class="cent">
        <button onclick="login()">登入</button>
        <button onclick="location.reload();">清除</button>
        <div style="float: right;">
            <a href="?do=forgot">忘記密碼</a>|<a href="?do=reg">尚未註冊</a>
        </div>
    </div>
</fieldset>
<script>
    function login() {
        $.post("./api/chkAcc.php", {
            name: $("#name").val(),

        }, (res) => {

            if (parseInt(res) > 0) {
                console.log(res);
                $.post("./api/chkPw.php", {
                    name: $("#name").val(),
                    pw: $("#pw").val(),
                }, (res) => {
                    if (parseInt(res) > 0) {
                        alert("歡迎登入");
                        if ($("#name").val() == 'admin') {
                            location.href = "admin.php";
                        } else {
                            location.href = "index.php";
                        }
                    } else {
                        alert("密碼錯誤");

                    }
                })

            } else {
                alert("查無帳號");
                location.reload();
            }
        })
    }
</script>