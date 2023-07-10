<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['candidato_id'])) {
        $candidatoId = $_POST['candidato_id'];
        if (isset($_POST['novaSala'])) {
            $novaSala = $_POST['novaSala'];
            require_once 'conexaocombanco.php';
            $sql = "UPDATE Candidatos SET sala = '$novaSala' WHERE id = $candidatoId";
            if ($conn->query($sql) === true) {
                echo 'Sala do candidato Alterada com sucesso!';
            } else {
                echo 'Erro ao atualizar a sala do candidato: ' . $conn->error;
            }
            $conn->close();
        } else {
            echo 'Nova sala não selecionada.';
        }
    } else {
        echo 'ID do candidato não fornecido.';
    }
} else {
    echo 'Acesso inválido.';
}
?>
