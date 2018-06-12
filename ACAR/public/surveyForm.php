<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="./surveyFormStyle.css">
    <link rel="stylesheet" type="text/css" href="./indexStyle.css">
    <link rel="stylesheet" type="text/css" href="./public/ionicons-2.0.1/css/ionicons.css">
    <title>SurveyForm</title>
    <script src = "script.js" defer></script>
</head>

<body>
    <?php
        require_once('menu.php');
    ?>
    <br>
    
        <h1 style="margin:auto;width:40%">Here you can insert your review</h1>
        <br/>
        <form style="margin:auto">
            <br>
            <p class="facultate">Introduceti Facultatea</p>
            <input type="text" maxlength="50" id = "facultate-id">
            <br/>
            <p class="an">Introduceti Anul</p>
            <input type="text" maxlength="50" id = "an-id">
            <br/>
            <p class="semestru">Introduceti Semestrul</p>
            <input type="text" maxlength="50" id = "semestru-id">
            <br/>
            <p class="materie">Introduceti Materia</p>
            <input type="text" maxlength="25" id = "materie-id">
            <br/>
            <p class="profesor">Introduceti Profesorul</p>
            <input type="text" maxlength="25" id = "prof-id">
            <br/>
            <p class="review">Introduceti review-ul</p>
            <textarea name="subject" style="height:100px" id = "review-id"></textarea>
            <br/>
            <button type="button" class="submit" onclick="adaugaSurvey()" id = "submit-btn-id">Submit</button>
        </form>
</body>

</html>