<fieldset style="margin: 20px auto; width:60%">
    <legend>忘記密碼</legend>
    <div>請輸入信箱以查詢密碼</div>
    <div><input  style="width:80%" type="text" name="email" id="email"></div>
    <div id="result"></div>
    <div><button onclick="find()">查詢</button></div>
</fieldset>
<script>
    function find(){
        $.post("./api/forgot.php",{
            email:$("#email").val()
        },(res)=>{

            $("#result").text(res);
        })
    }
</script>