目前位置:首頁 > 分類網誌 > <span id="navtype">健康新知</span>
<div style="display: flex;">
<fieldset style="width:20%">
    <legend>分類網誌</legend>
    <a style="display: block;" class="typeid" onclick="gettitle()" data-type="1">健康新知</a>
    <a style="display: block;" class="typeid" onclick="gettitle()" data-type="2">菸害防治</a>
    <a style="display: block;" class="typeid" onclick="gettitle()" data-type="3">癌症防治</a>
    <a style="display: block;" class="typeid" onclick="gettitle()" data-type="4">慢性病防治</a>
</fieldset>
<fieldset style="width:60%">
    <legend>文章列表</legend>
    <div class="content">
        <?php
        $news=$News->all(['sh'=>1,'type'=>1]);
    foreach($news as $ns){
        ?>
<a style="display: block;" href=""><?=$ns['title']?></a>
        <?php
    }
        ?>
    </div>
</fieldset>
</div>
<script>
    function gettitle() {
$(".typeid").on('click',function(){
    $(this).data(type);
})
       
    }
</script>