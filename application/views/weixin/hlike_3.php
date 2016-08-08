<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>有多像</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="<?php echo base_url('public/weixin/css/weixin.css') ?>">
    <style>

        span.sasa {
            background-color: #508F74;
        }
    </style>
</head>
<body>
<div id="formbackground">
    <img src="<?php echo base_url('public/weixin/img/bg6.png') ?>" height="100%" width="100%"/>
</div>

<div style="maigin:0 auto;text-align:center">
    <div class="header">
        <div class="header_body">
            <h3 class="result_header">计算结果</h3>
            <div class="result_body">
                <img src="<?php echo $img_url_1 ?>" alt="" class="imgShow2">
                <img src="<?php echo $img_url_2 ?>" alt="" class="imgShow2">
            </div>
        </div>
        <div style="margin-top:-22px;">
            <span class="sasa">相似度<?php echo round($similarity, 4)*100 ?>%</span>
        </div>

    </div>

    <div class="content" style="">
        <h2>傻傻分不清楚</h2>
    </div>

    <div class="footer">
        <div class="paizhao_5"><a href="javascript:void(0)">分享</a></div>
        <div class="xiangce_5">
            <a href="<?php echo site_url('weixin/Game/hlike_2') ?>" class="upload-img">再玩一次</a>

        </div>
    </div>
</div>
<script src="<?php echo base_url('public/weixin/js/jquery.js') ?>"></script>
<script src="<?php echo base_url('public/weixin/js/weixin.js') ?>"></script>
</body>
</html>