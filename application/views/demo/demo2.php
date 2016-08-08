<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="KeySoft - Software Landing Page">
    <meta name="author" content="KeyDesign"/>
    <!-- SITE TITLE -->
    <title>Wikkit Labs-Demo-2</title>
    <!-- STYLESHEETS -->
    <link href="<?php echo base_url('public/css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('public/css/style.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/css/responsive.css') ?>" rel="stylesheet">

    <!-- DEMO COLORS  -->

    <link rel="stylesheet" href="<?php echo base_url('public/css/demo2.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/css/demo1.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/css/loading.css') ?>">
    <!-- FAVICON  -->
    <link rel="icon" href="<?php echo base_url('public/img/favicon.ico') ?>">
    <script>
        var demo2 = "<?php echo site_url('Demo/demo2') ?>";
        var demo_result = "<?php echo site_url("Demo/result") ?>";
        var downloadImg_url = "<?php echo site_url("Demo/downloadImg") ?>";
    </script>
    <style>
        img.imgShow {
            /*max-height:300px;myimg:expression_r(onload=function(){this.style.height=(this.offsetHeight > 300)?"300px":"auto"});*/
            max-width:300px;
            width:e­xpression(this.width>300?"300px":this.width);
            max-height:300px;
            height:e­xpression(this.height>300?"300px":this.height);
        }

    </style>
</head>
<body id="body">
<!-- PRELOADER
<div id="preloader">
    <div class="spinner"></div>
</div> -->

<!-- MAIN NAV -->
<nav class="navbar navbar-default navbar-fixed-top" id="nav-header">
    <div class="container">
        <div class="navbar-header e-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-menu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="logo page-scroll" href="<?php echo site_url('Welcome') ?>"><img
                    src="<?php echo base_url('public/img/wikkit_logo.png') ?>" class="img-responsive" alt=""></a>
        </div>
        <div class="collapse navbar-collapse" id="main-menu">
            <ul class="nav navbar-nav navbar-right" id="header_nav">
                <li>
                    <a class="page-scroll" href="<?php echo site_url('Page') ?>">演示</a>
                </li>
                <li>
                    <a class="page-scroll" href="<?php echo site_url('Demo') ?>">Demo1</a>
                </li>
                <li class="active">
                    <a class="page-scroll" href="<?php echo site_url('Demo/demo2') ?>">Demo2</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
<!-- END MAIN NAV -->
<!-- HEADER -->
<header id="header">

    <div class="hero-info">
        <h1 style="margin-top: 0px;">请上传两张图片</h1>
        <!-- <form id= "uploadForm" enctype="multipart/form-data" method="post" action="<?php echo site_url('Demo/result') ?>"> -->
        <form enctype="multipart/form-data">
            <div style="margin-left:5%;" class="upload-img-left">
                <div style="margin-top:84.5px;">
                    <div style="" class="upload_fx">
                        <div class="upload_img" id="imgdiv_1">
                            <img src="<?php echo base_url('public/img/demo_upload.png') ?>" alt="" id="imgShow_1" class="imgShow">
                        </div>
                    </div>
                </div>
                <div class="new-contentarea tc">
                    <a href="javascript:void(0)" class="upload-img"><label for="upload-file_1">本地上传</label></a>
                    <input type="file" class="" name="file[]" id="upload-file_1" style="display:none">
                </div>
                <!-- <div class="new-contentarea tc upload_url">
                    <input type="text" class="" name="upload-url-1" id="upload-url-1" placeholder="请输入URL">
                    <button class="upload-url-btn" id="upload-btn-single">上传</button>
                </div> -->
            </div>
            <div style="" class="upload-img-left">
                <div style="margin-top:84.5px;">
                    <div class="upload_fx">
                        <div class="upload_img" id="imgdiv_2">
                            <img src="<?php echo base_url('public/img/demo_upload.png') ?>" alt="" id="imgShow_2" class="imgShow">
                        </div>
                    </div>
                </div>
                <div class="new-contentarea tc">
                    <a href="javascript:void(0)" class="upload-img"><label for="upload-file_2">本地上传</label></a>
                    <input type="file" class="" name="file[]" id="upload-file_2" style="display:none">
                </div>
                <!-- <div class="new-contentarea tc upload_url">
                    <input type="text" class="" name="upload-url-2" id="upload-url-2" placeholder="请输入URL">
                    <button class="upload-url-btn" id="upload-btn-more">上传</button>
                </div> -->
            </div>
            <div style="clear:both;"></div>
            <input type="button" id="upload-b" class="upload-img" value="提交">
        </form>

        <form id="uploadForm" action="<?php echo site_url('demo/result') ?>" method="post">
            <input type="hidden" name="img1" id="d_img1" value="0">
            <input type="hidden" name="img2" id="d_img2" value="1">
        </form>
        <div id="code"></div>
        <div id="code_img"></div>
        <div id="over" class="over"></div>
        <div id="layout" class="layout"><img src="<?php echo base_url('public/img/loading.gif') ?>" id="as"/></div>
    </div>
    <!-- <div id="particles-js"></div> -->
</header>
<!-- END HEADER -->

<!-- END FOOTER -->
<!-- SCRIPTS -->
<!-- jQuery & Bootstrap -->
<script src="<?php echo base_url('public/js/jquery.js') ?>"></script>
<script src="<?php echo base_url('public/js/jquery.easing.min.js') ?>"></script>
<script src="<?php echo base_url('public/js/bootstrap.min.js') ?>"></script>
<!-- smoothscroll  -->
<script src="<?php echo base_url('public/js/smoothscroll.js') ?>"></script>
<!-- piechart  -->
<script src="<?php echo base_url('public/js/jquery.easytabs.min.js') ?>"></script>
<!-- tabs  -->
<script src="<?php echo base_url('public/js/piechart.js') ?>"></script>
<!-- sliders -->
<script src="<?php echo base_url('public/js/owl.carousel.min.js') ?>"></script>
<!-- contact form -->
<script src="<?php echo base_url('public/js/jqBootstrapValidation.js') ?>"></script>
<script src="<?php echo base_url('public/js/contact_me.js') ?>"></script>
<!-- google map
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script> -->
<!-- custom script -->

<script src="<?php echo base_url('public/js/uploadPreview.js') ?>"></script>
<script src="<?php echo base_url('public/js/lrz.all.bundle.js') ?>"></script>
<script src="<?php echo base_url('public/js/demo.js') ?>"></script>
<script>
    window.onload = function () {
        new uploadPreview({UpBtn: "upload-file_1", DivShow: "imgdiv_1", ImgShow: "imgShow_1"});
        new uploadPreview({UpBtn: "upload-file_2", DivShow: "imgdiv_2", ImgShow: "imgShow_2"});
    }
</script>


</body>
</html>
