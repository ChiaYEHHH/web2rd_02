目前位置:首頁 > 分類網誌 > 人氣文章區

<fieldset style="width:95%">
    <legend>分類網誌</legend>
    <table class="tab" style="width:90%">
        <tbody>
            <tr>
                <th>標題</th>
                <th>內容</th>
                <th>人氣</th>
            </tr>
            <?php
            $num = $News->count(['sh' => 1]);
            $div = 5;
            $pages = ceil($num / $div);
            $now = $_GET['p'] ?? 1;
            $start = ($now - 1) * $div;
            $news = $News->all(['sh' => 1], "order by `goods` desc limit $start,$div");
            foreach ($news as $new) {
            ?>
                <tr>
                    <td class="clo tag" style="width:20%"><?= $new['title']; ?></td>
                    <td>
                        <div class="short">
                            <?= mb_substr($new['article'], 0, 15); ?>
                        </div>
                        <div class="long alert">
                            <div class="ssaa">
                                <?= nl2br($new['article']); ?>
                            </div>

                        </div>
                    </td>
                    <td style="width:20%">
                        <?= $new['goods'] ?>個人說<img src="./icon/02B03.jpg" style="width:20px">
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
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
</fieldset>


<script>
</script>