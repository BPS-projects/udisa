<?PHP
require '../variables.php';
    echo "
    <html>
    <head>
    <title>Дачный сайт / Архив</title>
    <link rel='stylesheet' type='text/css' href='../../css/main.css'/>
      <link rel='stylesheet' type='text/css' href='css/Архив.css'/>
    </head>
    <body>";
    echonavpanel();
    echo "
    <a class='back' onclick='history.back()'>← Обратно</a>
    <center><font size='9'>А<font size='7'>рхив:</font></font></center>
    <a class='addfile' href='Добавить_файл'>Добавить файл</a>
    <div class='vacc'>
    <ul>
    ";
    for($i=2015;$i>1994;$i--){
        echo "<li><h3><center>";
        if($i>1999){
            echo $i;
            $year=$i;
        }
        else {switch($i){
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
                $year = "1970-1979";
                break;
            }
        }
            echo $year;
        }
        
        echo "</h3></center><div><a href='обозреватель?dir=$year/Видеоархив'>Видеоархив</a>
        <a href='обозреватель?dir=$year/Фотоархив'>Фотоархив</a></div>
        </li>";
    }
    echo "<li><h3><center><a href='обозреватель?dir=Всё'>Все</a></center></h3><div><a href='обозреватель?dir=Все видео'>Видеоархив</a><a href='обозреватель?dir=Все фото'>Фотоархив</a></div></ul>";
    ?>