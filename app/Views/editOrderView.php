<?php if (\Config\Services::validation()->getErrors()){
?>
<div class="alert alert-danger" role="alert">
<?= \Config\Services::validation()->listErrors();?>
</div>
<?php
}

// print_r($orders)
?>

<form action="<?php echo base_url('editorder/'.$orders['idorder']);?>" method="post">


        <div class="form-group">
          <div class="col-md-4 mb-3">
            <h4><?php echo $orders['nome'] ?></h4>
            <h4><?php echo $orders['tipo'] ?></h4>
            <h4><?php echo 'R$'.$orders['preco']. ' cada' ?></h4>

            <label for="emailInputLabel">Quantidade:</label>
            <input type="number" class="form-control" id="emailInputLabel" name = "qnt"  min="1" value="<?php echo $orders['qnt']?>">
          </div>
        </div>   
        <input type = "hidden" id="inputHidden" name="customerIDform" value="<?php echo $orders['email']?>">
            <input type = "hidden" id="inputHidden" name="idproduto" value="<?php echo $orders['idproduto']?>">

      
        <button type="submit" class="btn btn-success" name="submit">Cadastrar</button>
</form>