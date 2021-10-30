<?php
//file: /Controller/UsersController.php

require_once(__DIR__."/../core/ViewManager.php");
require_once(__DIR__."/../core/I18n.php");

require_once(__DIR__."/../model/User.php");
require_once(__DIR__."/../model/UserMapper.php");

require_once(__DIR__."/../controller/BaseController.php");


class UsersController extends BaseController {

	/**
	* Referencia a UsersMapper para interactuar con BD
	*/
	private $userMapper;


    /**
    * CONSTRUCTOR
    */
	public function __construct() {
		parent::__construct();

		$this->userMapper = new UserMapper();

        // Los Usuarios operan en un "Home" layout
        // diferente del "default"

		$this->view->setLayout("default");
	}


	public function index() {

		if(isset($_SESSION["currentuser"])){
			$this->view->render("Users", "main");
		}else{
			$this->view->render("Users", "index");
		}

	}



	/**
	* Acción de login
	*
    * Logea a un User comprobando credenciales en BD
	*
	* Llamamos por GET, muestra el formulario
	* Llamamos por POST, intentamos logearnos
	*
    * Parámetros esperados
    * <ul>
    *   <li> username: Nombre de usuario (por POST)</li>
    *   <li> password: Contraseña del usuario (por POST)</li>
    * </ul>
	*
    * Vistas:
    * <ul>
    *   <li>home/login: Si entramos por GET</li>
    *   <li>home/index: Si el logeo es exitoso</li>
    *   <li>users/login: Si la validación falla. Incluye:</li>
    *   <ul>
    *     <li>errors: Array incluyendo errores</li>
    *   </ul>
    * </ul>
	*
	* @return void
	*/
	public function login() {

		if (isset($_POST["username"])){ // Entramos por POST
			

            // Procesamos el formulario de login
			if ($this->userMapper->isValidUser($_POST["username"], $_POST["password"])) {

				$_SESSION["currentuser"]=$_POST["username"];

				// Devolver al usuario al menú principal
				$this->view->redirect("users", "index");

			}else{
				$errors = array();
				$errors["general"] = "Usuario no válido";
				$this->view->setVariable("errors", $errors);
			}
		}

		// render the view (/view/users/login.php)
		$this->view->render("users", "login");
	}



	/**
	* Acción para registrarse
	*
	* Llamamos por GET, muestra el formulario
	* Llamamos por POST, intentamos registrar la entrada
	*
	* The expected HTTP parameters are:
    * Parámetros esperados
    * <ul>
	*   <li> email: correo de usuario (por POST)</li>
    *   <li> username: Nombre de usuario (por POST)</li>
    *   <li> password: Contraseña del usuario (por POST)</li>
    * </ul>
	*
    * Vistas:
    * <ul>
    *   <li>users/register: Si entramos por GET</li>
    *   <li>users/login: Si el registro es exitoso</li>
    *   <li>users/register: Si el registro falla. Incluye:</li>
    *   <ul>
	*	  <li>user: instancia actual de Usuario, vacía o intento de add falla
    *     <li>errors: Array incluyendo errores</li>1
    *   </ul>
    * </ul>
	*
	* @return void
	*/
	public function register() {

		$user = new User();

		if (isset($_POST["username"])){ // Entramos por POST

			//añadimos los datos al objeto User
			$user->setEmail($_POST["email"]);
			$user->setUsername($_POST["username"]);
			$user->setPassword($_POST["password"]);

			try{
				$user->checkIsValidForRegister(); // Si falla ValidationException

				// Comprobar si la entrada existe
				if (!$this->userMapper->usernameExists($_POST["username"])){

					// Guardar el Usuario en la BD
					$this->userMapper->save($user);

					// POST-REDIRECT-GET
					// Mensaje pre-redirección
					$this->view->setFlash("Username ".$user->getUsername()." successfully added. Please login now");

					// Redirección
					$this->view->redirect("users", "login");
					
				} else {
					$errors = array();
					$errors["username"] = "Username already exists";
					$this->view->setVariable("errors", $errors);
				}
			}catch(ValidationException $ex) {
				// Obtengo el array de errores
				$errors = $ex->getErrors();
				// Los pasamos como parámetro
				$this->view->setVariable("errors", $errors);
			}
		}

		// Put the User object visible to the view
		$this->view->setVariable("user", $user);

		// render the view (/view/users/register.php)
		$this->view->render("users", "register");

	}




	public function show_profile(User $user){
	  

	}



	/**
	* Acción para cerrar sesión
	*
	* Esta acción se llama por GET
	*
	* Vistas:
	* <ul>
	*   <li>home/index (redirect)</li>
	* </ul>
	*
	* @return void
	*/
	public function logout() {
		session_destroy();

		// perform a redirection. More or less:
		// header("Location: index.php?controller=users&action=login")
		// die();
		$this->view->redirect("users", "login");

	}

}