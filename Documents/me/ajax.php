<?PHP
include 'variables.php';
session_start();
if(isset($_POST['ajaxtype'])){
	$file = file_get_contents("../../src/$username/Датчики.txt");
	while($file[$integer]!="\n" and $file[$integer]!=""){
        $integer++;
    }
    $integer++;
    while($file[$integer]!="\n" and $file[$integer]!=""){
        echo $file[$integer];
        $integer++;
    }
    echo " ";
    $integer++;
    while($file[$integer]!="\n" and $file[$integer]!=""){
        echo $file[$integer];
        $integer++;
    }
    echo " ";
    $integer++;
    while($file[$integer]!="\n" and $file[$integer]!=""){
        echo $file[$integer];
        $integer++;
    }
    echo " ";
    $integer++;
    while($file[$integer]!="\n" and $file[$integer]!=""){
        echo $file[$integer];
        $integer++;
    }
    echo " ";
    $integer++;
    while($file[$integer]!="\n" and $file[$integer]!=""){
        echo $file[$integer];
        $integer++;
    }
    echo " ";
    $integer++;
    while($file[$integer]!="\n" and $file[$integer]!=""){
        echo $file[$integer];
        $integer++;
    }
    echo " ";
}
?>