<link rel="stylesheet" type="text/css" href="mystyle.css">

<?php	
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname = "clientes";
   $dni = $_GET['dni']; 
  
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM movimientos where dni = '$dni' ORDER BY fecha DESC LIMIT 1;";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Registros Encontrados: <br>";
    while($row = $result->fetch_assoc()) {
        echo "Ultima Fecha de Pago: " . $row["fecha"]. "<br>";
	
$date=date_create($row["fecha"]);
date_add($date,date_interval_create_from_date_string("1 month"));
echo "Fecha de Vencimiento: ";
echo date_format($date,"Y-m-d");
echo "<br>";
} 
} else {
	echo "no se encontraron Movimientos";
}

$conn->close();


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

} 

}else {
	echo "no se encontro el DNI";
}
$conn->close();


?>
 <img src="<?php echo('img/'); echo $dni; echo ".jpg";
 ?>" align="right" />

 <META HTTP-EQUIV="REFRESH" CONTENT="7;checkin.php">
