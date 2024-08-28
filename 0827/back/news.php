<fieldset>
    <legend>最新文章管理</legend>
    <form action="./api/edit_news.php" method="post">
        <table class="tab">
            <tr>
                <td>編號</td>
                <td width="60%">標題</td>
                <td>顯示</td>
                <td>刪除</td>
            </tr>
            <?php
            $itemsNum = $News->count();
            $div = 3;
            $pages = ceil($itemsNum / $div);
            $now = $_GET['p'] ?? 1;
            $start = ($now - 1) * $div;
            $rows = $News->all(" limit $start,$div");
            foreach ($rows as $idx => $row):
            ?>
                <tr>
                    <td><?= $start + $idx + 1; ?></td>
                    <td><?= $row['title']; ?></td>
                    <td><input type="checkbox" name="sh[]" value="<?= $row['id']; ?>"></td>
                    <td><input type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
                    <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                </tr>
            <?php endforeach; ?>
        </table>
        <a href="?do=news&p=$prev"> < </a>
        <div class="ct">
            <?php
            if ($now - 1 > 0){
                $prev=$now-1;
                echo "<a href='?do=news&p=$prev'> < </a>";
            }

            for($i=1;$i<=$pages; $i++){
                $font=($i == $now)?'20px' : '26px';
                echo "<a href='?do=news&p=$i'> $i </a>";
            }

            if ($now + 1 <= $pages){
                $next=$now+1;
                echo "<a href='?do=news&p=$next'> > </a>";
            }
            ?>
        </div>
        <div class="ct">
            <input type="submit" value="確定修改">
        </div>
    </form>
</fieldset>