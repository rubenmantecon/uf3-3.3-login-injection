<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<?php
$_POST['user'] = $_POST['user'] ?? "'ESP'";

# (1.1) Connectem a MySQL (host,usuari,contrassenya)
$conn = mysqli_connect('localhost', 'exercises');

# (1.2) Triem la base de dades amb la que treballarem
mysqli_select_db($conn, 'world');

# (2.1) creem el string de la consulta (query)
$consulta = "SELECT * FROM country WHERE Code = " . $_POST['user'] . ";";
# (2.2) enviem la query al SGBD per obtenir el resultat
$resultat = mysqli_query($conn, $consulta);

# (2.3) si no hi ha resultat (0 files o bé hi ha algun error a la sintaxi)
#     posem un missatge d'error i acabem (die) l'execució de la pàgina web
if (!$resultat) {
	$message  = 'Consulta invàlida: ' . mysqli_error($conn) . "\n";
	$message .= 'Consulta realitzada: ' . $consulta;
	die($message);
}


?>

<body>
	<form action="#self" method="post">
		<input placeholder="Usuari" type="text" name="user" id="u"><br>
		<input placeholder="Contrasenya" type="password" name="pass" id="p"><br><br>
		<button type="submit">Fot-li</button>
	</form>
	<p>Consulta realitzada: <?php echo $consulta; ?></p>
</body>

</html>