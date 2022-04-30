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
        <!-- <div class="form-group">
          <div class="col-md-4 mb-3">
            <label for="nameInputLabel">Description:</label>
            <input type="text" class="form-control" id="nameInputLabel" name="description">
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-4 mb-3">
            <label for="emailInputLabel">Amount:</label>
            <input type="text" class="form-control" id="emailInputLabel" name = "amount">
          </div>
        </div>   
       -->

<label for="clientes">Selecione o cliente: </label>
<select name="clientes" id="clientes">
  <?php
   foreach ($customers as $cliente){
        if ($cliente['Nome']=='Admin') continue;
     echo'<option value="'.$cliente['Email'].'">'.$cliente['Nome'].'</option>';  
    }
?>
</select>

<label for="produtos">Selecione o produto: </label>
<select name="produtos" id="produtos">
  <?php
   foreach ($products as $produtos){
     echo'<option value="'.$produtos['id'].'">'.$produtos['nome'].'</option>';  
    }
?>
</select>


        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
