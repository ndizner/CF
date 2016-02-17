
<!DOCTYPE html>
<html lang = "en-US">
 <head>
 <meta charset = "UTF-8">
 <style type = "text/css">
table 		{ background:#3498db border-right:1px solid #ccc; border-bottom:1px solid #ccc; }
table th	{ background:#3498db; padding:5px; border-left:1px solid #ccc; border-top:1px solid #ccc; }
table td	{  padding:5px; border-left:1px solid #ccc; border-top:1px solid #ccc; }
 </style>
 </head>
 <body>
 <p>
 <?php
 $dni=35378060;
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
 ?>
 </p>
 </body>
</html>
