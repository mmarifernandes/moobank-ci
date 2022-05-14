<?php if (\Config\Services::validation()->getErrors()){
?>
<div class="alert alert-danger" role="alert">
<?= \Config\Services::validation()->listErrors();?>
</div>
<?php
}

// print_r($produtos);
?>

<form action="<?php echo base_url('editproduto/'.$produtos['id']);?>" method="post">


        <div class="form-group">
          <div class="col-md-4 mb-3">
            <h4>Editar produto <?php echo $produtos['nome'] ?></h4>


            <label for="nomeInputLabel">Nome:</label>
            <input type="text" class="form-control" id="nomeInputLabel" name = "nome" value="<?php echo $produtos['nome']?>">
            <br>
            <label for="emailInputLabel">Tipo:</label>

            <?php 
            if($produtos['tipo'] === "Games"){
            
              ?>
            
            <br>


              <input type="text" class="form-control" id="emailInputLabel" name = "tipo" value="<?php echo $produtos['tipo']?>" readonly>
<br>
         <label for="categoria">Selecione a categoria: </label>

              <select name="categoria" id="categoria">
  <?php
   foreach ($categorias as $categoria){
     echo'<option value="'.$categoria['id'].'">'.$categoria['nome'].'</option>';  
    }
?>
</select>
<br>
            <?php 

            }else{
?>
              <input type="text" class="form-control" id="emailInputLabel" name = "tipo" value="<?php echo $produtos['tipo']?>">

            <?php 

            }
?>

<br>


            <label for="cidadeInputLabel">Quantidade:</label>
            <input type="text" class="form-control" id="cidadeInputLabel" name = "qnt" value="<?php echo $produtos['qnt']?>">
            <br>
            <label for="cidadeInputLabel">Preço:</label>
            <input type="text" class="form-control" id="cidadeInputLabel" name = "preco" value="<?php echo $produtos['preco']?>">
            <br>
              <label for="cidadeInputLabel">Url da Imagem:</label>
            <input type="url" class="form-control" id="cidadeInputLabel" name = "imagem" value="<?php echo $produtos['imagem']?>">
            <br>


          </div>
        </div>   
        <input type = "hidden" id="inputHidden" name="customerIDform" value="<?php echo $produtos['id']?>">
    
      
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>


   <script>

  document.querySelector('#categoria').value = "<?php echo $produtos['idc']?>";

</script>
