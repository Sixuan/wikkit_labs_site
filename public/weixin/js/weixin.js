/**
 * Created by Maki on 2016/7/5.
 */
//生成图片的最终宽度
var maxWidth = 320;
$(document).ready(function () {
    var dheight = document.body.scrollHeight;
    var dwidth = document.body.scrollWidth;
    $('#formbackground').width(dwidth);
    $('#formbackground').height(dheight);
})

//有多像 start

$('#upload-file1').change(function(){
    var selectedFile = $('#upload-file1').get(0).files[0];
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

$('#upload-file2').change(function(){
    var selectedFile = $('#upload-file2').get(0).files[0];
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


$("#fto2").click(function () {

    if ($("#upload-file1").val() == '') {
        alert('请上传照片');
        return false;
    }

    $("#bu1").hide();
    $("#bu2").show();
    $("#prompt").attr('src', base_url + 'public/weixin/img/title6_2.png');
    $("#upload_img").attr('src', base_url + 'public/weixin/img/photo5.png');
    new uploadPreview({UpBtn: "upload-file2", DivShow: "upload_div", ImgShow: "upload_img"});
});

$('#f_btn').click(function () {
    if ($("#upload-file1").val() == '' || $("#upload-file2").val() == '') {
        alert('请上传照片');
        return false;
    }
    $('#uploadForm').submit();
})
//有多像 end

//颜值排名 start
function doUpload_old() {
    if ($("#upload-file").val() == '') {
        alert('请上传照片');
        return false;
    }
    var formData = new FormData($("#uploadForm")[0]);
    var imgsrc = $('#upload_img').attr('src');
    $.ajax({
        url: rank_3,
        type: 'POST',
        data: formData,
        async: true,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        beforeSend: function (XMLHttpRequest) {
            $("#over").css('display', 'block');
            $("#layout").css('display', 'block');
        },
        success: function (returndata) {
            $("#over").css('display', 'none');
            $("#layout").css('display', 'none');
            if (returndata.status == 'error2') {
                alert('非法图片或者图片超过1M');
            } else if (returndata.status == 'error') {
                alert('请稍后重试或者换张新的图片')
            } else {
                dhtml = '<div class="header">'
                    + '<div class="upload_fx">'
                    + '<img src="http://120.76.26.101:8081' + returndata.img_path + '" alt="" style="z-index: -2;" class="imgShow">'
                    + '</div>'
                    + '<img src=' + base_url + 'public/weixin/img/title2.png alt="" class="title2" style="width:100%;">'
                    + '</div>'
                    + '<div class="content">'
                    + '<ul class="paiming" style="padding:0px;">';
                $.each(returndata.faces, function (i, face) {
                    var trophy;
                    switch (i) {
                        case 0:
                            trophy = base_url + 'public/weixin/img/m1.png';
                            break;
                        case 1:
                            trophy = base_url + 'public/weixin/img/m2.png';
                            break;
                        case 2:
                            trophy = base_url + 'public/weixin/img/m3.png';
                            break;
                        default:
                            return false;
                            break;
                    }
                    dhtml += '<li>'
                        + '<div class="f4">'
                        + '<img src="' + trophy + '" alt="" class="middle">'
                        + '</div>'
                        + '<div class="f4">'
                        + '<img src="' + face.faceurl + '" alt="" class="middle" style="width:61px;height:61px;">'
                        + '</div>'
                        + '<div class="f5">'
                        + '<div class="f5_1">'
                        + '<img src=' + base_url + 'public/weixin/img/20160501161327.png alt="" class="middle">'
                        + '<span style="color:#B1B1B1">'
                        + face.age + '岁'
                        + '</span>'
                        + '</div>'
                        + '<div class="f5_2">'
                        + '颜值' + getFraction(face.face_score)
                        + '</div>'
                        + '</div>'
                        + '</li>';
                });
                dhtml += '</ul>'
                    + '</div>'
                    + '<div class="footer" style="z-index:9999;">'
                    + '<div class="paizhao">'
                    + '<a href="javascript:void(0)">'
                    + '分享'
                    + '</a>'
                    + '</div>'
                    + '<div class="xiangce" style="z-index:9999;">'
                    + '<a href="' + rank + '" style="z-index:9999;">'
                    + '再玩一次'
                    + '</a>'
                    + '</div>'
                    + '</div>';
                $('#contact').html(dhtml);
            }

        }
    })
}

function doUpload(){
    if ($("#upload-file").val() == '') {
        alert('请上传照片');
        return false;
    }
    var imgsrc = $('#upload_img').attr('src');
    var cwidth = document.body.scrollWidth * 0.4;
    var selectedFile = $('#upload-file').get(0).files[0];
    lrz(selectedFile, {width: maxWidth}).then(function (rst) {

        $.ajax({
            url: rank_3,
            type: 'post',
            data: {img: rst.base64,type:rst.file.type},
            async: true,
            dataType: 'json',
            timeout: 200000,
            beforeSend: function (XMLHttpRequest) {
                $("#over").css('display', 'block');
                $("#layout").css('display', 'block');
            },
            success: function (returndata) {
                $("#over").css('display', 'none');
                $("#layout").css('display', 'none');
                if (returndata.status == 'error2') {
                    alert('非法图片或者图片超过1M');
                } else if (returndata.status == 'error') {
                    alert('请稍后重试或者换张新的图片')
                } else {
                    dhtml = '<div class="header">'
                        + '<div class="upload_fx">'
                        + '<img src="http://120.76.26.101:8081' + returndata.img_path + '" alt="" style="z-index: -2;" class="imgShow">'
                        + '</div>'
                        + '<img src=' + base_url + 'public/weixin/img/title2.png alt="" class="title2" style="width:100%;">'
                        + '</div>'
                        + '<div class="content">'
                        + '<ul class="paiming" style="padding:0px;">';
                    $.each(returndata.faces, function (i, face) {
                        var trophy;
                        switch (i) {
                            case 0:
                                trophy = base_url + 'public/weixin/img/m1.png';
                                break;
                            case 1:
                                trophy = base_url + 'public/weixin/img/m2.png';
                                break;
                            case 2:
                                trophy = base_url + 'public/weixin/img/m3.png';
                                break;
                            default:
                                return false;
                                break;
                        }
                        dhtml += '<li>'
                            + '<div class="f4">'
                            + '<img src="' + trophy + '" alt="" class="middle">'
                            + '</div>'
                            + '<div class="f4">'
                            + '<img src="' + face.faceurl + '" alt="" class="middle" style="width:61px;height:61px;">'
                            + '</div>'
                            + '<div class="f5">'
                            + '<div class="f5_1">'
                            + '<img src=' + base_url + 'public/weixin/img/20160501161327.png alt="" class="middle">'
                            + '<span style="color:#B1B1B1">'
                            + face.age + '岁'
                            + '</span>'
                            + '</div>'
                            + '<div class="f5_2">'
                            + '颜值' + getFraction(face.face_score)
                            + '</div>'
                            + '</div>'
                            + '</li>';
                    });
                    dhtml += '</ul>'
                        + '</div>'
                        + '<div class="footer" style="z-index:9999;">'
                        + '<div class="paizhao">'
                        + '<a href="javascript:void(0)">'
                        + '分享'
                        + '</a>'
                        + '</div>'
                        + '<div class="xiangce" style="z-index:9999;">'
                        + '<a href="' + rank + '" style="z-index:9999;">'
                        + '再玩一次'
                        + '</a>'
                        + '</div>'
                        + '</div>';
                    $('#contact').html(dhtml);
                }

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
}
function getFraction(num) {
    var data = 0;
    data = num.toFixed(3);
    return data;
}
//颜值排名 end
//明星脸 start
function doUpload2_old() {
    if ($("#upload-file").val() == '') {
        alert('请上传照片');
        return false;
    }
    var formData = new FormData($("#uploadForm")[0]);
    var imgsrc = $('#upload_img').attr('src');
    var number = '';
    var mcanvas = '';
    var dhtml = '';
    var cwidth = document.body.scrollWidth * 0.4;
    $.ajax({
        url: star_3,
        type: 'POST',
        data: formData,
        async: true,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        beforeSend: function (XMLHttpRequest) {
            $("#over").css('display', 'block');
            $("#layout").css('display', 'block');
        },
        success: function (returndata) {
            $("#over").css('display', 'none');
            $("#layout").css('display', 'none');
            if (returndata.status == 'error2') {
                alert('非法图片或者图片超过1M');
            } else if (returndata.status == 'error') {
                alert('请稍后重试或者换张新的图片')
            } else {
                dhtml = '<div class="header_5_3">'
                    + '<img src="' + base_url + 'public/weixin/img/title5_3.png" alt="">'
                    + '</div>'

                    + '<div class="content">'
                    + '<div class="content5_3">'
                    + '<div style="width:100%;text-align:center;padding-top:1rem;padding-bottom:1rem;">'
                    + '<img src="' + imgsrc + '" alt="" style="width:' + cwidth + 'px;height: ' + cwidth + 'px;">'
                    + '<img src="' + returndata.candidates[0]['thumb_url'] + '" alt="" style="width:' + cwidth + 'px;height: ' + cwidth + 'px;">'
                    + '</div>'
                    + '</div>'
                    + '<div style="margin-top:-18px;">'
                    + '<span class="sasa">相似度' + getSimilarity(returndata.candidates[0]['confidence']) + '%</span>'
                    + '</div>'
                    + '</div>'

                    + '<div class="footer" style="padding-top:1rem;">'
                    + '<div class="footer_name"><a href="">' + returndata.candidates[0]['person_name'] + '</a></div>'
                    + '<div class="footer_body">'
                    + '<div class="smallstart">其他相似明星</div>'
                    + '<div style="width:100%;">';

                $.each(returndata.candidates, function (i, face) {
                    dhtml += '<div class="startinfo">'
                        + '<img src="' + face.thumb_url + '" alt="" style="">'
                        + '<span style="" class="startname">' + face.person_name + '</span>'
                        + '</div>';
                });


                dhtml += '</div>'
                    + '</div>'
                    + '</div>';
                $('#contact').html(dhtml);
            }

        }
    })
};

function doUpload2(){
    if ($("#upload-file").val() == '') {
        alert('请上传照片');
        return false;
    }
    var imgsrc = $('#upload_img').attr('src');
    var cwidth = document.body.scrollWidth * 0.4;
    var selectedFile = $('#upload-file').get(0).files[0];
    lrz(selectedFile, {width: maxWidth}).then(function (rst) {

        $.ajax({
            url: star_3,
            type: 'post',
            data: {img: rst.base64,type:rst.file.type},
            async: true,
            dataType: 'json',
            timeout: 200000,
            beforeSend: function (XMLHttpRequest) {
                $("#over").css('display', 'block');
                $("#layout").css('display', 'block');
            },
            success: function (returndata) {
                $("#over").css('display', 'none');
                $("#layout").css('display', 'none');
                if (returndata.status == 'error2') {
                    alert('非法图片或者图片超过1M');
                } else if (returndata.status == 'error') {
                    alert('请稍后重试或者换张新的图片')
                } else {
                    dhtml = '<div class="header_5_3">'
                        + '<img src="' + base_url + 'public/weixin/img/title5_3.png" alt="">'
                        + '</div>'

                        + '<div class="content">'
                        + '<div class="content5_3">'
                        + '<div style="width:100%;text-align:center;padding-top:1rem;padding-bottom:1rem;">'
                        + '<img src="' + imgsrc + '" alt="" class="imgShow2">'
                        + '<img src="' + returndata.candidates[0]['thumb_url'] + '" alt="" style="width:' + cwidth + 'px;height: ' + cwidth + 'px;">'
                        + '</div>'
                        + '</div>'
                        + '<div style="margin-top:-18px;">'
                        + '<span class="sasa">相似度' + getSimilarity(returndata.candidates[0]['confidence']) + '%</span>'
                        + '</div>'
                        + '</div>'

                        + '<div class="footer" style="padding-top:1rem;">'
                        + '<div class="footer_name"><a href="">' + returndata.candidates[0]['person_name'] + '</a></div>'
                        + '<div class="footer_body">'
                        + '<div class="smallstart">其他相似明星</div>'
                        + '<div style="width:100%;">';

                    $.each(returndata.candidates, function (i, face) {
                        dhtml += '<div class="startinfo">'
                            + '<img src="' + face.thumb_url + '" alt="" style="">'
                            + '<span style="" class="startname">' + face.person_name + '</span>'
                            + '</div>';
                    });


                    dhtml += '</div>'
                        + '</div>'
                        + '</div>';
                    $('#contact').html(dhtml);
                }

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
}
function getSimilarity(num) {
    var data = 0;
    data = num.toFixed(3) * 100;
    return data;
}
//明星脸 end