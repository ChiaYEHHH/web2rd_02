<fieldset>
    <legend>帳號管理</legend>
    <form action="./api/del.php" method="post">
    <table class="tab">
        <tr class="clo">
            <td>帳號</td>
            <td>密碼</td>
            <td>刪除</td>
        </tr>
        <?php 
$accs=$User->all();
foreach($accs as $acc){
        ?>
        <tr>
            <td><?=$acc['name']?></td>
            <td><?=$acc['pw']?></td>
            <td><input type="checkbox" name="del[]" value="<?=$acc['id']?>"></td>
        </tr>
        <input type="hidden" name="id[]" value="<?=$acc['id']?>">
<?php } ?>
    </table>
    <div class="ct cent">
        <button type="submit">確定刪除</button>
        <button type="reset">清空選取</button>
    </div>
</form>
</fieldset>
<fieldset>
    <legend>新增會員</legend>
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
            <td class="clo">Step3:再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td class="clo">Step4:信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
    </table>
    <div class="cent ct">
        <button onclick="reg()">註冊</button>
        <button onclick="location.reload();">清除</button>
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
        if (acc.name == "" || acc.pw == "" || acc.pw2 == "" || acc.email == "") {
            alert("不可空白");
            location.reload();
        } else {
            if (acc.pw != acc.pw2) {
                alert("密碼錯誤");
                location.reload();

            } else {
                $.post("./api/reg.php", acc, (res) => {
                    // console.log(res);
                    
                        alert(res);
                        location.reload();
                    })
                }
            }
    }
</script>