<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"D:\phpstudy_pro\WWW\hemei\public/../application/staff\view\invitation\index.html";i:1601103090;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/staff/css/base.css">
    <link rel="stylesheet" href="/assets/staff/css/staff_common.css">
    <script type="text/javascript" src="/assets/staff/js/jquery-3.1.1.min.js"></script>
    <title>帖子管理</title>
</head>

<body>
<header class="header">
    <img src="/assets/staff/images/back.png" alt="">
    帖子管理
</header>
<div id="tab">
    <ul id="tab-tilte" class="tab-tilte">
        <li class="active">审核中</li>
        <li>已通过</li>
        <li>已驳回</li>
    </ul>
</div>
<div class="home-bg circle-connect">
    <div class="tab-content" id="tab-content">
        <div class="div cur">
            <?php if(is_array($circle_list) || $circle_list instanceof \think\Collection || $circle_list instanceof \think\Paginator): $i = 0; $__LIST__ = $circle_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['status'] == 1): ?>
                    <div class="pro-connect">
                        <div class="user">
                            <div class="photo">
                                <img src="<?php echo $vo['photo']; ?>" alt="">
                            </div>
                            <div class="user-content">
                                <!-- 根据active类名改变收藏按钮 -->
                                <div class="row row1">
                                    <span><?php echo $vo['accountname']; ?></span>
                                    <span  class="gray-star" style="color: #3ec4d4;">等待审核...</span>
                                </div>
                                <div class="row row2 comrow2">
                                    <?php echo $vo['content']; ?>
                                </div>
                            </div>
                        </div>
                        <div class="slide2 pro-pic">
                            <?php if(is_array($vo['images']) || $vo['images'] instanceof \think\Collection || $vo['images'] instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($vo['images']) ? array_slice($vo['images'],0,6, true) : $vo['images']->slice(0,6, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i;?>
                            <div class="item">
                                <img src="<?php echo $r; ?>" alt="" class="compic">
                            </div>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                        <div class="connect-bottom">
                            <div class="like">
                                <span>昨天</span>
                                <div class="like-icon">
                                    <img src="/assets/staff/images/ylike.png" alt="">
                                    <span>0</span>
                                    <img src="/assets/staff/images/store.png" alt="" class="gray-star">
                                    <span>0</span>
                                    <img src="/assets/staff/images/ystore.png" alt="" class="yellow-star hidden">
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div class="div">
            <?php if(is_array($circle_list) || $circle_list instanceof \think\Collection || $circle_list instanceof \think\Paginator): $i = 0; $__LIST__ = $circle_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['status'] == 2): ?>
            <div class="pro-connect">
                <div class="user">
                    <div class="photo">
                        <img src="/assets/staff/images/user-photo.png" alt="">
                    </div>
                    <div class="user-content">
                        <!-- 根据active类名改变收藏按钮 -->
                        <div class="row row1">
                            <span><?php echo $vo['accountname']; ?></span>
                            <span  class="gray-star" style="color: #247c3c;">已发布</span>
                        </div>
                        <div class="row row2 comrow2">
                            <?php echo $vo['content']; ?>
                        </div>
                    </div>
                </div>
                <div class="slide2 pro-pic">
                    <?php if(is_array($vo['images']) || $vo['images'] instanceof \think\Collection || $vo['images'] instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($vo['images']) ? array_slice($vo['images'],0,6, true) : $vo['images']->slice(0,6, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i;?>
                    <div class="item">
                        <img src="<?php echo $r; ?>" alt="" class="compic">
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <div class="connect-bottom">
                    <div class="like">
                        <span>昨天</span>
                        <div class="like-icon">
                            <img src="/assets/staff/images/ylike.png" alt="">
                            <span>15</span>
                            <img src="/assets/staff/images/store.png" alt="" class="gray-star">
                            <img src="/assets/staff/images/ystore.png" alt="" class="yellow-star hidden">
                        </div>
                    </div>
                    <!-- 通过类名active显示分享等功能 -->
                    <div class="dot active">
                        <span class="dot-icon"></span>
                        <span class="dot-icon"></span>
                        <span class="dot-icon"></span>
                        <div class="del hidden">
                            <a href="" class="item">
                                <img src="/assets/staff/images/del_icon.png" alt="">
                                删除
                            </a>

                        </div>
                    </div>
                </div>
            </div>
            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div class="div">
            <?php if(is_array($circle_list) || $circle_list instanceof \think\Collection || $circle_list instanceof \think\Paginator): $i = 0; $__LIST__ = $circle_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['status'] == 9): ?>
            <div class="pro-connect">
                <div class="user">
                    <div class="photo">
                        <img src="/assets/staff/images/user-photo.png" alt="">
                    </div>
                    <div class="user-content">
                        <!-- 根据active类名改变收藏按钮 -->
                        <div class="row row1">
                            <span><?php echo $vo['accountname']; ?></span>
                            <span  class="gray-star" style="color: #f63110;">未通过</span>
                        </div>
                        <div class="row row2 comrow2">
                            <?php echo $vo['content']; ?>
                        </div>
                    </div>
                </div>
                <div class="slide2 pro-pic">
                    <?php if(is_array($vo['images']) || $vo['images'] instanceof \think\Collection || $vo['images'] instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($vo['images']) ? array_slice($vo['images'],0,6, true) : $vo['images']->slice(0,6, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i;?>
                    <div class="item">
                        <img src="<?php echo $r; ?>" alt="" class="compic">
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <div class="connect-bottom">
                    <div class="like">
                        <span>昨天</span>
                        <div class="like-icon">
                            <img src="/assets/staff/images/ylike.png" alt="">
                            <span>15</span>
                            <img src="/assets/staff/images/store.png" alt="" class="gray-star">
                            <img src="/assets/staff/images/ystore.png" alt="" class="yellow-star hidden">
                        </div>
                    </div>
                    <!-- 通过类名active显示分享等功能 -->
                    <div class="dot active">
                        <span class="dot-icon"></span>
                        <span class="dot-icon"></span>
                        <span class="dot-icon"></span>
                        <div class="more hidden">
                            <a href="" class="item">
                                <img src="/assets/staff/images/wshare.png" alt="">
                                分享
                            </a>
                            <a href="" class="item">
                                <img src="/assets/staff/images/wcomment.png" alt="">
                                评论
                            </a>
                            <a href="" class="item">
                                <img src="/assets/staff/images/wlike.png" alt="">
                                点赞
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
</div>
</div>
<footer class="footer">
    <a href="<?php echo url('Release/index'); ?>" class="item item1 fabu">
        <div class="name">
            发布新帖
            <img src="/assets/staff/images/fabu_03.png" alt="">
        </div>
    </a>
</footer>
<script>
    $(document).ready(function() {
        $('#tab-tilte li').click(function() {
            var cur = $(this).index(); //获取当前点击tab标题的索引值
            tabFun(cur); //调用方法
        });
    });

    function tabFun(cur) {
        $('#tab-tilte li').eq(cur).addClass('active').siblings().removeClass('active');
        $('#tab-content .div').eq(cur).addClass('cur').siblings().removeClass('cur');
    }
</script>
<script type="text/javascript" src="/assets/staff/js/common.js"></script>
</body>

</html>
