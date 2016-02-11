<link rel="stylesheet" type="text/css" href="mystyle.css">
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
} else {
    echo "No se encontraron clientes con ese DNI";
}
$conn->close();
	
?>
<br/> <br/>
<form name="formularioDatos" method="get" action="pagoC.php">



<strong>Registro de PAGOS</strong> <br/> <br/>
<strong>Ingrese DNI</strong> <input type="text" name="dni" size="8" required/>
Concepto  <select id="concepto" name="concepto">
        <option value=""></option>
        <option value="Pago Mensual">Pago Mensual</option>
        <option value="Matricula">Matricula</option>
        <option value="Inscripcion">Inscripcion</option>
      </select>

<br/> 
Fecha de PAGO <input type="date" name="fecha" value="">
<script>
    if (!Modernizr.touch || !Modernizr.inputtypes.date) {
        $('input[type=date]')
            .attr('type', 'text')
            .datepicker({
                dateFormat: 'dd-mm-yy'
            });
    }
</script> <br/>
	<input type="button" class="btn" onClick="location.href='index.php'" value="Volver al Inicio"/>
	<input value="Confirmar" class="btn" type="submit" />
