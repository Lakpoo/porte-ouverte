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
            <h1>Bienvenue à cette journée de portes ouvertes !</h1>
            <p>Cliquez sur le button pour avoir une chance de remporter un lot.</p>
        </div>
    </div>
    <?php
    
    $gagnants = array(89, 51, 37, 125);

    $numeroAttribue = isset($_POST['numero']) ? (int)$_POST['numero'] : null;
    if ($numeroAttribue === null) {
        $numeroAttribue = rand(0, 200);
    }

    $estGagnant = false;
    if ($numeroAttribue !== null) {
        foreach ($gagnants as $gagnant) {
            if ($gagnant === $numeroAttribue) {
                $estGagnant = true;
                break;
            }
        }
    }
    ?>
    <?php if ($numeroAttribue !== null): ?>
        <div class="num_random">
            <span id="number">000</span>
        </div>
    <?php endif; ?>
    <form method="post">
        <div id="main_content">
            <button id="button" type="submit">Appuyez ici</button>
        </div>
    </form>

    <script>
        var num = <?php echo $numeroAttribue; ?>;
        var length = num.toString().length;
        var span = document.getElementById("number");
        for (var i = 0; i <= num; i++) {
            setTimeout(function(n) {
                return function() {
                    var content = n.toString().padStart(length, '0');
                    span.textContent = content;
                    if (n === num && <?php echo $estGagnant ? 'true' : 'false'; ?>) {
                        setTimeout(function() {
                            alert("Félicitations ! Vous avez gagné !");
                        }, 500);
                    }
                }
            }(i), i * 20);
        }
    </script>

    <?php if (!$estGagnant && $numeroAttribue !== null): ?>
        <div class="gagnant_perdant">
            <p>Désolé, vous avez perdu.</p>
        </div>
    <?php endif; ?>
</body>
</html>