<?php
// file: model/User.php

require_once(__DIR__."/../core/ValidationException.php");

/**
* Class User
*
* Represents a User in the blog
*
* @author lipido <lipido@gmail.com>
*/
class Usuario {

	/**
	* Nombre del usuario
	*/
	private $username;

	/**
	* Contraseña del usuario
	*/
	private $password;

	/**
	* Email del usuario
	*/
	private $email;

	/**
	* Array de errores
	*/
	private $errores = array(); 



	/**
	* CONSTRUCTOR
	*/
	public function __construct($username=NULL, $password=NULL,$email=NULL) {
		$this->username = $username;
		$this->password = $password;
		$this->email = $email;
	}



	/**
	* GETTERS
	*/
	public function getUsername() {
		return $this->username;
	}

	public function getPassword() {
		return $this->password;
	}

	public function getEmail() {
		return $this->email;
	}




	/**
	* SETTERS
	*/
	public function setUsername($username) {
		$this->username = $username;
	}

	public function setPassword($password) {
		$this->password = $password;
	}

	public function setEmail($email) {
		$this->email = $email;
	}


	/**
	* COMPROBADORES DE INSTANCIA
	*/
	public function validoCrear() {

		validarUsuario($this->usuario);
		validarPassword($this->password);
		validarEmail($this->email);
		
		if (sizeof($errores) > 0){
			throw new ValidationException($errores, "La fecha de la receta no es valida");
		}
	}

	public function validarUsuario($usuario){
		if(empty($usuario)){
			$errores["usuario"]=i18n("ERR_NULL");
		}
		if(!is_string($usuario)){
			$errores["usuario"]=i18n("ERR_FORMATO_USUARIO");
		}		
	}

	public function validarPassword($password){
		if(empty($password)){
			$errores["password"]=i18n("ERR_NULL");
		}
		if(!is_string($password)){
			$errores["password"]=i18n("ERR_FORMATO_PASSWORD");
		}	
	}

	public function validarEmail($email){
		if(empty($email)){
			$errores["email"]=i18n("ERR_NULL");
		}
		if(!is_string($autor)){
			$errores["email"]=i18n("ERR_FORMATO_EMAIL");
		}		
	}
}
