<?php
class Database extends mysqli{
	public $host;
	public $username;
	public $password;
	public $database;
	
	public function __construct($host, $username, $password) {
		$this->host = $host;
		$this->username = $username;
		$this->password = $password;
	}
	
	public function connectdb(){
		mysql_connect($this->host, $this->username, $this->password) or die("cannot connect to database");
	}
	
	public function selectdb($database){
		mysql_select_db($database) or die("cannot select database");
	}
}

$database = new Database('localhost','root','');
$database->connectdb();
$database->selectdb('newdatabase');
?>