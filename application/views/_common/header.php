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
    <?php if ($hasMap) : ?>
    <script type="text/javascript" src="//api.map.baidu.com/api?v=2.0&ak=fKVcbNihl7zHVcv4Hhj5nTytAISlVDBG"></script>
    <?php endif; ?>
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
                        <?php empty($nav) && $nav = '' ?>
                        <li <?=($nav=='home'?'class="active"':'')?>><a href="<?=site_url('/')?>">首页</a></li>
                        <li <?=($nav=='location'?'class="active"':'')?>><a href="<?=site_url('/location')?>">全部地点</a></li>
                        <li <?=($nav=='poet'?'class="active"':'')?>><a href="<?=site_url('/poet')?>">全部诗人</a></li>
                        <li <?=($nav=='about'?'class="active"':'')?>><a href="<?=site_url('/about/website')?>">网站介绍</a></li>
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