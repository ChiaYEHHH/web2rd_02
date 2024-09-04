<form action="./api/news.php" method="post">
    <table class="tab ct" style="margin-top: 50px;">
        <tr>
            <th>編號</th>
            <th>標題</th>
            <th>顯示</th>
            <th>刪除</th>
        </tr>
        <?php
        $itemnum = $News->count();
        $div = 3;
        $pages = ceil($itemnum / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;
        $rows = $News->all("limit $start ,$div");
        foreach ($rows as $idx => $row) :
        ?>
            <tr>
                <td class="clo"><?= $idx + 1; ?></td>
                <td><?= $row['title'] ?></td>
                <td><input type="checkbox" name="sh[]" value="<?= $row['id'] ?>" <?=($row['sh'] == 1)?'checked':''; ?>></td>
                <td><input type="checkbox" name="del[]" value="<?= $row['id'] ?>"></td>
                <input type="hidden" name="id[]" value="<?= $row['id'] ?>">
            </tr>
        <?php endforeach; ?>
    </table>

    <div class="ct cent">
        <?php
        if ($now - 1 > 0) {
            $prev = $now - 1;
            echo "<a href='?do=news&p=$prev'> < </a>";
        }

        for ($i = 1; $i <= $pages; $i++) {
            $font = ($i == $now) ? '24px' : '18px';
            echo "<a href='?do=news&p=$i' style='font-size:$font'> $i </a>";
        }

        if ($now + 1 <= $pages) {
            $next = $now + 1;
            echo "<a href='?do=news&p=$next'> > </a>";
        }
        ?>
    </div>
    <div class="ct cent">
        <button type="submit">確定修改</button>
    </div>
</form>