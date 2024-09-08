<?php
$que = $Que->find(['id' => $_GET['id']]);
// dd($que);
?>
<fieldset style="width: 98%;">
    <legend>目前位置:首頁 > 問卷調查 > <?= $que['title']; ?></legend>
    <h4><?= $que['title']; ?></h4>
    <table class="tab" style="width: 98%;">

        <?php
        $rows = $Que->all(['subject_id' => $que['id']]);
        // dd($rows);
        foreach ($rows as $idx => $row):
            $rate = $row['vote'] / $que['vote'];
            $show = round($rate, 2) * 100;
            $bg = $rate * 65;
        ?>
            <tr>

                <td style="width: 50%;">
                    <?= $row['title']; ?>
                </td>
                <td style="display: flex;">
                    <div style="width: <?= $bg ?>%; height: 20px; background:gray;"></div>
                    <?= $row['vote']; ?>票(<?= $show ?>%)
                </td>
            </tr>
        <?php endforeach; ?>

    </table>

    <div class="cent ct">
        <a href="?do=que"><button>返回</button></a>

    </div>

</fieldset>