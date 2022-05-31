<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/pagamento.css')?>">
<script src="https://kit.fontawesome.com/84a7caccb6.js" crossorigin="anonymous"></script>
  <title>Document</title>
</head>
<body>

  <div class="header">
  <nav>
<?php
    echo'<h4 style="padding-top: 3%;">'.$contac['numero'].'</h4>';

?>
        <?php $mysession = session()->get('nome'); ?>
        <?php $mysessionuser = session()->get('username'); ?>

    <h4><?php echo $mysession?></h4>
    <form action="<?php echo base_url('logout');?>" method="post">
    <input type="hidden" id="username" name="username" value="<?php echo $mysessionuser ?>">
    <button style="margin-left: 5%" type="submit">Logout</button>
    </form>
  </nav>
  </div>


<div>
  <a href="<?php echo base_url('pagamentos');?>">
  <i style="margin-left: 5%" class="fa-solid fa-arrow-left"></i>
  </a>
</div>

<div>
<h3><?php echo $tipo === 'debito' ? 'Débito' : null ?></h3>
<h3><?php echo $tipo === 'pix' ? 'Pix' : null ?></h3>
<h3><?php echo $tipo === 'boleto' ? 'Boleto' : null ?></h3>
</div>


<div class="left">
<div class="botao1">
<label for="valor">Valor:</label>
  <input type="number" name="valor" id="valor">
</div>

<div class="botao2">
  </div>
  
</div>

<div class="right">
  <div class="container">
  <p>Descrição:</p>
  <textarea name="descricao" id="descricao" cols="40" rows="7"></textarea>
  </div>
</div>
<br>
<br>
<br>
<div class="confirmar">
  <form action="">
  <button type="submit">Confirmar</button>
  </form>
</div>
</body>
</html>