   <?PHP
    require '../../variables.php';
   ini_set('display_errors', 'Off');
   echo "
    <html>
    <head>
    <title>Дачный сайт / Архив / Добавить файл</title>
    <link rel='stylesheet' type='text/css' href='../../../css/main.css'/>
    <link rel='stylesheet' type='text/css' href='../css/Архив.css'/>
    <link rel='stylesheet' type='text/css' href='this.css'/>
    </head>
    <body style='text-align:center;'>";
    echonavpanel('../');
    echo "
    <a class='back' onclick='history.back()'>← Обратно</a>
    <script>
    function Sortfunc(id,myid){
        var sortid = document.getElementById(id);
        if(myid.className=='tag_icon sort'){
            sortid.value='0';
            myid.className='tag_icon sort hidden';
        }else{
            sortid.value='1';
            myid.className='tag_icon sort';
        }
    }
    </script>
    <h1>Добавить файл в Архив</h1>
    <form style='color:black;'' action='"; echo $_SERVER['PHP_SELF'];echo "?submit=1' method='post' enctype='multipart/form-data'>
    Шаг 1: Загрузите ваш файл:<br>
<input type='hidden' name='MAX_FILE_SIZE' value='17179869184'>
<label for='file'>
<div class='selectfileblock'>
<div class='selectfile'>
    Выбрать файл
</div>
</div>
</label>
<input type='file' name='userfile' id='file'>
<br>Шаг 2: Выберите папку для загрузки<br>
<select name='year'>
    <option selected disabled>Выберите год</option>
    <option ";if($_POST['year']=="2015"){echo "selected";}echo ">2015</option>
<option ";if($_POST['year']=="2014"){echo "selected";}echo ">2014</option>
<option ";if($_POST['year']=="2013"){echo "selected";}echo ">2013</option>
<option ";if($_POST['year']=="2012"){echo "selected";}echo ">2012</option>
<option ";if($_POST['year']=="2011"){echo "selected";}echo ">2011</option>
<option ";if($_POST['year']=="2010"){echo "selected";}echo ">2010</option>
<option ";if($_POST['year']=="2019"){echo "selected";}echo ">2009</option>
<option ";if($_POST['year']=="2008"){echo "selected";}echo ">2008</option>
<option ";if($_POST['year']=="2007"){echo "selected";}echo ">2007</option>
<option ";if($_POST['year']=="2006"){echo "selected";}echo ">2006</option>
<option ";if($_POST['year']=="2005"){echo "selected";}echo ">2005</option>
<option ";if($_POST['year']=="2004"){echo "selected";}echo ">2004</option>
<option ";if($_POST['year']=="2003"){echo "selected";}echo ">2003</option>
<option ";if($_POST['year']=="2002"){echo "selected";}echo ">2002</option>
<option ";if($_POST['year']=="2001"){echo "selected";}echo ">2001</option>
<option ";if($_POST['year']=="2000"){echo "selected";}echo ">2000</option>
<option ";if($_POST['year']=="1995-1999"){echo "selected";}echo ">1995-1999</option>
<option ";if($_POST['year']=="1990-1995"){echo "selected";}echo ">1990-1995</option>
<option ";if($_POST['year']=="1985-1989"){echo "selected";}echo ">1985-1989</option>
<option ";if($_POST['year']=="1980-1984"){echo "selected";}echo ">1980-1984</option>
<option ";if($_POST['year']=="1970-1979"){echo "selected";}echo ">1970-1979</option>
</select>
<select name='filetype' value=".$_POST['year'].">
    <option selected>Выберите тип файла</option>
    <option value='1' ";if($_POST['filetype']=="1"){echo "selected";}echo ">Видео</option>
    <option value='2' ";if($_POST['filetype']=="2"){echo "selected";}echo ">Фото</option>
</select>
<br>
   <br>Шаг 3: Выберите тэги для вашего файла<br>
    <img src='../Иконки/standart_tag_icon_girl' class='tag_icon sort";if(!$_POST['sort1']=="1" or $_POST['sort1']==""){echo " hidden";}echo "' onclick='Sortfunc(\"sort1\",this)'>
    <img src='../Иконки/standart_tag_icon_violin' class='tag_icon sort";if(!$_POST['sort2']=="1" or $_POST['sort2']==""){echo " hidden";}echo "' onclick='Sortfunc(\"sort2\",this)'>
    <img src='../Иконки/standart_tag_icon_boy' class='tag_icon sort";if(!$_POST['sort3']=="1" or $_POST['sort3']==""){echo " hidden";}echo "' onclick='Sortfunc(\"sort3\",this)'>
    <img src='../Иконки/standart_tag_icon_trumpet' class='tag_icon sort";if(!$_POST['sort4']=="1" or $_POST['sort4']==""){echo " hidden";}echo "' onclick='Sortfunc(\"sort4\",this)'>
    <img src='../Иконки/standart_tag_icon_camping' class='tag_icon sort";if(!$_POST['sort5']=="1" or $_POST['sort5']==""){echo " hidden";}echo "' onclick='Sortfunc(\"sort5\",this)'>
    <input type='hidden' id='sort1' name='sort1' value='";if($_POST['sort1']=="1"){echo "1";}else{echo "0";}echo "'>
    <input type='hidden' id='sort2' name='sort2' value='";if($_POST['sort2']=="1"){echo "1";}else{echo "0";}echo "'>
    <input type='hidden' id='sort3' name='sort3' value='";if($_POST['sort3']=="1"){echo "1";}else{echo "0";}echo "'>
    <input type='hidden' id='sort4' name='sort4' value='";if($_POST['sort4']=="1"){echo "1";}else{echo "0";}echo "'>
    <input type='hidden' id='sort5' name='sort5' value='";if($_POST['sort5']=="1"){echo "1";}else{echo "0";}echo "'>
    <br><br><input type='submit'>
    </form>
    ";
    $error="";
    if(!isset($_GET["submit"])) exit;
$uploadyear = $_POST['year'];
switch($_FILES['userfile']['error']){
        case 1:{
            $error="ERR_FILE_SIZE_EXCEEDS_2GB";
            break;
        }
        case 2:{
            $error="ERR_FILE_SIZE_EXCEEDS_2GB";
            break;
        }
        case 3:{
            $error="ERR_PARTIAL";
            break;
        }
        case 4:{
            $error="ERR_NO_FILE";
            break;
        }
        case 6:{
            $error="ERR_NO_TMP_DIR";
            break;
        }
        case 7:{
            $error="ERR_CANT_WRITE";
            break;
        }
    }
    if(empty($error)){
if(empty($uploadyear)){
    $error="ERR_YEAR_IS_NOT_DEFINED";
}
$filetype=$_FILES['userfile']['type'];
switch($_POST['filetype']){
    case "1":{
        if(!($filetype=="video/mp4" or $filetype=="video/mp4")){$error="ERR_INVALID_FILETYPE";}
        $uploadft="/Видеоархив/";
        break;
    }
    case "2":{
        if(!($filetype=="image/png" or $filetype=="image/bmp" or $filetype=="image/jpeg" or $filetype=="image/gif")){$error="ERR_INVALID_FILETYPE";}
        $uploadft="/Фотоархив/";
        break;
    }
    default:{
        $error="ERR_FILETYPE_IS_NOT_DEFINED";
    }
}
if(empty($error)){
    if($_FILES['userfile']['error']===0){
        $filestxtdir = "../../../../src/$username/Архив/$uploadyear$uploadft"."Files.txt";
        $uploadfile = "../../../../src/$username/Архив/$uploadyear$uploadft"."src/" . $_FILES['userfile']['name'];
        if(!empty($_FILES['userfile']['tmp_name'])){
            if(!file_exists($uploadfile)){
            if(copy($_FILES['userfile']['tmp_name'],$uploadfile)){   
                $error="OK";
                 $filename = $_FILES['userfile']['name'];
        $file = file_get_contents($filestxtdir);
        $file_extention = strrchr("$filename", '.');
        $FEL=(strlen($filename)-strlen($file_extention));
        $fileid="";
        for($i=0;$i<$FEL;$i++){
            $fileid .= $filename[$i];
        }
        if(!empty($file)){
            $file .= "\n";
        }
        $file .= "$fileid\n$file_extention\n";
        if($_POST['filetype']=="1"){$file .= "standart_video_icon_1\n";} else $file .= "standart_photo_icon_1\n";
        if($_POST['sort1']=="1"){$file .= "1";}else $file .= "0";
        if($_POST['sort2']=="1"){$file .= "1";}else $file .= "0";
        if($_POST['sort3']=="1"){$file .= "1";}else $file .= "0";
        if($_POST['sort4']=="1"){$file .= "1";}else $file .= "0";
        if($_POST['sort5']=="1"){$file .= "1";}else $file .= "0";
        file_put_contents($filestxtdir,$file);
            }
            else $error="ERR_FILE_CANNOT_BE_MOVED";
        }
        else $error="ERR_FILE_EXISTS";
        }
    }
    }
}
echo "<br>";
switch($error){
    case "ERR_YEAR_IS_NOT_DEFINED";{
        echo "Ошибка: Вы не указали год!";
        break;
    }
    case "ERR_FILETYPE_IS_NOT_DEFINED":{
        echo "Ошибка: Вы не указали тип файла!";
        break;
    }
    case "ERR_FILE_CANNOT_BE_MOVED":{
        echo "Ошибка: файл не удалось скопировать. попробуйте еще раз.";
        break;
    }
    case "ERR_FILE_SIZE_EXCEEDS_2GB":{
        echo "Ошибка: Размер файла превышает 2 гигабайта.";
        break;
    }
    case "ERR_PARTIAL":{
        echo "Файл получен частично. такое могло произойти если в течении передачи разорвалось соединение. попробуйте еще раз";
        break;
    }
    case "ERR_NO_FILE":{
        echo "Ошибка: Загрузите файл!";
        break;
    }
    case "ERR_NO_TMP_DIR":{
        echo "Ошибка: Отсутствует временная директория. попробуйте еще раз";
        break;
    }
    case "ERR_CANT_WRITE":{
        echo "Ошибка: Не удалось записать файл на диск. попробуйте еще раз.";
        break;
    }
    case "ERR_INVALID_FILETYPE":{
        echo "Ошибка: Неверное расширение файла.<br>Допустимые видео-форматы: ogg, mp4<br> Допустимые фото-форматы: png, bmp, gif, jpeg(jpg)";
        break;
    }
    case "ERR_FILE_EXISTS":{
        echo "Ошибка: Файл с таким именем уже существует. выберите другое имя";
        break;
    }
    case "OK":{
        echo "Файл успешно загружен.";
        break;
    }
}
echo "<br>";
?>




