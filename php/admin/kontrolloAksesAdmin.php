<?php
if(!isset($_SESSION)){
    session_start();
}
if($_SESSION['aksesi'] != 2){
    echo '<script>document.location="../design/403.php"</script>';
}


?>