<?php

$imgname = __DIR__ . '/images/pexels-canva-studio-3153199.jpg';
$imgname = __DIR__ . '\images\IMG_0294.jpeg';

[$width, $height] = getimagesize($imgname);

$maxdim			= 400;
$scalefactor	= $maxdim / max($width, $height);
$newwidth 		= $width  * $scalefactor;
$newheight 		= $height * $scalefactor;

$img		= imagecreatefromjpeg($imgname);

$newimg	= imagecreatetruecolor($newwidth, $newheight);

imagecopyresampled($newimg, $img, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

header('Content-Type: image/jpeg');
imagejpeg($newimg);//,'scaled.jpg');

echo "";

