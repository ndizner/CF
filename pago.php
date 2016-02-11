
<?php	
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname = "clientes";
   $texto = $_GET['texto']; 
   
   
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM datos where dni = '$texto'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Registros Encontrados: <br>";
    while($row = $result->fetch_assoc()) {
        echo "DNI: " . $row["dni"]. " - Nombre: " . $row["nombre"]. " " . $row["apellido"]. "<br>";
    }
} else {
    echo "No se encontraron clientes con ese DNI";
}
$conn->close();

?>
 <img src="<?php echo('img/'); echo $texto; echo ".jpg";
 ?>"  align="right" />
<br/> <br/>
<link rel="stylesheet" type="text/css" href="mystyle.css">
<form name="formularioDatos" method="get" action="pagoC.php">

<strong>Registro de PAGOS</strong> <br/> <br/>
Ingrese DNI <input class="textbox" type="int" name="dni" value="<?php echo $texto ?>" minlength="8" maxlength="8" required/>
Concepto
	  <input type="radio" id="radio4" name="concepto" value="cuota" checked>
	   <label for="radio4">Pago Mensual</label>
	<input type="radio" id="radio5" name="concepto"value="inscripcion">
	   <label for="radio5">Inscripcion</label>
	<input type="radio" id="radio6" name="concepto" value="matricula">
	   <label for="radio6">Matricula</label>   
<br/><br/>
Fecha de Pago
 <input type="date" name="fecha" value="" required/>
<script>
    if (!Modernizr.touch || !Modernizr.inputtypes.date) {
        $('input[type=date]')
            .attr('type', 'text')
            .datepicker({
                dateFormat: 'dd-mm-yy'
            });
    }
</script>
<br/> <br/>
	<input type="button" class="btn" onClick="location.href='index.php'" value="Volver al Inicio"/>
	<input type="button" class="btn" onClick="location.href='busco.php'" value="Volver a Buscar"/>
	<input value="Confirmar" class="btn" type="submit" />

