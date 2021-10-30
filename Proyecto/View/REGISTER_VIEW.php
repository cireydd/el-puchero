<?php
class REGISTER_VIEW{

function __construct(){
	$this->render();
}

function render(){

	include './VIEW/header.php';
?>
	
	<a class = 'saludoREGISTRO'>Bienvenido al formulario de registro</a><BR><BR><BR>

	<form name="formularioregistro" action="index.php" method="post">

	<label class='login_usuario'>login </label> 
        <input type='text' id='login_usuario' name="login_usuario" maxlength= '15' size = '15'><br>
	<label class='pass_usuario'>contraseña</label>
		<input type='password' id='pass_usuario' name="pass_usuario"><br>
	<label class='nombre_usuario'>Nombre y apellidos</label>
		<input type='text' name='nombre_usuario' id="nombre_usuario" maxlength= '60' size = '50'><br>
	<label class='email_usuario'>email</label>
        <input type='text' name='email_usuario' id="email_usuario" size="40"><br>
	
    <!--Modificar envio al index php para cumplir restricciones nuestro proyecto -->
	<img src='./VIEW/icons/anadir.png' height="40" width="40" onclick = "insertacampo(document.formularioregistro,'es_activo','SI');
            insertacampo(document.formularioregistro,'es_admin','NO');insertacampo(document.formularioregistro,'action','registrar'); 
            insertacampo(document.formularioregistro,'controlador','REGISTRO');enviaformcorrecto(document.formularioregistro,comprobar_registro());">

	</form>


	

	<?php

	include './VIEW/footer.php';
	} //fin de render
} //fin de clase
?>