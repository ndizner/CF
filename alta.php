<!DOCTYPE HTML>
<head>
<title>Formulario de Altas</title>

<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
<form name="formularioDatos" method="get" action="altaC.php">
<img src="haya.jpg"  alt="HAYABUSA" align="right">
<h2> Datos personales </h2>
	Nombre <input class="textbox" type="text" name="nombre" value="" required/>
	Apellido <input class="textbox" type="text" name="apellido" value="" required/>
	<br/> <br/>
	Fecha de Nac <input class="textbox" type="date" name="nac" value="" required/>
	<script>
		if (!Modernizr.touch || !Modernizr.inputtypes.date) {
			$('input[type=date]')
				.attr('type', 'text')
				.datepicker({
					dateFormat: 'dd-mm-yy'
				});
		}
	</script>
	DNI <input class="textbox" type="int" name="dni" value=""  minlength="8" maxlength="8" required/>
	<br/> <br/>
	Telefono <input class="textbox" type="int" name="tel" value="" maxlength="10" required/>
	  E-mail:
	  <input class="textbox" type="email" name="mail" required/>
	<br/> <br/>
	Sexo
	<input type="radio" id="radio1" name="sexo" value="Masculino" checked>
	   <label for="radio1">Masculino</label>
	<input type="radio" id="radio2" name="sexo"value="Femenino">
	   <label for="radio2">Femenino</label>
	<input type="radio" id="radio3" name="sexo" value="otros">
	   <label for="radio3">Otros</label>  
	<hr>
<h2> Contacto de Emergencia </h2>  
	Nombre y Apellido <input class="textbox" type="text" name="nombre" value="" required/>
	Telefono <input class="textbox" type="int" name="tel" value="" maxlength="10" required/><br/><br/>
	Obra Social  <input class="textbox" type="text" name="nombre" value="" required/>
	Parentezco <input class="textbox" type="text" name="nombre" value="" required/>

	 <hr> 
<h2> Información Administrativa </h2> 
	   Fecha de inicio
	 <input class="textbox" type="date" name="ini" value="" required/>
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
	<input type="radio" id="radio4" name="plan" value="1" checked>
	   <label for="radio4">Libre</label>
	<input type="radio" id="radio5" name="plan"value="2">
	   <label for="radio5">Plan 2</label>
	<input type="radio" id="radio6" name="plan" value="3">
	   <label for="radio6">Plan 3</label>   
	 <br/> <br/>
	 

 

 <input type="button" class="btn" onClick="location.href='index.php'" value="Volver al Inicio"/>
<input value="Guardar" class="btn" type="submit" />
</div>

</form>
</body>
</html>
