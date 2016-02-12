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
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Error al agregar cliente: ' . mysql_error());
   }
		$sql = "INSERT INTO datos (dni, nombre, apellido, tel, email, fnac, fini, plan, sexo, emername, emertel, osoc, parentezco)
				VALUES ('$dni', '$nombre', '$apellido',  '$tel', '$mail', '$fnac', '$fini', '$plan', '$sexo', '$emername', '$emertel', '$osoc', '$parentezco')";
    		mysql_select_db('clientes');
			$retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not enter data: ' . mysql_error());
   }
   echo "Se Agrego correctamente <br>";
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
   
   
   mysql_close($conn);
?>


<br/><br/>
<input type="button" class="btn" onClick="location.href='index.php'" value="Volver al Inicio"/>

