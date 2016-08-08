<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>明星脸</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="<?php echo base_url('public/weixin/css/weixin.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/css/loading.css') ?>">
    <script>
        var star_3 = "<?php echo site_url('weixin/game/star_3') ?>";
        var base_url = "<?php echo base_url() ?>";
    </script>
</head>
<body>

<div id="formbackground">
    <img src="<?php echo base_url('public/weixin/img/bg_5_2.png') ?>" height="100%" width="100%"/>
</div>

<div style="maigin:0 auto;text-align:center" id="contact">
    <div class="header">
        <img src="<?php echo base_url('public/weixin/img/title5.png') ?>" alt="" style="width:100%;">
    </div>

    <div class="content">
        <div class="upload_fx" id="upload_div">
            <img src="<?php echo base_url('public/weixin/img/photo5.png') ?>" alt="" class="imgShow" id="upload_img">
        </div>
    </div>

    <div class="footer">
        <form id="uploadForm" enctype="multipart/form-data">
            <div class="xiangce_5">
                <a href="javascript:void(0)" class="upload-img"><label for="upload-file">从相册选择</label></a>
                <input type="file" class="" name="file" id="upload-file" style="display:none">
            </div>
        </form>
        <div class="paizhao_5"><a href="javascript:void(0)" onclick="doUpload2()">提交</a></div>
    </div>
</div>
<div id="over" class="over"></div>
<div id="layout" class="layout"><img src="<?php echo base_url('public/img/loading.gif') ?>" id="as"/></div>
<script src="<?php echo base_url('public/weixin/js/jquery.js') ?>"></script>
<script src="<?php echo base_url('public/weixin/js/uploadPreview.js') ?>"></script>
<script src="<?php echo base_url('public/weixin/js/lrz.all.bundle.js') ?>"></script>
<script src="<?php echo base_url('public/weixin/js/weixin.js') ?>"></script>
<script>


</script>
<script>
    window.onload = function () {
        new uploadPreview({UpBtn: "upload-file", DivShow: "upload_div", ImgShow: "upload_img"});
    }
</script>
</body>
</html>