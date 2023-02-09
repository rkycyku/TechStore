<?php
if (!isset($_SESSION)) {
    session_start();    
}
  
if (!isset($_SESSION['userID']) || $_SESSION['userID'] == '') {
    echo '<script>document.location="../pages/index.php"</script>';
}


?>