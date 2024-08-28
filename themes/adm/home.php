<?php
$this->layout("_theme");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= url("themes/adm/assets/css/gm.css"); ?>">
    <script type='text/javascript' src='themes/adm/assets/js/scriptg.js' async></script>
    <title>Mangás livre</title>
</head>
<body>
    <div class="container">
        <h1>Cadastro de Administrador</h1>
        <form id="adminForm">
            <label for="name">Nome</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Senha</label>
            <input type="password" id="password" name="password" required>

            <label for="occupation">Ocupação</label>
            <input type="text" id="occupation" name="occupation" required>

            <button type="submit">Cadastrar</button>
        </form>
        <h1>Administradores Ativos</h1>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ocupação</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>