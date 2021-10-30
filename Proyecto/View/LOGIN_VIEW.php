<?php
class LOGIN_VIEW{

function __construct(){
	$this->render();
}

function render(){

	include './VIEW/header.php';
?>
	<img src='./VIEW/icons/register.jpg' height="40" width="40" onclick = "crearform('formenviar','post'); insertacampo(document.formenviar,'action','formregistrar'); insertacampo(document.formenviar,'controlador','REGISTRO');enviaform(document.formenviar);">	

	<BR><br><a class = 'saludoLOGIN'>Bienvenido al formulario de login</a><BR><BR><BR>

	<form name="formulariologin" action="index.php" method="post">

	<label class='login_usuario'>login</label> 
		<input type='text' id='login_usuario' name="login_usuario" maxlength= '15' size = '15'><br>
	<label class='pass_usuario'>constraseña</label>
		<input type='password' id='pass_usuario' name="pass_usuario"><br>


	<img src='./VIEW/icons/anadir.png' height="40" width="40" onclick = "insertacampo(document.formulariologin,'action','login'); 
            insertacampo(document.formulariologin,'controlador','LOGIN'); enviaformcorrecto(document.formulariologin,comprobar_login());">

	</form>


	

	<?php

	include './VIEW/footer.php';
	} //fin de render
} //fin de clase
?>