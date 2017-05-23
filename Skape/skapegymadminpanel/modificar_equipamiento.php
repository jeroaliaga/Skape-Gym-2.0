<?php 
  include('../Mods/configuracion.php');

  if(isset($_GET['id']))   {
    $id =$_GET['id'];
    //echo "hay id";
    
    $sql = "SELECT * FROM productos where idProductos=".$id;
    //echo $sql;
    $resultado = $cnx->query($sql);
    if($resultado->num_rows > 0){
      while($row = $resultado->fetch_assoc()){
        $id = $row['idProductos'];
        $nombre = $row['Nombre'];
        $descripcion = $row['Descripcion'];
        $imagen = $row['Imagen'];
        $precio = $row['Precio'];

        include('formproductos.php'); ?>

      <?php
      }
    } 

  }

?>