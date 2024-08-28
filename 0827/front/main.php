<style>
    .tags {
        display: flex;
        margin-left: 1px;
        position: relative;
        z-index: 10;
    }

    .tag {
        padding: 5px 10px;
        min-width: 80px;
        border: 1px solid black;
        margin-left: -1px;
        background-color: #eee;
        border-radius: 5px 5px 0 0;
        text-align: center;
    }

    .tag:hover {
        background-color: white;
        margin-top: -1px;
    }

    .articles {
        position: relative;
        margin-top: -1px;
    }

    .article {
        width: 95%;
        border: 1px solid black;
        height: 400px;
        overflow: auto;
        display: none;
        padding: 16px;
    }

    .tag.active {
        border-bottom: 1px solid white;
    }

    .tag.active,
    .article.active {
        background-color: white;
        display: block;
    }
</style>
<div class="tags">
    <div class="tag active">健康新知</div>
    <div class="tag">菸害防治</div>
    <div class="tag">癌症防治</div>
    <div class="tag">慢性病防治</div>
</div>
<div class="articles">
    <div class="article active">
        <span style="font-weight: bolder;font-size:20px">健康新知</span>
    </div>
    <div class="article">
        <span style="font-weight: bolder;font-size:20px">菸害防治</span>
    </div>
    <div class="article">
        <span style="font-weight: bolder;font-size:20px">癌症防治</span>
    </div>
    <div class="article">
        <span style="font-weight: bolder;font-size:20px">慢性病防治</span>
    </div>
</div>
<script>
    $(".tag").on('click', function() {
        $(".tag").removeClass("active");
        $(".article").removeClass("active");
        $(this).addClass("active");
        $(".article").eq($(this).index(".tag")).addClass("active");
        //article的排序位置跟tag一樣
    })
</script>