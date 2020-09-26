<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"D:\phpstudy_pro\WWW\hemei\public/../application/staff\view\release\index.html";i:1601109967;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/staff/css/base.css">
    <link rel="stylesheet" href="/assets/staff/css/staff_common.css">
    <link rel="stylesheet" href="/assets/staff/layui/css/layui.css">
    <script type="text/javascript" src="/assets/staff/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="/assets/staff/layui/layui.js"></script>
    <title>发布帖子</title>
</head>

<body>
<header class="header">
    <img src="/assets/staff/images/back.png" alt="">
    发布帖子
</header>
<form class="layui-form" action="">
    <div class="merchants">
        <div class="content">
            <div class="acrtice">
                <textarea rows="8" cols="39" name="content" placeholder="请填写文章内容.."></textarea>
            </div>

            <div class="layui-upload">
                <button type="button" class="updata_img" id="test1">
                    <img src="/assets/staff/images/up-icon.png" alt="">
                    <p>最多上传六张</p>
                </button>
                <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;color:#858585">
                    预览图：
                    <div class="pic-more">
                        <ul class="pic-more-upload-list" id="slide-pc-priview">
                        </ul>
                    </div>
                    <div class="layui-upload-list" id="demo2"></div>
                </blockquote>
            </div>
        </div>
        <div class="layui-form-item">
            <button lay-submit class="layui-btn btn-fc711e" lay-filter="formDemo">立即提交</button>
        </div>
    </div>
</form>
<script type="text/javascript" src="/assets/staff/js/common.js"></script>
<script>
    layui.use(['upload', 'jquery', 'form'], function() {
        var upload = layui.upload;
        var $ = layui.jquery;
        var form = layui.form;
        //执行实例
        upload.render({
            elem: '#test1',
            url: '/staff/ajax/moreUpload',
            number:6,
            size:2000,
            exts: 'jpg|png|jpeg',
            multiple: true,
            before: function(obj) {
                // $('#demo2').append('<img src="'+ result +'" alt="'+ file.name +'" class="layui-upload-img">')
            },
            done: function(res) {
                //layer.close(layer.msg());//关闭上传提示窗口
                if(res.status == 0) {
                    return layer.msg(res.message);
                }
                // layer.msg('图片上传成功', {
                //     icon: 16,
                //     shade: 0.01,
                //     time: 2000
                // })
                $('#slide-pc-priview').append('<li class="item_img"><div class="operate"><i class="toleft layui-icon"></i><i class="toright layui-icon"></i><i  class="close layui-icon"></i></div><img src="/static/../' + res.filepath + '" class="img" ><input type="hidden" name="pc_src[]" value="' + res.filepath + '" /></li>');
            }
        });
        form.on('submit(formDemo)', function(data) {
            //layer.msg(JSON.stringify(data.field));
            $.ajax({
                url:"<?php echo url('release/index'); ?>",
                data:data.field,
                type:'post',
                success:function (res) {
                    if(res.code == 1){
                        layer.msg('提交成功', {
                            icon: 16,
                            shade: 0.01,
                            time: 1000,
                        },function () {
                            window.location.href = "<?php echo url('invitation/index'); ?>"
                            }
                        )
                    }else{
                        layer.msg(res.msg, {
                            icon: 15,
                            shade: 0.01,
                            time: 1000
                        })
                    }
                }
            })
            return false;
        });
    });
    //点击多图上传的X,删除当前的图片
    $("body").on("click",".close",function(){
        $(this).closest("li").remove();
    });
    //多图上传点击<>左右移动图片
    $("body").on("click",".pic-more ul li .toleft",function(){
        var li_index=$(this).closest("li").index();
        if(li_index>=1){
            $(this).closest("li").insertBefore($(this).closest("ul").find("li").eq(Number(li_index)-1));
        }
    });
    $("body").on("click",".pic-more ul li .toright",function(){
        var li_index=$(this).closest("li").index();
        $(this).closest("li").insertAfter($(this).closest("ul").find("li").eq(Number(li_index)+1));
    });
    //监听提交

</script>
<style>

    .pic-more { width:100%; height: 100px margin: 10px 0px 0px 0px;}
    .pic-more li { width:30%; float: left; margin-right:5px;}
    .pic-more li .layui-input { display: initial; }
    .pic-more li a { position: absolute; top: 0; display: block; }
    .pic-more li a i { font-size: 24px; background-color: #008800; }
    #slide-pc-priview .item_img img{ width: 80px; height: 80px;margin: 0 5px}
    #slide-pc-priview li{position: relative;}
    #slide-pc-priview li .operate{ color: #000; display: none;}
    #slide-pc-priview li .toleft{ position: absolute;top: 40px; left: 1px; cursor:pointer;}
    #slide-pc-priview li .toright{ position: absolute;top: 40px; right: 1px;cursor:pointer;}
    #slide-pc-priview li .close{position: absolute;top: 5px; right: 5px;cursor:pointer;}
    #slide-pc-priview li:hover .operate{ display: block;}
    .layui-elem-quote {    min-height: 80px;}
</style>
</body>

</html>
