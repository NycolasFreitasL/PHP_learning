<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="processa2.php" method="post">
        <p>primeiro numero: <input type="number" name="n1" ></p>
        <p>segundo numero: <input type="number" name="n2" ></p>
        <p>selecione a operação: </p>
        <input type="radio" name="opcao" value ="soma">soma
        <input type="radio" name="opcao" value ="sub">subtração
        <input type="radio" name="opcao" value ="mult">multiplicação
        <input type="radio" name="opcao" value ="div">divisão
        <br>
        <p></p>
        <button type="submit">enviar</button>
    </form>
</body>
</html>