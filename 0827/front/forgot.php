<fieldset style="width: 50%;margin:20px auto;">
    <legend>忘記密碼</legend>
    <div>請輸入信箱以查詢密碼</div>
    <div><input type="text" name="email" id="email"></div>
    <div id="result"></div>
    <div><button type="button" onclick="getpw()">查詢</button></div>
</fieldset>
<script>
    function getpw() {
        $.post("./api/forgot.php", {
            email: $("#email").val()
        }, (result) => {
            $("#result").text(result);
        })
    }
</script>