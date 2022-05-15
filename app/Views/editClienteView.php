<?php if (\Config\Services::validation()->getErrors()){
?>
<div class="alert alert-danger" role="alert">
<?= \Config\Services::validation()->listErrors();?>
</div>
<?php
}

// print_r($clientes);
?>

<form action="<?php echo base_url('editcliente/'.$clientes['Email']);?>" method="post">


        <div class="form-group">
          <div class="col-md-4 mb-3">
            <h4>Editar cliente <?php echo $clientes['Nome'] ?></h4>


            <label for="nomeInputLabel">Nome:</label>
            <input type="text" class="form-control" id="nomeInputLabel" name = "nome" value="<?php echo $clientes['Nome']?>">
            <br>
            <label for="emailInputLabel">Email:</label>
            <input type="text" class="form-control" id="emailInputLabel" name = "email" value="<?php echo $clientes['Email']?>">
            <br>
                <label for="cidadeInputLabel">Cidade:</label>
            <input type="text" class="form-control" id="cidadeInputLabel" name = "cidade" value="<?php echo $clientes['Cidade']?>">
            <br>
          </div>
        </div>   
        <input type = "hidden" id="inputHidden" name="customerIDform" value="<?php echo $clientes['Email']?>">
    
      
        <button type="submit" class="btn btn-success" name="submit">Cadastrar</button>
</form>