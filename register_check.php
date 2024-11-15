<?php
if (!isset($_POST["register_name"]) ||
	!isset($_POST["register_username"]) ||
	!isset($_POST["register_password"]) ||
	!isset($_POST["register_repassword"])){

	die("ERROR 1: Formulario no enviado");
}

$name = trim($_POST["register_name"]);

if (strlen($name) <= 2){
	die("ERROR 2: Nombre demasiado corto");
}

$username = trim($_POST["register_username"]);

if (strlen($username) <= 4){
	die("ERROR 3: Nombre de usuario demasiado corto");
}

$email = trim($_POST["register_email"]);

if (strlen($email) <= 4){
	die("ERROR 4: Nombre de usuario demasiado corto");
}

$pass = trim($_POST["register_password"]);

if (strlen($_POST["register_password"]) < 6){
	die("ERROR 5: Password muy corto");
}


$tmp = addslashes($name);
if ($name != $tmp){
	die("Error 6: Nombre mal formado");
}

$tmp = addslashes($username);
if ($username != $tmp){
	die("Error 7: Nombre de usuario mal formado");
}

$tmp = addslashes($email);
if ($email != $tmp){
	die("Error 8: e-mail mal formado");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
	die("Error 9: e-mail mal formado");
}

$pass = addslashes($pass);
if ($pass != $_POST["register_repassword"]){
	die("Error 10: Password con caracteres no válidos");
}

$pass = md5($pass);

$query = <<<EOD
INSERT INTO creators (name, username, password, email)
VALUES('{$name}', '{$username}', '{$pass}', '{$email}');
EOD;


require_once("db_config.php");

$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

$result = mysqli_query($conn, $query);

if(!$result){
	die("Error 11: No se ha insertado en la base de datos");
}

$id_creator = mysqli_insert_id($conn);


session_start();

$_SESSION["id_creator"] = $id_creator;

header("Location: dashboard.php");

exit();
?>
