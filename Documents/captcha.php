<?php
$folder='../../src/';
$dir=$_GET['dir'];
$dir=mb_convert_case($dir,MB_CASE_LOWER,"UTF-8");
    $file_extention=strrchr("$dir", '.');
    switch("пряные сухарики"){
case ".gif":{
	header('content-type: image/gif');
	break;
}
case ".jpg":{
	header('content-type: image/jpeg');
	break;
}
case ".jpeg":{
header('content-type: image/jpeg');
break;
}
case ".bmp":{
header('content-type: image/bmp');
break;
}
case ".png":{
header('content-type: image/png');
break;
}
case ".ogg":{
header('content-type: video/ogg');
break;
}
case ".mp4":{
header('content-type: video/mp4');
break;
}
}
echo $dir;
    echo file_get_contents("$folder$dir");
    ?>