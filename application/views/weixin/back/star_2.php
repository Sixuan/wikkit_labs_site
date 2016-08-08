<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="<?php echo base_url('public/weixin/css/weixin.css') ?>">
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
                <img src="<?php echo base_url('public/weixin/img/photo5.png') ?>" alt="" style="width:204px;height:204px;" id="upload_img">
            </div>
        </div>

        <div class="footer">
            <form id="uploadForm">
                <div class="xiangce_5">
                    <a href="javascript:void(0)" class="upload-img"><label for="upload-file">从相册选择</label></a>
                    <input type="file" class="" name="image" id="upload-file" style="display:none">
                </div>
            </form>
            <div class="paizhao_5"><a href="#" onclick="doUpload()">提交</a></div>
        </div>
    </div>

    <script src="<?php echo base_url('public/weixin/js/jquery.js') ?>"></script>
    <script src="<?php echo base_url('public/weixin/js/uploadPreview.js') ?>"></script>
    <script>
        $(document).ready(function(){
            var dheight = document.body.scrollHeight;
            var dwidth = document.body.scrollWidth;
            console.log(dheight);
            $('#formbackground').width(dwidth);
            $('#formbackground').height(dheight);
        })
        function doUpload() {
            if($("#upload-file").val()==''){
                alert('请上传照片');
                return false;
            }
            var formData = new FormData($("#uploadForm")[0]);
            var imgsrc = $('#upload_img').attr('src');
            var number = '';
            var mcanvas = '';
            var dhtml='';
            var cwidth = document.body.scrollWidth*0.4;
            $.ajax({
                url: 'http://120.76.26.101:8081/faceApi/recognize/7?app_key=5738fc1ed3269&app_secret=5738fc1ed32ba',
                type: 'POST',
                data: formData,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function (returndata) {
                    dhtml='<div class="header_5_3">'
                            +'<img src="<?php echo base_url('public/weixin/img/title5_3.png') ?>" alt="">'
                    +'</div>'

                    +'<div class="content">'
                    +'<div class="content5_3">'
                    +'<div style="width:100%;text-align:center;padding-top:1rem;padding-bottom:1rem;">'
                    +'<img src="'+imgsrc+'" alt="" style="width:'+cwidth+'px;height: '+cwidth+'px;">'
                    +'<img src="'+returndata.candidates[0]['person_name']+'" alt="" style="width:'+cwidth+'px;height: '+cwidth+'px;">'
                    +'</div>'
                    +'</div>'
                    +'<div style="margin-top:-18px;">'
                    +'<span class="sasa">相似度'+returndata.candidates[0]['confidence']+'%</span>'
                    +'</div>'
                    +'</div>'

                    +'<div class="footer" style="padding-top:1rem;">'
                    +'<div class="footer_name"><a href="">'+returndata.candidates[0]['person_name']+'</a></div>'
                    +'<div class="footer_body">'
                    +'<div class="smallstart">其他相似明星</div>'
                    +'<div style="width:100%;">';

                    $.each(returndata.candidates, function(i, face){
                        dhtml +='<div class="startinfo">'
                                +'<img src="<?php echo base_url('public/weixin/img/mp1.png') ?>" alt="" style="">'
                                +'<span style="" class="startname">'+face.person_name+'</span>'
                                +'</div>';
                    });


                   dhtml +='</div>'
                    +'</div>'
                    +'</div>';
                    $('#contact').html(dhtml);
                }
            })
        };
    </script>
    <script>
        window.onload = function () {
            new uploadPreview({ UpBtn: "upload-file", DivShow: "upload_div", ImgShow: "upload_img" });
        }
    </script>
</body>
</html>