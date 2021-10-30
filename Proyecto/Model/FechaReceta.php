<?php
// A RECETA

require_once(__DIR__."/../core/ValidationException.php");

/**
* Class FechaReceta
* 
* Representa la fecha de creación de una Receta
* 
*/

class FechaReceta {

	/**
	* Fecha de creación de la receta
	*/
	private $fecha_creacion;

	/**
	* Id de la receta
	*/
	private $id_receta;

	/**
	* Autor de la receta
	*/
	private $autor;

	/**
	* Array de errores
	*/
	private $errores = array(); 

	/**
	* CONSTRUCTOR
	*/
	public function __construct($fecha_creacion=NULL, $id_receta=NULL, $autor=NULL) {
		$this->fecha_creacion = $fecha_creacion;
		$this->id_receta = $id_receta;
		$this->autor = $autor;
	}


	/**
	* GETTERS
	*/

	public function getFechaCreacion(){
		return $this->fecha_creacion;
	}

	public function getIdReceta() {
		return $this->id_receta;
	}

	public function getAutor() {
		return $this->autor;
	}

	/**
	* SETTERS
	*/

	public function setFechaCreacion($fecha_creacion){
		$this->fecha_creacion = $fecha_creacion;
	}
	public function setAutor($autor) {
		$this->autor = $autor;
	}


	/**
	* 
	* COMPROBADORES DE INSTANCIA
	* 
	*/
	public function validoCrear() {

		validarFechaCreacion($this->fecha_creacion);
		validarIdReceta($this->id_receta);
		validarAutor($this->autor);
		
		if (sizeof($errores) > 0){
			throw new ValidationException($errores, "La fecha de la receta no es valida");
		}
	}

	public function validoEliminar() {

		validarIdReceta($this->id_receta);
		validarAutor($this->autor);
		
		if (sizeof($errores) > 0){
			throw new ValidationException($errores, "La fecha de la receta no es valida");
		}
	}

	public function validarFechaCreacion($fecha_creacion){
		if(empty($fecha_creacion)){
			$errores["fecha_creacion"]=i18n("ERR_NULL");
		}
		if(!date_create_from_format('Y-m-d H:i:s',$fecha_creacion)){
			$errores["fecha_creacion"]=i18n("ERR_FORMATO_FECHA");
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

	public function validarAutor($autor){
		if(empty($autor)){
			$errores["autor"]=i18n("ERR_NULL");
		}
		if(!is_string($autor)){
			$errores["autor"]=i18n("ERR_FORMATO_AUTOR");
		}		
	}


}
