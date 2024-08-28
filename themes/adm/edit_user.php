<?php
$this->layout("_theme");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= url("themes/adm/assets/css/edit_user.css"); ?>">
    <script type='text/javascript' src='themes/adm/assets/js/scriptg.js' async></script>
    <title>Mangás livre</title>
</head>
<body>
    <div class="container">
        <h1>Usuarios cadastrados</h1>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <h1>Avisos para Usuarios</h1>
        <form>
        <label for="productDescription">Aviso</label>
        <textarea id="productDescription" name="productDescription" rows="5"></textarea>

        <button type="submit">Submeter Aviso</button>
        </form>
    </div>
</body>
</html>