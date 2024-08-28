<?php
    $this->layout("_theme");
?>    


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/cadastro.css">
    <LInk href="gerente.html"></LInk>
    <script type='text/javascript' src='assets/js/cadastro.js' async></script>
    <script src="https://kit.fontawesome.com/e9ad9d0028.js" crossorigin="anonymous"></script>
    <title>Cadastro</title>
</head>
<body>

        <main>
            <div class="container">
                <div class="form-login">
                    <div class="form-img">
                        <img src="assets/images/thorffin.png" alt="user-image" />
                    </div>
                    <form id="formcasd">
                        <span>Não é cliente? cadastra-se.</span>
                        <input type="name" name="name" id="" placeholder="digite seu nome" />
                        <input type="email" name="email" id="" placeholder="digite sua senha email" />
                        <input type="password" name="password" placeholder="digite sua senha">
                        <input type="submit" value="Entrar" />
                        <span onclick="window.location.href='<?=url("entrar");?>'">Já se cadastrou? volte aqui para logar. <i class="fa-solid fa-right-to-bracket"></i></span>
                    </form>
                    
                </div>
                
            </div>
            </div>
        </main>
</body>
</html>