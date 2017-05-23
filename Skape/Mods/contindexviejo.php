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

  <!--
  <h2>¿Que es la calistenia?</h2>
  <div id='descr'><img src="Imagenes/secciones/index/index.png" alt="Parada de una sola mano" class='imgindex'>
  <p class='pindex' id='textR'>La calistenia es un sistema de ejercicio físico en el cual el interés está en los movimientos de grupos musculares, más que en la potencia y el esfuerzo. La palabra proviene del griego kallos (belleza) y sthenos (fortaleza). El objetivo es la adquisición de gracia y belleza en el ejercicio. Es la belleza que tiene el cuerpo en movimiento.</p></div>
  <p class='pindex'>La calistenia empieza a desarrollarse en Francia en el siglo XVIII. En 1822, Phokion Heinrich Clias comienza a difundir tanto en Francia como en Inglaterra la calistenia. Una de sus discípulas, Marian Mason, publicó en 1827 On the utility of exercise; or a few observations on the advantages to be derived from its salutary effects, by means of calisthenic exercises A few observation on callisthenic excercises (En cuanto a la utilidad del ejercicio o un par de observaciones sobre las ventajas que se derivan de los efectos saludables de los ejercicios de calistenia). Clias publicó en París en 1828 Callisthenie ou gymnastique des jeunes filles (Calistenia o gimnasia de las mujeres jóvenes). Un año más tarde, el libro se edita en Berna en alemán.</p>
  <p class='pindex2'>  La popularidad de la calistenia como componente de la educación de mujeres se incrementó con la obra de los alemanes Friedrich Jahn y Adolf Spiess. En los EE.UU. la difusora de la disciplina fue Catharine Beecher, quien publicó en 1857 Physiology and Calisthenics for Schools and Families (Fisiología y calistenia para las escuelas y las familias).</p>
  -->

  <h2>Noticias</h2>
  
  <?php 

    $consulta = "SELECT * FROM noticias ORDER BY idNoticias";
    $filas = mysqli_query( $cnx, $consulta );
    $numeroNoticias = mysqli_num_rows($filas);
    //echo 'Numero noticias '.$numeroNoticias.'<br>';

    //Pongo límite a la cantidad de registros.
    if($numeroNoticias > 0){

      $cantidadXPagina = 2;
      //echo 'CantidadXpaginas '.$cantidadXPagina.'<br>';
      $page = false;
      //echo 'Paginas '.$page.'<br>';

      //Verifico número de página.
      if(isset($_GET["page"])){
        $page = $_GET["page"];
        //echo 'Paginas '.$page.'<br>';
      }

      if(!$page){

        $inicio = 0;
        //echo 'Inicio '.$inicio.'<br>';
        $page = 1;
        //echo 'Paginas '.$page.'<br>';

      }else{

        $inicio = ($page - 1) * $cantidadXPagina;
        //echo 'inicio '.$inicio.'<br>';

      }

      $totalPages = ceil($numeroNoticias / $cantidadXPagina);
      //echo 'Total '.$totalPages.'<br>';

    }

    $consulta = "SELECT * FROM noticias ORDER BY idNoticias DESC LIMIT ".$inicio.",".$cantidadXPagina;
    
    $filas = mysqli_query($cnx, $consulta);
   
    while($fila_actual = mysqli_fetch_assoc($filas)){

      $id = $fila_actual["idNoticias"];
      $titulo = $fila_actual["Titulo"];
      $texto = $fila_actual["Texto"];
      $imagen = $fila_actual["Imagen"];

      $tamano = strlen($texto);
     
      if($tamano > 130){

        $texto = substr($texto, 0, 130);
        $texto .= "... <a href='#'>Seguir leyendo</a>";

      }

      echo utf8_encode("<div class='noticia' id='$id'><div class='textoNoticia'><h3><a href='#'>$titulo</a></h3><p>$texto</p></div><div class='imgNoticia'><a href='#'><img src='$imagen' alt='$titulo'></a></div></div>");

    }

  ?>

</main>