<?php
// file: model/CommentMapper.php

require_once(__DIR__."/../core/PDOConnection.php");

require_once(__DIR__."/../model/FechaReceta.php");

/**
* Class FechaRecetaMapper
*
* Interfaz de BD para entidades FechaReceta
*
*/
class FechaRecetaMapper {

	/**
	* Referencia a la conexion PDO
	*/
	private $db;

	public function __construct() {
		$this->db = PDOConnection::getInstance();
	}

	/**
	* Guarda una FechaReceta
	*/
	public function save(FechaReceta $fechaReceta) {

		$check = $this->db->prepare("SELECT * FROM FECHARECETA WHERE AUTOR=? AND ID_RECETA=?");
		$check->execute(array($fechaReceta->getAutor(), $fechaReceta->getIdReceta()));
		

		$stmt = $this->db->prepare("INSERT INTO comments(content, author, post) values (?,?,?)");
		$stmt->execute(array($fechaReceta->getContent(), $fechaReceta->getAuthor()->getUsername(), $fechaReceta->getPost()->getId()));
		return $this->db->lastInsertId();
	}


	/**
	* Guarda una FechaReceta
	*/
	public function delete(FechaReceta $fechaReceta) {
		$stmt = $this->db->prepare("INSERT INTO comments(content, author, post) values (?,?,?)");
		$stmt->execute(array($fechaReceta->getContent(), $fechaReceta->getAuthor()->getUsername(), $fechaReceta->getPost()->getId()));
		return $this->db->lastInsertId();
	}



	public function validarSave(FechaReceta $fechaReceta){
		$check = $this->db->prepare("SELECT * FROM FECHARECETA WHERE AUTOR=? AND ID_RECETA=?");
		$check->execute(array($fechaReceta->getAutor(), $fechaReceta->getIdReceta()));
	}


	public function validarDelete(FechaReceta $fechaReceta){

	}
}
