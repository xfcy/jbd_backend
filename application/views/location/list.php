<!-- 检索页面 -->
<section class="blog-search">
    <div class="container">
        <div class="section-header">
            <h2 style="margin-bottom:0;">全部地点</h2>
            <div class="search-road" id="allmap"></div>
            <div class="jiansuo-content">
                <?php foreach ($locations as $l) : $url = site_url("/location/show/{$l['uuid']}"); ?>
                <a href="<?=$url?>" class="jiansuo-item"><?=$l['name']?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>