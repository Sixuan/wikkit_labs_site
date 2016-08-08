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
    <style>

    </style>

</head>

<body>
<div id="leafContainer">
</div>
<div id="formbackground">
    <img src="<?php echo base_url('public/weixin/img/bg.png') ?>" height="100%" width="100%"/>
</div>
<div style="maigin:0 auto;text-align:center;z-index:9999">
    <div class="header">
        <div class="upload_fx">
            <img src="<?php echo base_url('public/weixin/img/photo2.png') ?>" alt="" style="z-index: -2;width:100%;">
        </div>
        <img src="<?php echo base_url('public/weixin/img/title2.png') ?>" alt="" class="title2" style="width:100%;">
    </div>
    <div class="content">
        <ul class="paiming" style="padding:0px;">
            <li>
                <div class="f4">
                    <img src="<?php echo base_url('public/weixin/img/m1.png') ?>" alt="" class="middle">
                </div>
                <div class="f4">
                    <img src="<?php echo base_url('public/weixin/img/mp1.png') ?>" alt="" class="middle">
                </div>
                <div class="f5">
                    <div class="f5_1">
                        <img src="<?php echo base_url('public/weixin/img/20160501161327.png') ?>" alt="" class="middle">
                                <span style="color:#B1B1B1">
                                    26岁
                                </span>
                    </div>
                    <div class="f5_2">
                        颜值75
                    </div>
                </div>
            </li>
            <li>
                <div class="f4">
                    <img src="<?php echo base_url('public/weixin/img/m2.png') ?>" alt="" class="middle">
                </div>
                <div class="f4">
                    <img src="<?php echo base_url('public/weixin/img/mp1.png') ?>" alt="" class="middle">
                </div>
                <div class="f5">
                    <div class="f5_1">
                        <img src="<?php echo base_url('public/weixin/img/20160501161327.png') ?>" alt="" class="middle">
                                <span style="color:#B1B1B1">
                                    26岁
                                </span>
                    </div>
                    <div class="f5_2">
                        颜值75
                    </div>
                </div>
            </li>
            <li style="border-bottom:0px;">
                <div class="f4">
                    <img src="<?php echo base_url('public/weixin/img/m3.png') ?>" alt="" class="middle">
                </div>
                <div class="f4">
                    <img src="<?php echo base_url('public/weixin/img/mp1.png') ?>" alt="" class="middle">
                </div>
                <div class="f5">
                    <div class="f5_1">
                        <img src="<?php echo base_url('public/weixin/img/20160501161327.png') ?>" alt="" class="middle">
                                <span style="color:#B1B1B1">
                                    26岁
                                </span>
                    </div>
                    <div class="f5_2">
                        颜值75
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="footer" style="z-index:9999;">
        <div class="paizhao">
            <a href="">
                分享
            </a>
        </div>
        <div class="xiangce" style="z-index:9999;">
            <a href="<?php echo site_url('weixin/Game/rank') ?>" style="z-index:9999;">
                再玩一次
            </a>
        </div>
    </div>
</div>
<script src="<?php echo base_url('public/weixin/js/jquery.js') ?>"></script>
<script>
    $(document).ready(function () {
        var dheight = document.body.scrollHeight;
        var dwidth = document.body.scrollWidth;
        $('#formbackground').width(dwidth);
        $('#formbackground').height(dheight);
    })
</script>
<script>
    //花瓣
    const NUMBER_OF_LEAVES = 50;

    function init() {

        var container = document.getElementById('leafContainer');

        for (var i = 0; i < NUMBER_OF_LEAVES; i++) {

            container.appendChild(createALeaf());

        }

    }

    function randomInteger(low, high) {
        return low + Math.floor(Math.random() * (high - low));

    }

    function randomFloat(low, high) {

        return low + Math.random() * (high - low);

    }

    function pixelValue(value) {

        return value + 'px';

    }

    function durationValue(value) {

        return value + 's';

    }

    function createALeaf() {

        var leafDiv = document.createElement('div');

        var image = document.createElement('img');

        // ���ͼƬ��ַ+����  ��ʽΪ'../xx/xx'
        image.src = '<?php echo base_url("public/weixin/img/Shape") ?>' + randomInteger(1, 5) + '.png';

        // ѩ����ʼλ��
        leafDiv.style.top = "-10px";
        // ѩ��������
        leafDiv.style.left = pixelValue(randomInteger(0, 1000));

        var spinAnimationName = (Math.random() < 0.5) ? 'clockwiseSpin' : 'counterclockwiseSpinAndFlip';

        leafDiv.style.webkitAnimationName = 'fade, drop';

        image.style.webkitAnimationName = spinAnimationName;

        var fadeAndDropDuration = durationValue(randomFloat(5, 11));

        var spinDuration = durationValue(randomFloat(4, 8));

        leafDiv.style.webkitAnimationDuration = fadeAndDropDuration + ', ' + fadeAndDropDuration;

        var leafDelay = durationValue(randomFloat(0, 5));

        leafDiv.style.webkitAnimationDelay = leafDelay + ', ' + leafDelay;

        image.style.webkitAnimationDuration = spinDuration;

        leafDiv.appendChild(image);

        return leafDiv;

    }

    window.addEventListener('load', init);
</script>
</body>

</html>