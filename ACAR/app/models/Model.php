<?php
	class Model
	{
		public $conn;
		public function __construct(){
			global $conn;
			$conn = new mysqli ("localhost:3306", "root", "", "ACAR");
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}

		}
		
		public function insertUser($username, $password){
		    global $conn;

		    $result=mysqli_query($conn,"INSERT INTO `users` ( `username`, `parola`) VALUES ('".$username."','".$password."')");
		    return $result;
		}

		public function getUser($user){
			global $conn;

		    $stmt = $conn->prepare("SELECT username FROM users where username like '%" . $user . "' ;");

		    if (false === $stmt ) {
		        die('prepare() failed: ' . htmlspecialchars($conn->error));
		    }

		    $stmt->execute();
		    $result = $stmt -> get_result();
		    $rows = mysqli_fetch_all ($result, MYSQLI_ASSOC);
		    if ($rows == false){
		    	return 1;
		    }
		    else {
		    	return 0;
		    }
		}

		public function getParola($password_user){
			global $conn;

		    $stmt = $conn->prepare("SELECT parola FROM users where parola like '%" . $password_user . "' ;");

		    if (false === $stmt ) {
		        die('prepare() failed: ' . htmlspecialchars($conn->error));
		    }

		    $stmt->execute();
		    $result = $stmt -> get_result();
		    $rows = mysqli_fetch_all ($result, MYSQLI_ASSOC);
		    if ($rows == false){
		    	return 1;
		    }
		    else {
		    	return 0;
		    }
		}

		
	}
?>