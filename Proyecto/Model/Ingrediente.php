<?php
// a receta

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
	*/
	private $nom_ingre;

	/**
	* Array de errores
	*/
	private $errores = array(); 




	/**
	* CONSTRUCTOR
	*/
	public function __construct($nom_ingre=NULL) {
		$this->nom_ingre = $nom_ingre;
	}

	/**
	* GETTERS
	*/
	public function getNombre(){
		return $this->nom_ingre;
	}

	/**
	* SETTERS
	*/
	public function setNombre($nom_ingre){
		$this->nom_ingre=$nom_ingre;
	}

	/**
	* 
	* COMPROBADORES DE INSTANCIA
	* 
	*/
	public function validoCrear() {

		validarNombre($this->nom_ingre);

		if (sizeof($errores) > 0){
			throw new ValidationException($errores, "Ingrediente no valido");
		}
	}


	public function validaNombre($nom_ingre){
		if(empty($nom_ingre)){
			$nom_ingre["nombre"]=i18n("ERR_NULL");
		}
		if(!is_string($usuario)){
			$nom_ingre["nombre"]=i18n("ERR_FORMATO_INGREDIENTE");
		}		
	}



}
