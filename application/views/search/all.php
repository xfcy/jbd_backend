<!--blog start -->
<section id="blog" class="blog blog-search" >
    <div class="container">
        <div class="section-header">
            <h2 style="margin-bottom:0;">关键词：<?=$keyword?></h2>
        </div><!--/.section-header-->
        <?php if ($location_count > 0) : $location = $locations[0]; ?>
        <div class="search-road" id="allmap"></div>
        <div class="road-detail">
            <div class="road-title">
                <?=$location['name']?>
            </div>
            <div id="road" class="road-content road-content-less">
                <?=$location['desc']?>
            </div>
            <div id="show-more" class="road-more">
                展开 <i class="fa fa-angle-down"></i>
            </div>
        </div>
        <?php endif; ?>
        <?php if ($poet_count > 0) : foreach ($poets as $poet) : ?>
        <div class="road-detail">
            <div class="road-title">
                <?php if (isset($poet['uuid']) && $poet['name'] != '无') : ?>
                    <a href="<?=site_url('/poet/show/' . $poet['uuid'])?>"><?=$poet['name']?></a>
                <?php else : ?>
                    <?=$poet['name']?>
                <?php endif; ?>
<!--                --><?//=$poet['name']?>
            </div>
            <div  class="road-content">
                <?=$poet['desc']?>
            </div>
        </div>
        <?php endforeach; endif; ?>
        <?php if ($poetry_count > 0) :  ?>
        <div class="blog-content">
                <?php foreach ($poetrys as $poetry) : ?>
                <div class="col-md-4 col-sm-6">
                    <div class="single-blog-item">
                        <a href="<?=site_url('/poetry/show/' . $poetry['uuid'])?>" class="single-blog-item-txt">
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
        <?php  endif; ?>
    </div><!--/.container-->
</section><!--/.blog-->
<!--blog end -->
<script>

    $(function(){

        var search_location = [
            <?php foreach ($locations as $l) : ?>
            [<?=$l['longitude']?>,<?=$l['latitude']?>,"<?=$l['name']?>", "<?=site_url("/location/show/{$l['uuid']}")?>"],
            <?php endforeach; ?>
        ];

        var myIcon = new BMap.Icon("<?=site_url('/assets/images/map-pin-fill.png')?>", new BMap.Size(30,30));
        //创建标注
        for(var i=0;i<search_location.length;i++){
            let marker = new BMap.Marker(new BMap.Point(search_location[i][0],search_location[i][1]),{icon:myIcon});  // 创建标注
            map.addOverlay(marker);               // 将标注添加到地图中
            let label = new BMap.Label(search_location[i][2],{offset:new BMap.Size(-18,25)});
            marker.setLabel(label);
            let url = search_location[i][3];
            marker.addEventListener('click', function(e){
                window.location.href = url;
            });
        }
    })
</script>