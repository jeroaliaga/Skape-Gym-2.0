<?php 
  include('../Mods/configuracion.php');

  if(isset($_GET['id']))   {
    $id =$_GET['id'];
    //echo "hay id";
    
    $sql = "SELECT * FROM noticias where idNoticias=".$id;
    //echo $sql;
    $resultado = $cnx->query($sql);
    if($resultado->num_rows > 0){
      while($row = $resultado->fetch_assoc()){
        $id = $row['idNoticias'];
        $titulo = $row['Titulo'];
        $texto = $row['Texto'];
        $imagen = $row['Imagen'];
        $video = $row['Video'];
        $fecha = $row['Fecha'];

        include('formnoticia.php'); ?>

      <?php
      }
    } 

  }

?>