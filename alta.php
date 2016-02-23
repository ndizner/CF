<!DOCTYPE HTML>
<head>
<title>Formulario de Altas</title>

<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
<form name="formularioDatos" method="POST" action="altaP.php" enctype="multipart/form-data">
<img src="haya.jpg"  alt="HAYABUSA" align="right">
<div align="center"> 
<h2> Alta de nuevo Cliente </h2>
</div>
<h3> Datos personales </h3>
	Nombre <input class="textbox" type="text" name="nombre" value="" >
	Apellido <input class="textbox" type="text" name="apellido" value="" >
	<br/> <br/>
	Fecha de Nac <input class="textbox" type="date" name="nac" value="" >
	<script>
		if (!Modernizr.touch || !Modernizr.inputtypes.date) {
			$('input[type=date]')
				.attr('type', 'text')
				.datepicker({
					dateFormat: 'dd-mm-yy'
				});
		}
	</script>
	DNI <input class="textbox" type="int" name="dni" value=""  minlength="8" maxlength="8" >
	<br/> <br/>
	Telefono <input class="textbox" type="int" name="tel" value="" maxlength="10" >
	  E-mail:
	  <input class="textbox" type="email" name="mail" >
	<br/> <br/>
	Sexo
	<input type="radio" id="radio1" name="sexo" value="Masculino" checked>
	   <label for="radio1">Masculino</label>
	<input type="radio" id="radio2" name="sexo"value="Femenino">
	   <label for="radio2">Femenino</label>
	<input type="radio" id="radio3" name="sexo" value="otros">
	   <label for="radio3">Otros</label>  
	<hr>
	

	 	<input method="POST" class="btn" type="file" name="imagen">
	 	

	
<h3> Contacto de Emergencia </h3>  
	Nombre y Apellido <input class="textbox" type="text" name="emername" value="" >
	Telefono <input class="textbox" type="int" name="emertel" value="" maxlength="10" ><br/><br/>
	Obra Social  <input class="textbox" type="text" name="osoc" value="" >
	Parentezco <input class="textbox" type="text" name="parentezco" value="" >

	 <hr> 
<h3> Información Administrativa </h3> 
	   Fecha de inicio
	 <input class="textbox" type="date" name="ini" value="" >
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
	<input type="radio" id="radio4" name="plan" value="Libre" checked>
	   <label for="radio4">Libre</label>
	<input type="radio" id="radio5" name="plan"value="Plan 2">
	   <label for="radio5">Plan 2</label>
	<input type="radio" id="radio6" name="plan" value="Plan 3">
	   <label for="radio6">Plan 3</label>   
	 <br/> <br/>
	 

 

 <input type="button" class="btn" onClick="location.href='index.php'" value="Volver al Inicio"/>
<input value="Guardar" class="btn" type="submit" />
</div>

</form>
</body>
</html>