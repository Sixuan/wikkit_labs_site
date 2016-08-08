<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="KeySoft - Software Landing Page">
    <meta name="author" content="KeyDesign"/>
    <!-- SITE TITLE -->
    <title>KeySoft - Software Landing Page</title>
    <!-- STYLESHEETS -->
    <link href="<?php echo base_url('public/css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('public/css/style.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/css/responsive.css') ?>" rel="stylesheet">

    <!-- DEMO COLORS  -->

    <link rel="stylesheet" href="<?php echo base_url('public/css/page.css') ?>">
    <!-- FAVICON  -->
    <link rel="icon" href="<?php echo base_url('public/img/favicon.ico') ?>">
    <script>
        var first_png = "<?php echo base_url('public/face/1.png') ?>";
        var base_url = "<?php echo base_url()?>";
        var get_json = "<?php echo site_url('Page/json') ?>";
        var canvas_type = "2"; //1:人脸检测；2：关键点
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
        <div class="navbar-header page-scroll">
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
                <li class="active">
                    <a class="page-scroll" href="<?php echo site_url('Page') ?>">演示</a>
                </li>
                <li>
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
    <div class="demo-hero" id="demo-hero">
        <a href="javascript:void(0);" title="1"><img src="<?php echo base_url('public/face/1.png') ?>" alt=""
                                                     id="f1"></a>
        <a href="javascript:void(0);" title="2"><img src="<?php echo base_url('public/face/2.png') ?>" alt=""
                                                     id="f2"></a>
        <a href="javascript:void(0);" title="3"><img src="<?php echo base_url('public/face/3.png') ?>" alt=""
                                                     id="f3"></a>
        <a href="javascript:void(0);" title="4"><img src="<?php echo base_url('public/face/4.png') ?>" alt=""
                                                     id="f4"></a>
        <a href="javascript:void(0);" title="5"><img src="<?php echo base_url('public/face/5.png') ?>" alt=""
                                                     id="f5"></a>
        <a href="javascript:void(0);" title="6"><img src="<?php echo base_url('public/face/6.png') ?>" alt=""
                                                     id="f6"></a>
        <a href="javascript:void(0);" title="7"><img src="<?php echo base_url('public/face/7.png') ?>" alt=""
                                                     id="f7"></a>
        <a href="javascript:void(0);" title="8"><img src="<?php echo base_url('public/face/8.png') ?>" alt=""
                                                     id="f8"></a>
        <a href="javascript:void(0);" title="9"><img src="<?php echo base_url('public/face/9.png') ?>" alt=""
                                                     id="f9"></a>
        <a href="javascript:void(0);" title="10"><img src="<?php echo base_url('public/face/10.png') ?>" alt=""
                                                      id="f10"></a>
    </div>
    <div class="hero-info">
        <div class="container" style="width:80%">
            <div class="row clearfix">
                <div class="col-md-6 column" style="padding-left: 0px;">
                    <div class="row clearfix">
                        <div class="col-md-4 column">
                            <div class="hearo-nav">
                                <div class="hearo-nav-heading">
                                    <h3 class="hearo-nav-title">
                                        演示
                                    </h3>
                                </div>
                                <div class="hearo-nav-body">
                                    <a href="<?php echo site_url('Page') ?>">人脸检测</a>
                                </div>
                                <div class="hearo-nav-body active">
                                    <a href="<?php echo site_url('Page/page2') ?>">关键点</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 column">
                            <div class="hearo-my-img">
                                <!-- <canvas id="myCanvas" width="480" height="480" style="">您的浏览器不支持 HTML5 canvas 标签。</canvas> -->
                                <!--<img src="<?php /*echo base_url('public/face/1.png') */ ?>" alt="" id="scream" style="">-->
                                <canvas id="myCanvas" width="481" height="481">
                                    您的浏览器不支持 HTML5 canvas 标签。
                                </canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 column" style="padding-left:6rem;">
                    <div
                        style="width:444px;height:476px;background-color:#fff;color:#242828;text-align:left;padding-left:2rem;">
                        <h2 style="margin-top: 0px;padding-top:20px;">RESPONSE JSON：</h2>
                        <pre id="jsoncode" style="height:380px;overflow:auto;"></pre>
                    </div>
                </div>
            </div>
        </div>

        <div id="code"></div>
        <div id="code_img"></div>
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
<script src="<?php echo base_url('public/js/page.js') ?>"></script>
</body>
</html>
