<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="WikkitLabs - Software Landing Face">
    <meta name="author" content="Maki"/>
    <!-- SITE TITLE -->
    <title>Wikkit Labs</title>
    <!-- STYLESHEETS -->
    <link href="<?php echo base_url('public/css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('public/css/style.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/css/responsive.css') ?>" rel="stylesheet">

    <!-- FAVICON  -->
    <link rel="icon" href="<?php echo base_url('public/img/favicon.ico') ?>">
    <style>
        .features-tabs li {
            background: url("") no-repeat left 20px;
            color: #F8F8F8;
        }

        header {
            position: relative;
            width: 100%;
            min-height: auto;
            text-align: center;
            color: #fff;
            background-image: url(<?php echo base_url('public/img/first_new.jpg')?>);
            background-position: center;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
        }
    </style>
</head>
<body>
<!-- PRELOADER -->
<div id="preloader">
    <div class="spinner"></div>
</div>

<!-- MAIN NAV -->
<nav class="navbar navbar-default navbar-fixed-top" id="nav-header">
    <div class="container">
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-menu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- MAIN NAV LOGO -->
            <a class="logo page-scroll" href="<?php echo site_url() ?>#header"><img
                    src="<?php echo base_url('public/img/wikkit_logo.png') ?>" class="img-responsive" alt=""></a>
        </div>
        <div class="collapse navbar-collapse" id="main-menu">
            <!-- MAIN NAV LINKS -->
            <ul class="nav navbar-nav navbar-right" id="header_nav">
                <li class="active">
                    <a class="page-scroll" href="<?php echo site_url() ?>#header">Home</a>
                </li>
                <li>
                    <a class="page-scroll" href="<?php echo site_url() ?>#features">Products</a>
                </li>
                <li>
                    <a class="page-scroll" href="<?php echo site_url() ?>#clients">Partner</a>
                </li>
                <li>
                    <a class="page-scroll" href="<?php echo site_url() ?>#testimonials">company</a>
                </li>
                <!--<li>
                    <a class="page-scroll" href="<?php /*echo site_url() */ ?>#contact">Contact</a>
                </li>-->

            </ul>
            <!-- END MAIN NAV LINKS -->
        </div>
    </div>
</nav>
<!-- END MAIN NAV -->
<!-- HEADER -->
<header id="header">
    <div id="particles-js"></div>
</header>
<!-- END HEADER -->

<!-- products -->
<section id="features" class="gray-bg">
    <div class="container">
        <div class="row">
            <div id="features-tabs" class="features-tabs">
                <!-- TAB 1 -->
                <!-- <div id="features-tab1">
                    <ul>
                        <li>1</li>
                        <li>2</li>
                    </ul>
                    <div class="row">
                        <h2 class="section-heading">API</h2>
                        <p class="section-subheading ">So strongly and metaphysically did I conceive of my situation then, that while earnestly watching his motions, I seemed distinctly to perceive that my own individuality was now merged in a joint stock company of two. </p>
                    </div>
                    <a href="<?php /*echo site_url('Page') */ ?>" class="primary-button button-inverse">开始体验</a>
                    <a href="<?php /*echo site_url() */ ?>#" class="primary-button button-inverse">开发者文档</a>
                    <ul>
                        <li>1</li>
                        <li>2</li>
                    </ul>
                    <img src="<?php /*echo base_url('public/img/wikkit_nav.png')*/ ?>" class="fadeRight animated" alt="">
                </div>-->
                <!-- END TAB 1 -->
                <!-- TAB 2 -->
                <!--<div id="features-tab2">
                    <ul>
                        <li>1</li>
                        <li>2</li>
                    </ul>
                    <div class="row">
                        <h2 class="section-heading">API</h2>
                        <p class="section-subheading ">So strongly and metaphysically did I conceive of my situation then, that while earnestly watching his motions, I seemed distinctly to perceive that my own individuality was now merged in a joint stock company of two. </p>
                    </div>
                    <a href="<?php /*echo site_url('Page') */ ?>" class="primary-button button-inverse">开始体验</a>
                    <a href="<?php /*echo site_url() */ ?>#" class="primary-button button-inverse">开发者文档</a>
                    <ul>
                        <li>1</li>
                        <li>2</li>
                    </ul>
                    <img src="<?php /*echo base_url('public/img/wikkit_nav.png')*/ ?>" class="fadeRight animated" alt="">
                </div>-->
                <!-- END TAB 2 -->
                <!-- TAB 3 -->
                <div id="features-tab3">
                    <ul>
                        <li>1</li>
                        <li>2</li>
                    </ul>
                    <div class="row">
                        <h2 class="section-heading">人脸检测与识别</h2>
                        <p class="section-subheading ">Wikkit Labs (维杰乐思)
                            向您呈现世界领先的人脸检测与人脸识别技术，并向技术热爱者，同行提供免费的人脸检测与识别服务。我们已经把强大的功能封装成简单易懂的API形式，邀请您与我们一同体验。 </p>
                    </div>
                    <a href="<?php echo site_url('Page') ?>" class="primary-button button-inverse">人脸检测与识别</a>
                    <a href="https://wikkit-labs.readme.io" class="primary-button button-inverse">API开发文档</a>
                    <ul>
                        <li>1</li>
                        <li>2</li>
                    </ul>

                    <img src="<?php echo base_url('public/img/wikkit_nav.png') ?>" class="fadeRight animated" alt="">
                </div>
                <!-- END TAB 3 -->
                <!-- FEATURES TABS -->
                <ul class='tabs'>
                    <!--<li class='tab col-md-4'><a href="<?php /*echo site_url() */ ?>#features-tab1"><span class="triangle"><span class="inner-triangle"></span></span>RAS</a></li>
                    <li class='tab col-md-4'><a href="<?php /*echo site_url() */ ?>#features-tab2"><span class="triangle"><span class="inner-triangle"></span></span>VAS</a></li>-->
                    <li class='tab col-md-4'><a href="<?php echo site_url() ?>#features-tab3"><span
                                class="triangle"><span class="inner-triangle"></span></span>API</a></li>
                </ul>
                <!-- END FEATURES TABS -->
            </div>
        </div>
    </div>
</section>
<!-- END products -->
<!-- CLIENTS -->
<section id="clients" class="gray-bg" style="background-color:#fff">
    <div class="row" style="text-align:center">
        <h2 class="section-heading">合作伙伴</h2>

    </div>
    <div class="container">
        <div class="slider">
            <div class="clients-content">
                <a href="http://www.nyu.edu"><img src="<?php echo base_url('public/img/logos/YorkUniversity.png') ?>"
                                                  alt="美国纽约大学"></a>
            </div>
            <div class="clients-content">
                <a href="http://mlb.mlb.com/home"> <img src="<?php echo base_url('public/img/logos/MLB.png') ?>"
                                                        alt="美国职棒大联盟"></a>
            </div>
            <div class="clients-content">
                <a href="http://www.att.com"> <img src="<?php echo base_url('public/img/logos/AT&T.png') ?>" alt="AT&T"></a>
            </div>
            <div class="clients-content">
                <a href="http://www.Verizon.com"><img src="<?php echo base_url('public/img/logos/Verizon.png') ?>"
                                                      alt="Verizon"></a>
            </div>
            <div class="clients-content">
                <a href="http://www.cisco.com"> <img src="<?php echo base_url('public/img/logos/Cisco.png') ?>"
                                                     alt="Cisco"></a>
            </div>
            <div class="clients-content">
                <a href="http://www.bnu.edu.cn/index.html"> <img
                        src="<?php echo base_url('public/img/logos/BeijingNormalUniversity.png') ?>" alt="北京师范大学"></a>
            </div>

        </div>
    </div>
</section>
<!-- END CLIENTS -->

<!--COMAPNY-->
<section id="testimonials" class="gray-bg"
         style="background-color:#eee;background:url('<?php echo base_url('public/img/stock-photo-105060373.jpg') ?>') center center no-repeat;background-size: cover;padding-bottom: 52px;margin-bottom: 0px;">
    <div class="row" style="text-align:center;color:#fff;">
        <h2 class="section-heading">公司简介</h2>

    </div>
    <div class="container">
        <div class="row">
            <div class="slider">

                <div class="tt-content">
                    <h3>Wikkit Labs Inc. 是一家<span>研究型</span>高科技企业。</h3>
                    <div class="tt-container">

                        <span class="content">科研团队由7位来自美国顶尖高校的博士组成,搭 配经验丰富的中美工程师团队,旨在将最先进的语音图形信号处理,计算机视觉,物联网(IoT)技术带给工业界。 </span>
                    </div>
                </div>
            </div>

            <!-- <div class="tt-images">
                <div class="tt-image"><img width="80" height="80" src="<?php /*echo base_url('public/img/testimonials/testimonial1.png')*/ ?>" alt="team"></div>

            </div>-->

        </div>
    </div>
</section>
<!--END COMPANY-->
<!-- TESTIMONIALS -->
<!--<section id="testimonials" class="gray-bg" style="background-color:#eee;background:url('<?php /*echo base_url('public/img/stock-photo-105060373.jpg')*/ ?>') center center no-repeat;background-size: cover;">
    <div class="row" style="text-align:center;color:#fff;">
        <h2 class="section-heading">团队介绍</h2>
        <hr style=" height:2px;border:none;border-top:2px dotted #fff;width:40px;" />
    </div>
    <div class="container">
        <div class="row">
            <div class="slider">

                <div class="tt-content">
                    <h3>他喜欢一个项目的每一个细节，考虑到项目的每一个阶段。</h3>
                    <div class="tt-container">
                        <h4 >本杰明<span style="color:#3A4141;font-size:13px;">Benjamin</span></h4>
                        <span class="content">他喜欢一个项目的每一个细节，考虑到项目的每一个阶段。</span>
                    </div>
                </div>

                <div class="tt-content">
                    <h3 ><span class="tt-quote">“</span><span class="tt-quote tt-quote-right">”</span>KeySoft is really helping all of us to make collaboration a differentiating factor to win is really helping all of us.</h3>
                    <div class="tt-container">
                        <h4 >Antony Casalena</h4>
                        <span class="content">Vice president, IQTeam</span>
                    </div>
                </div>

                <div class="tt-content">
                    <h3 ><span class="tt-quote">“</span><span class="tt-quote tt-quote-right">”</span>KeySoft is really helping all of us to make collaboration a differentiating factor to win is really helping all of us.</h3>
                    <div class="tt-container">
                        <h4 >Antony Casalena</h4>
                        <span class="content">Vice president, IQTeam</span>
                    </div>
                </div>

                <div class="tt-content">
                    <h3 ><span class="tt-quote">“</span><span class="tt-quote tt-quote-right">”</span>KeySoft is really helping all of us to make collaboration a differentiating factor to win is really helping all of us.</h3>
                    <div class="tt-container">
                        <h4 >Antony Casalena</h4>
                        <span class="content">Vice president, IQTeam</span>
                    </div>
                </div>
            </div>

            <div class="tt-images">
                <div class="tt-image"><img width="80" height="80" src="<?php /*echo base_url('public/img/testimonials/testimonial1.png')*/ ?>" alt="team"></div>
                <div class="tt-image"><img width="80" height="80" src="<?php /*echo base_url('public/img/testimonials/testimonial2.png')*/ ?>" alt="team"></div>
                <div class="tt-image"><img width="80" height="80" src="<?php /*echo base_url('public/img/testimonials/testimonial3.png')*/ ?>" alt="team"></div>
                <div class="tt-image"><img width="80" height="80" src="<?php /*echo base_url('public/img/testimonials/testimonial1.png')*/ ?>" alt="team"></div>
            </div>

        </div>
    </div>
</section>-->
<!-- END TESTIMONIALS -->

<!-- CONTACT -->
<!--<section id="contact">
    <div class="container">


        <div class="row" style="text-align:center">
            <h2 class="section-heading">联系我们</h2>
            <hr style=" height:2px;border:none;border-top:2px dotted red;width:40px;" />
            <p class="section-subheading ">我们正在不断努力让Wikkit Labs变得更好，您的关注与反馈对我们来说十分重要，感谢大家的长期支持！</p>
        </div>

        <div class="row">

            <form name="sentMessage" id="contactForm" novalidate>
                <div class="row">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="您的姓名" id="name" required data-validation-required-message="Please enter your name.">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group pull-right">
                        <input type="email" class="form-control" placeholder="您的电邮" id="email" required data-validation-required-message="Please enter your email address.">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group form-textarea">
                        <textarea class="form-control" placeholder="你的留言" id="message" required data-validation-required-message="Please enter a message."></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="clearfix"></div>
                    <div class="text-center">
                        <div id="success"></div>
                        <button type="submit" class="btn btn-xl">发送</button>
                    </div>
                </div>
            </form>

        </div>

    </div>
</section>-->
<!-- END CONTACT -->
<!-- FOOTER -->
<footer>
    <div class="container">
        <div class="row">
            <!-- UPPER FOOTER -->
            <div class="upper-footer">
                <div class="pull-left">
                    <a class="logo page-scroll" href="<?php echo site_url() ?>#page-top"><img
                            src="<?php echo base_url('public/img/wikkit_logo.png') ?>" class="img-responsive"
                            alt=""></a>
                    <p style="color:#9CA0A0;font-size:14px;line-height:20px;">©
                        2016深圳市维杰乐思科技有限公司版权所有<br/>粤ICP备16049897<br/>粤公安备11010802014104</p>
                </div>
                <div class="pull-right">
                    <ul class="footer-nav">
                        <li class="active">
                            <a class="page-scroll" href="<?php echo site_url() ?>#services">关于我们</a>
                        </li>
                        <li class="">
                            <a class="page-scroll" href="https://wikkit-labs.readme.io">API文档</a>
                        </li>
                        <li class="">
                            <a class="page-scroll" href="<?php echo site_url() ?>#features">加入我们</a>
                        </li>
                        <li class="">
                            <a class="page-scroll" href="<?php echo site_url() ?>#video">开发工具</a>
                        </li>
                        <li class="">
                            <a class="page-scroll" href="<?php echo site_url() ?>#video">隐私政策</a>
                        </li>
                        <li class="">
                            <a class="page-scroll" href="<?php echo site_url() ?>#pricing">常见问题</a>
                        </li>
                        <li class="">
                            <a class="page-scroll" href="<?php echo site_url() ?>#pricing">使用条款</a>
                        </li>

                    </ul>
                    <ul class="footer-secondary-nav">
                        <li class="">
                            <a class="page-scroll" href="<?php echo site_url() ?>#"><span class="fa fa-phone"
                                                                                          style="color:#F34859;"></span>0755-
                                29494137</a>
                        </li>
                        <li class="">
                            <a class="page-scroll" href="<?php echo site_url() ?>#"><span class="fa fa-envelope"
                                                                                          style="color:#F34859;"></span>info@wikkitlabs.com</a>
                        </li>
                        <li class="">
                            <a class="page-scroll" href="<?php echo site_url() ?>#"><span class="fa fa-map-marker"
                                                                                          style="color:#F34859;text-align: left"></span>深圳市宝安西乡金海路汇潮科技大厦13楼</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- END UPPER FOOTER -->

        </div>
    </div>
</footer>
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
<script src="<?php echo base_url('public/js/jquery.easytabs.min.js') ?>"></script>
<!-- animated header -->
<script src="<?php echo base_url('public/js/particles.js') ?>" type="text/javascript"></script>
<!-- sliders -->
<script src="<?php echo base_url('public/js/owl.carousel.min.js') ?>"></script>
<!-- contact form -->
<script src="<?php echo base_url('public/js/jqBootstrapValidation.js') ?>"></script>
<script src="<?php echo base_url('public/js/contact_me.js') ?>"></script>
<!-- google map
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script> -->
<!-- custom script -->
<script src="<?php echo base_url('public/js/scripts.js') ?>"></script>
<script>
    $(document).ready(function () {
        $("#header_nav li").on('click', function () {
            $("#header_nav li").removeClass('active');
            $(this).addClass('active');
        });

        var dheight = window.innerHeight;
        $('#header').height(dheight);
    })
</script>
</body>
</html>
