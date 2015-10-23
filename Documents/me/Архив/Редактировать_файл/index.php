<?PHP
require '../../variables.php';
//ini_set('display_errors','on');
    echo "
    <html>
    <head>
    <title>Дачный сайт / Архив / Редактировать файл</title>
    <link rel='stylesheet' type='text/css' href='../../../css/main.css'/>
    <link rel='stylesheet' type='text/css' href='../css/Архив.css'/>
    <link rel='stylesheet' type='text/css' href='this.css'/>
    </head>
    </head>
    <body>
    ";
    echonavpanel('../');
    echo "
    <a class='back' onclick='history.back()'>← Обратно</a>
    <a class='addfile' href='../Добавить_файл'>Добавить файл</a>
<center style='height:auto;'>";
if(isset($_GET['submit'])){
    $j=0;
    $first="";
        $dir = $_GET['dir'];
        $id = $_GET['id']-1;
    $file = file_get_contents("../../../../src/$username/Архив/$dir/files.txt");
    for($i=0;$i<$id;$i++){
        for($p=0;$p<4;$p++){
            while($file[$j]!="\n" and $file[$j]!=""){
                $output .= $file[$j];
                $j++;
                    //Устанавливаем имя
                }
                $output .= $file[$j];
                 $j++;
            }
        }
        $name="";
        while($file[$j]!="\n" and $file[$j]!=""){
            $name .= $file[$j];
        $j++;
    }
    $j++;
    while($file[$j]!="\n" and $file[$j]!=""){
        //Устанавливаем расширение
        $extention .= $file[$j];
        $j++;
    }
    $j++;
    while($file[$j]!="\n" and $file[$j]!=""){
        //Устанавливаем иконку
        $icon .= $file[$j];
        $j++;
    }
    $j++;
    while($file[$j]!="\n" and $file[$j]!=""){
        $j++;
    }
    $j++;
    $output .= $_POST['name']."\n$extention\n$icon\n".$_POST['sort1'].$_POST['sort2'].$_POST['sort3'].$_POST['sort4'].$_POST['sort5']."\n";
    $lenoffile=strlen($file);
    while($j<$lenoffile){
        $output .= $file[$j];
        $j++;
    }
    if($name!=$_POST['name']){
        rename("../../../../src/$username/Архив/$dir/src/$name$extention","../../../../src/$username/Архив/$dir/src/".$_POST['name']."$extention");
    }
    file_put_contents("../../../../src/$username/Архив/$dir/files.txt",$output);
}
echo "
    <h1>Редактировать файл</h1>
    ";
    if(empty($_GET['dir']) and empty($_GET['id'])){
echo "Неверные аргументы!";
    }
    else {
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
while($file[$j]!="\n" and $file[$j]!=""){
        //Устанавливаем имя
        $name .= $file[$j];
        $j++;
    }
    $j++;
while($file[$j]!="\n" and $file[$j]!=""){
        //Устанавливаем расширение
        $extention .= $file[$j];
        $j++;
    }
    $j++;
    while($file[$j]!="\n" and $file[$j]!=""){
        //Устанавливаем иконку
        $icon .= $file[$j];
        $j++;
    }
    $j++;
while($file[$j]!="\n" and $file[$j]!=""){
        //Устанавливаем тэги
        $tags .= $file[$j];
        $j++;
    }
    echo "<br>";
    if($j-4<=strlen($file)){
    echo "
    <form method='post' action='";echo $_SERVER['PHP_SELF']."?type=".$_GET['type']."&dir=".$_GET['dir']."&id=".$_GET['id']."&submit=1' style='color:black'>
    <h2>Расположение: $dir</h2>
    <h2>Имя: <input type='text' name='name' value='$name'>$extention</h2>
    <h2>Тэги: </h2>
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
    <img src='../Иконки/standart_tag_icon_girl'    class='tag_icon sort";if(!$tags[0]=="1"){echo " hidden";}echo "' onclick='Sortfunc(\"sort1\",this)'>
    <img src='../Иконки/standart_tag_icon_violin'  class='tag_icon sort";if(!$tags[1]=="1"){echo " hidden";}echo "' onclick='Sortfunc(\"sort2\",this)'>
    <img src='../Иконки/standart_tag_icon_boy'     class='tag_icon sort";if(!$tags[2]=="1"){echo " hidden";}echo "' onclick='Sortfunc(\"sort3\",this)'>
    <img src='../Иконки/standart_tag_icon_trumpet' class='tag_icon sort";if(!$tags[3]=="1"){echo " hidden";}echo "' onclick='Sortfunc(\"sort4\",this)'>
    <img src='../Иконки/standart_tag_icon_camping' class='tag_icon sort";if(!$tags[4]=="1"){echo " hidden";}echo "' onclick='Sortfunc(\"sort5\",this)'>
    <input type='hidden' id='sort1' name='sort1' value='";if($tags[0]=="1"){echo "1";}else{echo "0";}echo "'>
    <input type='hidden' id='sort2' name='sort2' value='";if($tags[1]=="1"){echo "1";}else{echo "0";}echo "'>
    <input type='hidden' id='sort3' name='sort3' value='";if($tags[2]=="1"){echo "1";}else{echo "0";}echo "'>
    <input type='hidden' id='sort4' name='sort4' value='";if($tags[3]=="1"){echo "1";}else{echo "0";}echo "'>
    <input type='hidden' id='sort5' name='sort5' value='";if($tags[4]=="1"){echo "1";}else{echo "0";}echo "'>
     <h2>Предпросмотр:</h2>
     ";
     if($_GET['type']=="image"){
    echo "<img style='width:400px;height:auto;border:solid 2px;' src='../viewfile.php?dir=$username/Архив/$dir/src/$name$extention'/>";
}
elseif ($_GET['type']=="video") {
    echo "<video style='width:400px;height:auto;border:solid 2px;' src='../viewfile.php?dir=$username/Архив/$dir/src/$name$extention' controls></video>";
}
echo "
    <br>
    <br>
    <input type='submit' value='Готово'>
    <br>
    </form>
    </center>
    ";
}
else echo "<h2>Ошибка: неверный ID файла</h2>";
}
?>