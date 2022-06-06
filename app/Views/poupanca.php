<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo base_url('/assets/css/teste3.css')?>">
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
    <button class ="logout" style="margin-left: 5%" type="submit">Sair</button>
    </form>
  </nav>
  </div>


  <a href="<?php echo base_url('menu');?>">
  <i style="margin-left: 5%" class="fa-solid fa-arrow-left"></i>
  </a>
  <h3>Poupança</h3>

  <div class="botao1">

<button class="button1">
<a href="<?php echo base_url('aplicacao');?>">

<i class="fa-solid fa-piggy-bank"></i>
<br>
<br>
  Aplicação
  </a>
</button>

<button>
<a href="<?php echo base_url('resgate');?>">
<i class="fa-solid fa-circle-dollar-to-slot"></i>
  <br>
  <br>
  Resgate
  </a>
</button>

</div>


</body>
</html>