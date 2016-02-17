
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
	header('Location: modifica.php');
}
$conn->close();	

 
?>
<head>
<title>Modificacion de Cliente</title>

<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
<form name="formularioDatos" method="POST" action="modD.php" enctype="multipart/form-data">
<img src="haya.jpg"  alt="HAYABUSA" align="right">
<div align="center"> 
<h2> Modificar datos de cliente </h2>
</div>
<h3> Datos personales </h3>
	Nombre <input class="textbox" type="text" name="nombre" value="<?php echo $nombre ?>" required/>
	Apellido <input class="textbox" type="text" name="apellido" value="<?php echo $apellido ?>" required/>
	<br/> <br/>
	Fecha de Nac <input class="textbox" type="date" name="nac" value="<?php echo $fnac ?>" required/>
	<script>
		if (!Modernizr.touch || !Modernizr.inputtypes.date) {
			$('input[type=date]')
				.attr('type', 'text')
				.datepicker({
					dateFormat: 'dd-mm-yy'
				});
		}
	</script>
	
	DNI <input class="textbox" type="int" name="dni" value="<?php echo $dni ?>"  minlength="8" maxlength="8" readonly="readonly"  required/> Este campo no se puede modificar
	<br/> <br/>
	Telefono <input class="textbox" type="int" name="tel" value="<?php echo $tel ?>" maxlength="10" required/>
	  E-mail:
	  <input class="textbox" type="email" value="<?php echo $email ?>" name="mail" required/>
	<br/> <br/>
	Sexo
	<input type="radio" id="radio1" name="sexo" value="Masculino" checked>
	   <label for="radio1">Masculino</label>
	<input type="radio" id="radio2" name="sexo"value="Femenino">
	   <label for="radio2">Femenino</label>
	<input type="radio" id="radio3" name="sexo" value="otros">
	   <label for="radio3">Otros</label>  
	<hr>
<h3> Contacto de Emergencia </h3>  
	Nombre y Apellido <input class="textbox" type="text" name="emername" value="<?php echo $emername ?>" required/>
	Telefono <input class="textbox" type="int" name="emertel" value="<?php echo $emertel ?>" maxlength="10" required/><br/><br/>
	Obra Social  <input class="textbox" type="text" name="osoc" value="<?php echo $osoc ?>" required/>
	Parentezco <input class="textbox" type="text" name="parentezco" value="<?php echo $parentezco ?>" required/>

	 <hr> 
<h3> Información Administrativa </h3> 
	   Fecha de inicio
	 <input class="textbox" type="date" name="ini" value="<?php echo $fini ?>" required/>
	<script>
		if (!Modernizr.touch || !Modernizr.inputtypes.date) {
			$('input[type=date]')
				.attr('type', 'text')
				.datepicker({
					dateFormat: 'dd-mm-yy'
				});
		}
	</script>  (se tomorá como fecha de vencimiento)
	 <br/> <br/>
	Plan
Plan
	<input type="radio" id="radio4" name="plan" value="Libre" checked>
	   <label for="radio4">Libre</label>
	<input type="radio" id="radio5" name="plan"value="Plan 2">
	   <label for="radio5">Plan 2</label>
	<input type="radio" id="radio6" name="plan" value="Plan 3">
	   <label for="radio6">Plan 3</label>  
	   
	   
	     &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
	   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
	   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
	   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
	   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
	   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
	   <input method="POST" class="btn" type="file" name="imagen" >
	 <br/> <br/>
	 

 

 <input type="button" class="btn" onClick="location.href='index.php'" value="Volver al Inicio"/>
<input value="Guardar" class="btn" type="submit" />
</div>

</form>
</body>
</html>



