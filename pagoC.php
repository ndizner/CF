<link rel="stylesheet" type="text/css" href="mystyle.css">
<?php	
	$dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
	$dni = $_GET['dni']; 
	$fecha = $_GET['fecha']; 
	$concepto = $_GET['concepto']; 
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Error al agregar cliente: ' . mysql_error());
   }
   $sql = "INSERT INTO movimientos (DNI, Fecha, Concepto)
    VALUES ('$dni', '$fecha', '$concepto')";
echo "pago aplicado con éxito <br>";
echo "DNI: $dni <br>";
echo "Concepto: $concepto <br>";
echo "Fecha de Pago: $fecha <br>";

        mysql_select_db('clientes');
      $retval = mysql_query( $sql, $conn );  
   if(! $retval ) {
      die('Could not enter data: ' . mysql_error());
   }
	
?>

<input type="button" class="btn" onClick="location.href='index.php'" value="Volver al Inicio"/>

 
