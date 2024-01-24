<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$db = new mysqli('localhost', 'root', '', 'motorcode');

// Verificar se o ID foi passado corretamente
$id = filter_input(INPUT_GET, 'id_veiculos', FILTER_VALIDATE_INT);

if ($id === false || $id === null) {
    echo "ID inválido.";
    exit;
}

// Verificar se o veículo existe
$sql_check = "SELECT * FROM cadastro_veiculo WHERE id_veiculos = ?";
$stmt_check = $db->prepare($sql_check);
$stmt_check->bind_param('i', $id);
$stmt_check->execute();
$result_check = $stmt_check->get_result();

if ($result_check->num_rows == 0) {
    echo "Veículo não existe.";
    exit;
}

// Deletar o veículo no banco
$sql_delete = "DELETE FROM cadastro_veiculo WHERE id_veiculos = ?";
$stmt_delete = $db->prepare($sql_delete);
$stmt_delete->bind_param('i', $id);
$result_delete = $stmt_delete->execute();

if ($result_delete === true) {
    
    echo "Veículo excluído com sucesso!";
    header('Location: /MotorCode/estoqueadmin.php'); // Redirecionar para a página desejada
} else {
    echo "Erro ao excluir o veículo: " . $stmt_delete->error;
}

$stmt_check->close();
$stmt_delete->close();
$db->close();
?>
