
<section id="contact1"  class="subscription" style="background:url(<?=site_url('/assets/images/welcome-hero/banner2.jpg')?>) center center no-repeat;background-size:cover;">
    <div class="container">
        <div class="subscribe-title text-center">
            <h2>
                数日方离雪，今朝又出山。试凭高处望，隐约见潼关。
            </h2>
            <p>
                韩愈《次硖石》
            </p>
        </div>
    </div>
</section>
<section id="contact2"  class="subscription" style="background:url(<?=site_url('/assets/images/welcome-hero/banner4.jpg')?>) center center no-repeat;background-size:cover;">
    <div class="container">
        <div class="subscribe-title text-center">
            <h2>
                野店临官路，重城压御堤。山开灞水北，雨过杜陵西。<br/>归梦秋能作，乡书醉懒题。桥回忽不见，征马尚闻嘶。
            </h2>
            <p>
                岑参《浐水东店送唐子归嵩阳》
            </p>
        </div>
    </div>
</section>
<section id="contact3"  class="subscription" style="background:url(<?=site_url('/assets/images/welcome-hero/banner6.jpg')?>) center center no-repeat;background-size:cover;">
    <div class="container">
        <div class="subscribe-title text-center">
            <h2>
                花落水潺潺，十年离旧山。夜愁添白发，春泪减朱颜。 <br/>孤剑北游塞，远书东出关。逢君话心曲，一醉灞陵间。
            </h2>
            <p>
                许浑《下第别友人杨至之》
            </p>
        </div>
    </div>
</section>
<section id="contact4"  class="subscription" style="background:url(<?=site_url('/assets/images/welcome-hero/banner5.jpg')?>) center center no-repeat;background-size:cover;">
    <div class="container">
        <div class="subscribe-title text-center">
            <h2>
                尽说青云路，有足皆可至。我马亦四蹄，出门似无地。<br/>玉京十二楼，峨峨倚青翠。下有千朱门，何门荐孤士。
            </h2>
            <p>
                孟郊《《长安旅情》》
            </p>
        </div>
    </div>
</section><!--/subscription-->
<!--footer start-->
<footer id="footer"  class="footer">
    <div class="container">
        <div class="hm-footer-copyright">
            <div class="row">
                <div class="col-sm-5">
                    <p>
                        &copy;copyright. designed and developed by 西安工业大学
                    </p><!--/p-->
                </div>
                <div class="col-sm-7">
                    <div class="footer-social">
                        <span>电话（总机）：029-83208114 　地址：陕西省西安市未央区学府中路2号 　邮编：710021</span>
                    </div>
                </div>
            </div>

        </div><!--/.hm-footer-copyright-->
    </div><!--/.container-->

    <div id="scroll-Top">
        <div class="return-to-top">
            <i class="fa fa-angle-up " id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
        </div>

    </div><!--/.scroll-Top-->

</footer><!--/.footer-->
<!--footer end-->
<?php if ($hasMap) : ?>
<!-- 百度地图事件 -->
<script type="text/javascript">
    // 百度地图API功能
    var map = new BMap.Map("allmap");    // 创建Map实例
    <?php if (isset($location)) : ?>
    map.centerAndZoom(new BMap.Point(<?=$location['longitude']?>,<?=$location['latitude']?>), 9);  // 初始化地图,设置中心点坐标和地图级别
    <?php else : ?>
    map.centerAndZoom(new BMap.Point(111.19036,34.930745), 9);  // 初始化地图,设置中心点坐标和地图级别
    <?php endif; ?>
    // 获取的数据
    var data_info = [
        <?php $default_location_list = isset($other_locations) ? $other_locations : (isset($locations) ? $locations : [] ); ?>
        <?php foreach ($default_location_list as $l) : ?>
        [<?=$l['longitude']?>,<?=$l['latitude']?>,"<?=$l['name']?>", "<?=site_url("/location/show/{$l['uuid']}")?>"],
        <?php endforeach; ?>
    ];

    //信息窗口
    var opts = {
        width : 120,     // 信息窗口宽度
        height: 100,     // 信息窗口高度
        title : "" , // 信息窗口标题
    };
    //创建标注
    for(var i=0;i<data_info.length;i++){
        let marker = new BMap.Marker(new BMap.Point(data_info[i][0],data_info[i][1]));  // 创建标注
        map.addOverlay(marker);               // 将标注添加到地图中
        let offsetX = -(data_info[i][2].length / 2 * 13);
        let label = new BMap.Label(data_info[i][2],{offset:new BMap.Size(offsetX, 25)});
        marker.setLabel(label);
        marker.setZIndex(999);
        label.setZIndex(9999);
        label.setStyle({display: "none"});
        marker.addEventListener('mouseover', function(e){
            var label = this.getLabel();
            label.setStyle({display: "block"});
        });
        marker.addEventListener('mouseout', function(e){
            let label = this.getLabel();
            label.setStyle({display: "none"});
        });
        let url = data_info[i][3];
        marker.addEventListener('click', function(e){
            window.location.href = url;
        });
    }
    map.setMapType(BMAP_SATELLITE_MAP);
    //添加地图类型控件
    map.addControl(new BMap.MapTypeControl({
        mapTypes:[
            BMAP_SATELLITE_MAP,
            BMAP_HYBRID_MAP,
            BMAP_NORMAL_MAP
        ]}));


    // map.enableScrollWheelZoom();   //启用滚轮放大缩小，默认禁用
    map.enableContinuousZoom();
    var top_left_navigation = new BMap.NavigationControl();  //左上角，添加默认缩放平移控件
    map.addControl(top_left_navigation);
</script>
<!-- 百度地图事件结束 -->

<?php endif; ?>

<!-- 一些jquery事件 -->
<script>
    var showtemp = 1;
    $('#show-more').on('click',function(){
        $('#road').toggleClass('road-content-less');
        if (showtemp==1){
            $(this).html('收起 <i class="fa fa-angle-up"></i>');
            showtemp = 2;
        }else{
            $(this).html('展开 <i class="fa fa-angle-down"></i>');
            showtemp = 1;
        }
    })
    var mynumber = parseInt(Math.random()*(4));

    $('.subscription:eq('+mynumber+')').css('display','block');
</script>
<!-- 一些jquery事件结束 -->


<!--modernizr.min.js-->
<script src=<?=site_url('/assets/js/modernizr.min.js')?>></script>

<!--bootstrap.min.js-->
<script src=<?=site_url('/assets/js/bootstrap.min.js')?>></script>

<!-- bootsnav js -->
<script src=<?=site_url('/assets/js/bootsnav.js')?>></script>

<!--feather.min.js-->
<script  src=<?=site_url('/assets/js/feather.min.js')?>></script>

<!-- counter js -->
<script src=<?=site_url('/assets/js/jquery.counterup.min.js')?>></script>
<script src=<?=site_url('/assets/js/waypoints.min.js')?>></script>

<!--slick.min.js-->
<script src=<?=site_url('/assets/js/slick.min.js')?>></script>

<script src=<?=site_url('/assets/js/jquery.easing.min.js')?>></script>

<!--Custom JS-->
<script src=<?=site_url('/assets/js/custom.js')?>></script>

</body>

</html>
