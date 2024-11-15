<?php

require_once("template.php");

printHead("ENTIch: Login");

openBody();


echo <<<EOD
<form method="POST" action="login_check.php">
<h2>LOGIN</h2>

<p><label for="login_username">Nombre de usuario:</label>
<input type="text" name="login_username" id="login_username" /></p>

<p><label for="login_password">Password:</label>
<input type="password" name="login_password" id="login_password" /></p>

<p><input type="submit" name="login_submit" id="login_submit" /></p>
</form>

<form method="POST" action="register_check.php">
<h2>Registro</h2>

<p><label for="register_name">Nombre:</label>
<input type="text" name="register_name" id="register_name" /></p>

<p><label for="register_username">Nombre de usuario:</label>
<input type="text" name="register_username" id="register_username" /></p>

<p><label for="register_email">e-mail:</label>
<input type="text" name="register_email" id="register_email" /></p>

<p><label for="register_password">Password:</label>
<input type="password" name="register_password" id="register_password" /></p>

<p><label for="register_repassword">Confirma password:</label>
<input type="password" name="register_repassword" id="register_repassword" /></p>

<p><input type="submit" name="register_submit" id="register_submit" /></p>

</form>

EOD;

closeBody();

?>
