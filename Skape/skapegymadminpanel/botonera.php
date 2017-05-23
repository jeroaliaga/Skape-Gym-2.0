<header>
<h1 id="skape"><a href="../index.php">Skape Gym</a></h1>
<nav id="menu">
	<div id='iconos'>
		<a href="#menu" id='abrir'><img src="../Imagenes/menu.png" alt="Menu"></a>
		<a href="#" id='cerrar'><img src="../Imagenes/cerrarmenu.png" alt="Cerrar menu"></a>
	</div>
	<ul id="botones">
		<?php 
			if(isset($_SESSION)){
				if($_SESSION){
					
					foreach ($botonesSession as $boton => $valor) {
						if($botonesSession[$boton] == 'cerrarSesion'){
							echo "<li><a href='../Mods/logout.php'>$boton</a></li>";
						}else{
							echo "<li><a href='../index.php?sec=$valor'>$boton</a></li>";
						}

					}

				}else{

					foreach ($botones as $boton => $valor) {
						echo "<li><a href='../index.php?sec=$valor'>$boton</a></li>";
					}
				
				}

			}
		?>
	</ul>
</nav>
</header>