<?PHP
require 'variables.php';
//ini_set('display_errors','on');
    echo "
<html>
<head>
<meta charset='UTF-8'>
<title>Дачный сайт / Меню</title>
<link rel='stylesheet' type='text/css' href='../css/main.css'/>
<style>
.vacc>ul>li.short:hover {
    height: 140px;
}
li.exit:hover{
    height:40;
}
</style>
</head>
<body>
    <div class='vacc'>
        <ul>
            <li>
                <h3><center><font size='4'>П</font>оказания датчиков...</h3></center>
                <div>
                    <a href='#'>Дренаж</a>
                    <a href='Температура'>Температура</a>
                    <a href='#'>Датчик 3</a>
                    <a href='#'>Датчик 4</a>
                    <a href='#'>Датчик 5</a>
                </div>
            </li>
            <li>
                <h3><center><font size='4'>У</font>правление устройствами...</center></h3>
                <div>
                    <a href='#'>Дренажный насос</a>
                    <a href='#'>Полив</a>
                    <a href='#'>Отопление</a>
                    <a href='#'>Устройство 4</a>
                    <a href='#'>Устройство 5</a>
                </div>
            </li>
            <li class='short'>
                <h3><center><font size='4'>П</font>рочее</h3></center>
                <div>
                    <a href='Архив'>Архив...</a>
                    <a href='#'>Настройки</a>
                    <a href='#'>Информация</a>
                </div>
            </li>
            <li class='exit' onClick='window.location.href = \"../oauth.php?act=logout\"'>
                <h3><center><a href='../oauth.php?act=logout'><font size='4'>В</font>ыйти</a></h3></center>
            </li>
        </ul>
    </div>
    </center>
    
    </div>
    </div>
    </div>
</body>
</html>
    ";
?>