<link rel="stylesheet" type="text/css" href="mystyle.css">


<?php	
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname = "clientes";
   $texto = $_GET['texto']; 
   $check = true;
  

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM datos where dni = '$texto'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {	
		$dni= $row["dni"];
		$nombre=$row["nombre"];
		$apellido=$row["apellido"];
		$tel=$row["tel"];
		$email=$row["email"];
		$plan=$row["plan"];
		$fnac=$row["fnac"];
		$fini=$row["fini"];
		$sexo=$row["sexo"];
		$emername=$row["emername"];
		$emertel=$row["emertel"];
		$parentezco=$row["parentezco"];
		$osoc=$row["osoc"];		
		
		echo '<img src="data:image/png;base64,' . base64_encode($row['imagen']) . '" / width="400" height="500" align="right" >';
}
} else {
    echo "No se encontraron clientes con ese DNI";
	$check = false;
	header('Location: datos.php');
}
$conn->close();	
?>

<head>
<title>Información</title>

<meta charset="utf-8">

</head>
<body>

<form name="formularioDatos" method="POST"  enctype="multipart/form-data">
<img src="haya.jpg"  alt="HAYABUSA" align="right" align="bott">
<div align="center"> 
<h2> Información de Cliente </h2>
</div>
<h3> Datos personales </h3>
	<div align="justify">
			Nombre <input class="textbox" type="text" name="nombre" value="<?php echo $nombre ?>" disabled="disabled">
			Apellido <input class="textbox" type="text" name="apellido" value="<?php echo $apellido ?>" disabled="disabled">
			<br/> <br/>
			Fecha de Nac <input class="textbox" type="date" name="nac" value="<?php echo $fnac ?>" disabled="disabled">
			<script>
				if (!Modernizr.touch || !Modernizr.inputtypes.date) {
					$('input[type=date]')
						.attr('type', 'text')
						.datepicker({
							dateFormat: 'dd-mm-yy'
						});
				}
			</script>
			
			DNI <input class="textbox" type="int" name="dni" value="<?php echo $dni ?>"  minlength="8" maxlength="8" disabled="disabled"> 
			<br/> <br/>
			Telefono <input class="textbox" type="int" name="tel" value="<?php echo $tel ?>" maxlength="10" disabled="disabled">
			  E-mail:
			  <input class="textbox" type="email" value="<?php echo $email ?>" name="mail" disabled="disabled">
			<br/> <br/>
			Sexo <input class="textbox" type="sexo" value="<?php echo $sexo ?>" name="sexo" disabled="disabled">
	</div>
	<hr>
<h3> Contacto de Emergencia </h3>  
	Nombre y Apellido <input class="textbox" type="text" name="emername" value="<?php echo $emername ?>" disabled="disabled">
	Telefono <input class="textbox" type="int" name="emertel" value="<?php echo $emertel ?>" maxlength="10" disabled="disabled"><br/><br/>
	Obra Social  <input class="textbox" type="text" name="osoc" value="<?php echo $osoc ?>" disabled="disabled">
	Parentezco <input class="textbox" type="text" name="parentezco" value="<?php echo $parentezco ?>" disabled="disabled">

	 <hr> 
<h3> Información Administrativa </h3> 
	   Fecha de inicio
	 <input class="textbox" type="date" name="ini" value="<?php echo $fini ?>" disabled="disabled">
	<script>
		if (!Modernizr.touch || !Modernizr.inputtypes.date) {
			$('input[type=date]')
				.attr('type', 'text')
				.datepicker({
					dateFormat: 'dd-mm-yy'
				});
		}
	</script> 
	Plan <input class="textbox" type="sexo" value="<?php echo $plan ?>" name="sexo" disabled="disabled">
	 
	 <br/> <br/>
	 	 <hr> 
<h3> Información De Pagos </h3> 	
<style type = "text/css">
table 		{ background:#3498db border-right:1px solid #ccc; border-bottom:1px solid #ccc; }
table th	{ background:#3498db; padding:5px; border-left:1px solid #ccc; border-top:1px solid #ccc; }
table td	{  padding:5px; border-left:1px solid #ccc; border-top:1px solid #ccc; }
 </style> 
<?php
if ($check == true){  
try {
					$con= new PDO('mysql:host=localhost;dbname=clientes', "root", "");
				  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				  $query = "SELECT * FROM movimientos WHERE dni ='$dni'";
				 
				  //first pass just gets the column names
				  print "<table> \n";
				  $result = $con->query($query);
				  //return only the first row (we only need field names)
				  $row = $result->fetch(PDO::FETCH_ASSOC);
				  print " <tr> \n";
				  foreach ($row as $field => $value){
				   print " <th>$field</th> \n";
				  } // end foreach
				  print " </tr> \n";
				  //second query gets the data
				  $data = $con->query($query);
				  $data->setFetchMode(PDO::FETCH_ASSOC);
				  foreach($data as $row){
				   print " <tr> \n";
				   foreach ($row as $name=>$value){
				   print " <td>$value</td> \n";
				   } // end field loop
				   print " </tr> \n";
				  } // end record loop
				  print "</table> \n";
				  } catch(PDOException $e) {
				   echo 'ERROR: ' . $e->getMessage();
				  } // end try
if ($check == true){  
		$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
		$sql = "SELECT * FROM movimientos where dni = '$dni' ORDER BY fecha DESC LIMIT 1;";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
			$date=date_create($row["fecha"]);
			date_add($date,date_interval_create_from_date_string("1 month"));
			echo "Proxima Fecha de Vencimiento: ";
			echo date_format($date,"Y-m-d");
			echo "<br>";

} 
}$conn->close();	
}
}
 
?>

 <hr> 
 <input type="button" class="btn" onClick="location.href='index.php'" value="Volver al Inicio"/>

</div>

</form>
</body>


</html>