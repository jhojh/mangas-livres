<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mangás Livre</title>
    <link rel="stylesheet" href="assets/css/_themes.css">
    <script src="https://kit.fontawesome.com/e9ad9d0028.js" crossorigin="anonymous"></script>
    
</head>
<body>
<header>
       
       <div class="header-logo">
           <img src="assets/images/Logo Mangás Livre.svg" alt="Mangás Logo" onclick="window.location.href='<?=url("/");?>'">
       </div>
           
       <div class="search">
           <div class="search-icon">
               <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i>
           </div>
           <div class="input-search">
               <input type="text" id="search" placeholder="Pesquisar">
           </div>
          
       </div>
  
           <div class="nav-list">
               <ul>
                   <li onclick="window.location.href='<?=url("/");?>'"><i class="fa-solid fa-house" style="color: #ffffff;"></i></li>
                   <li onclick="window.location.href='<?=url("pagar");?>'"><i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i></li>
                   <li onclick="window.location.href='<?=url("entrar");?>'"><i class="fa-regular fa-user" style="color: #ffffff;"></i></li>
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
                        <img src="assets/images/Logo Mangás Livre (1).svg" alt="Logo">
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