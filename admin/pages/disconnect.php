<?php
$_SESSION['admin'] = 0;
unset($_SESSION['admin']);
unset($_SESSION['page']);
header('Location: ../index.php')
?>

