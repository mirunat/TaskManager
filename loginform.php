<?php
session_start();
include('functions.php');
//include('dbconnection.php');
include('database.php');

class User {
	public $email;
	public $password;
	public $id;
	public $name;
	public $errors; 
	public $information;
	public $mysqli;
	
	public function __construct($information=array()) {
		global $db;
		$this->mysqli = $db;
		$this->populate($information);
	}
	
	public function validate() {		
			if (!(filter_var($this->email, FILTER_VALIDATE_EMAIL))) {
				$this->errors['email']  = 'Invalid email';
			}
			
			if(!(trim(md5($this->password)))) {
				$this->errors['password'] = 'Invalid password';
			}
			
			$user = $this->getUserByEmail($this->email,$this->password);
			if (empty($user)) {
				$this->errors['email'] =  'Email not found.';
			} else {
				$this->id = $user['id'];
				$this->name = $user['name'];
			}
			
			if(empty($this->errors))
			{
				return TRUE;
			} else {
				return FALSE;
			}
			
	}
	
	public function getUserByEmail($email,$password) {
		$query = 'SELECT * FROM users WHERE email = "'.$email.'" AND password = "'.$password.'"';
		$result = $this->mysqli->query($query);
		$result = $result->fetch_assoc();
		//var_dump($result); exit; // aici nu gaseste in bd daca pun md5 la insert in sign up form parola, e ceva de la md5 ceva decrypt
		return $result;
	}
	
	public function populate($information=array()) {
		$this->email = isset($information['email']) ? trim($information['email']) : '';
		$this->password = isset($information['password']) ? trim($information['password']) : '';
		$this->errors = array();
	}
	
	public function auth() {
		if($this->validate()) {
			$_SESSION['user']['email'] = $this->email;
			$_SESSION['user']['id'] =  $this->id;
			$_SESSION['user']['name'] = $this->name;
			
			header("Location: dashboard.php");

		}
		else
		{
			echo 'Login failed. Try again.';
			 echo "<script>setTimeout(\"location.href = 'login.php';\",1500);</script>";
			
		}
		return TRUE;
	}
	
	public function getErrors() {
			return $this->errors;
	}

}


$user = new User();

$user->email = $_POST['email'];
$user->password = $_POST['password'];


$user->auth();


?>




