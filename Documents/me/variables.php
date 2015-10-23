<?PHP
session_start();
ini_set('display_errors','off');
session_regenerate_id();
$username = $_SESSION['username'];
    if(!isset($_SESSION['login_time']) and !$_SESSION['login_time']-time()<1800){
echo "<meta http-equiv='refresh' content='0; url=../../../?continue=".$_SERVER['PHP_SELF']."'>";
exit;
    }
$years = file_get_contents("../../src/years.txt");
function echonavpanel($dir){
echo "<div id='navigation'>
        <div id='verticaltext'>
        <h4>
        Навигация
        </h4>
        </div>
        <div id='s_n_panel'>
        <font color='black'>Перейти на:</font><br>
        <strong>
        <center>
        <a href='$dir"."обозреватель?dir=Все фото'><img src='$dir"."Иконки/standart_nav_photo_icon.png'></a><a href='$dir"."обозреватель?dir=Всё'> Всё </a><a href='$dir"."обозреватель?dir=Все видео'><img src='$dir"."Иконки/standart_nav_video_icon.png'></a><br>
        <a href='$dir"."обозреватель?dir=2015/фотоархив'><img src='$dir"."Иконки/standart_nav_photo_icon.png'></a> 2015 <a href='$dir"."обозреватель?dir=2015/видеоархив'><img src='$dir"."Иконки/standart_nav_video_icon.png'></a><br>
        <a href='$dir"."обозреватель?dir=2014/фотоархив'><img src='$dir"."Иконки/standart_nav_photo_icon.png'></a> 2014 <a href='$dir"."обозреватель?dir=2014/видеоархив'><img src='$dir"."Иконки/standart_nav_video_icon.png'></a><br>
        <a href='$dir"."обозреватель?dir=2013/фотоархив'><img src='$dir"."Иконки/standart_nav_photo_icon.png'></a> 2013 <a href='$dir"."обозреватель?dir=2013/видеоархив'><img src='$dir"."Иконки/standart_nav_video_icon.png'></a><br>
        <a href='$dir"."обозреватель?dir=2012/фотоархив'><img src='$dir"."Иконки/standart_nav_photo_icon.png'></a> 2012 <a href='$dir"."обозреватель?dir=2012/видеоархив'><img src='$dir"."Иконки/standart_nav_video_icon.png'></a><br>
        <a href='$dir"."обозреватель?dir=2011/фотоархив'><img src='$dir"."Иконки/standart_nav_photo_icon.png'></a> 2011 <a href='$dir"."обозреватель?dir=2011/видеоархив'><img src='$dir"."Иконки/standart_nav_video_icon.png'></a><br>
        <a href='$dir"."обозреватель?dir=2010/фотоархив'><img src='$dir"."Иконки/standart_nav_photo_icon.png'></a> 2010 <a href='$dir"."обозреватель?dir=2010/видеоархив'><img src='$dir"."Иконки/standart_nav_video_icon.png'></a><br>
        <a href='$dir"."обозреватель?dir=2009/фотоархив'><img src='$dir"."Иконки/standart_nav_photo_icon.png'></a> 2009 <a href='$dir"."обозреватель?dir=2009/видеоархив'><img src='$dir"."Иконки/standart_nav_video_icon.png'></a><br>
        <a href='$dir"."обозреватель?dir=2008/фотоархив'><img src='$dir"."Иконки/standart_nav_photo_icon.png'></a> 2008 <a href='$dir"."обозреватель?dir=2008/видеоархив'><img src='$dir"."Иконки/standart_nav_video_icon.png'></a><br>
        <a href='$dir"."обозреватель?dir=2007/фотоархив'><img src='$dir"."Иконки/standart_nav_photo_icon.png'></a> 2007 <a href='$dir"."обозреватель?dir=2007/видеоархив'><img src='$dir"."Иконки/standart_nav_video_icon.png'></a><br>
        <a href='$dir"."обозреватель?dir=2006/фотоархив'><img src='$dir"."Иконки/standart_nav_photo_icon.png'></a> 2006 <a href='$dir"."обозреватель?dir=2006/видеоархив'><img src='$dir"."Иконки/standart_nav_video_icon.png'></a><br>
        <a href='$dir"."обозреватель?dir=2005/фотоархив'><img src='$dir"."Иконки/standart_nav_photo_icon.png'></a> 2005 <a href='$dir"."обозреватель?dir=2005/видеоархив'><img src='$dir"."Иконки/standart_nav_video_icon.png'></a><br>
        <a href='$dir"."обозреватель?dir=2004/фотоархив'><img src='$dir"."Иконки/standart_nav_photo_icon.png'></a> 2004 <a href='$dir"."обозреватель?dir=2004/видеоархив'><img src='$dir"."Иконки/standart_nav_video_icon.png'></a><br>
        <a href='$dir"."обозреватель?dir=2003/фотоархив'><img src='$dir"."Иконки/standart_nav_photo_icon.png'></a> 2003 <a href='$dir"."обозреватель?dir=2003/видеоархив'><img src='$dir"."Иконки/standart_nav_video_icon.png'></a><br>
        <a href='$dir"."обозреватель?dir=2002/фотоархив'><img src='$dir"."Иконки/standart_nav_photo_icon.png'></a> 2002 <a href='$dir"."обозреватель?dir=2002/видеоархив'><img src='$dir"."Иконки/standart_nav_video_icon.png'></a><br>
        <a href='$dir"."обозреватель?dir=2001/фотоархив'><img src='$dir"."Иконки/standart_nav_photo_icon.png'></a> 2001 <a href='$dir"."обозреватель?dir=2001/видеоархив'><img src='$dir"."Иконки/standart_nav_video_icon.png'></a><br>
        <a href='$dir"."обозреватель?dir=2000/фотоархив'><img src='$dir"."Иконки/standart_nav_photo_icon.png'></a> 2000 <a href='$dir"."обозреватель?dir=2000/видеоархив'><img src='$dir"."Иконки/standart_nav_video_icon.png'></a><br>
        <a href='$dir"."обозреватель?dir=1995-1999/фотоархив'><img src='$dir"."Иконки/standart_nav_photo_icon.png'></a> 1995-1999 <a href='$dir"."обозреватель?dir=1995-1999/видеоархив'><img src='$dir"."Иконки/standart_nav_video_icon.png'></a><br>
        <a href='$dir"."обозреватель?dir=1990-1994/фотоархив'><img src='$dir"."Иконки/standart_nav_photo_icon.png'></a> 1990-1995 <a href='$dir"."обозреватель?dir=1990-1994/видеоархив'><img src='$dir"."Иконки/standart_nav_video_icon.png'></a><br>
        <a href='$dir"."обозреватель?dir=1985-1989/фотоархив'><img src='$dir"."Иконки/standart_nav_photo_icon.png'></a> 1985-1989 <a href='$dir"."обозреватель?dir=1985-1989/видеоархив'><img src='$dir"."Иконки/standart_nav_video_icon.png'></a><br>
        <a href='$dir"."обозреватель?dir=1980-1984/фотоархив'><img src='$dir"."Иконки/standart_nav_photo_icon.png'></a> 1980-1985 <a href='$dir"."обозреватель?dir=1980-1984/видеоархив'><img src='$dir"."Иконки/standart_nav_video_icon.png'></a><br>
        <a href='$dir"."обозреватель?dir=1970-1979/фотоархив'><img src='$dir"."Иконки/standart_nav_photo_icon.png'></a> 1970-1975 <a href='$dir"."обозреватель?dir=1970-1979/видеоархив'><img src='$dir"."Иконки/standart_nav_video_icon.png'></a><br>
        <a href='$dir'>Меню архива</a><br>
        <a href='../$dir'>Меню сайта</a>
        </center>
    
        </strong>
        </font>
        <div id='s_n_panel_bottom'>
        </div>
        </div>
        </div>";
    }
?>