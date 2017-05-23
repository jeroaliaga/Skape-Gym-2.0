<main>
  <section id='noticia'>
  
  <?php 

    //echo ("<a href='index.php'>&#8592; Inicio</a>");
    if(isset($_GET['numero'])){
      $numero = $_GET['numero'];
    }

    $consulta = "SELECT * FROM noticias WHERE idNoticias = $numero";
    $filas = mysqli_query($cnx, $consulta);
    $fila_actual = mysqli_fetch_assoc($filas);

    $id = $fila_actual['idNoticias'];
    $titulo = $fila_actual['Titulo'];
    $texto = $fila_actual['Texto'];
    $imagen = $fila_actual['Imagen'];
    $video = $fila_actual['Video'];
    
    $fecha = $fila_actual['Fecha'];
    $dia = strtotime($fecha);
    $dia = date('d', $dia);
    $mes = strtotime($fecha);
    $mes = date('F', $mes);

    switch($mes){
      case 'January':
        $mes = 'Enero';
        break;
      case 'February':
        $mes = 'Febrero';
        break;
      case 'March':
        $mes = 'Marzo';
        break;
      case 'April':
        $mes = 'Abril';
        break;
      case 'May':
        $mes = 'Mayo';
        break;
      case 'June':
        $mes = 'Junio';
        break;
      case 'July':
        $mes = 'Julio';
        break;
      case 'August':
        $mes = 'Agosto';
        break;
      case 'September':
        $mes = 'Septiembre';
        break;
      case 'October':
        $mes = 'Octubre';
        break;
      case 'November':
        $mes = 'Noviembre';
        break;
      case 'December':
        $mes = 'Diciembre';
        break;
    }

    $anio = strtotime($fecha);
    $anio = date('Y', $anio);

    if($imagen != ''){
      echo "<div class='noticiaImagen' style='background: url($imagen) no-repeat 50% 20%; background-size: cover;'>$titulo</div><h2>$titulo <span>$dia de $mes de $anio</span></h2><p>$texto</p>";
    }else if($imagen == ''){
      echo "<h2>$titulo <span>$dia de $mes de $anio</span></h2><p>$texto</p>";
    }


    if($video != ''){
      echo "<div class='iframeCont'><iframe src='$video' id='videoNotice' frameborder='0' allowfullscreen></iframe></div>";
    }

  ?>
  
  </section>
</main>