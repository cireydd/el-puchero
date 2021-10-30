<?php
// file: model/UserMapper.php

require_once(__DIR__."/../core/PDOConnection.php");

/**
* Class UserMapper
*
* Database interface for User entities
*
* @author lipido <lipido@gmail.com>
*/
class UsuarioMapper {

	/**
	* Reference to the PDO connection
	*/
	private $db;

	public function __construct() {
		$this->db = PDOConnection::getInstance();
	}

	/**
	* Saves a User into the database
	*/
	public function save($user) {
		$stmt = $this->db->prepare("INSERT INTO users values (?,?)");
		$stmt->execute(array($user->getUsername(), $user->getPasswd()));
	}

	/**
	* Checks if a given username is already in the database
	*/
	public function usernameExists($username) {
		$stmt = $this->db->prepare("SELECT count(username) FROM users where username=?");
		$stmt->execute(array($username));

		if ($stmt->fetchColumn() > 0) {
			return true;
		}
	}

	/**
	* Checks if a given pair of username/password exists in the database
	*/
	public function isValidUser($username, $passwd) {
		$stmt = $this->db->prepare("SELECT count(username) FROM users where username=? and passwd=?");
		$stmt->execute(array($username, $passwd));

		if ($stmt->fetchColumn() > 0) {
			return true;
		}
	}
}
