<section class="sg-section">
    <div class="container">
        <h1 class="sg-title"><?=$poetry['name']?></h1>
        <div class="sg-author">
            <?php if (empty($poetry['poet_url'])) : ?>
                <?=$poetry['poet']?>
            <?php else : ?>
                <a href="<?=$poetry['poet_url']?>"><?=$poetry['poet']?></a>
            <?php endif ?>
        </div>
        <div class="sg-content"><?=$poetry['content_html']?></div>
        <div class="sg-more">
            <div class="sg-label">位置</div>
            <div class="sg-detail">
                <?php if (empty($poetry['location_url'])) : ?>
                <?=$poetry['location']?>
                <?php else : ?>
                <a href="<?=$poetry['location_url']?>"><?=$poetry['location']?></a>
                <?php endif ?>
            </div>
            <div class="sg-label">创作时间</div>
            <div class="sg-detail"><?=($poetry['year_int']==-1)?'年份未详':$poetry['year_int'] . '年'?></div>
            <div class="sg-label">作者简介</div>
            <div class="sg-detail"><?=$poetry['poet_desc']?></div>
            <div class="sg-label">写作背景</div>
            <div class="sg-detail"><?=$poetry['background']?></div>
            <div class="sg-label">诗歌鉴赏</div>
            <div class="sg-detail"><?=$poetry['desc']?></div>
        </div>
    </div>
</section>