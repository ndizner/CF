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
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   $imagetmp=addslashes (file_get_contents($_FILES['imagen']['tmp_name']));
   if(! $conn ) {
      die('Error al agregar cliente: ' . mysql_error());
   }
		$sql = "INSERT INTO datos (dni, nombre, apellido, tel, email, fnac, fini, plan, sexo, emername, emertel, osoc, parentezco, imagen)
				VALUES ('$dni', '$nombre', '$apellido',  '$tel', '$mail', '$fnac', '$fini', '$plan', '$sexo', '$emername', '$emertel', '$osoc', '$parentezco', '$imagetmp')";
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

