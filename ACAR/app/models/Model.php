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

		    $result=mysqli_query($conn,"INSERT INTO `users` ( `username`, `parola`) VALUES ('".$username."','".sha1($password)."')");
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
		    	return 0;
		    }
		    else {
		    	return 1;
		    }
		}

		public function makeToken($user)
		{
			global $conn;
			$time = time();
			$hashString = sha1($user.$time);
			$stmt = $conn->prepare("INSERT INTO tokens (username, token) VALUES('".$user."','".$hashString."')");
			if (false === $stmt ) {
		        die('prepare() failed: ' . htmlspecialchars($conn->error));
			}
			$stmt->execute();
			$result = $stmt -> get_result();
			return $hashString;
		}

		public function isTokenValid($token){
			global $conn;
			$stmt = $conn->prepare("SELECT * FROM tokens WHERE token=".$token);
			if (false === $stmt ) {
		        die('prepare() failed: ' . htmlspecialchars($conn->error));
			}
			$stmt->execute();
			$result = $stmt -> get_result();
			$rows = mysqli_fetch_all ($result, MYSQLI_ASSOC);
		    if ($rows == false){
		    	return 0;
		    }
		    else {
		    	return 1;
		    }
		}

		public function deleteToken($token){
			global $conn;
			$stmt = $conn->prepare("delete FROM tokens WHERE token='".$token."'");
			if (false === $stmt ) {
		        die('prepare() failed: ' . htmlspecialchars($conn->error));
			}
			$stmt->execute();
			$result = $stmt -> get_result();
			$rows = mysqli_fetch_all ($result, MYSQLI_ASSOC);
		    if ($rows == false){
		    	return 0;
		    }
		    else {
		    	return 1;
		    }
		}

		public function getParola($parola){
			global $conn;

		    $stmt = $conn->prepare("SELECT parola FROM users where parola like '%".sha1($parola)."' ;");

		    if (false === $stmt ) {
		        die('prepare() failed: ' . htmlspecialchars($conn->error));
		    }

		    $stmt->execute();
		    $result = $stmt -> get_result();
		    $rows = mysqli_fetch_all ($result, MYSQLI_ASSOC);
		    if ($rows == false){
		    	return 0;
		    }
		    else {
		    	return 1;
		    }
		}

		public function insertSurvey($facultate, $an, $semestru, $materie, $prof, $review, $token){
			global $conn;
			if($this->isTokenValid($token)){
				$result=mysqli_query($conn, "INSERT INTO surveys VALUES ('".$facultate."', '".$an."', '".$semestru."', '".$materie."', '".$prof."', '".$review."',NULL)");
			}
			return "You need to log in";
		}

		public function getFilteredSurveys($facultate, $materie, $profesor){
			global $conn;
			$stmt = $conn->prepare("SELECT * FROM surveys where facultate like '%" . $facultate ."%' and materie like '%" . $materie . "%' and profesor like '%" .$profesor."%' order by id desc;");
			
			if (false === $stmt ) {
		        die('prepare() failed: ' . htmlspecialchars($conn->error));
		    }
		    $stmt->execute();
		    $result = $stmt -> get_result();
		    $rows = mysqli_fetch_all ($result, MYSQLI_ASSOC);
		    mysqli_free_result($result);
		    return $rows;
		}
	}
?>