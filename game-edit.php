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
          <?php
            require_once "includes/banco.php";
            require_once "includes/funcoes.php";
            require_once "includes/login.php";
            
          ?>
          <div id="corpo">
            <?php
                if(!is_admin()){
                    echo 'Área Restrita! Não é um administrador!';
                    echo '<br>';
                    echo voltar();
                } else{
                    if(!isset($_POST['nome'])){
                        require 'game-edit-form.php';
                        
                    } else{
                        $nome = $_POST['nome'] ?? null;
                        $descricao = $_POST['descricao'] ?? null;
                        $nota = $_POST['nota'] ?? null;
                        $genero= $_POST['genero'] ?? null;
                        $produtora = $_POST['produtora'] ?? null;
                        $cod = $_POST['cod'] ?? null;
                        

                        if (isset($_POST['Guardar'])) {
                            $arquivo = $_FILES['file'];
                            $arquivoNovo = explode('.', $arquivo['name']);
                            
                            if(sizeof($arquivoNovo)==1){
                                echo 'Teste';
                                 $q = "UPDATE jogos SET nome = '$nome', descricao = '$descricao',nota = '$nota', genero = '$genero', produtora ='$produtora' WHERE cod = '$cod'";
                            } else{
                                
                                if ($arquivoNovo[sizeof($arquivoNovo)-1] != 'png') {
                                    die('Apenas arquivos .png são aceitos'); 
                                } else{
                    
                                    $capa = $arquivo['name'];
                                    move_uploaded_file($arquivo['tmp_name'],'./fotos/'.$arquivo['name']);

                                    $q = "UPDATE jogos SET nome = '$nome', descricao = '$descricao',nota = '$nota', capa = '$capa', genero = '$genero', produtora ='$produtora' WHERE cod = '$cod'";
                                }
                            }                           
                            
                            

                            if ($banco->query($q)) {
                                echo msg_sucesso("Jogo $nome alterado!");
                            } else{
                                echo msg_erro("Não foi possível alterar o jogo: $nome");
                            }
                            
                        }
                    }
                     
                }
                echo voltar(); 
            ?>
          </div>
        </body>
</html>
