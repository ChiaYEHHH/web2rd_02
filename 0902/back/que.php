<fieldset style="width: 90%; margin:50px auto">
    <legend>新增問卷</legend>
    <div style="display: flex;">
        <div class="clo ct" style="width: 30%;">問卷名稱</div>
        <input style="width: 60%;" type="text" name="title" id="titleQue">
        <!-- <input type="text"> -->
    </div>
    <div id="opts" style="margin-top: 10px;">
        <div class="clo">
            選項:<input style="width: 60%;" type="text" name="opt">
            <button onclick="more()">更多</button>
        </div>
    </div>
    <div class="ct cent">
        <button onclick="send()">新增</button>
        <button onclick="clean()">清空</button>
    </div>
</fieldset>

<script>
    function more() {
        let opt = `
        <div class="clo">
            選項:<input style="width: 60%;" type="text" name="opt" id="opt">
        </div>
    `;
        $("#opts").prepend(opt);
    }

    function send() {
        let opts = new Array();
        $("input[name='opt']").each((i, o) => {
            opts.push($(o).val());
        })
        console.log(opts);

        let que = {
            title: $("#titleQue").val(),
            opts
        }
        console.log(que);
        $.post("./api/que.php", que, () => {
            alert("新增問卷成功")
            location.reload();
        })

    }
</script>