<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./loginStyle.css">
    <link rel="stylesheet" type="text/css" href="./public/ionicons-2.0.1/css/ionicons.css">
    <title>Log in</title>
    <script src="script.js"></script>
</head>
<body>
    <img src="public\sigla_fullsize.png" class="sigla" alt="Sigla">
    <div class="login-card">
      <text class="log-in-text">Log-in</text>
       <p>Welcome to our community</p>
      
    <form>
      <input type="text" name="user" id="user" placeholder="Username" required>
      <input type="password" name="pass"  id="parola" placeholder="Password" required><br>
      <input type="button" onclick="Logare()" name="login" class="login-submit" value="login"><br>
    </form>
  
    <div class="login-help">
      <a href="#" onclick="window.location.href='./register.php'"><b>Register</b></a><br> 
       <a href="#"><b>Forgot Password</b></a>
    </div>
  </div>
</body>

<footer>


</footer>
</html>