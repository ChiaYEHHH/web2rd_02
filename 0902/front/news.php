<fieldset>
    <legend>目前位置:首頁 > 最新文章</legend>
    <table class="tab">
        <tr>
            <th width="40%">標題</th>
            <th>內容</th>
        </tr>
        <?php
        $itemnum = $News->count(['sh' => 1]);
        $div = 5;
        $pages = ceil($itemnum / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;
        $rows = $News->all(['sh' => 1]);
        foreach ($rows as $row):
        ?>
            <tr>
                <td class="clo"><?= $row['title'] ?></td>
                <td><?= $row['article'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div class="ct cent">

        <?php
        if (($now - 1) > 0) {
            $prev = $now - 1;
            echo "<a href='?do=news&p=$prev'> < </a>";
        }

        for ($i = 1; $i <= $itemnum; $i++) {
            $font = ($i == $now) ? '24px' : '18px';
            echo "<a style='font-size:$font' href='?do=news&p=$i'> $i </a>";
        }

        if (($now + 1) > $itemnum) {
            $next = $now + 1;
            echo "<a href='?do=news&p=$next'> > </a>";
        }
        ?>
    </div>
</fieldset>