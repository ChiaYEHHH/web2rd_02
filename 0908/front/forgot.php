<fieldset>
    <legend>忘記密碼</legend>
    <div>請輸入信箱以查詢密碼</div>
    <div><input type="text" name="email" id="email" style="width:60%"></div>
    <div id="result"></div>
    <div><button type="button" onclick="forgot()">尋找</button></div>
</fieldset>
<script>
    function forgot() {
        $.post("./api/forgot.php", {
            email: $("#email").val(),

        }, (res) => {


            $("#result").text(res);


        })

    }
</script>