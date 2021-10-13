<?php
// file: model/CommentMapper.php

require_once(__DIR__."/../core/PDOConnection.php");

require_once(__DIR__."/../model/Comment.php");

/**
* Class CommentMapper
*
* Database interface for Comment entities
*
* @author lipido <lipido@gmail.com>
*/
class IngredienteMapper {

	/**
	* Reference to the PDO connection
	* @var PDO
	*/
	private $db;

	public function __construct() {
		$this->db = PDOConnection::getInstance();
	}

	/**
	* Checks if a given username is already in the database
	*
	* @param string $username the username to check
	* @return boolean true if the username exists, false otherwise
	*/
	public function nombreExists($nombre) {
		$stmt = $this->db->prepare("SELECT count(nombre) FROM ingredientes where nombre=?");
		$stmt->execute(array($nombre));

		if ($stmt->fetchColumn() > 0) {
			return true;
		}
	}

	/**
	* Guarda un ingrediente
	*
	* @param Comment $comment The comment to save
	* @throws PDOException if a database error occurs
	* @return int The new comment id
	*/	
	public function save($ingrediente) {
		$stmt = $this->db->prepare("INSERT INTO ingredientes values (?)");
		$stmt->execute(array($ingrediente->getNombre()));
	}



}
