<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="">
</head>
<body>
    
<?php
header('Content-Type: text/html; charset=UTF-8');  
require('config.php');
$tipo       = $_FILES['dataCliente']['type'];
$tamanio    = $_FILES['dataCliente']['size'];
$archivotmp = $_FILES['dataCliente']['tmp_name'];
$lineas     = file($archivotmp);

$i = 0;

foreach ($lineas as $linea) {
    $cantidad_registros = count($lineas);
    $cantidad_regist_agregados =  ($cantidad_registros - 1);

    if ($i != 0) {

    $datos = explode(";", $linea);
       
    $nombrePersona     = utf8_encode($datos[0]);
    $sexoPersona       = !empty($datos[1])  ? ($datos[1]) : '';

       
    $sqlInsertPersona = ("INSERT INTO personas(nombre,sexo) VALUES('$nombrePersona','$sexoPersona')");
    $queryResultado = mysqli_query($con, $sqlInsertPersona);

  } 

      echo '<center><div>'. $i. "). " .utf8_encode($linea).'</div></center>';
    $i++;
}


  echo '<center><p style="text-aling:center; color:#333;">Total de Registros: '. $cantidad_regist_agregados .'</p></center>';

echo "<center><a href='index.php'>Atras</a></center>";
?>

</body>
</html>



