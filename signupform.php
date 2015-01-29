<?php
class SignUp {
	public $id;
	public $name;
	public $email;
	public $password;
	public $information; //aici tin id,name,email,password
	public $errors; //aici tin erorile
	public $mysqli;
	
	//constructor
	public function __construct($information=array()) {
			global $db;

			$this->mysqli = $db;
			$this->populate($information);
		}
	
	//validate
	public function validate() {
			if((trim($this->id) && !is_numeric($this->id)))
			{
				$this->errors['id'] = 'Invalid id';
			}
			
			if(!(trim($this->name)))
			{
				$this->errors['name'] = 'Invalid name';
			}
			
			//validare email
			if (!(filter_var($this->email, FILTER_VALIDATE_EMAIL))) {
				$this->errors['email']  = 'Invalid email';
			}
			
			if(!(trim($this->password)))
			{
				$this->errors['password'] = 'Invalid password';
			}
			
			if(empty($this->errors))
			{
				return true;
			} 
			else  
			{
				return false;
			}
			
		}
	
		
	//populate
	public function populate($information=array()) {
			$this->id = isset($information['id']) ? trim($information['id']) : '' ;
			$this->name = isset($information['name']) ? trim($information['name']) : '';
			$this->email = isset($information['email']) ? trim($information['email']) : '';
			$this->password = isset($information['password']) ? trim($information['password']) : '' ;
			$this->errors = array();
		}
		
	//save
	public function save() {
			if($this->validate())
			{
				if($this->id)
				{
					$query = 'UPDATE users SET 
						id = "'.$this->mysqli->real_escape_string($this->id).'", 
						name = "'.$this->mysqli->real_escape_string($this->name).'" , 
						email = "'.$this->mysqli->real_escape_string($this->email).'" , 
						password = "'.$this->mysqli->real_escape_string($this->password).'"';
						
					//echo $query; exit;
					$result = $this->mysqli->query($query);
				
				}
				else
				{
					
					$query = 'INSERT INTO users (id,name,email,password) 
								VALUES ("'.$this->mysqli->real_escape_string($this->id).'", 
										"'.$this->mysqli->real_escape_string($this->name).'", 
										"'.$this->mysqli->real_escape_string($this->email).'", 
										"'.$this->mysqli->real_escape_string($this->password).'"
										)';
//echo $query; exit;
					$result = $this->mysqli->query($query);

					$this->id = $this->mysqli->insert_id;
					
				}
				return TRUE;
			}
			else
			{
				//var_dump($this->errors);exit;
				return FALSE;
			}
	}
	
	//get errors
	public function getErrors() {
			return $this->errors;
	}

}
?>