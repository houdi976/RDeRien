
<?php 
	//include_once('/config/database.php');
	
	
 	if(!function_exists('not_empty')){
 		function not_empty($fields){
 		    if(count($fields) != 0){
 		          foreach ($fields as $field){
 			          if(empty($_POST[$field]) || trim($_POST[$field]) == ""){
 				         return false;
 			          }
 		          }

 		        return true;
 		    } 
 		}
 	
    }
    

    if (!function_exists('is_already_in_use') ) {
    	function is_already_in_use($field, $value, $table) {
    		global $db;

    		$q = $db->prepare("SELECT id FROM $table WHERE $field = ?");
    		$q->execute([$value]);
    		$count = $q->rowCount();
    		$q->closeCursor();

    		return $count;
    	}
	}

	/**
	 * Verifie si l'inscription a réussie
	 */
	if (!function_exists('set_flash')) {
	   function set_flash($message,$type='info'){
		    $_SESSION['notification']['message'] = $message;
		    $_SESSION['notification']['type'] = $type;
	   }
	}

	
	/**
	 * Verifie si l'utilisateur est connecté ou pas
	 * Return true si oui
	 * 		  false si non
	 */
	if (!function_exists('isLogged')) {
		function isLogged() {
			if (isset($_SESSION)) {
				// Il s'agit des données qui ont été stockées depuis le login/register
				$requirements = array(
					'pseudo',
				);

				foreach ($requirements as $req) {
					// Si un seul manque il n'y a pas eu de login
					if (!isset($_SESSION[$req]) OR empty($_SESSION[$req])) {
						return false;
					}
				}
				return true;
			}
			// Si la variable $_SESSION n'existe pas
			return false;
		}
	}


    if (!function_exists('redirect')) {
		function redirect($page) {
			 header('location:'.$page);
			 exit();
			
		}
	}
	/**
	 * Encapsule la fonction isLogged
	 * si oui ne fait rien
	 * si non redirige a la page de connexion
	 */
	if (!function_exists('checkLogin')) {
		function checkLogin() {
			if (!isLogged()) {
				// redirection sur la page d'acceuil avec un message
				$login_error = 'Vous devez vous connecter pour accéder à cette page';
				header('Location:index.php?login_error=' . $login_error);
			}
		}
	}

	/**
	 * Verifie s'il y a eu une erreur et l'affiche
	 */
	if (!function_exists('checkError')) {
		function checkError($source) {
			if(isset($_GET[$source])){
				echo'<div class="text-center alert alert-danger alert-rounded">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
					<p>' . $_GET[$source] . '</p>
				</div>';
			}
		}
	}

	/**
	 * Recupere l'id courant depuis les info de session
	 */
	if (!function_exists('getUserId')) {
		function getUserId() {
			if (isset($_SESSION)) {
				global $db;
				$query = $db->prepare('SELECT U.id FROM users U WHERE U.name = :name AND U.password = :pass;');
				$query->bindParam('name', $_SESSION['name']);
				$query->bindParam('pass', $_SESSION['password']);
				$query->execute();
				$id = $query->fetchColumn();
				$query->closeCursor();
				return $id;
			}
		}
	}

	/**
	 * Recupere l'info d'un autre utilisateur
	 */
	if (!function_exists('getUserInfo')) {
		function getUserInfo($email) {
			if (isset($_SESSION)) {
				global $db;
				$query = $db->prepare('SELECT * FROM users U WHERE U.email = :email ');
				$query->bindParam('email', $email);
				$query->execute();
				$userInfo = $query->fetch();
				$query->closeCursor();
				return $userInfo;
			}
		}
	}