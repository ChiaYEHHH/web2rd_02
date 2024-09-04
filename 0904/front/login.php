<fieldset>
    <legend>會員登入</legend>
    <table class="tab">
        <tr>
            <td class="clo">帳號</td>
            <td><input type="text" name="name" id="name"></td>
        </tr>
        <tr>
            <td class="clo">密碼</td>
            <td><input type="text" name="pw" id="pw"></td>
        </tr>
    </table>
    <div>
        <button onclick="login()">登入</button>
        <button onclick="clean()">清除</button>
        <div style="float: right;">
            <a href="?do=forgot">忘記密碼</a>I
            <a href="?do=reg">尚未註冊</a>
        </div>
    </div>
</fieldset>
<script>
    function login() {
        $.post("./api/chk_acc.php", {
            name: $("#name").val(),
            pw: $("#pw").val(),
        }, (res) => {
            if (res > 0) {
                $.post("./api/chk_pw.php", {
                    name: $("#name").val(),
                    pw: $("#pw").val(),
                }, (res) => {
                    if (res > 0) {
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