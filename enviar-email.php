<?php

// Obtenha os dados do formulário
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];

// Crie a mensagem de e-mail
$mensagem = "
De: $email
Assunto: E-mail do formulário

$mensagem
";

// Envie a mensagem de e-mail
mail("egermarcelo1@email.com", $assunto, $mensagem);

// Redirecione o usuário para outra página
header("Location: excluir.html");

?>
