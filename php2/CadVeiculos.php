<?php
$db = new mysqli('localhost', 'root', '', 'motorcode');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Limpar e recuperar dados do formulário
    $marca = $db->real_escape_string($_POST['Marca']);
    $modelo = $db->real_escape_string($_POST['Modelo']);
    $categoria = $db->real_escape_string($_POST['Categoria']);
    $preco = $db->real_escape_string($_POST['Preco']);
    $descricao = $db->real_escape_string($_POST['Descricao']);
    $ano = $db->real_escape_string($_POST['Ano']);
    $cambio = $db->real_escape_string($_POST['Cambio']);
    $tipoCombustivel = $db->real_escape_string($_POST['TipoCombustivel']);
    $cor = $db->real_escape_string($_POST['Cor']);
    $kmRodado = $db->real_escape_string($_POST['KmRodado']);

    $sql = "INSERT INTO cadastro_veiculo (Marca, Modelo, Categoria, Preco, Descricao, Ano, Cambio, TipoCombustivel, Cor, KmRodado) VALUES ('$marca', '$modelo', '$categoria', '$preco', '$descricao', '$ano', '$cambio', '$tipoCombustivel', '$cor', '$kmRodado')";
    if ($db->query($sql) === TRUE) {
        // Obter o ID do veículo recém-inserido
        $id_veiculo = $db->insert_id;

        // Processar e salvar imagens
        $targetDir = $_SERVER['DOCUMENT_ROOT'] . "/MotorCode/php2/uploads/";

        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            $imageTmpName = $_FILES['images']['tmp_name'][$key];
            $imageName = $_FILES['images']['name'][$key];
            $targetFilePath = $targetDir . basename($imageName);

            $check = getimagesize($imageTmpName);
            if ($check !== false) {
                if (move_uploaded_file($imageTmpName, $targetFilePath)) {
                    // Inserir o nome da imagem na coluna correspondente
                    $column = "imagem" . ($key + 1); // Adicionando 1 ao índice para corresponder à nomenclatura da coluna
                    $sqlImage = "UPDATE cadastro_veiculo SET $column = '$imageName' WHERE id_veiculos = $id_veiculo";
                    if (!$db->query($sqlImage)) {
                        echo "Erro ao inserir imagem no banco de dados.";
                    }
                } else {
                    echo "Erro ao fazer upload da imagem.";
                }
            } else {
                echo "O arquivo não é uma imagem válida.";
            }
        }
    }
}

$db->close();
header('location:../estoqueadmin.php'); 