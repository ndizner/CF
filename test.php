
<link rel="stylesheet" type="text/css" href="mystyle.css">
<?  
$search = $_GET['search'];

	   $dbhost = 'localhost';
	   $dbuser = 'root';
	   $dbpass = '';
	   $dbname = 'clientes';
	   $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
	   
	try {
$con= new PDO('mysql:host=localhost;dbname=clientes', "root", "");
				  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				  $query = "SELECT * FROM datos where nombre LIKE '%$search%' and apellido LIKE '%$search%' and dni LIKE '%$search%' ";
				 
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

   
?>


<br/><br/>
<input type="button" class="btn" onClick="location.href='index.php'" value="Volver al Inicio"/>
