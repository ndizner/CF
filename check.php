<link rel="stylesheet" type="text/css" href="mystyle3.css">

<?php	
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname = "clientes";
   $dni = $_GET['dni']; 
   $check = True;
  
  
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
$sql = "SELECT * FROM datos where dni = '$dni'";
$result = $conn->query($sql);
	if ($result->num_rows > 0) {	 
		while($row = $result->fetch_assoc()) {
			echo "DNI: " . $row["dni"]. " - Nombre: " . $row["nombre"]. " " . $row["apellido"]. "<br>";
			$nombre = " ". $row["nombre"]. " " . $row["apellido"]."";
			 echo '<img src="data:image/png;base64,' . base64_encode($row['imagen']) . '" / width="400" height="500" align="right" >';
	} 
$conn->close();
	}else {
		echo "No se encontro ese DNI";
		$check = false;	
		header('Location: checkin.php');
	}
//aca checkeo la existencia del DNI; si no existe marco la variable check como falsa y no entro en el otro if	
// de encontrar el DNI; nos devuelve nombre, apellido e imagen 
 
 
 if ($check == true){  
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
$sql = "SELECT * FROM movimientos where dni = '$dni' ORDER BY fecha DESC LIMIT 1;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo "Ultima Fecha de Pago: " . $row["fecha"]. "<br>";
	//aca trae el ultimo registro de movimiento de la BD	
	$date=date_create($row["fecha"]);
	date_add($date,date_interval_create_from_date_string("1 month"));
	echo "Fecha de Vencimiento: ";
	echo date_format($date,"Y-m-d");
	echo "<br>";
// aca tomo la fecha del ultimo pago y la uso para calcular la fecha de vencimiento
} 
}$conn->close();	
	date_default_timezone_set("America/Argentina/Buenos_Aires");
	$clase = date("i");
	$hora = date("H");
	if ($clase<=10){	//ese 10 define la tolerancia en minutos
		$clase=$hora;
			} else {
				$clase = $hora + 1;
			}
	// Esta funcion toma la hora de entrada y devuelve un valor dependiendo del valor recibido. son 10 minutos de tolerancia para las clases
	// si llega 11:01 va a devolver clase de las 11. si llega 11:11 ya entra en la clase de las 12
	
	date_default_timezone_set("America/Argentina/Buenos_Aires");
	$hora = "" . date("G:i:s") . "";
	$fecha = $time = "" . date("Y-m-d") ."";
	//aca paso la fecha y hora para que las cargue 

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
} 
//aca agrego en la base de ingresos los datos de la persona que ingreso.

$sql = "INSERT INTO ingreso (dni,fecha, hora, clase	)
				VALUES ('$dni', '$fecha', '$hora',  '$clase')";
$result = $conn->query($sql);
$conn->close();
 }

?>

 <META HTTP-EQUIV="REFRESH" CONTENT="7;checkin.php">
