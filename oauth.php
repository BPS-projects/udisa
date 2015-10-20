<?PHP
session_start();
if($_GET['act']=='logout'){
    session_destroy();
echo "<meta http-equiv='refresh' content='0; url=../'>";
}
?>