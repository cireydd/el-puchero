<?php
// file: model/Comment.php

require_once(__DIR__."/../core/ValidationException.php");

/**
* Class Comment
*
* Represents a Comment in the blog. A Comment is attached
* to a Post and was written by an specific User (author)
*
* @author lipido <lipido@gmail.com>
*/
class FechaReceta {

	/**
	* The id of the comment
	* @var string
	*  autor varchar(255),
    * id_receta int,
    * fecha_creacion date
	*/
	private $fecha_creacion;

	/**
	* The content of the comment
	* @var string
	*/
	private $id_receta;

	/**
	* The author of the comment
	* @var User
	*/
	private $autor;


	/**
	* The constructor
	*
	* @param string $id The id of the comment
	* @param string $content The content of the comment
	* @param User $author The author of the comment
	* @param Post $post The parent post
	*/
	public function __construct($fecha_creacion=NULL, $id_receta=NULL, $autor=NULL) {
		$this->fecha_creacion = $fecha_creacion;
		$this->id_receta = $id_receta;
		$this->autor = $autor;
	}

	/**
	* Gets the id of this comment
	*
	* @return string The id of this comment
	*/
	public function getFechaCreacion(){
		return $this->fecha_creacion;
	}
	/**
	* Gets the content of this comment
	*
	* @return string The content of this comment
	*/
	public function getIdReceta() {
		return $this->id_receta;
	}
	/**
	* Gets the content of this comment
	*
	* @return string The content of this comment
	*/
	public function getAutor() {
		return $this->autor;
	}

	
	
	
	public function setFechaCreacion($fecha_creacion){
		$this->fecha_creacion = $fecha_creacion;
	}
	/**
	* Gets the content of this comment
	*
	* @return string The content of this comment
	*/
	public function setIdReceta($id_receta) {
		$this->id_receta = $id_receta;
	}
	/**
	* Gets the content of this comment
	*
	* @return string The content of this comment
	*/
	public function setAutor($autor) {
		$this->autor = $autor;
	}



	/**
	* Checks if the current instance is valid
	* for being inserted in the database.
	*
	* @throws ValidationException if the instance is
	* not valid
	*
	* @return void
	*/
	public function checkIsValidForCreate() {
		$errors = array();

		if ($this->id_receta == NULL ) {
			$errors["id_receta"] = "id_receta is mandatory";
		}
		if ($this->fecha_receta == NULL ) {
			$errors["fecha_receta"] = "fecha_receta is mandatory";
		}
		if ($this->autor == NULL ) {
			$errors["autor"] = "autor is mandatory";
		}

		if (sizeof($errors) > 0){
			throw new ValidationException($errors, "FechaReceta is not valid");
		}
	}
}
