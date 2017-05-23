<main>
  <section id='contNoticias'>
  
  <?php 

    //echo ("<a href='index.php'>&#8592; Inicio</a>");

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
      
      if($page == 0){
        echo "<h2>Página 1 de $totalPages</h2>";
      }else{
        echo "<h2>Página $page de $totalPages</h2>";
      }

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

      echo "<ol class='paginas'>";

      if($page != 1){
        if($page == 2){
          echo "<li><a href='index.php'>&#8249;</a></li>";
        }else{
          echo "<li><a href='index.php?sec=noticias&page=".($page - 1)."'>&#8249;</a></li>";
        }
      }else{
        echo "<li class='primeraUltima'>&#8249;</li>";
      }

      if($totalPages > 1){

        for($i = 0; $i <= $totalPages; $i++){
          if($i != 0){ 
            if($page == $i){
              if($i != 0 && $page != $totalPages){
                echo "<li class='pageSelect'>$i</li><li>|</li>";
              }else{
                echo "<li class='pageSelect'>$i</li>";
              }
            }else if($page != $i){
              if($i == 1){
                echo "<li><a href='index.php'>".$i."</a></li><li>|</li>";
              }else if($i != 0 && $i != $totalPages){
                echo "<li><a href='index.php?sec=noticias&page=".$i."'>".$i."</a></li><li>|</li>";
              }else if($i == $totalPages){
                echo "<li><a href='index.php?sec=noticias&page=".$i."'>".$i."</a></li>";
              }
            }
          }
        }
      }

      if($page != $totalPages){
        echo "<li><a href='index.php?sec=noticias&page=".($page + 1)."'>&#8250;</a></li>";
      }else{
        echo "<li class='primeraUltima'>&#8250;</li>";
      }

      echo "</ol>";

    }

  ?>
  
  </section>
</main>