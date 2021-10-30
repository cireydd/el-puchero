<?php
// A RECETA

require_once(__DIR__."/../core/ValidationException.php");

/**
* Class Post
*
* Represents a Post in the blog. A Post was written by an
* specific User (author) and contains a list of Comments
*
* @author lipido <lipido@gmail.com>
*/
class Cantidades {

	/**
	* Fecha de creación de la receta
	*/
	private $nom_ingre;

	/**
	* Fecha de creación de la receta
	*/
	private $cantidad;

	/**
	* Array de errores
	*/
	private $errores = array();



	/**
	* CONSTRUCTOR
	*/
	public function __construct($nom_ingre=NULL, $cantidad=NULL) {
		$this->nom_ingre = $nom_ingre;
		$this->id_receta = $id_receta;
		$this->cantidad = $cantidad;

	}


	/**
	* GETTERS
	*/
	public function getNomIngre() {
		return $this->nom_ingre;
	}

	public function getCantidad() {
		return $this->cantidad;
	}


	/**
	* SETTERS
	*/
	public function setNomIngre($nom_ingre) {
		$this->nom_ingre = $nom_ingre;
	}
	public function setIdReceta($id_receta) {
		$this->id_receta = $id_receta;
	}
	public function setCantidad($cantidad) {
		$this->cantidad = $cantidad;
	}


	/**
	* 
	* COMPROBADORES DE INSTANCIA
	* 
	*/
	public function validoCrear() {

		validarNombreIngrediente($this->nom_ingre);
		validarIdReceta($this->id_receta);
		validarCantidad($this->cantidad);
		
		if (sizeof($errores) > 0){
			throw new ValidationException($errores, "Cantidad de ingrediente no valida");
		}
	}

	public function validoEditar() {

		validarNombreIngrediente($this->nom_ingre);
		validarIdReceta($this->id_receta);
		validarCantidad($this->cantidad);
		
		if (sizeof($errores) > 0){
			throw new ValidationException($errores, "Cantidad de ingrediente no valida");
		}
	}

	public function validoEliminar() {

		validarIdReceta($this->id_receta);
		
		if (sizeof($errores) > 0){
			throw new ValidationException($errores, "Cantidad de ingrediente no valida");
		}
	}

	public function validarNombreIngrediente($nom_ingre){
		if(empty($nom_ingre)){
			$errores["nom_ingre"]=i18n("ERR_NULL");
		}
		if(!is_string($nom_ingre)){
			$errores["nom_ingre"]=i18n("ERR_FORMATO_INGREDIENTE");
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

	public function validarCantidad($cantidad){
		if(empty($cantidad)){
			$errores["cantidad"]=i18n("ERR_NULL");
		}
		if(!is_string($cantidad)){
			$errores["cantidad"]=i18n("ERR_FORMATO_CANTIDAD");
		}		
	}
}
