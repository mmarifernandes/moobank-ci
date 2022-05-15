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
  

<h1>Cadastrar Produto</h1>
<form action="insertproduct" method="post">
        <div class="form-group">
          <div class="col-md-4 mb-3">
            <label for="nameInputLabel">Nome</label>
            <input type="text" class="form-control" id="nameInputLabel" name="nome" required>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-4 mb-3">
            <label for="tipo">Tipo</label>
            <input type="text" class="form-control" id="etipo" name = "tipo" required>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-4 mb-3">
            <label for="qnt">Quantidade</label>
            <input type="number" class="form-control" id="qnt" name="qnt" required>
          </div>
        </div>
         <div class="form-group">
          <div class="col-md-4 mb-3">
            <label for="preco">Preço</label>
            <input type="number" class="form-control" id="preco" name="preco" required>
          </div>
        </div>

          <div class="form-group">
          <div class="col-md-4 mb-3">
            <label for="imagem">Url da Imagem</label>
            <input type="url" class="form-control" id="imagem" name="imagem" required>
          </div>
        </div>
      
        <button type="submit" class="btn btn-success" name="submit">Cadastrar</button>
</form>
</body>
</html>