<link rel="stylesheet" type="text/css" href="mystyle.css">
<?  

$nombre = $_POST['nombre']; 
$apellido = $_POST['apellido']; 
$dni = $_POST['dni']; 
$tel = $_POST['tel']; 
$mail = $_POST['mail'];
$fnac = $_POST['nac'];  
$fini = $_POST['ini']; 
$plan = $_POST['plan']; 
$sexo = $_POST['sexo'];
$emername =$_POST['emername'];
$emertel = $_POST['emertel']; 
$osoc = $_POST['osoc']; 
$parentezco = $_POST['parentezco'];
$imagename=$_FILES["imagen"]; 

	   $dbhost = 'localhost';
	   $dbuser = 'root';
	   $dbpass = '';
	   $dbname = 'clientes';
	   $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
	   $imagetmp=addslashes (file_get_contents($_FILES['imagen']['tmp_name']));
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE datos SET nombre='$nombre', apellido ='$apellido', tel='$tel', email='$mail', fnac = '$fnac', fini = '$fini', plan ='$plan', sexo ='$sexo',
 emername='$emername', emertel='$emertel', osoc ='$osoc', parentezco='$parentezco', imagen='$imagetmp' WHERE dni='$dni'";

if ($conn->query($sql) === TRUE) {
    echo "Se Agrego correctamente <br>";
	
} else {
    echo "Error updating record: " . $conn->error;
}

$sql2 = "SELECT * FROM datos where dni = '$dni'";
$result = $conn->query($sql2);
	if ($result->num_rows > 0) {	 
		while($row = $result->fetch_assoc()) {
			 echo '<img src="data:image/png;base64,' . base64_encode($row['imagen']) . '" / width="400" height="500" align="right" >';
	} 
$conn->close();
	}

   echo "Nombre: $nombre $apellido <br>";
   echo "Sexo: $sexo";
   echo "DNI: $dni <br>";
   echo "TEL: $tel <br>";
   echo "Mail: $mail <br>";
   echo "Fecha de Nac: $fnac <br>";
   echo "Fecha de Inicio: $fini <br>";
   echo "Contacto de Emergencia: $emername <br>";
   echo "Telefono de Emergencia: $emertel <br>";
   echo "Obra Social: $osoc <br>";
   echo "Parentezco: $parentezco <br>";
    

?>


<br/><br/>
<input type="button" class="btn" onClick="location.href='index.php'" value="Volver al Inicio"/>