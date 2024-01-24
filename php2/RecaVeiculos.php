<?php
$db = new mysqli('localhost', 'root', '', 'motorcode');

if ($db->connect_error) {
    die('Connection failed: ' . $db->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_veiculos'])) {
    $id = $_POST['id_veiculos'];

    $sql = "UPDATE cadastro_veiculo SET Marca = ?, Modelo = ?, Categoria = ?, Preco = ?, Descricao = ?, Ano = ?, Cambio = ?, TipoCombustivel = ?, Cor = ?, KmRodado = ? WHERE id_veiculos = ?";
    $stmt = $db->prepare($sql);

    if (!$stmt) {
        die('Error preparing statement: ' . $db->error);
    }

    $stmt->bind_param("ssssssssssi", $_POST['Marca'], $_POST['Modelo'], $_POST['Categoria'], $_POST['Preco'], $_POST['Descricao'], $_POST['Ano'], $_POST['Cambio'], $_POST['TipoCombustivel'], $_POST['Cor'], $_POST['KmRodado'], $id);

    if (!$stmt->execute()) {
        die('Error executing query: ' . $stmt->error);
    }

    // Processamento e salvamento de imagens
    $targetDir = $_SERVER['DOCUMENT_ROOT'] . "/MotorCode/php2/uploads/";

    foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
        $imageTmpName = $_FILES['images']['tmp_name'][$key];
        $imageName = $_FILES['images']['name'][$key];
        $targetFilePath = $targetDir . basename($imageName);

        if (!empty($imageTmpName) && is_uploaded_file($imageTmpName)) {
            if (move_uploaded_file($imageTmpName, $targetFilePath)) {
                // Atualizar o nome da imagem no banco de dados
                $column = "imagem" . ($key + 1);
                $sqlImage = "UPDATE cadastro_veiculo SET $column = ? WHERE id_veiculos = ?";
                $stmtImage = $db->prepare($sqlImage);

                if (!$stmtImage) {
                    die('Error preparing image statement: ' . $db->error);
                }

                $stmtImage->bind_param("si", $imageName, $id);

                if (!$stmtImage->execute()) {
                    die('Error executing image query: ' . $stmtImage->error);
                }
            } else {
                echo "Erro ao fazer upload da imagem.";
            }
        } else {
            echo "Erro no envio da imagem.";
        }
    }

    // Redirecionar para a página de exibição de veículos ou fazer o necessário
    header('Location: /MotorCode/estoqueadmin.php');
    exit();
} else {
    echo "ID de veículo não especificado ou método de requisição inválido.";
}