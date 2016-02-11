<link rel="stylesheet" type="text/css" href="mystyle.css">
<?  

$nombre = $_GET['nombre']; 
$apellido = $_GET['apellido']; 
$dni = $_GET['dni']; 
$tel = $_GET['tel']; 
$mail = $_GET['mail'];
$fnac = $_GET['nac'];  
$fini = $_GET['ini']; 
$plan = $_GET['plan']; 
$sexo = $_GET['sexo'];
$emername =$_GET['emername'];
$emertel = $_GET['emertel']; 
$osoc = $_GET['osoc']; 
$parentezco = $_GET['parentezco'];

   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname = 'clientes';
   
   $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE datos SET nombre='$nombre', apellido ='$apellido', tel='$tel', email='$mail', fnac = '$fnac', fini = '$fini', plan ='$plan', sexo ='$sexo',
 emername='$emername', emertel='$emertel', osoc ='$osoc', parentezco='$parentezco' WHERE dni='$dni'";

if ($conn->query($sql) === TRUE) {
    echo "Se Agrego correctamente <br>";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();

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