<?php
// file: model/Post.php

require_once(__DIR__."/../core/ValidationException.php");

/**
* Class Favorito
* 
* Representa un favorito de un usuario a una receta concreta
* 
*/
class Favorito {

	/**
	* Nombre del usuario
	*/
	private $usuario;

	/**
	* Id de la receta
	*/
	private $id_receta;

	/**
	* Array de errores
	*/
	private $errores = array(); 



	/**
	* CONSTRUCTOR
	*/
	public function __construct($usuario=NULL, $id_receta=NULL) {
		$this->usuario = $usuario;
		$this->id_receta = $id_receta;
	}

	/**
	* GETTERS
	*/
	public function getUsuario() {
		return $this->usuario;
	}

	public function getIdReceta() {
		return $this->id_receta;
	}


	/**
	* SETTERS
	*/
	public function setUsuario($usuario) {
		$this->usuario = $usuario;
	}

	public function setIdReceta($id_receta) {
		$this->id_receta = $id_receta;
	}



	public function validarOperacion() {

		validarUsuario($this->fecha_creacion);
		validarIdReceta($this->id_receta);
		
		if (sizeof($errores) > 0){
			throw new ValidationException($errores, "El favorito no es valido");
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

	public function validarIdReceta($id_receta){
		if(empty($id_receta)){
			$errores["id_receta"]=i18n("ERR_NULL");
		}
		if(!is_integer($id_receta)){
			$errores["id_receta"]=i18n("ERR_FORMATO_ID_RECETA");
		}
	}


}
