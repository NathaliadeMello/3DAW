<!DOCTYPE html>
<html>
<head>
    <title>Menu</title>
    <style>

        .menu-container {
            width: 300px;
            margin: 0 auto;
            background-color: #1abc9c;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            padding: 20px;
            color: #fff;
            text-align: center;
        }

        .menu-container h1 {
            margin-top: 0;
        }

        .menu-container a {
            display: block;
            margin-bottom: 10px;
            padding: 10px;
            background-color: #16a085;
            color: #fff;
            text-decoration: none;
        }

        .menu-container a:hover {
            background-color: #138d75;
        }
    </style>
</head>
<body>
    

    <div class="menu-container">
	<h1>Menu</h1>
        <ul class="menu">
            <li><a href="listar.php">Listar Candidatos</a></li>
            <li><a href="fiscais.php">Incluir Fiscal</a></li>
        </ul>
    </div>
</body>
</html>
