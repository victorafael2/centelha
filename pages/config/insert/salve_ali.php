<?php
include '../../../database/databaseconnect.php';

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}


$dataHoraAtual = date("Y-m-d H:i:s");
// echo $dataHoraAtual;


// Obtém os dados do formulário
// $id_vt = $_POST['id_vt'];
$vr_nome = $_POST['vr_nome'];
$vr_valor = $_POST['vr_valor'];
$habilitado = $_POST['habilitado'];
$sys_user = $_POST['sys_user'];
// $sys_data = $_POST['sys_data'];

// Insere os dados na tabela AUX_VT
$sql = "INSERT INTO aux_vr ( vr_nome, vr_valor, habilitado, sys_user, sys_data) VALUES ( '$vr_nome', '$vr_valor', '$habilitado', '$sys_user', '$dataHoraAtual')";
if ($conn->query($sql) === TRUE) {
    $response = array(
        'status' => true,
        'message' => 'As informações foram salvas com sucesso.'
    );
} else {
    $response = array(
        'status' => false,
        'message' => 'Erro ao salvar as informações.'
    );
}

// Fecha a conexão com o banco de dados
$conn->close();

// Retorna a resposta como JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
