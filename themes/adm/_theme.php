<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mangás Livre</title>
    <link rel="stylesheet" href="<?= url("themes/adm/assets/css/_themes.css"); ?>">
    <script src="https://kit.fontawesome.com/e9ad9d0028.js" crossorigin="anonymous"></script>
    
</head>
<body>
<header>
       
       <div class="header-logo">
           <img src="<?= url("themes/app/assets/images/Logo gerencia.svg"); ?>" alt="Mangás Logo" onclick="window.location.href='<?=url("/");?>'">
       </div>
  
           <div class="nav-list">
               <ul>
                   <li onclick="window.location.href='<?=url("/admin/");?>'"><i class="fa-solid fa-house" style="color: #ffffff;"></i></li>
                   <li onclick="window.location.href='<?=url("/admin/editar-usuario");?>'"><i class="fa-solid fa-user-pen" style="color: #ffffff;"></i></li>
                   <li onclick="window.location.href='<?=url("/admin/editar-produto");?>'"><i class="fa-solid fa-book" style="color: #ffffff;"></i></li>
                   <li onclick="window.location.href='<?=url("/admin/perfil");?>'"><i class="fa-regular fa-user" style="color: #ffffff;"></i></li>
                   
               </ul>

           </div>

   </header>   
<main>
     
   <?php
   echo $this->section('content');
    ?>
    
</main> 
    
   <footer class="footer">
            <div class="footer-container">
                <div class="footer-content">
                    <div class="footer-logo">
                        <img src="<?= url("themes/adm/assets/images/Logo Mangás Livre (1).svg"); ?>" alt="Logo">
                    </div>
                    <div class="">
                      <p>Explore mundos infinitos, página por página. Bem-vindo ao universo dos mangás!</p>
                      </div>
        
                </div>
                <div class="footer-bottom">
                    <p>&copy; 2024 Mangás livre. Todos os direitos reservados.</p>
                </div>
            </div>
    </footer>
</body>
</html>