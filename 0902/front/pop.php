<fieldset>
    <legend>目前位置:首頁 > 人氣文章區</legend>
    <table class="tab">
        <tr>
            <th style="width:30%">標題</th>
            <th style="width:50%">內容</th>
            <th>人氣</th>
        </tr>
        <?php
        $itemnum = $News->count(['sh' => 1]);
        // echo $itemnum;
        $div = 5;
        $pages = ceil($itemnum / $div);
        // echo $pages;
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;
        // echo $now;
        $rows = $News->all(['sh' => 1], "order by `goods` desc limit $start,$div");
        // dd($rows);
        foreach ($rows as $idx => $row):
        ?>
            <tr>
                <td class="clo" style="width:30%"><?= $row['title'] ?></td>
                <td style="width:50%">
                    <div class="short"><?= substr($row['article'], 0, 30) ?></div>
                    <div class="alery">
                        <h3><?= $row['title'] ?></h3>
                        <?= nl2br($row['article']) ?>
                    </div>
                </td>
                <td>
                    <?= $row['goods'] ?>個人說<img src="./icon/02B03.jpg" style="width:30px">
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div class="ct cent">

        <?php
        if (($now - 1) > 0) {
            $prev = $now - 1;
            echo "<a href='?do=news&p=$prev'> < </a>";
        }

        for ($i = 1; $i <= $pages; $i++) {
            $font = ($i == $now) ? '24px' : '18px';
            echo "<a style='font-size:$font' href='?do=news&p=$i'> $i </a>";
        }

        if (($now + 1) <= $pages) {
            $next = $now + 1;
            echo "<a href='?do=news&p=$next'> > </a>";
        }
        ?>
    </div>
</fieldset>
<script>
    function good($id, $acc) {
        $.post("./api/good.php", {
            id: $id,
            acc: $acc
        })
    }
</script>