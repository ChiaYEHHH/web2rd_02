<fieldset>
    <legend>最新文章管理</legend>
    <form action="./api/edit_news.php" method="post">
        <table class="tab">
            <tr>
                <th>編號</th>
                <th>標題</th>
                <th>顯示</th>
                <th>刪除</th>
            </tr>
            <?php
            $total = $News->count();
            $div = 3;
            $pages = ceil($total / $div);
            $now = $_GET['p'] ?? 1;
            $start = ($now - 1) * $div;

            echo "total=$total";
            echo "pages=$pages";
            echo "now=$now";
            echo "start=$start";

            $new = $News->all("limit $start,$div");
            foreach ($new as $key => $value) :
            ?>
                <tr>
                    <td><?= $start + $key + 1; ?></td>
                    <td><?= $value['title']; ?></td>
                    <td><input type="checkbox" name="sh[]" id="<?= $value['id']; ?>" <?= ($value['sh'] == 1) ? "checked" : ""; ?>></td>
                    <td><input type="checkbox" name="del[]" id="<?= $value['id']; ?>"></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <div class="ct">
            <?php
            if ($now - 1 > 0) {
                $prev = $now - 1;
                echo "<a href='?do=news&p=$prev'> < </a>";
            }

            for ($i = 1; $i <= $pages; $i++) {
                $font = ($i == $now) ? '20px' : '16px';
                echo "<a href='?do=news&p=$i'> $i </a>";
            }

            if ($now + 1 <= $pages) {
                $next = $now + 1;
                echo "<a href='?do=news&p=$next'> > </a>";
            }
            ?>

        </div>
        <div class="ct"><input type="submit" value="確定修改"></div>
    </form>
</fieldset>

