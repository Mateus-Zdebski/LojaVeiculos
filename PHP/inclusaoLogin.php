<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Inclusão Login</title>
</head>

<body>
    <?php
    include 'conexao.php';

    $Nomecompleto = $_POST['Nome_completo'];
    $Email = $_POST['Email'];
    $Senha = $_POST['Senha'];
    $Numero_telefone = $_POST['Numero_telefone'];
    $CPF = $_POST['CPF'];

    if ($Email == "" || $Senha == "") {

        echo "<script>alert('por favor preencha todos os dados')</script>";
        echo "<script>widow.location='login.html'</script>";
    } else {

        mysqli_query($con, "insert into login (Nome_completo, Email, Senha, Numero_telefone, CPF) values ('$Nomecompleto','$Email','$Senha','$Numero_telefone','$CPF')");
        echo "<script>alert('Inclusão realizada com sucesso');</script>";
        echo "<script>window.location='login.php'</script>";
    }
    ?>
</body>

</html>