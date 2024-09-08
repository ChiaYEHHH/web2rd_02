<?php
$que = $Que->find(['id' => $_GET['queid']]);
// dd($que);
?>
<fieldset style="width:95%">
    <legend>目前位置:首頁 > 分類網誌 > 問卷調查 > <?= $que['text'] ?></legend>
    <table class="tab" style="width:90%">
        <h3><?= $que['text'] ?></h3>
        <tbody>

            <?php
            $opts = $Que->all(['main_id' => $que['id']]);
            // dd($que);
            foreach ($opts as $idx => $opt) {
                $rate = $opt['vote'] / $que['vote'];
                $show = round($rate, 2) * 100;
                $bg = $show * 65;
            ?>
                <tr>
                    
                    <td style="width:60%">

                        <?= $opt['text']; ?>

                    </td>
                    <td style="width:40%; display:flex;">
                        <div style="background-color: gray; height: 25px; width:<?= $show ?>%">


                        </div>
                        <?= $opt['vote'] ?>票<?= $show ?>%
                    </td>

                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
<div class="cent ct">
    <a  href="?do=que"><button>返回</button></a>
</div>
</fieldset>


<script>
</script>