<!-- 检索页面 -->
<section class="blog-search">
    <div class="container">
        <div class="section-header">
            <h2 style="margin-bottom:0;">全部作家</h2>
            <div class="jiansuo-content">
                <?php foreach ($poets as $p) : $url = site_url("/poet/show/{$p['uuid']}"); ?>
                <a href="<?=$url?>" class="jiansuo-item"><?=$p['name']?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>