<main>
<div class="callbacks_container">
    <div id='wrapper'>
        <ul class="rslides" id="slider">
          <li>
            <img src="Imagenes/galeria/1.jpg" alt="Calistenia en Skape Gym">
            <p class="caption">Entrenamiento urbano</p>
          </li>
          <li>
            <img src="Imagenes/galeria/2.jpg" alt="Espacio para entrenamiento">
            <p class="caption">Espacio para entrenamiento</p>
          </li>
          <li>
            <img src="Imagenes/galeria/3.jpg" alt="One Fit">
            <p class="caption">One Fit</p>
          </li>
        </ul>
    </div>
</div>
<?php 
  if(isset($_SESSION['user'])){
    $usuario = $_SESSION['user'];
  }
  if(isset($_SESSION['user'])){
    echo "<p class='bienvenida'>Bienvenido <span class='us'>$usuario</span></p>";
  }else{
    echo "<p class='bienvenida'>Bienvenido</p>";
  }
?>
  <h2>Skape Gym el primer gimnasio de entrenamiento urbano en Argentina</h2>
  <p>Skape es un espacio de entrenamiento ideado para actividade urbanas. Es el primer gimnasio de Street Workout y Tricking del pais. ¿Que buscamos en Skape Gym? Queremos cambiar la idea que el publico tiene de "entrenamiento", siendo una forma dinamica y divertida de movimiento, y NO una OBLIGACION. Somos el lugar que acerca todas las disciplinas urbanas a todo el pais. Les brindamos a nuestros alumnos posibilidades de crecer como atletas completos, realizamos eventos de cada actividad e invitamos a deportistas de todo pais y paises vecinos para crear relaciones deportivas y mayor conocimento de dichas actividades.</p>

  <h2>Noticias</h2>
  
  <?php 

    $consulta = "SELECT * FROM noticias ORDER BY idNoticia";
    $filas = mysqli_query( $cnx, $consulta );
    $numeroNoticias = mysqli_num_rows($filas); //Cantidad total de noticias.

    //Pongo límite a la cantidad de registros.
    if($numeroNoticias > 0){

      $cantidadXPagina = 4;
      $page = false;

      if(isset($_GET["page"])){
        
        $page = $_GET["page"]; //Número de la página.

      }

      if(!$page){

        $inicio = 0;
        $page = 0;

      }else{

        $inicio = ($page - 1) * $cantidadXPagina;
        //echo 'Inicio de páginas '.$inicio.'<br>';

      }

      $totalPages = ceil($numeroNoticias / $cantidadXPagina);
      //echo 'Total de páginas redondeado decimal hacia arriba '.$totalPages.'<br>';

      $consulta = "SELECT * FROM noticias ORDER BY idNoticia DESC LIMIT ".$inicio.",".$cantidadXPagina;
      $filas = mysqli_query($cnx, $consulta);
     
      while($fila_actual = mysqli_fetch_assoc($filas)){

        $id = $fila_actual["idNoticia"];
        $titulo = $fila_actual["titulo"];
        $texto = $fila_actual["texto"];
        $imagen = $fila_actual["imagen"];

        $tamano = strlen($texto);
       
        if($tamano > 130){

          $texto = substr($texto, 0, 130);
          $texto .= "... <a href='index.php?sec=noticia&numero=$id'>Seguir leyendo</a>";

        }else{

          $texto .= "... <a href='index.php?sec=noticia&numero=$id'>Seguir leyendo</a>";

        }

        if($imagen != ''){
          echo "<div class='noticia' id='$id'><div class='textoNoticia'><h3><a href='index.php?sec=noticia&numero=$id'>$titulo</a></h3><p>$texto</p></div><div class='imgNoticia'><a href='index.php?sec=noticia&numero=$id'><img src='$imagen' alt='$titulo'></a></div></div>";
        }else{
          echo "<div class='noticia' id='$id'><div class='textoNoticia'><h3><a href='index.php?sec=noticia&numero=$id'>$titulo</a></h3><p>$texto</p></div></div>";
        }
      }

      echo "<ol class='paginas'><li class='primeraUltima'>&#8249;</li>";

      if($totalPages > 1){

        for($i = 0; $i <= $totalPages; $i++){
            
          if($page == $i){
            if($i = 1){
              echo "<li class='pageSelect'>$i</li><li>|</li>";
            } 
          }else if($page != $i){
            if($i == 0){
              echo "<li><a href='index.php'>".$i."</a></li><li>|</li>";
            }else if($i != 0 && $i != $totalPages){
              echo "<li><a href='index.php?sec=noticias&page=".$i."'>".$i."</a></li><li>|</li>";
            }else if($i == $totalPages){
              echo "<li><a href='index.php?sec=noticias&page=".$i."'>".$i."</a></li>";
            }
          }
        }
      }

      if($page != $totalPages){
          echo "<li><a href='index.php?sec=noticias&page=".($page + 1)."'>&#8250;</a></li>";
      }

      echo "</ol>";

    }

  ?>

</main>