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
class Receta {


	/**
	* Titulo de la receta
	*/
	private $titulo;

	/**
	* Imagen de la receta
	*/
	private $imagen;

	/**
	* Tiempo de preparación (en minutos) de la receta
	*/
	private $tiempo;

	/**
	* Pasos de la receta
	*/
	private $pasos;

	/**
	* Array de ingredientes y su cantidad
	*/
	private $ingredientes;

	/**
	* fecha de creación de la receta
	*/
	private $fecha_creacion;

	/**
	* Autor de la receta
	*/
	private $autor;

	/**
	* Array de errores
	*/
	private $errores = array();
	/** 
	* Operacion CRUD a realizar
	*/
	private $operacion;


	/**
	* CONSTRUCTOR
	*/
	public function __construct($titulo=NULL, $imagen=NULL, $tiempo=NULL) {
		$this->titulo = $titulo;
		$this->imagen = $imagen;
		$this->tiempo = $tiempo;
		$this->pasos = $pasos;
		$this->ingredientes = $ingredientes;
		$this->fecha_creacion = $fecha_creacion;
		$this->autor = $autor;

	}

	/**
	* GETTERS
	*/
	public function getTitulo() {
		return $this->titulo;
	}

	public function getImagen() {
		return $this->imagen;
	}

	public function getTiempo() {
		return $this->tiempo;
	}

	/**
	* GETTERS
	*/
	public function setTitulo($titulo) {
		$this->titulo = $titulo;
	}

	public function setImagen($imagen) {
		$this->imagen = $imagen;
	}

	public function setTiempo($tiempo) {
		$this->tiempo = $tiempo;
	}


	/**
	* 
	* COMPROBADORES DE INSTANCIA
	* 
	*/
	public function validarAtributos($operacion) {

		$this->operacion = $operacion;
		validarTitulo($this->titulo);
		validarImagen($this->imagen);
		validarTiempo($this->tiempo);
		validarPasos($this->pasos);
		validarFechaCreacion($this->fecha_creacion);
		validarIngredientes($this->ingredientes);
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

	public function validarImagen($id_receta){
		$maxsize = 5242880;
		$errors = array();
		if(isset($_FILES['file']['tmp_name']) && isset($_FILES['file']['name'])){

			//Parameters
			$name = $_FILES['file']['name'];
			$target_dir = "./Files/".$this->owner."/";
			$target_file = $target_dir . $_FILES["file"]["name"];

			// Select file type
			$extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	 
			// Valid file extensions
			$extensions_arr = array("jpeg","jpg","bmp","gif","png","eps","tif","tiff");
	 
			// Check extension
			if(in_array($extension,$extensions_arr) ){
	  
			   // Check file size
			  if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
				$errors['File_Size']= "File too large. File must be less than 5MB.";
			  }
			   else{

				if(!is_dir("./Files/".$this->getOwner())) {
					if(!mkdir($target_dir)){
						$errors['Directory_Error'] = "Can't make directory";
					}
				}
				  if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
							
				  }
				  else{
					$errors['Unknown'] = "Error uploading file"; 
				  }
			   }
			}else{
			   $errors['File_Extension'] = "Invalid file extension.";
			}
		}else{
			$errors['File_Empty'] = "Please select a file.";
		}
		if (sizeof($errors)>0){
			throw new ValidationException($errors, "video is not valid");
		}
	}

	public function validarAutor($autor){
		if(empty($autor)){
			$errores["tiempo"]=i18n("ERR_NULL");
		}
		if(!is_string($autor)){
			$errores["tiempo"]=i18n("ERR_FORMATO_TIEMPO");
		}		
	}

	public function validarIngrediente($ingredientes){
		foreach ($ingredientes as $ingrediente){
			validarNombreIngrediente($ingrediente["Nombre"]);
			validarCantidad($ingrediente["Cantidad"]);
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

	public function validarCantidad($cantidad){
		if(empty($cantidad)){
			$errores["cantidad"]=i18n("ERR_NULL");
		}
		if(!is_string($cantidad)){
			$errores["cantidad"]=i18n("ERR_FORMATO_CANTIDAD");
		}		
	}
}
