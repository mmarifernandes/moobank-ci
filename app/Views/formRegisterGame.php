<?php if (\Config\Services::validation()->getErrors()){
?>
<div class="alert alert-danger" role="alert">
<?= \Config\Services::validation()->listErrors();?>
</div>
<?php
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  

<h1>Cadastrar Game</h1>
<form action="insertproduct" method="post">
        <div class="form-group">
          <div class="col-md-4 mb-3">
            <label for="nameInputLabel">Nome</label>
            <input type="text" class="form-control" id="nameInputLabel" name="nome">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-4 mb-3">
            <label for="tipo">Tipo</label>
            <input type="text" class="form-control" id="etipo" name = "tipo" value= "Games" readonly>
          </div>
        </div>
          <div class="form-group">
         <label for="categoria">Selecione a categoria: </label>
<select name="categoria" id="categoria">
  <?php
   foreach ($categories as $categoria){
     echo'<option value="'.$categoria['id'].'">'.$categoria['nome'].'</option>';  
    }
?>
</select>
        </div>
        <div class="form-group">
          <div class="col-md-4 mb-3">
            <label for="qnt">Quantidade</label>
            <input type="number" class="form-control" id="qnt" name="qnt">
          </div>
        </div>

          <div class="form-group">
          <div class="col-md-4 mb-3">
            <label for="console">Console</label>
            <input type="text" class="form-control" id="console" name="console">
          </div>
        </div>
         <div class="form-group">
          <div class="col-md-4 mb-3">
            <label for="preco">Preço</label>
            <input type="number" class="form-control" id="preco" name="preco">
          </div>
        </div>
      
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
</body>
</html>