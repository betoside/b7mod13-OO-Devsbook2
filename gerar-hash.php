<?php
$senha = filter_input(INPUT_GET, 'senha');
$hash = '';

if(!empty($senha)){
    $hash = password_hash($senha, PASSWORD_DEFAULT);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador Hash</title>
    <style>
        .hash{
            padding: 25px;
            background:wheat;
            margin: 50px auto;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php if(!empty($hash)): ?>
        <div class="hash">
            <?=$hash;?>
        </div>
    <?php endif; ?>
    <form action="">
        Digite uma senha: 
        <br>
        <input type="text" name="senha" placeholder="...aqui">
        <button>Gerar hash</button>
        <br>
    </form>
</body>
</html>