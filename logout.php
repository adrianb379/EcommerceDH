<?php
session_start();
session_destroy();
setcookie('login',"" , -1);
setcookie('user',"" , -1);
header('Location: index.php');
exit;

 ?>
