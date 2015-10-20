<?PHP
require '../variables.php';
//ini_set('display_errors','on');
    $file=file_get_contents("../../../src/$username/Датчики.txt");
    $settings=file_get_contents("../../../src/$username/settings.txt");
    $integer=0;
    while($file[$integer]!="\n" and $file[$integer]!=""){
        $integer++;
    }
    $integer++;
    while($file[$integer]!="\n" and $file[$integer]!=""){
        $temp1.=$file[$integer];
        $integer++;
    }
    $integer++;
    while($file[$integer]!="\n" and $file[$integer]!=""){
        $temp2.=$file[$integer];
        $integer++;
    }
    $integer++;
    while($file[$integer]!="\n" and $file[$integer]!=""){
        $temp3.=$file[$integer];
        $integer++;
    }
    $integer++;
    while($file[$integer]!="\n" and $file[$integer]!=""){
        $temp4.=$file[$integer];
        $integer++;
    }
    $integer++;
    while($file[$integer]!="\n" and $file[$integer]!=""){
        $temp5.=$file[$integer];
        $integer++;
    }
    $integer++;
    while($file[$integer]!="\n" and $file[$integer]!=""){
        $temp6.=$file[$integer];
        $integer++;
    }
    if($settings[0]!="1"){
        $error="Данная услуга не подключена к вашему аккаунту.";
    }
    echo "
    <html>
    <head>
    <script>
    function auto_refresh(){}
    params = 'ajaxtype=temp';
    request = new XMLHttpRequest();

    request.open('POST','../ajax.php',true);
    request.setRequestHeader('Content-type',' application/x-www-form-urlencoded');
    request.onreadystatechange = function(){
   alert(this.rensponseText);
}
alert('fpfpf')
setInterval(auto_refresh(),2000)

    </script>
    <title>Дачный сайт / Датчики температуры</title>
    <link rel='stylesheet' type='text/css' href='../../css/main.css'/>
    <link rel='stylesheet' type='text/css' href='this.css'/>
    <meta charset='utf-8'>
    </head>
    <body>
    <a class='back' onClick='history.back()'>← Обратно</a><header><font size='8'>Т<font size='6'>емпература</font></font></header>
    ";
    if(!empty($error))
    {
        echo "<span style='width:500px;display: block;text-align: center;left: 50%;position: relative;margin: 300px 0 0 -250px;'>$error</span>";
        exit;
    }
      echo "
    <div class='first_page_content opened' id='page_1'>
    <div class='next_page' onClick=\"document.getElementById('page_1').className='first_page_content closed';document.getElementById('page_2').className='second_page_content opened'\">
    <center>
    >>
    </a>
    </center>
    </div>
    </a>
    
    <!-- Первая страница -->
    
    <div class='temp1'>
    <center>Температура на улице:</center>
    <temp></temp>
    <hr id='hr1' style='top:";
    echo 200-($temp1*5);
    echo "px;'><hrtext id='hrt1' style='top:";
    echo 160-($temp1*5);
    echo "px;'>
    $temp1"."c˚
    </hrtext>
    </hr>
    </div>
    <div class='temp2'>
    <center>Температура в гараже:</center>
    <temp></temp>
    <hr id='hr2' style='top:";
    echo 200-($temp2*5);
    echo "px;'><hrtext id='hrt2' style='top:";
    echo 160-($temp2*5);
    echo "px;'>
    $temp2"."c˚
    </hrtext>
    </hr>
    </div>
    <div class='temp3'>
    <center>Температура в бане:</center>
    <temp></temp>
    <hr id='hr3' style='top:";
    echo 200-($temp3*5);
    echo "px;'><hrtext id='hrt3' style='top:";
    echo 160-($temp3*5);
    echo "px;'>
    $temp3"."c˚
    </hrtext>
    </hr>
    </hrtext3></hr>
    </div>
    <!-- /Первая страница -->
    
    </div>
    <div class='second_page_content closed' id='page_2'>
    <center>
    <div class='previus_page' onClick=\"document.getElementById('page_1').className='first_page_content opened';document.getElementById('page_2').className='second_page_content closed'\">
    <<
    </div>
    </center>
    
    <!-- Вторая страница -->
    
    <div id='hr4' class='temp1'>
    <center><font size='2'>Температура в повале:</font></center>
    <temp></temp>
    <hr style='top:";
    echo 200-($temp4*5);
    echo "px;'><hrtext id='hrt4' style='top:";
    echo 160-($temp4*5);
    echo "px;'>
    $temp4"."c˚
    </hrtext>
    </hr>
    </div>
    <div class='temp2'>
    <center>Температура воды:</center>
    <temp></temp>
    <hr id='hr5' style='top:";
    echo 200-($temp5*5);
    echo "px;'><hrtext id='hrt5' style='top:";
    echo 160-($temp5*5);
    echo "px;'>";
    if($temp6 < 6) echo "<div id='blink'>";
    echo "$temp5"."c˚";
    if($temp6 < 6) echo "</div>";
    echo "
    </hrtext>
    </hr>
    </div>
    <div class='temp3'>
    <temp></temp>
    <center><font size='2'>Температура под мышкой:</font></center>
    <hr id='hr6' style='top:";
    echo 200-($temp6*5);
    echo "px;'><hrtext id='hrt6' style='top:";
    echo 160-($temp6*5);
    echo "px;'>
    $temp6"."c˚
    </hrtext>
    </hr>
    </hrtext3></hr>
    </div>
    ";
    ?>