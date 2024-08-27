<fieldset style="width: 40%;margin:20px auto;">
    <legend>會員登入</legend>
    <table>
        <tr>
            <td>帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td>密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td>
                <button type="button" onclick="login()">登入</button>
                <button type="button" onclick="clear()">清除</button>
            </td>
            <td style="float: right;">
                <a href="?do=forgot">忘記密碼</a>
                <a href="?do=reg">尚未註冊</a>
            </td>
        </tr>
    </table>
</fieldset>
<script>
    function login() {
        $.post('./api/chk_acc.php', {
            acc: $('#acc').val(),
            pw: $('#pw').val(),
        }, (chk) => {
            if (chk == 1) {
                if ($('#acc').val() == 'admin') {
                    location.href = "admin.php"
                } else {
                    location.href = "index.php"
                }
            } else {
                alert("帳號或密碼錯誤")
            }
        })
    }
</script>