<?PHP
require '../../variables.php';
ini_set('display_errors','off');
    $name="";
    $type=$_GET['type'];
    $lastslash=0;
    $src=$_GET['dir'];
    for($i=0;$i<strlen($src);$i++){
        if($src[$i]=="/"){
            $lastslash=$i;
        }
    }
    for($i=$lastslash+1;$i<strlen($src);$i++){
        $name.=$src[$i];
    }
    echo "
    <html>
<head>
<link rel='stylesheet' type='text/css' href='../css/Архив'/>
<link rel='stylesheet' type='text/css' href='../../../css/main.css'/>
<link rel='stylesheet' type='text/css' href='../css/Стилизация фото : видео.css'/>
<a class='addfile' href='../Добавить_файл'>Добавить файл</a>
    ";
    /*if($src==""){
     *    echo "<meta http-equiv='refresh' content='0; url=../'>";
     * }
     */
echo "
    <meta charset'UTF-8'>
<title>Дачный сайт / Архив / $name
</title>
</head>
<body>
";echonavpanel('../');
echo"
<a class='back' onclick='history.back();'>← Обратно</a>
<div class='videocontainer'>
";
    $j=0;
    $dir = $_GET['dir'];
    $id = $_GET['id']-1;
    $file = file_get_contents("../../../../src/$username/Архив/$dir/files.txt");
    for($i=0;$i<$id;$i++){
        for($p=0;$p<4;$p++){
            while($file[$j]!="\n" and $file[$j]!=""){
                $j++;
                    //Устанавливаем имя
                }
                $j++;
            }
        }
        $name="";
$extention="";
$icon="";
$tags="";
$fname="";
$src .= "/src/";
while($file[$j]!="\n" and $file[$j]!=""){
        //Устанавливаем имя
        $src .= $file[$j];
        $fname .= $file[$j];
        $j++;
    }
    $j++;
while($file[$j]!="\n" and $file[$j]!=""){
        //Устанавливаем расширение
        $src .= $file[$j];
        $j++;
    }
    $j++;
    while($file[$j]!="\n" and $file[$j]!=""){
        $j++;
    }
    $j++;
while($file[$j]!="\n" and $file[$j]!=""){
        $j++;
    }
if($j<strlen($file)){echo "<a class='redact nav' href='../Просмотр/?dir=";echo  $_GET['dir'];echo "&id=";echo $_GET['id']+1;echo  "&type=";echo $_GET['type']."'>>></a>";}
if($_GET['id']>1) {echo "<a class='redact nav prev' href='../Просмотр/?dir=";echo  $_GET['dir'];echo "&id=";echo $_GET['id']-1;echo  "&type=";echo $_GET['type']."'><<</a>";}
echo "<center>";
    echo "<h2>$fname<a href='../Редактировать_файл?type=".$_GET['type']."&dir=".$_GET['dir']."&id=".$_GET['id']."'><img class='edit' src='../Иконки/standart_edit_icon.png'/></a></h2>";
    if(file_exists("../../../../src/$username/Архив/$src")){
        if($type=="video"){
            echo "<video src=\"../viewfile.php?dir=$username/Архив/$src\" controls autoplay>";
        }
        elseif($type=="image"){
            echo "<img src=\"../viewfile.php?dir=$username/Архив/$src\">";
        }
    }
    else echo "<h4 style='position:relative;margin:100 0 150 0'>Файл $src не существует.<br />Убедитесь в том, что вы перешли по правильной ссылке.</h4>";
    echo "
</center>
</div>
</body>
</html>
    ";
?>