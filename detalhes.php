<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="estilo/estilo.css"/>
        <!--<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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
              require_once("topo.php");
            
              $c = $_GET['cod'] ?? 0;
              //echo $c;
              $busca = $banco->query("select*from jogos where cod='$c'");
            ?>
            <h1>Detalhes do jogo</h1>
            <table class='detalhes'>
              <?php
                if(!$busca){
                  echo "Busca Falhou! ".$banco->error;
                } else {
                  if($busca->num_rows>0){
                    $reg = $busca->fetch_object();
                    $t = thumb($reg->capa);
                    echo"
                        <tr>
                          <td rowspan='3' ><img src='$t' class='full'></td>
                          <td><h2>$reg->nome</h2>Nota: ".number_format($reg->nota,1)."/10";
                        if(is_admin()){
                          echo  "<span class='material-symbols-outlined'>add_circle</span>";
                          echo"<span class='material-symbols-outlined'>edit</span>";
                          echo "<span class='material-symbols-outlined'>delete</span>";
                        } elseif(is_editor()){
                          echo "<span class='material-symbols-outlined'>edit</span>";
                        }
                                        
                    echo "
                        <tr>
                          <td>$reg->descricao</td>                          
                        </tr>
                        <tr>
                          <td>Adm</td>
                        </tr>
                    ";
                    
                    
                    
                  } else {
                    echo "<tr><td>Nenhum registro encontrado</td></tr>";
                    
                  }
                }
              ?> 
              
            </table>
             <!--<a href="index.php"><img src="icones/icoback.png"></a>-->
             <?php echo voltar()?>
              


          </div>
          
        </body>
       <?php include_once "rodape.php"?>
</html>