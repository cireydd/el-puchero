<?php
// file: model/PostMapper.php
require_once(__DIR__."/../core/PDOConnection.php");

require_once(__DIR__."/../model/User.php");
require_once(__DIR__."/../model/Post.php");
require_once(__DIR__."/../model/Comment.php");

/**
* Class PostMapper
*
* Database interface for Post entities
*
* @author lipido <lipido@gmail.com>
*/
class FavoritoMapper {

	/**
	* Reference to the PDO connection
	* @var PDO
	*/
	private $db;

	public function __construct() {
		$this->db = PDOConnection::getInstance();
	}

	/**
	* Retrieves all posts
	
	*
	* Note: Comments are not added to the Post instances
	*
	* @throws PDOException if a database error occurs
	* @return mixed Array of Post instances (without comments)
	*/
	public function findAllByUser($usuario) {
		$stmt = $this->db->query("SELECT id_receta FROM favoritos WHERE usuario=?");
		$stmt->execute(array($favorito->getUsuario(), $favorito->getIdReceta()));
		$favoritos_db = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$favoritos = array();

		foreach ($favoritos_db as $favorito) {
			array_push($favoritos, $favorito);
		}
		
		return $favoritos;
	}


	public function countAllByRecipeId($id_receta){
		$stmt = $this->db->query("SELECT COUNT(usuario) as favs FROM favoritos WHERE id_receta =?");
		$stmt->execute(array($favorito->getIdReceta()));
		$posts_db = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $posts_db['favs'];
	}
	
		/**
		* Like
		*/
		public function save(Favorito $favorito) {
			$stmt = $this->db->prepare("INSERT INTO favoritos(usuario, id_receta) values (?,?)");
			$stmt->execute(array($favorito->getUsuario(), $favorito->getIdReceta()));
		}

		/**
		* Unlike 
		*/
		public function delete(Favorito $favorito) {
			$stmt = $this->db->prepare("DELETE from favoritos WHERE usuario=?,id_receta=?");
			$stmt->execute(array($favorito->getUsuario(),$favorito->getIdReceta()));
		}

	}
