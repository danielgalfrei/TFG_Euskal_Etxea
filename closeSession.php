<?php

require_once('_varios.php');

setcookie("mail_auth", "", time() - 7000);
setcookie("passwrd_auth", "", time() - 7000);
setcookie("id_auth", "", time() - 7000);
setcookie("idUsuario", "", time() - 7000);
setcookie("id", "", time() - 7000);
setcookie("codigoUsuario", "", time() - 7000);


redireccionar("home.php")

?>