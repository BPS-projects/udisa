<?PHP
    sleep(1);
    session_start();
    session_regenerate_id();
    ini_set('display_errors','off');
    if($_SESSION["time_left"]-time()>0){                                                //если форма не заблокирована
        $error="Форма заблокирована на ";
        $error.= $_SESSION["time_left"]-time();
        $error.= " секунд. ";
    }
    elseif(isset($_SESSION["attempts_count"])){                                         //Если мы работаем на проверку пароля,
            if(!empty($_POST["login"]) and !empty($_POST["password"])){                 //и пользователь заполнил все инпуты
                $_SESSION["attempts_count"]++;                                          //добавляем кол-во попыток
                $users = file_get_contents('../src/users.txt');
                $logins = array();
                $passwords= array();
                $len = strlen($users);
                $integer=0;
                $log = $_POST['login'];
                $pass = $_POST['password'];
                $authorized=false;
                while($integer<$len){
                    $line="";
                    $pswd_right=false;
                    while($users[$integer]!="\n" and $users[$integer]!=""){                   //считываем строку
                        $line.=$users[$integer];
                        $integer++;
                    }
                    if($line==$log){
                        $pswd_right = true;
                    }
                    $integer++;
                    $line="";
                    while($users[$integer]!="\n" and $users[$integer]!=""){                   //считываем строку
                        $line.=$users[$integer];
                        $integer++;
                    }
                    if($line==$pass and $pswd_right === true){
                        if(isset($_GET['continue'])){
                        echo "<meta http-equiv='refresh' content='0; url=".$_GET['continue']."'>";
                    }
                    else echo "<meta http-equiv='refresh' content='0; url=/me'>";
                        $_SESSION['username']=$log;
                        $_SESSION['password']=$pass;
                        $_SESSION['login_time']=time();
                        exit;                    
                    }
                    $integer++;    
                }                                                                       //проверяем правильный ли логин пароль
                if($_SESSION["attempts_count"]%3==0){                               //...и мы исчерпали все попытки
                        $_SESSION["time_left"]=time()+($_SESSION["attempts_count"]*10); //блокируем форму...
                        $error="Форма заблокирована на ";
                        $error.= $_SESSION["time_left"]-time();
                        $error.= " секунд.";
                    }
                    else $error="Неправильный логин/пароль";                             //а если попытки еще остались, то пишем ошибку неправильный логин/пароль
                }
        else $error="Вы не заполнили все необходимые поля";                              //Ну а если пользователь не ввел все инпуты, то пишем что вы не заполнили все необходимые поля.
    }
    else $_SESSION["attempts_count"]=1;                                                 //а если пользователь первый раз зашел на страницу, то на следующий его заход мы проверим введенные данные. тоесть
                                                                                        //объявляем переменную количества попыток.
?>
<html>
<meta charset="UTF-8"/>
<title>Дачный сайт / Вход</title>
<link rel="stylesheet" type="text/css" href="css/main.css"/>
<body>
<style>
.class1 {
position: absolute;
left: 50%;
top: 40%;
margin: -125px -125px;
    font-family: 'Chalkboard SE';
    border-style: solid;
    background-color: rgba(0, 0, 0, 0.35);
width: 250;
height:auto;
    border-radius:100px 100px 10px 10px;
}
button {
color:white;
background:none;
border:none;
    font-family:'Chalkboard SE';
    font-size:15px;
outline:none;
height:30px;
cursor:pointer;
}
</style>
<center>
<div class="class1" id="password_box">
</br><font size="8" color="">Д<font size="6">ачный сайт</font></font>

<form id="form1" method="post" action="">
<font size="5">Л</font>огин:
<input type="text" id="login" name="login" value=
<?php
    echo "\"";
    echo $_POST["login"];
    echo "\"";
    ?>
>
<script>
function Show_HidePassword(id, button) {
    var element = document.getElementById(id);
    if (element.type == 'password') {
        element.type="text";
    }
    else {
        element.type='password';
    }
}
</script>
<font size="5">П</font>ароль:

<input type="password" name="password" id="password" />
<?PHP
    if($error!="")echo "<br><font size='2' color='#900002'>$error</font>";
    ?>
</br>
<font size="4">П</font>оказать пароль:
<span><input type="checkbox" onclick="Show_HidePassword('password', this)">
</br>
</a>
</span>
<button action="">
<font size="5">В</font>ойти
</button>
</form>
</div>
</div>
</center>
</html>