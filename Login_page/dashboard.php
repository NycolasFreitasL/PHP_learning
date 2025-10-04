<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit();
}
?>

<body>
    <div class="container">
        <div class="col">
            <h1>bem vindo</h1>
            <p>você chegou a dashboard</p>

            
            <div class="btn-container">
                <form action="logout.php" method="post">
                    <button class="sair" type="submit" >Sair</button>
                </form>
            </div>

        </div>

    </div>
</body>
</html>