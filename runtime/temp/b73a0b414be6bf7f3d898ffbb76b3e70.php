<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:75:"D:\phpstudy_pro\WWW\hemei\public/../application/index\view\index\index.html";i:1600761779;s:67:"D:\phpstudy_pro\WWW\hemei\application\index\view\common\banner.html";i:1600669374;s:67:"D:\phpstudy_pro\WWW\hemei\application\index\view\common\footer.html";i:1600669001;s:67:"D:\phpstudy_pro\WWW\hemei\application\index\view\common\script.html";i:1600668699;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/home/css/base.css">
    <link rel="stylesheet" href="/assets/home/css/common.css">
    <link rel="stylesheet" href="/assets/home/css/swiper.min.css">
    <script type="text/javascript" src="/assets/home/js/swiper.min.js"></script>
    <script type="text/javascript" src="/assets/home/js/jquery-3.1.1.min.js"></script>
    <title>首页_<?php echo $site['name']; ?></title>
</head>
<body>
<header class="header">
    首页
</header>
<div class="home-bg">
    <div class="slide">
    <div class="swiper-container slide1">
        <div class="swiper-wrapper">
            <?php if(is_array($data['banner']) || $data['banner'] instanceof \think\Collection || $data['banner'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['banner'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <div class="swiper-slide">
                <img src="<?php echo $vo['image']; ?>" alt="<?php echo $vo['title']; ?>" class="object">
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>

        <!-- Add Pagination -->
        <div class="swiper-pagination pagination1"></div>
    </div>
</div>
    <div class="com-desc">
        <div class="com-logo">
            <img src="/assets/home/images/h-logo.png" alt="" class="object">
        </div>
        <div class="desc">
            <a href="<?php echo url('about/index'); ?>">
                <div class="pic-box">
                    <img src="<?php echo $data['web_about']['image']; ?>" alt="" class="object">
                </div>
                <div class="txt">
                    <?php echo $data['web_about']['description']; ?>
                </div>
            </a>
        </div>
    </div>
    <div class="com-news">
        <div class="title">
            <a href="<?php echo url('article/index'); ?>">
                <div class="tit">
                    <img src="/assets/home/images/hnew-icon.png" alt="">
                    <h3>企业新闻</h3>
                </div>
                <div class="more">
                    MORE+
                </div>
            </a>
        </div>
        <div class="news-list">

        </div>
    </div>
    <div class="pro-connect">
        <div class="user">

            <div class="photo">
                <img src="<?php echo $circle['image']; ?>" alt="" >
            </div>
            <div class="user-content">
                <!-- 根据active类名改变收藏按钮 -->
                <div class="row row1">
                    <span><?php echo $circle['username']; ?></span>
                    <img src="/assets/home/images/store.png" alt="" class="gray-star">
                    <img src="/assets/home/images/ystore.png" alt="" class="yellow-star hidden">
                </div>
                <div class="row row2 comrow2">
                   <?php echo $circle['content']; ?>
                </div>
            </div>

        </div>
        <div class="swiper-container slide2">
            <div class="swiper-wrapper">
                <?php if(is_array($circle['images']) || $circle['images'] instanceof \think\Collection || $circle['images'] instanceof \think\Paginator): $i = 0; $__LIST__ = $circle['images'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <div class="swiper-slide">
                        <img src="<?php echo $vo; ?>" alt="">
                    </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination pagination2"></div>
        </div>
    </div>
    <div class="hservice">
        <div class="title com-title">
            <a href="<?php echo url('service/index'); ?>" class="comh3">
                综合服务
            </a>
        </div>
        <div class="ser-content">
            <div class="row row1">
                <?php if(is_array($data['category']) || $data['category'] instanceof \think\Collection || $data['category'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['category'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($key < 2): ?>
                        <a href="<?php echo url('service/serviceList'); ?>?pid=<?php echo $vo['id']; ?>" class="item item<?php echo $key+1; ?>">
                            <div class="pic-box">
                                <img src="<?php echo $vo['image']; ?>" alt="" class="object">
                            </div>
                            <div class="item-name">
                                <img src="/assets/home/images/hicon<?php echo $key+1; ?>.png" alt="">
                                <h4><?php echo $vo['name']; ?></h4>
                            </div>
                        </a>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <div class="row row2">
                <?php if(is_array($data['category']) || $data['category'] instanceof \think\Collection || $data['category'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['category'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($key > 1): ?>
                        <a href="<?php echo url('service/serviceList'); ?>?pid=<?php echo $vo['id']; ?>">
                            <div class="pic-box">
                                <img src="<?php echo $vo['image']; ?>" alt="" class="object">
                            </div>
                            <div class="item-name">
                                <img src="/assets/home/images/hicon3.png" alt="">
                                <h4><?php echo $vo['name']; ?></h4>
                            </div>
                        </a>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </div>
    <div class="hstaff">
        <div class="title com-title">
            <h3 class="comh3">
                员工风采
            </h3>
        </div>
        <div class="staff-desc">
            <a href="<?php echo url('staff/index'); ?>">
                <div class="pic-box">
                    <img src="<?php echo $data['staff']['image']; ?>" alt="" class="object">
                </div>
                <div class="desc">
                    <?php echo $data['staff']['content']; ?>
                </div>
            </a>
        </div>
    </div>
    <div class="add-us post">
        <img src="<?php echo $data['join']['image']; ?>" alt="">
    </div>
    <div class="post">
        <a href="<?php echo url('merchants/index'); ?>">
            <img src="/assets/home/images/pic2.jpg" alt="">
        </a>
    </div>
    <div class="connect">
        <div class="title com-title">
            <h3 class="comh3">
                联系方式
            </h3>
        </div>
        <div class="con-info">
            <div class="row row1">
                <img src="/assets/home/images/address-icon.png" alt="">
                <div class="text">
                    地址：<?php echo $data['contact']['address']; ?>
                </div>
            </div>
            <div class="row row2">
                <img src="/assets/home/images/mail.png" alt="">
                <div class="text">
                    邮箱：<?php echo $data['contact']['email']; ?>
                </div>
            </div>
            <div class="row row3">
                <div class="item">
                    <div class="pic-box">
                        <img src="/assets/home/images/haddress.png" alt="" >
                    </div>
                    <div class="name">
                        四川和美
                    </div>
                </div>

                <div class="item item2">
                    <div class="pic-box">
                        <img src="<?php echo $data['contact']['image']; ?>" alt="" >
                    </div>
                    <div class="name">
                        微信二维码
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<footer class="footer">
    <a href="<?php echo url('/'); ?>" class="item item1 active">
        <div class="icon">
            <img src="/assets/home/images/home-active.png" alt="">
        </div>
        <div class="name"><?php echo __('Home'); ?></div>
    </a>
    <a href="<?php echo url('index/product/index'); ?>" class="item item2 ">
        <div class="icon">
            <img src="/assets/home/images/product.png" alt="">
        </div>
        <div class="name">产品</div>
    </a>
    <a href="<?php echo url('index/circle/index'); ?>" class="item item3 ">
        <div class="icon">
            <img src="/assets/home/images/circle_sel.png" alt="">
        </div>
        <div class="name">圈子</div>
    </a>
    <a href="<?php echo url('index/user/index'); ?>" class="item item4 ">
        <div class="icon">
            <img src="/assets/home/images/profile.png" alt="">
        </div>
        <div class="name">我的</div>
    </a>
    <div class="put-away"></div>
</footer>
<script>
    var swiper = new Swiper('.slide1', {
        pagination: '.pagination1',
        paginationClickable: true
    });
    var swiper = new Swiper('.slide2', {
        pagination: '.pagination2',
        slidesPerView: 3,
        slidesPerColumn: 2,
        paginationClickable: true,
        spaceBetween: 10
    });
</script>
<script type="text/javascript" src="/assets/home/js/common.js"></script>
</body>
</html>