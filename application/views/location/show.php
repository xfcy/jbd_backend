<!--blog start -->
<section id="blog" class="blog blog-search" >
    <div class="container">
        <div class="search-road" id="allmap"></div>
        <div class="road-detail">
            <div class="road-title">
                <?=$location['name']?>
            </div>
            <div id="road" class="road-content">
                <?=$location['desc']?>
            </div>
        </div>
        <?php if (count($poetrys) > 0) :  ?>
            <div class="blog-content">
                <?php foreach ($poetrys as $poetry) : ?>
                    <div class="col-md-4 col-sm-6">
                        <div class="single-blog-item">
                            <a href="<?=site_url('/poetry/show/' . $poetry['uuid'])?>" class="single-blog-item-txt">
                                <h2><?=$poetry['name']?></h2>
                                <h4><span class="search-page-author"><?=$poetry['poet']?></span><span class="search-page-time"><?=$poetry['year_int']==-1? '年份未详' : $poetry['year_int'] . '年' ?></span><span class="search-page-location"><?=$poetry['location']?></span></h4>
                                <p>
                                    <?=$poetry['content_src']?>
                                </p>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php  endif; ?>
    </div><!--/.container-->
</section><!--/.blog-->
<!--blog end -->
<script>

    $(function(){

        var myIcon = new BMap.Icon("<?=site_url('/assets/images/map-pin-fill.png')?>", new BMap.Size(30,30));
        var marker = new BMap.Marker(new BMap.Point(<?=$location['longitude']?>,<?=$location['latitude']?>),{icon:myIcon});  // 创建标注
        map.addOverlay(marker);               // 将标注添加到地图中
        
        var locationName = '<?=$location['name']?>';
        let offsetX = 15 - (locationName.length / 2 * 20);
        var label = new BMap.Label(locationName,{offset:new BMap.Size(offsetX, 32)});
        marker.setLabel(label);
        marker.setZIndex(999);
        label.setZIndex(9999);
    })
</script>
