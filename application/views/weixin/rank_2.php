<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>
        颜值排名
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="<?php echo base_url('public/weixin/css/weixin.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/css/loading.css') ?>">
    <script>
        var rank_3 = "<?php echo site_url('weixin/game/rank_3') ?>";
        var base_url = "<?php echo base_url('') ?>";
        var rank = "<?php echo site_url('weixin/Game/rank')?>";
    </script>
</head>

<body style="background-color: #7d4fc0;">
<div id="formbackground">
    <img src="<?php echo base_url('public/weixin/img/bg.png') ?>" height="100%" width="100%"/>
</div>
<div style="maigin:0 auto;text-align:center" id="contact">
    <div class="header">
        <img src="<?php echo base_url('public/weixin/img/title3.png') ?>" alt="">
    </div>
    <div class="content">
        <div class="upload_fx" id="upload_div">
            <img src="<?php echo base_url('public/weixin/img/photo.png') ?>" alt="" class="imgShow"
                 id="upload_img">
        </div>
    </div>

    <div class="footer">
        <form id="uploadForm" enctype="multipart/form-data">
            <div class="xiangce">
                <a href="javascript:void(0)" class="upload-img"><label for="upload-file">从相册选择</label></a>
                <input type="file" class="" name="file" id="upload-file" style="display:none">
            </div>
            <div class="paizhao"><a href="javascript:void(0)" onclick="doUpload()">提交</a></div>
        </form>
    </div>
    <div class="footer">
        <span class="wikkit">by Wikkit Lab</span>
    </div>
</div>
<div id="over" class="over"></div>
<div id="layout" class="layout"><img src="<?php echo base_url('public/img/loading.gif') ?>" id="as"/></div>
<script src="<?php echo base_url('public/weixin/js/jquery.js') ?>"></script>
<script src="<?php echo base_url('public/weixin/js/uploadPreview.js') ?>"></script>
<script src="<?php echo base_url('public/weixin/js/lrz.all.bundle.js') ?>"></script>
<script src="<?php echo base_url('public/weixin/js/weixin.js') ?>"></script>
<script>
    window.onload = function () {
        new uploadPreview({UpBtn: "upload-file", DivShow: "upload_div", ImgShow: "upload_img"});
    }
</script>
</body>

</html>