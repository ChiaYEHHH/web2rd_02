<fieldset width="80%">
    <legend>帳號管理</legend>

    <table class="ct" width="80%">
        <tr>
            <td class='clo'>帳號</td>
            <td class='clo'>密碼</td>
            <td class='clo'>刪除</td>
        </tr>
        <?php
        $user=$User->all();
        // dd($user);
        foreach($user as $u):
            ?>
        <tr>
            <td><?= $u['name'];?></td>
            <td><?= str_repeat("*",strlen($u['pw']));?></td>
            <td><input type="checkbox" name="del[]" id="<?= $u['id']?>"></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <div class="ct">
        <button onclick="del()">確定刪除</button>
        <button onclick="clear()">清空選取</button>
    </div>
</fieldset>