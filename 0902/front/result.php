<?php
$que = $Que->find(['id' => $_GET['id']]);
// dd($que);
?>
<fieldset>
    <legend>目前位置:首頁 > 問卷調查 > <?= $que['title']; ?></legend>
    <h4><?= $que['title']; ?></h4>
    <table class="tab">

        <?php
        $rows = $Que->all(['subject_id' => $que['id']]);
        // dd($rows);
        foreach ($rows as $idx => $row):
        ?>
            <tr>
                <td>
                    <?= $idx + 1; ?>
                </td>
                <td style="width: 80%;">
                    <?= $row['title']; ?>

                </td>
                <td>
                    <?= $row['vote']; ?>票
                </td>

            </tr>
        <?php endforeach; ?>

    </table>

    <div class="cent ct">
        <a href="?do=que"><button>返回</button></a>

    </div>

</fieldset>