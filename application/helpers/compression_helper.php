<?php
/**
 * Created by PhpStorm.
 * User: Maki
 * Date: 2016/4/25
 * Time: 12:38
 */

function compression($file){
    header("Content-type: image/jpeg");
    $percent = 0.5;  //图片压缩比
    list($width, $height) = getimagesize($file); //获取原图尺寸
    //缩放尺寸
    $newwidth = $width * $percent;
    $newheight = $height * $percent;
    $src_im = imagecreatefromjpeg($file);
    $dst_im = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresized($dst_im, $src_im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
    imagejpeg($dst_im); //输出压缩后的图片
    imagedestroy($dst_im);
    imagedestroy($src_im);
}