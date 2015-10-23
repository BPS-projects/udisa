<?PHP
require '../../variables.php';
    //ini_set('display_errors','on');
    $dir=$_GET['dir'];
    $search=$_POST['search'];
    $integer=0;
    $row=false;
    $filescount=0;
    $year="";
    $error="";
    $file="";
    $tag_filter[0]=$_POST['sort1'];
    $tag_filter[1]=$_POST['sort2'];
    $tag_filter[2]=$_POST['sort3'];
    $tag_filter[3]=$_POST['sort4'];
    $tag_filter[4]=$_POST['sort5'];
    for($i=0;$i<5;$i++){
        if($tag_filter[$i]=="1"){
            $filtered=true;
            break;
        }
    }
    if(!empty($search)) $filtered=true;
    if($dir!=""){
        for($i=0;$i<9 and $dir[$i]!="/";$i++){
            $year.=$dir[$i];
            $integer++;
        }
        for($i=$integer+1;$i<strlen($dir);$i++){
            $src.=$dir[$i];
        }
        if($dir == "Все фото" or $dir == "Все видео" or $dir == "Всё"){
            $title=$dir;
            $displaying_everythink = true;
            $file_exists=true;
        }
        else{
            $displaying_everythink = false;
            if(file_exists("../../../../src/$username/Архив/$dir/files.txt")){
                $file_exists=true;
                $title="$src $year ";
                if(strlen($year)<5) $title.="года";
                else $title.="годов";
            }
            else {
                $file_exists = false;
                $title = "404 Папка не найдена";
                $error="Папка \"/Архив/$dir\" не найдена или она не является архивным каталогом. Попробуйте вернутся в <a href='../' style='text-decoration:underline;'>Меню архива</a> и перейти по ссылке заново.</span>";
            }
        }
        if(!empty($search)){
         $title.=" > Поиск '$search'";
        }
    }
    echo "
    <html>
    <head>
    <title>
    Дачный сайт / Архив / $title;
    </title>
    <meta charset='UTF-8'>
    <link rel='stylesheet' type='text/css' href='../../../css/main.css'/>
    <link rel='stylesheet' type='text/css' href='../css/Архив.css'/>
    ";
    if($dir==""){
        echo "<meta http-equiv='refresh' content='0; url=../'>";
    }
    echo "
    </head>
    <body>
<a class='back' onclick='history.back()'>← Обратно</a>
<a class='addfile' href='../Добавить_файл'>Добавить файл</a>
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
    ";
    if($file_exists==true){
    echo "<div id='button'><div id='verticaltext'>";
    if(!$filtered){
        echo "<h4>Фильтры...</h4>";
    }
        else echo "<h4 style='font-size:12px;'>Отфильтровано</h4>";
    echo "
    </div>
    <div id='s_panel'>
    <p><b>Фильтровать по тэгам:</b></p>
    <img src='../Иконки/standart_tag_icon_girl' class='tag_icon sort";if(!$_POST['sort1']=="1"){echo " hidden";}echo "' onclick='Sortfunc(\"sort1\",this)'>
    <img src='../Иконки/standart_tag_icon_violin' class='tag_icon sort";if(!$_POST['sort2']=="1"){echo " hidden";}echo "' onclick='Sortfunc(\"sort2\",this)'>
    <img src='../Иконки/standart_tag_icon_boy' class='tag_icon sort";if(!$_POST['sort3']=="1"){echo " hidden";}echo "' onclick='Sortfunc(\"sort3\",this)'>
    <img src='../Иконки/standart_tag_icon_trumpet' class='tag_icon sort";if(!$_POST['sort4']=="1"){echo " hidden";}echo "' onclick='Sortfunc(\"sort4\",this)'>
    <img src='../Иконки/standart_tag_icon_camping' class='tag_icon sort";if(!$_POST['sort5']=="1"){echo " hidden";}echo "' onclick='Sortfunc(\"sort5\",this)'>
    <form method='post'>
    <input type='hidden' id='sort1' name='sort1' value='";if($_POST['sort1']=="1"){echo "1";}else{echo "0";}echo "'>
    <input type='hidden' id='sort2' name='sort2' value='";if($_POST['sort2']=="1"){echo "1";}else{echo "0";}echo "'>
    <input type='hidden' id='sort3' name='sort3' value='";if($_POST['sort3']=="1"){echo "1";}else{echo "0";}echo "'>
    <input type='hidden' id='sort4' name='sort4' value='";if($_POST['sort4']=="1"){echo "1";}else{echo "0";}echo "'>
    <input type='hidden' id='sort5' name='sort5' value='";if($_POST['sort5']=="1"){echo "1";}else{echo "0";}echo "'>
    <p><b>Поиск:</p></b>
    <input type='text' ";if(!empty($search)) echo "value='$search' "; echo "name='search' maxlength='20' style='color:black;'/>
    <br>
    <br>
    <input type='submit' value='Отфильтровать'/>
    </form>
    <div id='s_panel_bottom'>
    </div>
    </div>
    </div>
        ";
        echonavpanel('../');
    }
        echo "
    <h1
    ";
    if($displaying_everythink==false){
        echo " style='margin:0 0 70px'";
    }
    echo ">
    $title
    </h1>
    ";
    if($dir!=""){
        if($displaying_everythink){
            if($dir == "Все фото") $mode = 1;
            elseif($dir == "Все видео") $mode = 2;
            //Если мы работаем в режиме вывода папки  "все"
            for($i=2015;$i>1994;$i--){
                if($i>1999){
                    $year=$i;
                }
                else {
                    switch($i){
                        case 1999:{
                            $year = "1995-1999";
                            break;
                        }
                        case 1998:{
                            $year = "1990-1994";
                            break;
                        }
                        case 1997:{
                            $year = "1985-1989";
                            break;
                        }
                        case 1996:{
                            $year = "1980-1984";
                            break;
                        }
                        case 1995:{
                            $year = "1970-1975";
                            break;
                        }
                    }
                }
                //Мы получили год, теперь смотрим фильтры
                for($t=0;$t<2;$t++){
                    $ownfileid=1;
                    $integer = 0;
                    if(!empty($file)) $file_isnt_empty=true;
                    if($mode != 2 and $t == 0){
                        $file=file_get_contents("../../../../src/$username/Архив/$year/Фотоархив/Files.txt");
                    }
                    elseif($mode != 1 and $t == 1){
                        $file=file_get_contents("../../../../src/$username/Архив/$year/Видеоархив/Files.txt");
                    }
                    else continue;
                        while($file[$integer+1]!=""){
                            $name="";
                            $extention="";
                            $icon="";
                            $tags="";
                        while($file[$integer]!="\n" and $file[$integer]!=""){
                            //Устанавливаем имя
                            $name.=$file[$integer];
                            $integer++;
                        }
                            $integer++;
                        while($file[$integer]!="\n" and $file[$integer]!=""){
                            //Устанавливаем расширение
                            $extention.=$file[$integer];
                            $integer++;
                        }
                        $integer++;
                        while($file[$integer]!="\n" and $file[$integer]!=""){
                            //Устанавливаем иконку
                            $icon.=$file[$integer];
                            $integer++;
                        }
                        $integer++;
                        while($file[$integer]!="\n" and $file[$integer]!=""){
                            //Устанавливаем тэги
                            $tags.=$file[$integer];
                            $integer++;
                        }
                        $integer++;
                            $filtered=false;
                            if(!empty($search)){
                                $search=mb_convert_case($search,MB_CASE_LOWER,"UTF-8");
                                $name_search=mb_convert_case($name,MB_CASE_LOWER,"UTF-8");
                                if(strpos($name_search,$search)===false) {$filtered=true;}
                            }
                            for($b=0;$b<5;$b++){
                                if($tag_filter[$b]=="1" and !$tags[$b]=="1"){$filtered=true;break;}
                            }
                            if($filtered==true) {$ownfileid++;continue;}
                            if($lastyear!=$year){echo "<hr><year>$year</year>";$lastyear=$year;$row = 0;}
                            echo "<data ";
                        if($row){
                            echo " class='row2'";
                        }
                        echo ">\n";
                        $buffer=0;
                        if($mode != 2 and $t == 0) {$src="Фотоархив";$filetype="image";}
                        elseif($mode != 1 and $t == 1) {$src="Видеоархив";$filetype="video";}
                        echo "<a href='../Просмотр?dir=$year/$src&id=$ownfileid&type=$filetype'>\n<img src='../Иконки/$icon.png'/><ul title='$name'>$name\n</ul>\n</a>";
                        $tag="";
                        if($tags[0]!="1"){
                            $tag="hidden";
                        }
                        else $tag="";
                        echo "<img src='../Иконки/standart_tag_icon_girl.png' class='tag_icon $tag'/>\n";
                        if($tags[1]!="1"){
                            $tag="hidden";
                        }
                        else $tag="";
                        echo "<img src='../Иконки/standart_tag_icon_violin.png' class='tag_icon $tag'/>\n";
                        if($tags[2]!="1"){
                            $tag="hidden";
                        }
                        else $tag="";
                        echo "<img src='../Иконки/standart_tag_icon_boy.png' class='tag_icon $tag'/>\n";
                        if($tags[3]!="1"){
                            $tag="hidden";
                        }
                        else $tag="";
                        echo "<img src='../Иконки/standart_tag_icon_trumpet.png' class='tag_icon $tag'/>\n";
                        if($tags[4]!="1"){
                            $tag="hidden";
                        }
                        else $tag="";
                        echo "<img src='../Иконки/standart_tag_icon_camping.png' class='tag_icon $tag'/>\n";
                        $filescount++;
                        $row=!$row;
                        echo "<a class='redact' href='../Редактировать_файл?type=$filetype&dir=$year/$src&id=$ownfileid'><img class='edit' src='../Иконки/standart_edit_icon'/></a>";
                        $ownfileid++;
                        echo "</data>";
                    }
                }
            }
            if($file_isnt_empty=true and $filescount == 0){
                echo "<h1 style='top:200px;font-size:20px;'>По вашим фильтрам ничего не найдено.</h1>";
            }
            elseif($filescount > 0){
                echo "</a><files_count>Всего файлов: $filescount</files_count>";
            }
            else echo "<h1 style='top:200px;font-size:20px;'>$integer Здесь пусто.Файл: $file колво файлов: $filescount ";
        }
        elseif(empty($error)){
            //Если мы работаем в режиме вывода обычной папки
            $file=file_get_contents("../../../../src/$username/Архив/$dir/Files.txt");
            $integer=0;
            $ownfileid=0;
            while($file[$integer+1]!=""){
                $ownfileid++;
                $name="";
                $extention="";
                $icon="";
                $tags="";
                while($file[$integer]!="\n" and $file[$integer]!=""){
                    //Устанавливаем имя
                    $name.=$file[$integer];
                    $integer++;
                }
                $integer++;
                while($file[$integer]!="\n" and $file[$integer]!=""){
                    //Устанавливаем расширение
                    $extention.=$file[$integer];
                    $integer++;
                }
                $integer++;
                while($file[$integer]!="\n" and $file[$integer]!=""){
                    //Устанавливаем иконку
                    $icon.=$file[$integer];
                    $integer++;
                }
                $integer++;
                while($file[$integer]!="\n" and $file[$integer]!=""){
                    //Устанавливаем тэги
                    $tags.=$file[$integer];
                    $integer++;
                }
                $integer++;
    
                $filtered=false;
                for($b=0;$b<5;$b++){
                    if($tag_filter[$b]=="1" and !$tags[$b]=="1"){$filtered=true;break;}
                }
                if($filtered==true) continue;
                if(!empty($search)){
                    $search=mb_convert_case($search,MB_CASE_LOWER,"UTF-8");
                    $name_search=mb_convert_case($name,MB_CASE_LOWER,"UTF-8");
                    if (!preg_match("/$search/","/$name_search")) continue;
                }
                if($filtered==true) continue;
                echo "<data ";
                if($row){
                    echo " class='row2'";
                }
                echo ">\n";
                $buffer=0;
                $buffer=strcasecmp($src,"видеоархив");
                if($buffer==-32 or $buffer===0 or $buffer ==-1) {$filetype="video";
                }else{
                    $buffer=strcasecmp($src,"видеоархив/");
                    if($buffer==-32 or $buffer===0 or $buffer == -1) {$filetype="video";
                    }else{
                        $buffer=strcasecmp($src,"фотоархив");
                        if($buffer==-32 or $buffer===0 or $buffer == -1) {$filetype="image";
                        }else{
                            $buffer=strcasecmp($src,"фотоархив/");
                            if($buffer==-32 or $buffer===0 or $buffer == -1) {$filetype="image";}
                        }
                    }
                }
                echo "<a href='../Просмотр?dir=$year/$src&id=$ownfileid&type=$filetype'>\n<img src='../Иконки/$icon.png'/><ul title='$name'>$name\n</ul>\n</a>";
                $tag="";
                if($tags[0]!="1"){
                    $tag="hidden";
                }
                else $tag="";
                echo "<img src='../Иконки/standart_tag_icon_girl.png' class='tag_icon $tag'/>\n";
                if($tags[1]!="1"){
                    $tag="hidden";
                }
                else $tag="";
                echo "<img src='../Иконки/standart_tag_icon_violin.png' class='tag_icon $tag'/>\n";
                if($tags[2]!="1"){
                    $tag="hidden";
                }
                else $tag="";
                echo "<img src='../Иконки/standart_tag_icon_boy.png' class='tag_icon $tag'/>\n";
                if($tags[3]!="1"){
                    $tag="hidden";
                }
                else $tag="";
                echo "<img src='../Иконки/standart_tag_icon_trumpet.png' class='tag_icon $tag'/>\n";
                if($tags[4]!="1"){
                    $tag="hidden";
                }
                else $tag="";
                echo "<img src='../Иконки/standart_tag_icon_camping.png' class='tag_icon $tag'/>\n";
                $filescount++;
                $row=!$row;
                echo "<a class='redact' href='../Редактировать_файл?type=$filetype&dir=$year/$src&id=$ownfileid'><img class='edit' src='../Иконки/standart_edit_icon'/></a>";
                echo "</data>";
            }
            if(!empty($file) and $filescount == 0){
                echo "<h1 style='top:200px;font-size:20px;'>По вашим фильтрам ничего не найдено.</h1>";
            }
            elseif($filescount > 0){
                echo "</a><files_count>Всего файлов: $filescount</files_count>";
            }
            else echo "<h1 style='top:200px;font-size:20px;'>Здесь пусто.";
            
        }
        else echo "<span style='width:500px;display: block;text-align: center;left: 50%;position: relative;margin: 100px 0 0 -250px;'>$error</span>";
    }
    ?>