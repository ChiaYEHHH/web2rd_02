<fieldset style="width: 50%; margin:50px auto">
    <legend>會員登入</legend>
    <table class="tab cent">
        <tr>
            <td class="clo" style="width:40%">帳號:</td>
            <td><input type="text" name="name" id="name"></td>
        </tr>
        <tr>
            <td class="clo" style="width:40%">密碼:</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
    </table>
    <div>
        <div>
            <button onclick="login()">登入</button>
            <button onclick="clear()">清除</button>
            <div style="float: right;">
                <a href="?do=forgot">忘記密碼</a>
                <a href="?do=reg">尚未註冊</a>
            </div>
        </div>
    </div>
</fieldset>

<script>
    function login() {


        $.post("./api/chk_name.php", {
            name: $("#name").val(),
            // pw: $("#pw").val(),
        }, (res) => {
            if (res >= 1) {
                $.post("./api/chk_pw.php", {
                    name: $("#name").val(),
                    pw: $("#pw").val(),
                }, (res) => {
                    if (res >= 1) {
                        if ($("#name").val() == 'admin') {
                            alert("歡迎登入");
                            location.href = "admin.php";
                        } else {
                            alert("歡迎登入");
                            location.href = "index.php";
                        }
                    } else {
                        alert("密碼錯誤");
                        location.reload();
                    }
                })
            } else {
                alert("查無帳號");
                location.reload();
            }


        })
    }
</script>