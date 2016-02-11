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

   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Error al agregar cliente: ' . mysql_error());
   }
		$sql = "INSERT INTO datos (dni, nombre, apellido, tel, email, fnac, fini, plan, sexo)
				VALUES ('$dni', '$nombre', '$apellido',  '$tel', '$mail', '$fnac', '$fini', '$plan', '$sexo')";
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
   
   
   mysql_close($conn);
?>
