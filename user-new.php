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
               if (!is_admin()) {
                    echo "Área restrita! Não é um administrador";
                    echo  voltar();  
               } else {
                 if(!isset($_POST['usuario'])) {
                    require "user-new-form.php";
                    } else {
                        $usuario = $_POST['usuario'] ?? null;
                        $nome = $_POST['nome'] ?? null;
                        $senha1 = $_POST['senha1'] ?? null;
                        $senha2 = $_POST['senha2'] ?? null;
                        $tipo = $_POST['tipo'] ?? null;

                        if($senha1 === $senha2){
                          if(empty($usuario) || empty($nome) || empty($senha1) || empty($senha2) || empty($tipo)){
                            echo msg_erro('Todos os itens são obrigatórios');
                          } else {
                            $senha = gerarHash($senha1);
                            $q = "INSERT INTO usuarios (usuario, nome, senha, tipo) VALUES ('$usuario','$nome','$senha','$tipo')";
                            if($banco->query($q)){
                              echo msg_sucesso("Utilizador $nome, adicionado com sucesso.");
                            } else {
                              echo msg_erro("Não foi possível, criar o utilizador $usuario!");
                            }
                          }
                            
                        } else {
                            echo msg_erro("As senhas devem coincidir!")."<br>";
                            echo msg_erro("Por favor, repita o procedimento!");
                        }
                    }
               }
               echo voltar();

            ?>
          </div>
        </body>
</html>
