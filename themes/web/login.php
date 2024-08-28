<?php
    $this->layout("_theme");
?>    


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">
    <Link href="gerente.html"></Link>
    <script type='text/javascript' src='assets/js/login.js' async></script>
    <script src="https://kit.fontawesome.com/e9ad9d0028.js" crossorigin="anonymous"></script>
    <title>login</title>
</head>
<body>

        <main>
            <div class="container">
                <div class="form-login">
                    <div class="form-img">
                        <img src="assets/images/denji log.jpg" alt="user-image" />
                    </div>
                    <form id="form-login">
                            <span>Já é cliente? Faça o login.</span>
                        <input type="email" name="email" id="" placeholder="digite seu email cadastrado" />
                        <input type="password" name="password" placeholder="digite sua senha cadastrada">
                        <input type="submit" value="Entrar" />
                        <span onclick="window.location.href='<?=url("cadastro");?>'">Novo aqui? Cadastre-se.<i class="fa-solid fa-right-to-bracket"></i></span>
                    </form>
                    
                </div>
                
            </div>
            </div>
        </main>
</body>
</html>