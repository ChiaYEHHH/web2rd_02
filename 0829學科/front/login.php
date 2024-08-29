<fieldset class="cent" style="width:60%;margin:20px auto;">
    <legend>會員登入</legend>
    <!-- <form action="./api/login.php" method="post"> -->
        <table class="tab ct">
            <tr>
                <td class="clo">帳號 : </td>
                <td><input type="text" name="name" id="name"></td>
            </tr>
            <tr>
                <td class="clo">密碼 : </td>
                <td><input type="password" name="pw" id="pw"></td>
            </tr>
            <tr>
                <td>
                    <button onclick="login()">登入</button>
                    <button type="reset">清除</button>
                </td>
                <td style="float: right;">
                    <a href="?do=forgot">忘記密碼</a>
                    <a href="?do=reg">尚未註冊</a>
                </td>
            </tr>
        </table>
    <!-- </form> -->
</fieldset>
<script>
    function login() {
        $.post("./api/login.php", {
            name: $("#name").val(),
            pw: $("#pw").val(),
        }, (chk) => {
            if (chk > 0) {
                if ($("#name").val() == 'admin') {
                    alert("進入管理頁面");
                    location.href="admin.php";
                } else {
                    alert("歡迎登入");
                    location.href="index.php";
                }
            }else{
                alert("查無帳號或密碼錯誤");
                location.reload();
            }
        })
    }
</script>