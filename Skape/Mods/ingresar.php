<main id='ingresar'>
	<h2>Ingreso</h2>
	<form action="Mods/login.php" method='post' enctype='multipart/form-data'>
  <?php
    if(isset($_GET['ingresoinvalido'])){
      echo "<p class='error'>Usuario o contraseña inválidos</p>";
    }
    if(isset($_GET['camposvacios'])){
      echo "<p class='error'>Campos vacíos</p>";
    }
  ?>
  <div>

    <input type="text" name='usuario' placeholder='Usuario o email'>

    <input type="password" name='pass' placeholder='Contraseña'>
  </div>
  <a href="#">Olvido su contraseña?</a>
  <a href="index.php?sec=registro">Registrar</a>
  <div>
     <input type="submit" value='Ingresar' name='ingresar' id='enviar'>
   </div>
  </form>
</main>
