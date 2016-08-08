/**
 * Created by Maki on 2016/7/5.
 */

$(document).ready(function(){
    var dheight = $(document).height();
    //初始化，拿第一张图的json
    path = first_png;
    $("#scream").attr('src',path);
    $.get(get_json+"?id=1",function(data,status){
        /*$('#jsoncode').html(data);*/
        $('#jsoncode').html(jsonFormat(data));
        getCanvas(1,data,canvas_type);
    });

    var obj_a = $('#demo-hero a');
    var img_value ='';
    var path ='';

    //背景图刚好全屏
    $('#header').height(dheight);

    //点击替换图片，更新数据
    for(i=0;i<obj_a.length;i++){
        $(obj_a[i]).click(function(){
            img_value= this.title;
            $("#scream").attr('src',path);
            $.get(get_json+"?id="+img_value,function(data,status){
                /*$('#jsoncode').html(data);*/
                $('#jsoncode').html(jsonFormat(data));
                getCanvas(img_value,data,canvas_type);
            });
        })
    }
    //二维码
    $('#code').hover(function(){
        $(this).attr('id','code_hover');
        $('#code_img').show();
        $('#code_img').addClass('a-fadeinL');
    },function(){
        $(this).attr('id','code');
        $('#code_img').hide();
    })
})

//json格式化
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

/**
 * 绘图
 * @param imgnum 第几张图片
 * @param landmarks 绘图数据
 * @param type 绘图类型 1：人脸检测；2：关键点
 */
function getCanvas(imgnum,landmarks,type){
    json = eval("(" + landmarks + ")");
    var face_x = json.faces[0]["left"];
    var face_y = json.faces[0]["top"];
    var face_width = json.faces[0]["right"]-json.faces[0]["left"];
    var face_height = json.faces[0]["bottom"]-json.faces[0]["top"];
    var c=document.getElementById("myCanvas");
    var ctx=c.getContext("2d");
    ctx.save();
    ctx.setTransform(1,0,0,1,0,0);
    ctx.clearRect(0,0,481,481);
    var img = new Image();
    img.src = base_url+"public/face/"+imgnum+".png";

    img.onload = function() {
        ctx.drawImage(img,10,10);
        ctx.strokeStyle="#CB55D3";
        if(type==1){
            ctx.strokeRect(face_x+10,face_y+10,face_width,face_height);
        }else{
            $.each(json.faces[0]["landmarks"], function(i, field) {
                ctx.beginPath();
                ctx.arc(field.x+10, field.y+10, 0.5, 0, 2 * Math.PI);
                ctx.stroke();
            });
        }

    }

    ctx.scale(2,2);
}