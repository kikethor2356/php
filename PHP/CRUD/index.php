<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CRUD</title>
<link rel="stylesheet" type="text/css" href="hoja.css">


</head>

<body>
  <?php
  
  include("Conexion.php");


//-------------------------PAGINACION-------------

$tamano_paginas=3;
 
if(isset($_GET["pagina"])){
    if ($_GET["pagina"]==1){

        header("Location:index.php");
    }else{

        $pagina=$_GET["pagina"];
    }
}else{
    $pagina=1;
}



$empezar_desde=($pagina-1)*$tamano_paginas;

$sql_total="SELECT * FROM usuario_datos ";

$resultado=$base->prepare($sql_total);

$resultado->execute(array());

$num_filas=$resultado->rowCount();

$total_paginas=ceil($num_filas/$tamano_paginas);


//----------------------------------------


  $conexion=$base->query("SELECT * FROM usuario_datos limit $empezar_desde,$tamano_paginas");

  $registros=$conexion->fetchAll(PDO::FETCH_OBJ);

  if(isset($_POST["cr"])){

    $nombre=$_POST["nom"];
    $apellido=$_POST["ape"];
    $direccion=$_POST["dir"];


    $sql="INSERT INTO usuario_datos (nombre, apellido, direccion) VALUES(:nom,:ape,:dir)";

    $resultado=$base->prepare($sql);

    $resultado->execute(array(":nom"=>$nombre, ":ape"=>$apellido, ":dir"=>$direccion));

    header("Location: index.php");
  }
  

  ?>


<h1>CRUD<span class="subtitulo">Create Read Update Delete</span></h1>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

  <table width="50%" border="0" align="center">
    <tr >
      <td class="primera_fila">id</td>
      <td class="primera_fila">nombre</td>
      <td class="primera_fila">apellido</td>
      <td class="primera_fila">direccion</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
    </tr> 
   

<?php

foreach($registros as $persona):?>


		
   	<tr>
      <td><?php echo $persona->id ?></td>
      <td><?php echo $persona->nombre ?></td>
      <td><?php echo $persona->apellido ?></td>
      <td><?php echo $persona->direccion?></td>

      <td class="bot"><a href="Borrar.php?id=<?php echo $persona->id?>"> <input type='button' name='del' id='del' value='Borrar'></a></td>
      <td class='bot'><a href="editar.php?id=<?php echo $persona->id?> & nom=<?php echo $persona->nombre?> & ape=<?php echo $persona->apellido?> &
      dir=<?php echo $persona->direccion?>"><input type='button' name='up' id='up' value='Actualizar'></a></td>
    </tr>       

    <?php
    endforeach;

    ?>

	<tr>
	<td></td>
      <td><input type='text' name='nom' size='10' class='centrado'></td>
      <td><input type='text' name='ape' size='10' class='centrado'></td>
      <td><input type='text' name=' dir' size='10' class='centrado'></td>
      <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td></tr>   
      <tr><td><?php  

//----------------PAGINACION---------------

for($i=1; $i<=$total_paginas; $i++){


echo "<a href='?pagina=" . $i . "'> " . $i . "</a>  ";
}

?></td></tr> 
  </table>
</form>


<p>&nbsp;</p>
</body>
</html>