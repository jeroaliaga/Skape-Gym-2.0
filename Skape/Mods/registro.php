<main id='registro'>
	<h2>Registro</h2>
	<form action="Mods/register.php" method='post' enctype='multipart/form-data'>
    <?php 
      if(isset($_GET['reg'])){
          if($_GET['reg'] == 'ok'){
            echo "<span id='registroOk'>Registro de usuario completo</span>";
          }
      }
    ?>
  <div>

    <input type="text" name='usuario' placeholder='Usuario'>
    <input type="mail" name='mail' placeholder='Email'>
    <input type="text" name='nombre' placeholder='Nombre'>
    <input type="text" name='apellido' placeholder='Apellido'>
    <input type="password" name='contrasena' placeholder='Contraseña'>
    <input type="password" name='contrasena2' placeholder='Repetir contraseña'>
    
    <div>
      <p>Fecha de nacimiento:</p>
      <input type="date" name='fechaNacimiento'>
    </div>

  </div>
  <div>
     <input type="submit" value='Ingresar' name='ingresar' id='enviar'>
  </div>
  </form>
</main>