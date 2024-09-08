<fieldset>
    <legend>新增問卷</legend>
    <table class="tab">
        <tr>
            <td class="clo">問卷名稱</td>
            <td><input type="text" name="text" id="que"></td>

        </tr>
    </table>
    <table class="tab" id="sub">

        <tr class="clo">
            <td>
                選項<input type="text" id="text[]">
                <button type="button" onclick="more()">更多</button>
            </td>
        </tr>


    </table>
    <div class="ct cent">
        <button onclick="sent()">確定刪除</button>
        <button onclick="location.reload()">清空選取</button>
    </div>

</fieldset>
<script>
    function more() {
        let str = `
        <tr class="clo">
            <td>
                選項<input type="text" id="text[]">               
            </td>
        </tr>
        
        `;
        $("#sub").prepend(str);
    }
</script>