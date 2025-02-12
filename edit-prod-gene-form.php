<?php
    $q = "SELECT * FROM produtoras";
    $q2 = "SELECT * FROM generos";
    $busca=$banco->query($q);
    $busca2=$banco->query($q2);
    $novo = 0;
    
    echo "<label for='produtora' id='produroraJ'>Produtora</label>";
    echo "<div><select name='produtora' id='produtoraJ' onchange='atualizarInput()'>";
        while($reg=$busca->fetch_object()){
            echo "<option value='{$reg->produtora}' data-pais='{$reg->pais}'>{$reg->produtora}</option>";
            
    
            $novo++;
        }
        $novo++;
        
    //echo"<option value='$novo'>--Novo--</option>";
    echo"<option value=''>--Novo--</option>";
    echo"</select></div>";
    ?>
<form action='edit-prod-gene.php' method='post'>
    <div><label for='produtora'>Editar Produtora</label></div>
    <div><input type='text' name='produtora' value='' id='inputProdutora'></div>
    <div><label for="pais">Editar País</label></div>
    <div><input type="text" name="pais" value="" id='inputPais'></div>
    <div><input type='submit' value='Salvar'></div>
</form>

<?php
echo voltar();
require "rodape.php"
?>

<script>
    function atualizarInput() {
        var select = document.getElementById('produtoraJ');
        var inputProdutora = document.getElementById('inputProdutora');              
        
        var inputPais = document.getElementById('inputPais');

        var selectedOption = select.options[select.selectedIndex];
        inputProdutora.value = selectedOption.value;
        inputPais.value = selectedOption.getAttribute('data-pais');                
    }

    document.addEventListener("DOMContentLoaded", function() {
        atualizarInput();
    });
</script>