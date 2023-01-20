<?php
if(!isset($_SESSION) || empty($_SESSION)){
    session_start();
}

session_destroy();

echo '<script>document.location="../../php/pages/index.php"</script>'

?>