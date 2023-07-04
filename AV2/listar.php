<!DOCTYPE html>
<html>
<head>
    <title>Listagem de Candidatos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        .candidato {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f5f5f5;
            border-radius: 5px;
        }

        .candidato p {
            margin: 5px 0;
        }

        form {
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <h1>Listagem de Candidatos</h1>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="ordenar_por_sala" value="true">
        <input type="submit" value="Ordenar por Sala">
    </form>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="ordenar_por_nome" value="true">
        <input type="submit" value="Ordenar por Nome">
    </form>

    <?php
    require_once 'conexaocombanco.php';

    function listar() {
        global $conn;
        $ordenarPorSala = isset($_POST['ordenar_por_sala']) && $_POST['ordenar_por_sala'] === 'true';
        $ordenarPorNome = isset($_POST['ordenar_por_nome']) && $_POST['ordenar_por_nome'] === 'true';
        $sql = 'SELECT * FROM Candidatos';

        if ($ordenarPorSala) {
            $sql .= ' ORDER BY sala';
        }

        elseif ($ordenarPorNome) {
            $sql .= ' ORDER BY nome';
        }

        $result = $conn->query($sql);

        if ($result !== false && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="candidato">';
                echo '<p><strong>Nome:</strong> ' . $row['nome'] . '</p>';
                echo '<p><strong>CPF:</strong> ' . $row['cpf'] . '</p>';
                echo '<p><strong>Identidade:</strong> ' . $row['identidade'] . '</p>';
                echo '<p><strong>Email:</strong> ' . $row['email'] . '</p>';
                echo '<p><strong>Cargo Pretendido:</strong> ' . $row['cargo'] . '</p>';
                echo '<p><strong>Sala de Prova:</strong> ' . $row['sala'] . '</p>';
                echo '<form action="mudar_sala.php" method="post">';
                echo '<input type="hidden" name="candidato_id" value="' . $row['id'] . '">';
                echo '<input type="submit" value="Mudar Sala">';
                echo '</form>';
                echo '</div>';
            }
        } else {
            echo 'Nenhum candidato encontrado.';
        }
    }

    listar();
    ?>

</body>
</html>
