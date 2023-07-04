<!DOCTYPE html>
<html>
<head>
    <title>Incluir Fiscais de Prova</title>
</head>
<body>
    <h1>Incluir Fiscais de Prova</h1>

    <?php
    require_once 'conexaocombanco.php';

    function fiscais($nome, $cpf, $sala) {
        global $conn;

        $sql = "SELECT COUNT(*) AS total FROM fiscal WHERE sala = $sala";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $totalFiscais = $row['total'];

        if ($totalFiscais >= 2) {
            echo 'Já existem dois fiscais alocados para a sala.';
            return;
        }

        $sql = "INSERT INTO fiscal (nome, cpf, sala) VALUES ('$nome', '$cpf', $sala)";
        if ($conn->query($sql) === TRUE) {
            echo 'Fiscal incluído com sucesso.';
        } else {
            echo 'Erro ao incluir o fiscal: ' . $conn->error;
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $sala = $_POST['sala'];
        fiscais($nome, $cpf, $sala);
    }
    ?>

    <form method="post">
        <label for="nome">Nome do Fiscal:</label>
        <input type="text" name="nome" id="nome" required><br>

        <label for="cpf">CPF do Fiscal:</label>
        <input type="text" name="cpf" id="cpf" required><br>

        <label for="sala">Sala de Prova:</label>
        <input type="number" name="sala" id="sala" required><br>

        <input type="submit" value="Incluir Fiscal">
    </form>

</body>
</html>
