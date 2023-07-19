<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina principal</title>
   

<style>


td{
    border:1px dotted #ff0000;
}

    </style>

</head>
<body>


<?php

require("MODELO/Paginacion.php");

?>



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

foreach($matrizUsuarios as $persona):?>


		
   	<tr>
      <td><?php echo $persona ["id"] ?></td>
      <td><?php echo $persona ["nombre"] ?></td>
      <td><?php echo $persona ["apellido"] ?></td>
      <td><?php echo $persona ["direccion"]?></td>

      <td class="bot"><a href="Borrar.php?id=<?php echo $persona ["id"]?>"> <input type='button' name='del' id='del' value='Borrar'></a></td>
      <td class='bot'><a href="editar.php?id=<?php echo $persona ["id"]?> & nom=<?php echo $persona ["nombre"]?> & ape=<?php echo $persona ["apellido"]?> &
      dir=<?php echo $persona ["direccion"]?>"><input type='button' name='up' id='up' value='Actualizar'></a></td>
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
    </table>
</body>
</html>