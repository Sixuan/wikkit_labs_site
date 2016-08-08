<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="KeySoft - Software Landing Page">
    <meta name="author" content="KeyDesign" />
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
            <a class="logo page-scroll" href="<?php echo site_url('Welcome') ?>"><img src="<?php echo base_url('public/img/wikkit_logo.png') ?>" class="img-responsive" alt=""></a>
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
        <a href="javascript:void(0);" title="1"><img src="<?php echo base_url('public/face/1.jpg') ?>" alt="" id="f1"></a>
        <a href="javascript:void(0);" title="2"><img src="<?php echo base_url('public/face/2.jpg') ?>" alt="" id="f2"></a>
        <a href="javascript:void(0);" title="3"><img src="<?php echo base_url('public/face/3.jpg') ?>" alt="" id="f3"></a>
        <a href="javascript:void(0);" title="4"><img src="<?php echo base_url('public/face/4.jpg') ?>" alt="" id="f4"></a>
        <a href="javascript:void(0);" title="5"><img src="<?php echo base_url('public/face/5.jpg') ?>" alt="" id="f5"></a>
        <a href="javascript:void(0);" title="6"><img src="<?php echo base_url('public/face/6.jpg') ?>" alt="" id="f6"></a>
        <a href="javascript:void(0);" title="7"><img src="<?php echo base_url('public/face/7.jpg') ?>" alt="" id="f7"></a>
        <a href="javascript:void(0);" title="8"><img src="<?php echo base_url('public/face/8.jpg') ?>" alt="" id="f8"></a>
        <a href="javascript:void(0);" title="9"><img src="<?php echo base_url('public/face/9.jpg') ?>" alt="" id="f9"></a>
        <a href="javascript:void(0);" title="10"><img src="<?php echo base_url('public/face/10.jpg') ?>" alt="" id="f10"></a>
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
                                <div class="hearo-nav-body active">
                                    <a href="<?php echo site_url('Page') ?>">人脸检测</a>
                                </div>
                                <div class="hearo-nav-body">
                                    <a href="<?php echo site_url('Page/page2') ?>">关键点</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 column">
                            <div class="hearo-my-img">
                                <!-- <canvas id="myCanvas" width="480" height="480" style="">您的浏览器不支持 HTML5 canvas 标签。</canvas> -->
                                <img src="<?php echo base_url('public/face/1.png') ?>" alt="" id="scream" style="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 column" style="padding-left:6rem;">
                    <div style="width:444px;height:476px;background-color:#fff;color:#242828;text-align:left;padding-left:2rem;">
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
<script src="<?php echo base_url('public/js/jquery.js')?>"></script>
<script src="<?php echo base_url('public/js/jquery.easing.min.js')?>"></script>
<script src="<?php echo base_url('public/js/bootstrap.min.js')?>"></script>
<!-- smoothscroll  -->
<script src="<?php echo base_url('public/js/smoothscroll.js')?>"></script>
<!-- piechart  -->
<script src="<?php echo base_url('public/js/jquery.easytabs.min.js')?>"></script>
<!-- tabs  -->
<script src="<?php echo base_url('public/js/piechart.js')?>"></script>
<!-- sliders -->
<script src="<?php echo base_url('public/js/owl.carousel.min.js')?>"></script>
<!-- contact form -->
<script src="<?php echo base_url('public/js/jqBootstrapValidation.js')?>"></script>
<script src="<?php echo base_url('public/js/contact_me.js')?>"></script>
<!-- google map
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script> -->
<!-- custom script -->

<script>
    $(document).ready(function(){
        var dheight = $(document).height();
        path = "<?php echo base_url('public/face/1.png') ?>";
        $("#scream").attr('src',path);
        $.get("<?php echo site_url('Page/face') ?>?id=1",function(data,status){
            /*$('#jsoncode').html(data);*/
            $('#jsoncode').html(jsonFormat(data));
        });

        var obj_a = $('#demo-hero a');
        var img_value ='';
        var path ='';

        //背景图刚好全屏
        $('#header').height(dheight);

        //点击替换图片
        for(i=0;i<obj_a.length;i++){
            $(obj_a[i]).click(function(){
                img_value= this.title;
                path = "<?php echo base_url()?>public/face/"+img_value+".png";
                $("#scream").attr('src',path);
                $.get("<?php echo site_url('Page/face') ?>?id="+img_value,function(data,status){
                    /*$('#jsoncode').html(data);*/
                    $('#jsoncode').html(jsonFormat(data));
                }); 
            })
        }
    })
    function jsonFormat(txt,compress){
    var indentChar = '    ';
    if(/^\s*$/.test(txt)){
        alert('数据为空,无法格式化! ');
        return;
    }
    try{var data=eval('('+txt+')');}
    catch(e){
        alert('数据源语法错误,格式化失败! 错误信息: '+e.description,'err');
        return;
    };
    var draw=[],last=false,This=this,line=compress?'':'\n',nodeCount=0,maxDepth=0;

    var notify=function(name,value,isLast,indent/*缩进*/,formObj){
        nodeCount++;/*节点计数*/
        for (var i=0,tab='';i<indent;i++ )tab+=indentChar;/* 缩进HTML */
        tab=compress?'':tab;/*压缩模式忽略缩进*/
        maxDepth=++indent;/*缩进递增并记录*/
        if(value&&value.constructor==Array){/*处理数组*/
            draw.push(tab+(formObj?('"'+name+'":'):'')+'['+line);/*缩进'[' 然后换行*/
            for (var i=0;i<value.length;i++)
                notify(i,value[i],i==value.length-1,indent,false);
            draw.push(tab+']'+(isLast?line:(','+line)));/*缩进']'换行,若非尾元素则添加逗号*/
        }else   if(value&&typeof value=='object'){/*处理对象*/
            draw.push(tab+(formObj?('"'+name+'":'):'')+'{'+line);/*缩进'{' 然后换行*/
            var len=0,i=0;
            for(var key in value)len++;
            for(var key in value)notify(key,value[key],++i==len,indent,true);
            draw.push(tab+'}'+(isLast?line:(','+line)));/*缩进'}'换行,若非尾元素则添加逗号*/
        }else{
            if(typeof value=='string')value='"'+value+'"';
            draw.push(tab+(formObj?('"'+name+'":'):'')+value+(isLast?'':',')+line);
        };
    };
    var isLast=true,indent=0;
    notify('',data,isLast,indent,false);
    return draw.join('');
}


</script>
<!--二维码-->

<script type="text/javascript">
    $(document).ready(function(e) {

        $('#code').hover(function(){
            $(this).attr('id','code_hover');
            $('#code_img').show();
            $('#code_img').addClass('a-fadeinL');
        },function(){
            $(this).attr('id','code');
            $('#code_img').hide();
        })

    });


</script>
<!--二维码结束-->


</body>
</html>
