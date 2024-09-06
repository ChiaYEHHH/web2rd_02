<fieldset>
    <legend>目前位置:首頁 > 人氣文章區</legend>
    <table class="tab">
        <tr>
            <th style="width:30%">標題</th>
            <th>內容</th>
            <th style="width:30%">人氣</th>
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
        $rows = $News->all(['sh' => 1]," limit $start,$div");
        // dd($rows);
        foreach ($rows as $idx => $row):
        ?>
            <tr>
                <td class="clo"><?= $row['title'] ?></td>
                <td><?= substr($row['article'],0,30) ?></td>
                <td><?= $row['good']?>個人說<img src="./icon/02B03.jpg"style="width:30px"></td>
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