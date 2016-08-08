<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>有多像</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="<?php echo base_url('public/weixin/css/weixin.css') ?>">
    <script>
        var base_url = "<?php echo base_url() ?>";
        var downloadImg_url = "<?php echo site_url('weixin/game/downloadImg') ?>";
    </script>
</head>
<body>
<div id="formbackground" style="position:absolute; z-index:-1;">
    <img src="<?php echo base_url('public/weixin/img/bg6.png') ?>" height="100%" width="100%"/>
</div>

<div style="maigin:0 auto;text-align:center">
    <div class="header">
        <img src="<?php echo base_url('public/weixin/img/title6_3.png') ?>" alt="" id="prompt">
    </div>

    <div class="content">
        <div class="upload_fx" id="upload_div">
            <img src="<?php echo base_url('public/weixin/img/photo5.png') ?>" alt="" style="height:100%;"
                 id="upload_img" class="imgShow">
        </div>
    </div>

    <div class="footer">
        <form enctype="multipart/form-data" method="post">
            <div id="bu1">
                <div class="xiangce_5">
                    <a href="javascript:void(0)" class="upload-img"><label for="upload-file1">从相册选择</label></a>
                    <input type="file" class="" name="file[]" id="upload-file1" style="display:none">
                </div>
                <div class="paizhao_5"><a href="javascript:void(0)" id="fto2">确认</a></div>
            </div>
            <div style="display: none;" id="bu2">
                <div class="xiangce_5">
                    <a href="javascript:void(0)" class="upload-img"><label for="upload-file2">从相册选择</label></a>
                    <input type="file" class="" name="file[]" id="upload-file2" style="display:none">
                </div>
                <div class="paizhao_5"><input type="button" value="提交" class="f_btn" id="f_btn"></div>
            </div>

        </form>
        <form id="uploadForm" action="<?php echo site_url('weixin/game/hlike_3') ?>" method="post">
            <input type="hidden" name="img1" id="d_img1" value="0">
            <input type="hidden" name="img2" id="d_img2" value="1">
        </form>
    </div>
</div>
<script src="<?php echo base_url('public/weixin/js/jquery.js') ?>"></script>
<script src="<?php echo base_url('public/weixin/js/uploadPreview.js') ?>"></script>
<script src="<?php echo base_url('public/weixin/js/lrz.all.bundle.js') ?>"></script>
<script src="<?php echo base_url('public/weixin/js/weixin.js') ?>"></script>
<script>
    window.onload = function () {
        new uploadPreview({UpBtn: "upload-file1", DivShow: "upload_div", ImgShow: "upload_img"});
    }
</script>
</body>
</html>