<!doctype html>
<html class="no-js" lang="zh">

<head>
    <!-- meta data -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- 唐京汴道文学地图 -->
    <!-- title of site -->
    <title>唐京汴道文学地图</title>

    <!-- For favicon png -->
    <link rel="shortcut icon" type="image/icon" href="<?=site_url('/assets/logo/favicon.png')?>"/>

    <!--font-awesome.min.css-->
    <link rel="stylesheet" href="<?=site_url('/assets/css/font-awesome.min.css')?>">

    <!--linear icon css-->
    <link rel="stylesheet" href="<?=site_url('/assets/css/linearicons.css')?>">

    <!--animate.css-->
    <link rel="stylesheet" href="<?=site_url('/assets/css/animate.css')?>">

    <!--flaticon.css-->
    <link rel="stylesheet" href="<?=site_url('/assets/css/flaticon.css')?>">

    <!--slick.css-->
    <link rel="stylesheet" href="<?=site_url('/assets/css/slick.css')?>">
    <link rel="stylesheet" href="<?=site_url('/assets/css/slick-theme.css')?>">

    <!--bootstrap.min.css-->
    <link rel="stylesheet" href="<?=site_url('/assets/css/bootstrap.min.css')?>">

    <!-- bootsnav -->
    <link rel="stylesheet" href="<?=site_url('/assets/css/bootsnav.css')?>" >

    <!--style.css-->
    <link rel="stylesheet" href="<?=site_url('/assets/css/style.css')?>">

    <!--responsive.css-->
    <link rel="stylesheet" href="<?=site_url('/assets/css/responsive.css')?>">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>
    <script src="<?=site_url('/assets/js/html5shiv.min.js')?>"></script>
    <script src="<?=site_url('/assets/js/respond.min.js')?>"></script>
    <![endif]-->
    <script type="text/javascript" src="//api.map.baidu.com/api?v=2.0&ak=fKVcbNihl7zHVcv4Hhj5nTytAISlVDBG"></script>
    <script src="<?=site_url('/assets/js/jquery.js')?>"></script>
</head>

<body>
<!--[if lte IE 9]>
<p class="browserupgrade">你正在使用 <strong>被淘汰的</strong> 浏览器. 请使用谷歌、火狐或者IE10以上版本，提高安全性和用户体验。</p>
<![endif]-->

<!-- top-area Start -->
<section class="top-area">
    <div class="header-area">
        <!-- Start Navigation -->
        <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy"  data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="<?=site_url('/')?>">唐京汴道<span>文学地图</span></a>

                </div><!--/.navbar-header-->
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                        <li <?=($nav=='home'?'class="active"':'')?>><a href="<?=site_url('/')?>">首页</a></li>
                        <li <?=($nav=='location'?'class="active"':'')?>><a href="<?=site_url('/location')?>">全部地点</a></li>
                        <li <?=($nav=='poet'?'class="active"':'')?>><a href="<?=site_url('/poet')?>">全部作家</a></li>
                        <li <?=($nav=='poetry'?'class="active"':'')?>><a href="<?=site_url('/poetry')?>">全部作品</a></li>
                        <li <?=($nav=='about'?'class="active"':'')?>><a href="<?=site_url('/about/website')?>">平台介绍</a></li>
                        <li <?=($nav=='about'?'class="active"':'')?>><a href="<?=site_url('/about/project')?>">项目介绍</a></li>
                    </ul><!--/.nav -->
                </div><!-- /.navbar-collapse -->
            </div><!--/.container-->
        </nav><!--/nav-->
        <!-- End Navigation -->
    </div><!--/.header-area-->
    <div class="clearfix"></div>

</section><!-- /.top-area-->
<!-- top-area End -->
<!--welcome-hero start -->
<section id="home" class="welcome-hero">
    <div class="container">
        <div class="welcome-hero-txt">
            <p class="welcome-hero-name">国家社科基金项目《唐长安至汴京道文学的文化学考察与信息平台建设》成果</p>
            <p class="welcome-hero-label">两京大道多游客，每遇词人战一场</p>
            <h2>唐京汴道<span class="welcome-hero-txt-info">文学地图</span> </h2>
        </div>
        <div class="welcome-hero-serch-box">
            <div class="welcome-hero-form">
                <div class="single-welcome-hero-form">
                    <h3>精确查找</h3>
                    <form action="<?=site_url('/search')?>" method="get" id="exact">
                        <input type="hidden" name="type" value="1">
                        <input type="text" placeholder="检索诗句、标题" name="keyword" />
                    </form>
                    <div class="welcome-hero-form-icon">
                        <i class="flaticon-list-with-dots"></i>
                    </div>
                </div>
                <div class="single-welcome-hero-form">
                    <h3>智能匹配</h3>
                    <form action="<?=site_url('/search')?>" method="get" id="fuzzy">
                        <input type="hidden" name="type" value="2">
                        <input type="text" placeholder="检索年代、作者、地点" name="keyword" />
                    </form>
                    <div class="welcome-hero-form-icon">
                        <i class="flaticon-gps-fixed-indicator"></i>
                    </div>
                </div>
            </div>
            <div class="welcome-hero-serch">
                <button class="welcome-hero-btn" id="btn_search_submit">
                    搜索  <i data-feather="search"></i>
                </button>
            </div>
        </div>
    </div>

</section><!--/.welcome-hero-->
<!--welcome-hero end -->

<!--list-topics start -->
<section id="list-topics" class="list-topics">
    <div class="container">
        <div class="list-topics-content">
            <ul>
                <li>
                    <a href="<?=site_url('/location')?>" class="single-list-topics-content">
                        <div class="single-list-topics-icon">
                            <i class="flaticon-location-on-road"></i>
                        </div>
                        <h2>全部地点</h2>
                    </a>
                </li>
                <li>
                    <a href="<?=site_url('/poet')?>" class="single-list-topics-content">
                        <div class="single-list-topics-icon">
                            <i class="flaticon-list-with-dots"></i>
                        </div>
                        <h2>全部作家</h2>
                    </a>
                </li>
                <li>
                    <a href="<?=site_url('/poetry')?>" class="single-list-topics-content">
                        <div class="single-list-topics-icon">
                            <i class="flaticon-search"></i>
                        </div>
                        <h2>全部作品</h2>
                    </a>
                </li>
                <li>
                    <a href="<?=site_url('/about/website')?>" class="single-list-topics-content">
                        <div class="single-list-topics-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="45" height="45"><path fill="none" d="M0 0h24v24H0z"/><path d="M2 5l7-3 6 3 6.303-2.701a.5.5 0 0 1 .697.46V19l-7 3-6-3-6.303 2.701a.5.5 0 0 1-.697-.46V5zm14 14.395l4-1.714V5.033l-4 1.714v12.648zm-2-.131V6.736l-4-2v12.528l4 2zm-6-2.011V4.605L4 6.319v12.648l4-1.714z"/></svg>
                        </div>
                        <h2>平台介绍</h2>
                    </a>
                </li>
                <li>
                    <a href="<?=site_url('/about/project')?>" class="single-list-topics-content">
                        <div class="single-list-topics-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="45" height="45"><path fill="none" d="M0 0h24v24H0z"/><path d="M3 21a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h7.414l2 2H20a1 1 0 0 1 1 1v3h-2V7h-7.414l-2-2H4v11.998L5.5 11h17l-2.31 9.243a1 1 0 0 1-.97.757H3zm16.938-8H7.062l-1.5 6h12.876l1.5-6z"/></svg>
                        </div>
                        <h2>项目介绍</h2>
                    </a>
                </li>
            </ul>
        </div>
    </div><!--/.container-->

</section><!--/.list-topics-->
<!--list-topics end-->

<div class="section-header section-header-map">
    <h2>唐京汴道馆驿地望图 </h2>
    <p>一驿过一驿，驿骑如星流</p>
</div>
<!--map strat -->
<section id="allmap"  class="mymap" >

</section><!--/map-->
<!--map end -->




<!--explore start -->
<section id="explore" class="explore">
    <div class="container">
        <div class="section-header">
            <h2>鉴赏</h2>
            <p>行看洛阳陌，光景丽天中</p>
        </div><!--/.section-header-->
        <div class="explore-content">
            <div class="row">
                <div class=" col-md-4 col-sm-6">
                    <div class="single-explore-item">
                        <div class="single-explore-img">
                            <img src="assets/images/explore/e1.jpg" alt="explore image">

                        </div>
                        <div class="single-explore-txt bg-theme-1">
                            <h2><a href="<?=site_url('/poetry/show/5e07f90741b74647b37cce7dbf7c57c0')?>">将赴阌乡灞上留别钱起员外</a></h2>
                            <p class="explore-rating-price">
                                <span>772年</span>
                                <span class="explore-price-box">
                                        卢纶
										</span>
                                <a href="#">灞桥驿</a>
                            </p>
                            <div class="explore-person">
                                <div class="row">

                                    <div class="col-sm-12">
                                        <p>
                                        暖景登桥望，分明春色来。离心自惆怅，车马亦裴回。远雪和霜积，高花占日开。从官竟何事，忧患已相催。										</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="single-explore-item">
                        <div class="single-explore-img">
                            <img src="assets/images/explore/e2.jpg" alt="explore image">

                        </div>
                        <div class="single-explore-txt bg-theme-2">
                            <h2><a href="<?=site_url('/poetry/show/5114d4d5631c4deaa44cd98367269d2d')?>">秋日赴阙题潼关驿楼</a></h2>
                            <p class="explore-rating-price">
                                <span>808年</span>
                                <span class="explore-price-box">许浑</span>
                                <a href="#">潼关驿</a>
                            </p>
                            <div class="explore-person">
                                <div class="row">

                                    <div class="col-sm-12">
                                        <p>
                                        红叶晚萧萧，长亭酒一瓢。残云归太华，疏雨过中条。树色随山迥，河声入海遥。帝乡明日到，犹自梦渔樵。											</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="single-explore-item">
                        <div class="single-explore-img">
                            <img src="assets/images/explore/e3.jpg" alt="explore image">

                        </div>
                        <div class="single-explore-txt bg-theme-3">
                            <h2><a href="<?=site_url('/poetry/show/d6e201d412d94993b7d254d4aa15632b')?>">奉和圣制途次陕州应制</a></h2>
                            <p class="explore-rating-price">
                                <span>725年</span>
                                <span class="explore-price-box">
                                张说
										</span>
                                <a href="#">甘棠驿</a>
                            </p>
                            <div class="explore-person">
                                <div class="row">

                                    <div class="col-sm-12">
                                        <p>
                                        周召尝分陕，诗书空复传。何如万乘眷，追赏二南篇。郡带洪河侧，宫临大道边。洛城将日近，佳气满山川。
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class=" col-md-4 col-sm-6">
                    <div class="single-explore-item">
                        <div class="single-explore-img">
                            <img src="assets/images/explore/e4.jpg" alt="explore image">

                        </div>
                        <div class="single-explore-txt bg-theme-4">
                            <h2><a href="<?=site_url('/poetry/show/85f8bb5a758d4fa2b932f1e83a680594')?>">寒食汜上作</a></h2>
                            <p class="explore-rating-price">
                                <span>726年</span>
                                <span class="explore-price-box">
											王维
										</span>
                                <a href="#">荥阳</a>
                            </p>
                            <div class="explore-person">
                                <div class="row">

                                    <div class="col-sm-12">
                                        <p>
                                            广武城边逢暮春，汶阳归客泪沾巾。落花寂寂啼山鸟，杨柳青青渡水人。												</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="single-explore-item">
                        <div class="single-explore-img">
                            <img src="assets/images/explore/e5.jpg" alt="explore image">

                        </div>
                        <div class="single-explore-txt bg-theme-2">
                            <h2><a href="<?=site_url('/poetry/show/81cf238463534938a6be2d4d75515278')?>">酬李相公喜归乡国自巩县夜泛洛水见寄</a></h2>
                            <p class="explore-rating-price">
                                <span>年代不详</span>
                                <span class="explore-price-box">
											刘禹锡
										</span>
                                <a href="#">孝义驿</a>
                            </p>
                            <div class="explore-person">
                                <div class="row">

                                    <div class="col-sm-12">
                                        <p>
                                            巩树烟月上，清光含碧流。且无三已色，犹泛五湖舟。鹏息风还起，凤归林正秋。虽攀小山桂，此地不淹留。
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="single-explore-item">
                        <div class="single-explore-img">
                            <img src="assets/images/explore/e6.jpg" alt="explore image">

                        </div>
                        <div class="single-explore-txt bg-theme-5">
                            <h2><a href="<?=site_url('/poetry/show/1cbd3250329a41809098a3a143e2592f')?>">旅次洛城东水亭</a></h2>
                            <p class="explore-rating-price">
                                <span>642年</span>
                                <span class="explore-price-box">
											孟郊
										</span>
                                <a href="#">洛阳</a>
                            </p>
                            <div class="explore-person">
                                <div class="row">

                                    <div class="col-sm-12">
                                        <p>
                                            水竹色相洗，碧花动轩楹。自然逍遥风，荡涤浮竞情。霜落叶声燥，景寒人语清。我来招隐亭，衣上尘暂轻。
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.container-->

</section><!--/.explore-->
<!--explore end -->


<!--reviews start -->
<section id="reviews" class="reviews">
    <div class="section-header">
        <h2>诗人介绍</h2>
        <p>田郎才貌出咸京 潘子文华向洛城</p>
    </div><!--/.section-header-->
    <div class="reviews-content">
        <div class="testimonial-carousel">
            <a class="single-testimonial-box" href="<?=site_url('/poet/show/f95e9ef80158412d9169d3e1d7e23211')?>">
                <div class="testimonial-description">
                    <div class="testimonial-info">
                        <div class="testimonial-person">
                            <h2>白居易</h2>
                            <h4>长安</h4>
                        </div><!--/.testimonial-person-->
                    </div><!--/.testimonial-info-->
                    <div class="testimonial-comment">
                        <p>
                            白居易（772－846），字乐天，号香山居士。河南新郑人。官至翰林学士、左赞善大夫。唐代三大诗人之一。白居易与元稹交好，二人有唱和诗歌传世，世称“元白”。乐天前期诗歌以讽谏为主，有《新乐府》传世；后期专攻通俗诗歌创作。语言平易通俗。有《白氏长庆集》传世。
                        </p>
                    </div><!--/.testimonial-comment-->
                </div><!--/.testimonial-description-->
            </a><!--/.single-testimonial-box-->
            <a class="single-testimonial-box" href="<?=site_url('/poet/show/4882f704f0ab43f185dc20369324ac5e')?>">
                <div class="testimonial-description">
                    <div class="testimonial-info">
                        <div class="testimonial-person">
                            <h2>孟郊</h2>
                            <h4>长安</h4>
                        </div><!--/.testimonial-person-->
                    </div><!--/.testimonial-info-->
                    <div class="testimonial-comment">
                        <p>
                            孟郊（751—814），字东野，湖州武康人。孟郊四十六岁及第，任溧阳县尉，不得志，遂放迹林泉，徘徊赋诗。后因河南尹郑余庆之荐，任职河南。孟郊工诗。因其诗作多写世态炎凉，民间苦难，有“诗囚”之称。今传有《孟东野诗集》10卷。
                        </p>
                    </div><!--/.testimonial-comment-->
                </div><!--/.testimonial-description-->
            </a><!--/.single-testimonial-box-->
            <a class="single-testimonial-box" href="<?=site_url('/poet/show/910c38f3fe554813b25e3d3a6aee320d')?>">
                <div class="testimonial-description">
                    <div class="testimonial-info">
                        <!--/.testimonial-img-->
                        <div class="testimonial-person">
                            <h2>岑参</h2>
                            <h4>长安</h4>
                        </div><!--/.testimonial-person-->
                    </div><!--/.testimonial-info-->
                    <div class="testimonial-comment">
                        <p>
                            岑参（715-770），荆州江陵人，唐代边塞诗人。岑参早年遍览史籍。天宝三年进士及第，初为率府兵曹参军。后历任高仙芝幕府掌书记；封常清幕府判官。官至嘉州刺史，世称“岑嘉州”。岑参长于七言歌行，《全唐诗》编诗四卷，今有《岑嘉州集》七卷行世。
                        </p>
                    </div><!--/.testimonial-comment-->
                </div><!--/.testimonial-description-->
            </a><!--/.single-testimonial-box-->
            <a class="single-testimonial-box" href="<?=site_url('/poet/show/50bf7f925ab641f8a4fcef50044ca109')?>">
                <div class="testimonial-description">
                    <div class="testimonial-info">
                        <div class="testimonial-person">
                            <h2>宋之问</h2>
                            <h4>洛阳</h4>
                        </div><!--/.testimonial-person-->
                    </div><!--/.testimonial-info-->
                    <div class="testimonial-comment">
                        <p>
                            宋之问（约656—约712），字延清，汾州隰城人，与沈佺期并称“沈宋”。武则天时，以文才为宫廷侍臣，颇受恩宠。中宗景龙中（708年）转考功员外郎，与杜审言、薛稷等同为修文馆学士。后因受贿罪贬越州长史。睿宗景云元年（710年）流放钦州。善工诗，有《宋之问集》传世。
                        </p>
                    </div><!--/.testimonial-comment-->
                </div><!--/.testimonial-description-->
            </a><!--/.single-testimonial-box-->
            <a class="single-testimonial-box" href="<?=site_url('/poet/show/9b4639bc141a4987a03eaf9ca29772e4')?>">
                <div class="testimonial-description">
                    <div class="testimonial-info">
                        <div class="testimonial-person">
                            <h2>刘禹锡</h2>
                            <h4>长乐驿</h4>
                        </div><!--/.testimonial-person-->
                    </div><!--/.testimonial-info-->
                    <div class="testimonial-comment">
                        <p>
                            刘禹锡（772－842）字梦得，洛阳人。贞元九年进士及第，初任记室，后历任朗州司马、主客郎中、礼部郎中、苏州刺史等职。晚年任太子宾客，世称“刘宾客”。刘诗精炼含蓄，语言清新，善于表达对人生与历史的深刻理解。为白居易所推崇，誉为“诗豪”。存世有《刘宾客集》。
                        </p>
                    </div><!--/.testimonial-comment-->
                </div><!--/.testimonial-description-->
            </a><!--/.single-testimonial-box-->
            <a class="single-testimonial-box" href="<?=site_url('/poet/show/92210671208840beb4b764ce30a3d27e')?>">
                <div class="testimonial-description">
                    <div class="testimonial-info">
                        <div class="testimonial-person">
                            <h2>李商隐</h2>
                            <h4>长乐驿</h4>
                        </div><!--/.testimonial-person-->
                    </div><!--/.testimonial-info-->
                    <div class="testimonial-comment">
                        <p>
                            李商隐（约813年-约858年），字义山，号玉溪生，又号樊南生，祖籍怀州河内。出生于郑州荥阳。开成二年（837年），李商隐登第，曾任秘书省校书郎、弘农尉等职。因卷入“牛李党争”而备受排挤，蹭蹬一生。李商隐工诗，善属文。其爱情与无题诗最佳：缠绵悱恻，优美动人，为人传诵。
                        </p>
                    </div><!--/.testimonial-comment-->
                </div><!--/.testimonial-description-->
            </a><!--/.single-testimonial-box-->
            <a class="single-testimonial-box" href="<?=site_url('/poet/show/2c280d02bf2a4672b06aeb6507458d6d')?>">
                <div class="testimonial-description">
                    <div class="testimonial-info">
                        <div class="testimonial-person">
                            <h2>高适</h2>
                            <h4>上源驿</h4>
                        </div><!--/.testimonial-person-->
                    </div><!--/.testimonial-info-->
                    <div class="testimonial-comment">
                        <p>
                            高适（704—765年），字达夫，一字仲武，渤海蓨（今河北景县） 人，后迁居宋州宋城（今河南商丘睢阳）。安东都护高侃之孙，唐代大臣、诗人。曾任刑部侍郎、散骑常侍，封渤海县侯，世称高常侍。 于永泰元年正月病逝，卒赠礼部尚书，谥号忠。
                        </p>
                    </div><!--/.testimonial-comment-->
                </div><!--/.testimonial-description-->
            </a><!--/.single-testimonial-box-->

        </div>
    </div>
    <a class="show-more" href="<?=site_url('/poet')?>">
        全部诗人 <i class="fa fa-angle-right"></i>
    </a>

</section><!--/.reviews-->
<!--reviews end -->





<!--blog start -->
<section id="blog" class="blog" >
    <div class="container">
        <div class="section-header section-header-location">
            <h2>地点</h2>
            <p>残云归太华，疏雨过中条</p>
        </div>
        <div class="blog-content">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="single-blog-item">
                        <div class="single-blog-item-img">
                            <img src="<?=site_url('/assets/images/blog/1.jpg')?>" alt="blog image">
                        </div>
                        <div class="single-blog-item-txt">
                            <h2><a href="<?=site_url('/location/show/ec6836e6458ed0321e79087be338790f')?>">都亭驿</a></h2>
                            <p>
                                程大昌《雍录》卷八：“（都亭驿）在朱雀街西，近鸿脑臚寺。”又据同书卷三《唐都城内坊里古要迹图》，都亭驿在朱雀街西自北而南第四坊。又《资治通鉴》卷二六〇，乾宁二年王行瑜杀韦昭度、李谿于都亭驿。胡三省注云：“都亭驿在朱雀门外西街含光门北来第二坊。”[ （宋）司马光编著，（元）胡三省音注：《资治通鉴》，中华书局，1956年版 ，第8470页。又《长安志》九云敦化坊“东门之北，都亭驿”。《两京城坊考》同。
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="single-blog-item">
                        <div class="single-blog-item-img">
                            <img src="<?=site_url('/assets/images/blog/2.jpg')?>" alt="blog image">
                        </div>
                        <div class="single-blog-item-txt">
                            <h2><a href="<?=site_url('/location/show/4a1d05a0f1db7d8b04dec76aec477d1f')?>">长乐驿</a></h2>
                            <p>
                                骆天骧《类编长安志》卷之七“邮驿”：“（长乐驿）在咸宁县东十五里长乐坡下。《两京道里记》曰：‘圣历元年敕：“滋水驿去都亭驿路远，马多死损，中间置长乐驿。”’东去滋水驿一十三里，西去都亭驿一十三里。”[ （元）骆天骧撰，黄永年点校：《类编长安志》，三秦出版社，2006年版，第205页。]同书卷之七“坡坂”：“（长乐坡）在咸宁县东北一十里，即浐水之西岸。《十道志》曰：‘旧名浐坂。隋文帝恶之，改名长乐坡，盖汉长乐宫在其西北。’”
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="single-blog-item">
                        <div class="single-blog-item-img">
                            <img src="<?=site_url('/assets/images/blog/3.jpg')?>" alt="blog image">
                        </div>
                        <div class="single-blog-item-txt">
                            <h2><a href="<?=site_url('/location/show/619c63866f5708c1e95f2f7201bd615f')?>">阌乡驿</a></h2>
                            <p>
                                唐杜佑《通典》卷一百七十七“州郡七”：“阌乡，汉以湖阌乡为戾园。”[ （唐）杜佑撰，王文锦等点校：《通典》卷一七七，中华书局，1988年版，第4659页。]晋潘岳《西征赋》：“发阌乡而警策，诉黄巷以济潼。眺华岳之阴崖，觌高掌之遗踪。”即指此地。隋唐时当大道，《隋书》载炀帝于大业五年正月自东都还长安，“二月戊戌，次于阌乡”（《隋书》卷三·帝纪第三·炀帝上）；《新唐书》卷二百七“宦者上”：“宪宗之立，贞亮为有功，然终身无所宠假。
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.container-->
    <a class="show-more" href="<?=site_url('/location')?>">
        全部位置 <i class="fa fa-angle-right"></i>
    </a>
</section><!--/.blog-->
<!--blog end -->

<!-- statistics strat -->
<section id="statistics"  class="statistics">
    <div class="container">
        <div class="statistics-counter">
            <div class="col-md-3 col-sm-6">
                <div class="single-ststistics-box">
                    <div class="statistics-content">
                        <div class="counter">641 </div> <span>首+</span>
                    </div><!--/.statistics-content-->
                    <h3>诗词</h3>
                </div><!--/.single-ststistics-box-->
            </div><!--/.col-->
            <div class="col-md-3 col-sm-6">
                <div class="single-ststistics-box">
                    <div class="statistics-content">
                        <div class="counter">252</div> <span>位+</span>
                    </div><!--/.statistics-content-->
                    <h3>作者</h3>
                </div><!--/.single-ststistics-box-->
            </div><!--/.col-->
            <div class="col-md-3 col-sm-6">
                <div class="single-ststistics-box">
                    <div class="statistics-content">
                        <div class="counter">289</div> <span>年</span>
                    </div><!--/.statistics-content-->
                    <h3>唐朝历史</h3>
                </div><!--/.single-ststistics-box-->
            </div><!--/.col-->
            <div class="col-md-3 col-sm-6">
                <div class="single-ststistics-box">
                    <div class="statistics-content">
                        <div class="counter">73</div> <span>个+</span>
                    </div><!--/.statistics-content-->
                    <h3>地理位置</h3>
                </div><!--/.single-ststistics-box-->
            </div><!--/.col-->
        </div><!--/.statistics-counter-->
    </div><!--/.container-->

</section><!--/.counter-->
<!-- statistics end -->
<script>
    $(function() {
        $('#btn_search_submit').on('click', function() {

            if ($('input[name=keyword]', '#exact').val() !== '') {
                $('#exact').submit();
            } else if ($('input[name=keyword]', '#fuzzy').val() !== '') {
                $('#fuzzy').submit();
            } else {
                return false;
            }
        })
    })
</script>

<!--subscription strat 这部分一直有 -->
<section id="contact1"  class="subscription" style="background:url(./assets/images/welcome-hero/banner2.jpg) center center no-repeat;background-size:cover;">
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
<section id="contact2"  class="subscription" style="background:url(./assets/images/welcome-hero/banner4.jpg) center center no-repeat;background-size:cover;">
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
<section id="contact3"  class="subscription" style="background:url(./assets/images/welcome-hero/banner6.jpg) center center no-repeat;background-size:cover;">
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
<section id="contact4"  class="subscription" style="background:url(./assets/images/welcome-hero/banner5.jpg) center center no-repeat;background-size:cover;">
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
<!--subscription end 这部分一直有结束 -->
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
<!-- 百度地图事件 -->
<script type="text/javascript">
    // 百度地图API功能
    var map = new BMap.Map("allmap");    // 创建Map实例
    map.centerAndZoom(new BMap.Point(111.19036,34.930745), 9);  // 初始化地图,设置中心点坐标和地图级别
    // 获取的数据
    var data_info = [
        <?php foreach ($locations as $l) : ?>
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
        let content = data_info[i][2];
        map.addOverlay(marker);               // 将标注添加到地图中
        let offsetX = -(data_info[i][2].length / 2 * 13);
        let label = new BMap.Label(data_info[i][2],{offset:new BMap.Size(offsetX,25)});
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



    //map.enableScrollWheelZoom();   //启用滚轮放大缩小，默认禁用
    map.enableContinuousZoom();
</script>
<!-- Include all js compiled plugins (below), or include individual files as needed -->

<!--modernizr.min.js-->
<script src="<?=site_url('/assets/js/modernizr.min.js')?>"></script>

<!--bootstrap.min.js-->
<script src="<?=site_url('/assets/js/bootstrap.min.js')?>"></script>

<!-- bootsnav js -->
<script src="<?=site_url('/assets/js/bootsnav.js')?>"></script>

<!--feather.min.js-->
<script  src="<?=site_url('/assets/js/feather.min.js')?>"></script>

<!-- counter js -->
<script src="<?=site_url('/assets/js/jquery.counterup.min.js')?>"></script>
<script src="<?=site_url('/assets/js/waypoints.min.js')?>"></script>

<!--slick.min.js-->
<script src="<?=site_url('/assets/js/slick.min.js')?>"></script>

<script src="<?=site_url('/assets/js/jquery.easing.min.js')?>"></script>

<!--Custom JS-->
<script src="<?=site_url('/assets/js/custom.js')?>"></script>

</body>

</html>
