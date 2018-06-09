<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="./registerStyle.css">
</head>
<body>
    <img src="public\sigla_fullsize.png" class="sigla" alt="Sigla">
    <div class = "register">
            <form class = "register-form-content">
            <text class="register-text">Register</text>
            <p>Fill in this form to sign up to our website!</p>
            <label for = "email"><b>Email:</b></label>
            <br>
            <input type = "text" placeholder = "Enter Email" name = "email" required>
            <br>
            <label for = "psw"><b>Password:</b></label>
            <br>
            <input type = "password" placeholder = "Enter Password" name = "psw" required>
            <br>
            <label for = "psw-repeat"><b>Repeat Password:</b></label>
            <br>
            <input type = "password" placeholder = "Repeat Password" name = "psw-repeat" required>
            <br>
            <label class="checkmark">
                <input type = "checkbox" name = "terms" class="check-button" required>By creating an account you agree to our <a href = "#">Terms & Privacy</a>
            </label>
            <div>
                <br>
                <button onclick="window.location.href='./login.html'" type = "button" class = "cancel-button">Cancel</button>
                <button type = "submit" class = "signup-button">Register</button>
            </div>
        </form>
    </div>
</body>
</html>