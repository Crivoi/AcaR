<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MySurveys</title>
    <link rel="stylesheet" type="text/css" href="./cardsStyles.css">
    <link rel="stylesheet" type="text/css" href="./public/ionicons-2.0.1/css/ionicons.css">
    <link rel="stylesheet" type="text/css" href="./indexStyle.css">
    <link rel="stylesheet" type="text/css" href="./public/ionicons-2.0.1/css/ionicons.css">
</head>

<body>
    <div class="page">
        <?php
            require_once('menu.php');
        ?>
        <div class="container">
            <div class = "card">
                <h3 class = "card-name">Card1</h3>
                <hr>
                <h4 class = "card-survey-name">Survey Name1</h4>
                <hr>
                <p class = "card-description">Description</p>
                <hr>
                <a href="#modal-one" class = "card-link">Open Survey</a>
            </div>
            <div class = "card">
                <h3 class = "card-name">Card2</h3>
                <hr>
                <h4 class = "card-survey-name">Survey Name2</h4>
                <hr>
                <p class = "card-description">Description</p>
                <hr>
                <a href="#modal-one" class = "card-link">Openn Survey</a>
            </div>
        </div>
    </div>

    <div class="modal" id="modal-one" aria-hidden="true">
        <div class="modal-dialog">
        <a href="#" class="normal-button-close" aria-hidden="true">×</a>
        <div class="card">
            <div class="card-container">
                <div class="nume">⬛George Buhnici⬛</div>
                <hr>
                <div class="facultate">Facultatea de Informatica Iasi</div>
                <div class="an">Anul 1</div>
                <div class="materie">Programare avansata</div>
                <p>◾In acest Survey am incercat sa fac un tutorial despre cum poti face sa treci la materia Programare avansata in restanta.
                </p>
                <hr>
                <p>◾In primul rand cred ca este nevie de multa rabdare pentru a intelege....
                <br> Mai jos am atasat cateva imagini cu pozele din caietul meu de Programare avansata pentru a avea de unde invata teoria
                pentru examen.
                </p>
                <div class="imagini">
                <img src="imagini/Img1.jpg" alt="Img1" width="128" height="128">
                <img src="imagini/Img2.jpg" alt="Img2" width="128" height="128">
                <img src="imagini/Img3.jpg" alt="Img3" width="128" height="128">
                </div>
            </div>
            </div>
            <a href="#" class="normal-button"><i class="ion-ios-star-half"></i> Rate This!</a>
            </div>
        </div>
    </div>

    
    <!-- <div id="sidebar-left">
        <a href="#Survey1">Survey1</a>
        <a href="#Survey2">Survey2</a>
        <a href="#Survey3">Survey3</a>
        <a href="./surveyForm.html" class="add-button">Add Survey</a>
    </div> -->
    <!-- <div id="main">
    </div> -->
</body>

</html>