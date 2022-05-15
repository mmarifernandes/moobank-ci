<?php if (\Config\Services::validation()->getErrors()){
?>
<div class="alert alert-danger" role="alert">
<?= \Config\Services::validation()->listErrors();?>
</div>
<?php
// print_r($data);
}
?>


<h1>Cadastrar Compra</h1>

<form action="insertordertodb" method="post">


<label for="clientes">Selecione o cliente: </label>
<select name="clientes" id="clientes">
  <?php
   foreach ($customers as $cliente){
        if ($cliente['Nome']=='Admin') continue;
     echo'<option value="'.$cliente['Email'].'">'.$cliente['Nome'].'</option>';  
    }
?>
</select>
<br>
<label for="produtos">Selecione o produto: </label>
<select name="produtos" id="produtos">
  <?php
   foreach ($products as $produtos){
           if ($produtos['qnt'] == 0) continue;

     echo'<option value="'.$produtos['id'].'">'.$produtos['nome'].'</option>';  
    }
?>
</select>
<br>

  <div class="form-group">
          <div class="col-md-4 mb-3">
            <label for="quantidade">Quantidade</label>
            <input type="number" class="form-control" id="quantidade" min="1" name="qnt" required>
          </div>
        </div>

        <button type="submit" class="btn btn-success" name="submit">Cadastrar</button>
</form>
