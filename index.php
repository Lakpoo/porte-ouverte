<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="reset.css">
    <link rel="shortcut icon" href="logo_promeo.png" />
    <title>Tentez votre chance</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="logo_promeo.png" >
        </div>
    </header>

    <div class="main">
        <div id="title">
            <h1>Bienvenue à cette journée de Portes Ouvertes !</h1>
            <p>Cliquez sur le bouton pour avoir une chance de remporter un lot.</p>
        </div>
    </div>

<?php 
    $numeroAttribue = isset($_POST["test"]) ? rand(0,200) : null;
    if ($numeroAttribue !== null):
?>

        <div class="num_random">
            <span id="number"></span>
        </div>
    <?php endif; ?>
    <form method="post">
        <div id="main_content">
            <input name="test" hidden />
            <button id="button" type="submit">Appuyez ici</button>
        </div>
    </form>

    <div class='gagnant_perdant' id='gagnant_perdant'>
        <p id='content_gagnant'></p>
    </div>

<?php    
    //Valeurs gagnante à choisir
    $gagnants = array(12, 9, 6);

    $estGagnant = false;
   
    if ($numeroAttribue != null)
    {
    //condition definir le gagnant
        if ($numeroAttribue !== null) {
            foreach ($gagnants as $gagnant) {
                if ($gagnant === $numeroAttribue) {
                    $estGagnant = true;
                    break;
                }
            }
        }
?>

<script>


function getRandomInt(max) {
  return Math.floor(Math.random() * max);
}

    //animation numero qui defile ainsi que la recuperation de la reponse $estGagnant
    var num =  200;
    var numberr = <?php echo $numeroAttribue;?>;
    var length = num.toString().length;
    var span = document.getElementById("number");
    for (var i = 0; i <= num; i++) {
        setTimeout(function(n) {
            return function() {
                var content = getRandomInt(200);
                if(n == num)
                {
                    span.textContent = numberr.toString().padStart(length, '0');

                    <?php 
                    if (!$estGagnant && $numeroAttribue !== null)
                    {
                        ?>
                        document.getElementById("content_gagnant").textContent = "Vous avez perdu !";
                        <?php
                    }
                        if ($estGagnant && $numeroAttribue !== null){
                    ?>
                        document.getElementById("content_gagnant").textContent = "Félicitations vous avez gagné";
                        <?php
                        }
                        ?>  
                }
                else
                    span.textContent = content.toString().padStart(length, '0');
            }
        }(i), i*10);
    }
    </script>
    <?php } ?>
    <script>
        setTimeout(function(){
        var gagnantPerdantDiv = document.getElementById("gagnant_perdant");
        gagnantPerdantDiv.style.display = "none";
        }, 6000); 
    </script>
</body>
</html>