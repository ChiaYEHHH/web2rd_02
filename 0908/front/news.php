目前位置:首頁 > 分類網誌 > 最新文章區

<fieldset style="width:95%">
    <legend>分類網誌</legend>
    <table class="tab" style="width:90%">
        <tbody>
            <tr>
                <th>標題</th>
                <th>內容</th>
            </tr>
            <?php
            $num = $News->count(['sh' => 1]);
            $div = 5;
            $pages = ceil($num / $div);
            $now = $_GET['p'] ?? 1;
            $start = ($now - 1) * $div;
            $news = $News->all(['sh' => 1], " limit $start,$div");
            foreach ($news as $new) {
            ?>
                <tr>
                    <td class="clo tag" style="width:20%"><?= $new['title']; ?></td>
                    <td>
                        <div class="short">
                            <?= mb_substr($new['article'], 0, 20); ?>
                        </div>
                        <div class="long" style="display:none">
                            <?= nl2br($new['article']); ?>
                        </div>
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
    $(".tag").on('click',function(){
        $(this).next().children(".short,.long").toggle();
    })
</script>