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
</head>

<body>
    <?php
        require_once('menu.php');
    ?>
    <br>
    <br>
    <br>
    <h1>Here you can introduce your review</h1>
    <br/>
    <form>
        <br>
        <p class="facultate">Introduceti Facultatea</p>
        <input type="text" maxlength="50">
        <br/>
        <p class="an">Introduceti Anul</p>
        <input type="text" maxlength="50">
        <br/>
        <p class="semestru">Introduceti Semestrul</p>
        <input type="text" maxlength="50">
        <br/>
        <p class="materie">Introduceti Materia</p>
        <input type="text" maxlength="25">
        <br/>
        <p class="profesor">Introduceti Profesorul</p>
        <input type="text" maxlength="25">
        <br/>
        <p class="review">Introduceti review-ul</p>
        <textarea  id="subject" name="subject" placeholder="Scrie ceva.." style="height:200px"></textarea>
        <br/>
        <button class="submit">Submit</button>
    </form>
</body>

</html>