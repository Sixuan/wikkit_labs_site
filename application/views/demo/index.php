<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="KeySoft - Software Landing Page">
    <meta name="author" content="KeyDesign"/>
    <!-- SITE TITLE -->
    <title>Wikkit Labs-Demo</title>
    <!-- STYLESHEETS -->
    <link href="<?php echo base_url('public/css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('public/css/style.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/css/responsive.css') ?>" rel="stylesheet">

    <!-- DEMO COLORS  -->

    <link rel="stylesheet" href="<?php echo base_url('public/css/demo1.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/css/loading.css') ?>">
    <!-- FAVICON  -->
    <link rel="icon" href="<?php echo base_url('public/img/favicon.ico') ?>">
    <style>
        img#upload_img {
            /*max-height:300px;myimg:expression_r(onload=function(){this.style.height=(this.offsetHeight > 300)?"300px":"auto"});*/
            max-width:300px;
            width:e­xpression(this.width>300?"300px":this.width);
            max-height:300px;
            height:e­xpression(this.height>300?"300px":this.height);
        }

        img.imgShow {
            /*max-height:300px;myimg:expression_r(onload=function(){this.style.height=(this.offsetHeight > 300)?"300px":"auto"});*/
            max-width:300px;
            width:e­xpression(this.width>300?"300px":this.width);
            max-height:300px;
            height:e­xpression(this.height>300?"300px":this.height);
        }
    </style>
    <script>
        var base_url = "<?php echo base_url()?>";
        var demo = "<?php echo site_url('Demo') ?>";
        var demo_1 = "<?php echo site_url("Demo/demo1") ?>";
    </script>
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
                <li class="active">
                    <a class="page-scroll" href="<?php echo site_url('Demo') ?>">Demo1</a>
                </li>
                <li>
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
        <h1 style="margin-top: 0px;">请上传一张图片</h1>
        <div style="margin-top:84.5px;">
            <div style="" class="upload_fx">
                <div class="upload_img" id="upload_div">
                    <img src="<?php echo base_url('public/img/demo_upload.png') ?>" alt="" id="upload_img">
                </div>
            </div>
        </div>
        <form id="uploadForm" enctype="multipart/form-data">
            <div class="new-contentarea tc">
                <a href="javascript:void(0)" class="upload-img"><label for="upload-file">本地上传</label></a>
                <input type="file" class="" name="file" id="upload-file" style="display:none">
            </div>
            <input type="button" id="upload-1-b" class="upload-img" value="提交" onclick="doUpload()">
            <!-- <input type="button" id="upload-b" class="upload-img" value="提交" onclick="doUpload()"> -->
        </form>
        <!--<div class="new-contentarea tc upload_url">
            <input type="text" class="" name="upload-url" id="upload-url" placeholder="请输入URL">
            <button class="upload-url-btn" id="upload-btn">上传</button>
        </div>-->
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


</script>

</body>
</html>
