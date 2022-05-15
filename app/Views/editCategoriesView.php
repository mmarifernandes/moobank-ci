<?php if (\Config\Services::validation()->getErrors()){
?>
<div class="alert alert-danger" role="alert">
<?= \Config\Services::validation()->listErrors();?>
</div>
<?php
}

// print_r($categorias);
?>

<form action="<?php echo base_url('editcategoria/'.$categorias['id']);?>" method="post">


        <div class="form-group">
          <div class="col-md-4 mb-3">
            <h4>Editar categoria <?php echo $categorias['nome'] ?></h4>


            <label for="nomeInputLabel">Nome:</label>
            <input type="text" class="form-control" id="nomeInputLabel" name = "nome" value="<?php echo $categorias['nome']?>">

          </div>
        </div>   
        <input type = "hidden" id="inputHidden" name="customerIDform" value="<?php echo $categorias['id']?>">
    
      
        <button type="submit" class="btn btn-success" name="submit">Cadastrar</button>
</form>