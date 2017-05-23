<?php 
  include('../Mods/configuracion.php');

  if(isset($_GET['id']))   {
    $id =$_GET['id'];
    //echo "hay id";
    
    $sql = "SELECT * FROM clases where idClases=".$id;
    //echo $sql;
    $resultado = $cnx->query($sql);
    if($resultado->num_rows > 0){
      while($row = $resultado->fetch_assoc()){
        $id = $row['idClases'];
        $nombre = $row['Nombre'];
        $descripcion = $row['Descripcion'];
        $dia = $row['Dia'];

        include('formclases.php'); ?>

      <?php
      }
    } 

  }

?>