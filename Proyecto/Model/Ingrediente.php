<?php
// file: model/Comment.php

require_once(__DIR__."/../core/ValidationException.php");

/**
* Class Ingrediente
*
* Representa un Ingrediente de cocina. 
*
* @author cireydd <cirey@alumnos.uvigo.es>
*/
class Ingrediente {

	/**
	* Nombre del ingrediente
	* @var string
	*/
	private $nombre;

	/**
	* The constructor
	*
	* @param string $nombre Nombre del ingrediente
	*/
	public function __construct($nombre=NULL) {
		$this->nombre = $nombre;
	}

	/**
	* Gets the id of this comment
	*
	* @return string The id of this comment
	*/
	public function getNombre(){
		return $this->nombre;
	}
	
	public function setNombre($nombre){
		$this->nombre=$nombre;
	}


	public function checkIsValidForCreate() {
		$errors = array();

		if (strlen($this->nombre) < 3 ) {
			$errors["nombre"] = "El nombre debe tener al menos 3 caracteres";
		}

	}
}
