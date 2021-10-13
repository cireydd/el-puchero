<?php
// file: model/Post.php

require_once(__DIR__."/../core/ValidationException.php");

/**
* Class Post
*
* Represents a Post in the blog. A Post was written by an
* specific User (author) and contains a list of Comments
*
* @author lipido <lipido@gmail.com>
*/
class Favorito {

	/**
	* The id of this post
	* @var string
	*/
	private $usuario;

	/**
	* The title of this post
	* @var string
	*/
	private $id_receta;

	/**
	* The constructor
	*
	* @param string $id The id of the post
	* @param string $title The id of the post
	* @param string $content The content of the post
	* @param User $author The author of the post
	* @param mixed $comments The list of comments
	*/
	public function __construct($usuario=NULL, $id_receta=NULL) {
		$this->usuario = $usuario;
		$this->id_receta = $id_receta;
	}

	/**
	* Gets the id of this post
	*
	* @return string The id of this post
	*/
	public function getUsuario() {
		return $this->usuario;
	}

	/**
	* Gets the title of this post
	*
	* @return string The title of this post
	*/
	public function getIdReceta() {
		return $this->id_receta;
	}

	/**
	* Sets the title of this post
	*
	* @param string $title the title of this post
	* @return void
	*/
	public function setUsuario($usuario) {
		$this->usuario = $usuario;
	}

	/**
	* Gets the content of this post
	*
	* @return string The content of this post
	*/
	public function setIdReceta($id_receta) {
		$this->id_receta = $id_receta;
	}



	/**
	* Checks if the current instance is valid
	* for being updated in the database.
	*
	* @throws ValidationException if the instance is
	* not valid
	*
	* @return void
	*/
	public function checkIsValidForCreate() {
		$errors = array();
		if (!isset($this->usuario)) {
			$errors["usuario"] = "usuario is mandatory";
		}
		if (!isset($this->id_receta)) {
			$errors["id_receta"] = "id_receta is mandatory";
		}
		if (sizeof($errors) > 0){
			throw new ValidationException($errors, "favorito is not valid");
		}
	}

}
