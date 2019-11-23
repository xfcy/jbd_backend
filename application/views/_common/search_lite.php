<!--welcome-hero start -->
<section id="home" class="welcome-hero welcome-hero-search">
    <div class="container">
        <div class="welcome-hero-serch-box">
            <div class="welcome-hero-form">
                <div class="single-welcome-hero-form">
                    <h3>精确查找</h3>
                    <form action="<?=site_url('/search')?>" method="get" id="exact">
                        <input type="hidden" name="type" value="1">
                        <input type="text" placeholder="检索诗句、标题" name="keyword" value="<?=(isset($type) && $type == 1 && isset($keyword)) ? $keyword : ''?>" />
                    </form>
                    <div class="welcome-hero-form-icon">
                        <i class="flaticon-list-with-dots"></i>
                    </div>
                </div>
                <div class="single-welcome-hero-form">
                    <h3>智能匹配</h3>
                    <form action="<?=site_url('/search')?>" method="get" id="fuzzy">
                        <input type="hidden" name="type" value="2">
                        <input type="text" placeholder="检索年代、作者、地点" name="keyword" value="<?=(isset($type) && $type == 2 && isset($keyword)) ? $keyword : ''?>" />
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
<!--welcome-hero end --><!--/.welcome-hero-->
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
