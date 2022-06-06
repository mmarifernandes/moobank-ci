<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/poupanca.css')?>">

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


<div>
  <a href="<?php echo base_url('poupanca');?>">
  <i style="margin-left: 5%" class="fa-solid fa-arrow-left"></i>
  </a>
</div>

<div>
<h3>Resgate</h3>
<h4 class="desc">Transferir um valor da poupança para a conta corrente.</h4>

</div>


<form action="insertresgate" method="post">



<?php
    echo'<input type="hidden" value="'.$contac['numero'].'" name="conta">';
        echo'<input type="hidden" value="'.$contap['numero'].'" name="contap">';

?>
  <?php
    if (session()->get('messageROk')){
        ?>
        <div class="alert alert-info" role="alert">
        
                <?php echo "<strong>". session()->getFlashdata('messageOk')."</strong>"; ?>
        </div>
    <?php
    }
    ?>

    <?php
    if (session()->get('messageFail')){
        ?>
        <div class="alert" role="alert">
        
                <?php echo "<strong>". session()->getFlashdata('messageFail')."</strong>"; ?>
        </div>
    <?php
    }
    ?> 
<div class="botao1">
<label for="valor">Valor:</label>
  <input type="number" name="valor" step=".01" id="valor" required>
</div>

<p style="color: #f4f4f4">.</p>
<div class="confirmar">
  <button type="submit">Confirmar</button>
  </form>
</div>
</body>
</html>