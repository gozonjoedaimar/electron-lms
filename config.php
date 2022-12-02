<?php
	// Debugging
	// ini_set('display_errors', 1);
	// ini_set('display_startup_errors', 1);
	// error_reporting(E_ALL);

	require_once __DIR__ . '/vendor/autoload.php';

	use Symfony\Component\Dotenv\Dotenv;

	$dotenv = new Dotenv(true);
	$dotenv->load(__DIR__.'/.env');

	define("db_host", "localhost");
	define("db_user", getenv('DB_USER') ?? "root");
	define("db_pass", getenv('DB_PASSWORD') ?? "");
	define("db_name", "db_lms");
	
	
	class db_connect{
		public $host = db_host;
		public $user = db_user;
		public $pass = db_pass;
		public $name = db_name;
		public $conn;
		public $error;
		
		
		public function connect(){
			$this->conn = new mysqli($this->host, $this->user, $this->pass, $this->name);
			
			if(!$this->conn){
				$this->error="Fatal Error: Can't connect to database" . $this->connect->connect_error();
				return false;
			}
		}
		
	}
?>