<?php
$que = $Que->find(['id' => $_GET['id']]);
// dd($que);
?>
<fieldset>
    <legend>目前位置:首頁 > 問卷調查 > <?= $que['title']; ?></legend>
    <h4><?= $que['title']; ?></h4>
    <table>
        <!-- <tr class="clo">
            <td>編號</td>
            <td>問卷題目</td>

        </tr> -->

        <?php
        $rows = $Que->all(['subject_id' => $que['id']]);
        foreach ($rows as $idx => $row):
        ?>
            <tr>
                
                <td>
                    <input type="radio" name="opt" value="<?= $row['id']; ?>">
                    <?= $row['title']; ?>
                </td>

            </tr>
        <?php endforeach; ?>
    </table>
    <div class="cent ct">
        <button onclick="vote()">我要投票</button>
    </div>
</fieldset>
<script>
    function vote() {
        let vote = {
            que: <?= $que['id'] ?>,
            vote: $("input[type='radio']:checked").val(),
        };
        console.log(vote);
        $.post("./api/vote.php", vote, () => {
            location.href = "?do=result&id=<?= $que['id'] ?>"
        })
    }
</script>