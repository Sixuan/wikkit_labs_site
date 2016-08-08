/**
 * Created by Maki on 2016/7/5.
 */
var maxWidth = 320;
window.onload = function () {
    new uploadPreview({ UpBtn: "upload-file", DivShow: "upload_div", ImgShow: "upload_img" });
}

$(document).ready(function(){
    var dheight = $(document).height();

    var obj_a = $('#demo-hero a');
    var img_value ='';
    var path ='';

    //背景图刚好全屏
    $('#header').height(dheight);

    $('#code').hover(function(){
        $(this).attr('id','code_hover');
        $('#code_img').show();
        $('#code_img').addClass('a-fadeinL');
    },function(){
        $(this).attr('id','code');
        $('#code_img').hide();
    })
})
//Demo1 start
function doUpload_old() {
    if($("#upload-file").val()==''){
        alert('请上传照片');
        return false;
    }
    var formData = new FormData($( "#uploadForm" )[0]);
    var number ='';
    var mcanvas = '';
    $.ajax({
        url: demo_1,
        type: 'POST',
        data: formData,
        async: true,
        cache: false,
        contentType: false,
        processData: false,
        dataType:'json',
        beforeSend:function(XMLHttpRequest){
            $("#over").css('display','block');
            $("#layout").css('display','block');
        },
        success: function (returndata) {
            $("#over").css('display','none');
            $("#layout").css('display','none');
            if(returndata.status == 'error2')
            {
                alert('非法图片或者图片超过1M');
            }else if(returndata.status == 'error')
            {
                alert('请稍后重试或者换张新的图片')
            }else{
                var imgurl = returndata.img_path;
                var scans = '';
                var datahtml='<div class="hero-info">' +
                    '<div style="padding-top:116px;"> <div class="upload_fx"> <div class="upload_img">' +
                    '<img src="'+imgurl+'" alt="" class="imgShow">' +
                    '</div> </div> </div>' +
                    '<div style="padding-top:30px;width:452px;margin:0 auto;" class="">' +
                    '<div class="face_result">' +
                    '<h3>识别结果</h3>'+
                    '<ul>';
                $.each(returndata.faces, function(i, face){
                    number = i+1;
                    datahtml +=    '<li>'+
                        '<div style="margin: 0 auto;line-height: 50px;">'+
                        '<div style="float:left;width: 25%;text-align: center"><span class="span_btn">'+number+'</span>'+
                        '</div><div style="float:left;width: 25%;text-align: center" id="s1"><img src="'+face.faceurl+'" alt="" style="width:55px;height:55px;">'+
                        '</div><div style="float:left;width: 25%;text-align: center"><div style="" class="span-img">';
                    if(face.gender == 'M'){
                        datahtml +='<img src='+base_url+'public/img/s_f.png alt="" > |'+
                            '<img src='+base_url+'public/img/h_m.png alt="">';
                    }else{
                        datahtml +='<img src='+base_url+'public/img/h_f.png alt=""> |'+
                            '<img src='+base_url+'public/img/s_m.png alt="">';
                    }

                    datahtml +='</div>'+
                        '</div><div style="float:left;width: 25%;text-align: center"><span>'+face.age+'岁</span></div>'+
                        '</div>'+
                        '</li>';
                });
                datahtml += '</ul>'+
                    '</div>'+
                    '</div>'+
                    '<div id="code"></div>'+
                    '<div id="code_img"></div>'+
                    '</div><a href="'+demo+'" class="upload-img">再玩一次</a>';
                $('#header').html(datahtml);
            }

        },
        error: function (returndata) {
            $("#over").css('display','none');
            $("#layout").css('display','none');
            alert('请稍后重试或者换张新的图片')
        }
    });
}

function doUpload() {
    if($("#upload-file").val()==''){
        alert('请上传照片');
        return false;
    }

    var number ='';
    var mcanvas = '';
    var selectedFile = $('#upload-file').get(0).files[0];
    lrz(selectedFile, {width: maxWidth}).then(function (rst) {
        $.ajax({
            url: demo_1,
            type: 'post',
            data: {img: rst.base64,type:rst.file.type},
            async: true,
            dataType: 'json',
            timeout: 200000,
            beforeSend:function(XMLHttpRequest){
                $("#over").css('display','block');
                $("#layout").css('display','block');
            },
            success: function (returndata) {
                $("#over").css('display','none');
                $("#layout").css('display','none');
                if(returndata.status == 'error2')
                {
                    alert('非法图片或者图片超过1M');
                }else if(returndata.status == 'error')
                {
                    alert('请稍后重试或者换张新的图片')
                }else{
                    var imgurl = returndata.img_path;
                    var scans = '';
                    var datahtml='<div class="hero-info">' +
                        '<div style="padding-top:116px;"> <div class="upload_fx"> <div class="upload_img">' +
                        '<img src="'+imgurl+'" alt="" class="imgShow">' +
                        '</div> </div> </div>' +
                        '<div style="padding-top:30px;width:452px;margin:0 auto;" class="">' +
                        '<div class="face_result">' +
                        '<h3>识别结果</h3>'+
                        '<ul>';
                    $.each(returndata.faces, function(i, face){
                        number = i+1;
                        datahtml +=    '<li>'+
                            '<div style="margin: 0 auto;line-height: 50px;">'+
                            '<div style="float:left;width: 25%;text-align: center"><span class="span_btn">'+number+'</span>'+
                            '</div><div style="float:left;width: 25%;text-align: center" id="s1"><img src="'+face.faceurl+'" alt="" style="width:55px;height:55px;">'+
                            '</div><div style="float:left;width: 25%;text-align: center"><div style="" class="span-img">';
                        if(face.gender == 'M'){
                            datahtml +='<img src='+base_url+'public/img/s_f.png alt="" > |'+
                                '<img src='+base_url+'public/img/h_m.png alt="">';
                        }else{
                            datahtml +='<img src='+base_url+'public/img/h_f.png alt=""> |'+
                                '<img src='+base_url+'public/img/s_m.png alt="">';
                        }

                        datahtml +='</div>'+
                            '</div><div style="float:left;width: 25%;text-align: center"><span>'+face.age+'岁</span></div>'+
                            '</div>'+
                            '</li>';
                    });
                    datahtml += '</ul>'+
                        '</div>'+
                        '</div>'+
                        '<div id="code"></div>'+
                        '<div id="code_img"></div>'+
                        '</div><a href="'+demo+'" class="upload-img">再玩一次</a>';
                    $('#header').html(datahtml);
                }

            },
            error: function (returndata) {
                $("#over").css('display','none');
                $("#layout").css('display','none');
                alert('请稍后重试或者换张新的图片')
            }
        });
    });

}
//Demo1 end
//Demo2 start

$('#upload-file_1').change(function(){
    var selectedFile = $('#upload-file_1').get(0).files[0];
    lrz(selectedFile, {width: maxWidth}).then(function (rst) {
        $.ajax({
            url: downloadImg_url,
            type: 'post',
            data: {img: rst.base64,type:rst.file.type},
            async: true,
            timeout: 200000,
            success: function (returndata) {
                $("#d_img1").val(returndata);
            },
            error: function (jqXHR, textStatus, errorThrown) {

                if (textStatus == 'timeout') {
                    a_info_alert('请求超时');

                    return false;
                }

                alert(jqXHR.responseText);
            }
        });
    });
});

$('#upload-file_2').change(function(){
    var selectedFile = $('#upload-file_2').get(0).files[0];
    lrz(selectedFile, {width: maxWidth}).then(function (rst) {
        $.ajax({
            url: downloadImg_url,
            type: 'post',
            data: {img: rst.base64,type:rst.file.type},
            async: true,
            timeout: 200000,
            success: function (returndata) {
                $("#d_img2").val(returndata);
            },
            error: function (jqXHR, textStatus, errorThrown) {

                if (textStatus == 'timeout') {
                    a_info_alert('请求超时');

                    return false;
                }

                alert(jqXHR.responseText);
            }
        });
    });
});
$('#upload-b').click(function(){
    if($("#upload-file_1").val()=='' || $("#upload-file_2").val()==''){
        alert('请上传两张照片');
        return false;
    };
    var formData = new FormData($( "#uploadForm" )[0]);
    $.ajax({
        url: demo_result,
        type: 'POST',
        data: formData,
        async: true,
        cache: false,
        contentType: false,
        processData: false,
        dataType:'json',
        beforeSend:function(XMLHttpRequest){
            $("#over").css('display','block');
            $("#layout").css('display','block');
        },
        success: function (returndata) {
            $("#over").css('display','none');
            $("#layout").css('display','none');
            if(returndata.status == 'error2')
            {
                alert('非法图片或者图片超过1M');
            }else if(returndata.status == 'error')
            {
                alert('请稍后重试或者换张新的图片')
            }else{
                var datahtml='<div class="hero-info">';
                $.each(returndata.images, function(i, face){
                    datahtml +='<div style="padding-top:116px;display:inline;float:left;width:45%;padding-left: 20%;">'+
                        '<div class="upload_fx">'+
                        '<div class="upload_img">'+
                        '<img src="http://120.76.26.101:8081'+face.img_path+'" alt="" class="imgShow">'+
                        '</div>'+
                        '</div>'+
                        '</div>';
                });
                datahtml +='<div style="clear:both"></div>'+
                    '<div style="padding-top:30px;width:616px;margin:0 auto;" class="">'+
                    '<div class="face_result">'+
                    '<h3>识别结果</h3>'+
                    '<ul>';
                if(returndata.facePairs.length == 0){
                    datahtml +='<li style="font-size: 18px;">所上传图片中无可配对人脸，请尝试其它图片</li>';
                }else{
                    $.each(returndata.facePairs, function(i, face){
                        datahtml +='<li>'+
                            ' <div class="upload-result">'+
                            '<div class="sdiv2">'+
                            '   <span>A</span>'+
                            '</div>'+
                            '<div class="sdiv2"><img src="'+face.imgurl[0]+'" alt="" style="width:60px;height:60px;"></div>'+
                            '<div style="" class="sdiv2 rolling_bar">相似度:'+getn(face.similarity)+'%'+
                            ' <div class="Bar">'+
                            '   <div style="width: '+getn(face.similarity)+'%;">'+
                            '   </div>'+
                            ' </div>'+
                            ' </div>'+
                            ' <div class="sdiv2"><img src="'+face.imgurl[1]+'" alt="" style="width:60px;height:60px;"></div>'+
                            '</div>'+
                            '</li>';
                    });

                }
                datahtml +='</ul>'+
                    ' </div>'+
                    '</div>'+
                    '<div class="d2-btn">'+
                    ' <a href="'+demo2+'"  class="upload-img-2">重新上传</a>'+
                    ' </div>'+
                    '<div id="code"></div>'+
                    '<div id="code_img"></div>'+
                    '</div>';
                $('#header').html(datahtml);
            }

        },
        error: function (returndata) {
            console.log(returndata);
        }
    });
});
function doUpload2() {

    if($("#upload-file_1").val()=='' || $("#upload-file_2").val()==''){
        alert('请上传两张照片');
        return false;
    }

    var formData = new FormData($( "#uploadForm" )[0]);
    var number ='';
    var mcanvas = '';
    $.ajax({
        url: demo_result,
        type: 'POST',
        data: formData,
        async: true,
        cache: false,
        contentType: false,
        processData: false,
        dataType:'json',
        beforeSend:function(XMLHttpRequest){
            $("#over").css('display','block');
            $("#layout").css('display','block');
        },
        success: function (returndata) {
            $("#over").css('display','none');
            $("#layout").css('display','none');
            if(returndata.status == 'error2')
            {
                alert('非法图片或者图片超过1M');
            }else if(returndata.status == 'error')
            {
                alert('请稍后重试或者换张新的图片')
            }else{
                var datahtml='<div class="hero-info">';
                $.each(returndata.images, function(i, face){
                    datahtml +='<div style="padding-top:116px;display:inline;float:left;width:45%;padding-left: 20%;">'+
                        '<div class="upload_fx">'+
                        '<div class="upload_img">'+
                        '<img src="http://120.76.26.101:8081'+face.img_path+'" alt="" class="imgShow">'+
                        '</div>'+
                        '</div>'+
                        '</div>';
                });
                datahtml +='<div style="clear:both"></div>'+
                    '<div style="padding-top:30px;width:616px;margin:0 auto;" class="">'+
                    '<div class="face_result">'+
                    '<h3>识别结果</h3>'+
                    '<ul>';
                if(returndata.facePairs.length == 0){
                    datahtml +='<li style="font-size: 18px;">所上传图片中无可配对人脸，请尝试其它图片</li>';
                }else{
                    $.each(returndata.facePairs, function(i, face){
                        datahtml +='<li>'+
                            ' <div class="upload-result">'+
                            '<div class="sdiv2">'+
                            '   <span>A</span>'+
                            '</div>'+
                            '<div class="sdiv2"><img src="'+face.imgurl[0]+'" alt="" style="width:60px;height:60px;"></div>'+
                            '<div style="" class="sdiv2 rolling_bar">相似度:'+getn(face.similarity)+'%'+
                            ' <div class="Bar">'+
                            '   <div style="width: '+getn(face.similarity)+'%;">'+
                            '   </div>'+
                            ' </div>'+
                            ' </div>'+
                            ' <div class="sdiv2"><img src="'+face.imgurl[1]+'" alt="" style="width:60px;height:60px;"></div>'+
                            '</div>'+
                            '</li>';
                    });

                }
                datahtml +='</ul>'+
                    ' </div>'+
                    '</div>'+
                    '<div class="d2-btn">'+
                    ' <a href="'+demo2+'"  class="upload-img-2">重新上传</a>'+
                ' </div>'+
                '<div id="code"></div>'+
                '<div id="code_img"></div>'+
                '</div>';
                $('#header').html(datahtml);
            }

        },
        error: function (returndata) {
            console.log(returndata);
        }
    });
}

function getn(num){
    var data=0;
    data = num.toFixed(3) * 100;
    return data;
}
//Demo2 end
