<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/teste.css')?>">
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

  <div class="all">
<div class="left">
<div class="botao1">

  <button class="button1">
  <a href="<?php echo base_url('pagamentos');?>">

  <i class="fa-solid fa-money-bill"></i>
  <br>
  <br>
    Pagamentos
    </a>
  </button>

  <button>
    <i class="fa-solid fa-sack-dollar"></i>
    <br>
    <br>
    Poupança
  </button>


  <button>
  <a href="<?php echo base_url('extrato');?>">
  <i class="fa-solid fa-receipt"></i>
  <br>
  <br>
  Extrato
</a>
</button>
</div>

<div class="transfer">
  <button>
    <i class="fa-solid fa-money-bill-transfer"></i>
    <br>
    Transferência
  </button>
</div>
<div class="co">
<div class="corrente">
  <h4 style="color: #FF428A;">Conta Corrente</h4>
 <?php     
  // print_r($conta2);
  echo'<h2>R$'.$contac['total'].'</h2>';
 
  ?>
</div>
<div class="poupanca">
  <h4 style="color: #FF428A;">Conta Poupança</h4>
   <?php     
  // print_r($conta2);
  echo'<h2>R$'.$contap['total'].'</h2>';
 
  ?>

</div>
</div>

</div>

<div class="right">
<div class="container">
<h3>Olá, <?php echo $mysession?></h3>
<h4 style="color: #757575; font-weight: lighter; margin-bottom: 5px; margin-top: 5px">Aqui estão suas últimas 5 transações</h4>



  <table class="table">
    <thead>
        <tr>
        <th scope="col">DATA MOV.</th>
        <th scope="col">ID</th>
        <th scope="col">TIPO</th>
        <th scope="col">DESC.</th>
        <th scope="col">VALOR</th>
    

    </tr>
  </thead>
  
  <tbody>
   <?php 
    foreach ($extrato as $item){
      $date = date_create($item['data']);
      echo '<tr><td>'.date_format($date,"d-m-Y").'</td>';
      echo '<td>'.$item['id'].'</td>';
      echo '<td>'.$item['tipopagamento'].'</td>';
      echo '<td>'.$item['descricao'].'</td>';
      echo '<td>R$'.$item['valor'].'</td></tr>';
      
    }
    ?>

  </tbody>
</table> 


</div>
</div>
</div>
</body>
</html>