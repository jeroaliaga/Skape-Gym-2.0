<main id='form' class='form2'>
<form action="Mods/mensaje.php" method='post' enctype='multipart/form-data'>
	<h2>Contacto</h2>
	<?php
		if(isset($_GET['error'])){
			echo "<p class='error'>".$_GET['error']."</p>";
		}
		if(isset($_GET['enviado'])){
			echo "<p class='enviado'>Su mensaje se ha sido enviado satisfactoriamente</p>";
		}
	?>
	<div><span>Nombre *</span><input type="text" name="nombre" id="nombre" pattern="^[a-zA-Z]{2,20}(\s|\s[a-zA-Z]{2,20})?$" /></div>
	<div><span>Apellido *</span><input type="text" name="apellido" id="apellido" pattern="^[a-zA-Z]{2,20}(\s|\s[a-zA-Z]{2,20})?$" /></div>
	<div><span>Email *</span><input type="text" name="email" id="email" pattern="^([a-z0-9]{3,}((\_|\-|\.){1,2})?[a-z0-9]*@[a-z0-9_-]{3,}\.{1}[a-z]{2,4}(\.[a-z]{2})?)?$" /></div>
	<div><span>Telefono</span><input type="text" name="telefono" id="telefono" pattern="^((011|11|15)?[0-9]{6,8})?$" /></div>
	<div><span>Localidad</span><input type="text" name="localidad" id="localidad" pattern="^([a-zA-Z]{2,20}(\s|\s[a-zA-Z]{2,20})*)?$" /></div>
	<div><span>Ciudad</span><input type="text" name="ciudad" id="ciudad" pattern="^([a-zA-Z]{2,20}(\s|\s[a-zA-Z]{2,20})*)?$" /></div>
	<div><span>Mensaje</span><textarea name="mensaje" id="mensaje" cols="30" rows="10"></textarea></div>
	<div><input type="submit" value='Enviar'></div>
</form>
<script type='text/javascript' src='Cssyjs/regexp.js'></script>
</main>