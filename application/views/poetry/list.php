<!-- 检索页面 -->
<section class="blog-search">
    <div class="container">
        <div class="section-header">
            <h2 style="margin-bottom:0;">全部诗歌</h2>
            <div class="jiansuo-content jiansuo-content-shige">
                <?php foreach ($poetrys as $p) : $url = site_url("/poetry/show/{$p['uuid']}"); ?>
                <a href="<?=$url?>" class="jiansuo-item"><?=$p['name']?>（<?=$p['poet']?>）</a>
                <?php endforeach; ?>
            </div>
        </div>
        <nav class="road-page" aria-label="Page navigation">
            <ul class="pagination">
                <li>
                    <a <?=($page>1?'href="' . site_url('/poetry/' . ($page - 1)) . '"':'')?> aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php for ($i = 1; $i <= $pages; $i++) : ?>
                <?php if ($i == $page) : ?>
                <li class="active"><a><?=$i?></a></li>
                <?php else : ?>
                <li><a href="<?=site_url('/poetry/' . $i)?>"><?=$i?></a></li>
                <?php endif; ?>
                <?php endfor; ?>
                <li>
                    <a <?=($page<$pages?'href="' . site_url('/poetry/' . ($page + 1)) . '"':'')?> aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</section>