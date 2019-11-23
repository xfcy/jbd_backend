<!--blog start -->
<section id="blog" class="blog blog-search" >
    <div class="container">
        <div class="section-header">
            <h2 style="margin-bottom:0;">关键词：<?=$keyword?></h2>
        </div><!--/.section-header-->
        <div class="blog-content">
                <?php $poetrys = isset($poetrys) ? $poetrys : [] ; foreach ($poetrys as $poetry) : ?>
                <div class="col-md-4 col-sm-6">
                    <div class="single-blog-item">
                        <a href="#" class="single-blog-item-txt">
                            <h2><?=$poetry['name']?></h2>
                                <h4><span class="search-page-author"><?=$poetry['poet']?></span><span class="search-page-time"><?=$poetry['year']==-1? '年份未详' : $poetry['year'] . '年' ?></span><span class="search-page-location"><?=$poetry['location']?></span></h4>
                            <p>
                                <?=$poetry['content']?>
                            </p>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
        </div>
    </div><!--/.container-->
</section><!--/.blog-->
<!--blog end -->
