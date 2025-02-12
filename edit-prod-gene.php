<!DOCTYPE html>
<html lang="pt-pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="estilo/estilo.css"/>
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
        
        <title>Document</title>
    </head>
        <body>
        <script>atualizarInput();</script>
          <?php
            require_once "includes/banco.php";
            require_once "includes/funcoes.php";
            require_once "includes/login.php";
            
          ?>
          <div id="corpo">
            
            <?php
               

                if(!is_admin()){
                    echo msg_erro("Área restrita! Não é um administrador");
                    echo voltar();
                } elseif (!isset($_POST['nome'])) {
                  require 'edit-prod-gene-form.php';
                  
                } else{

                }
                    
                  
                    

            ?>  
          
          
          </div>
          
        </body>
</html>
