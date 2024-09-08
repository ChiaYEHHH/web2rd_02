<fieldset style="width:95%">
    <legend>目前位置:首頁 > 分類網誌 > 問卷調查</legend>
    <table class="tab" style="width:90%">
        <tbody>
            <tr>
                <th>編號</th>
                <th>問卷題目</th>
                <th>投票總數</th>
                <th>結果</th>
                <th>狀態</th>
            </tr>
            <?php
            $que = $Que->all(['main_id' => 0]);
            // dd($que);
            foreach ($que as $idx => $qq) {
            ?>
                <tr>
                    <td style="text-align: center;width:5%"><?= $idx + 1; ?></td>
                    <td style="width:60%">

                        <?= $qq['text']; ?>

                    </td>
                    <td style="text-align: center;"><?= $qq['vote'] ?></td>
                    <td style="text-align: center;width:10%"><a href="?do=result&queid=<?= $qq['id'] ?>">結果</a></td>
                    <td style="text-align: center;width:15%">
                        <?php
                        if (isset($_SESSION['user'])) {
                            echo "<a href='?do=vote&que{$qq['id']}'>參與投票</a>";
                        } else {
                            echo "請先登入";
                        }
                        ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

</fieldset>


<script>
</script>