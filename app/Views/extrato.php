<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo base_url('/assets/css/teste2.css')?>">
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
  <a href="<?php echo base_url('menu');?>">
  <i style="margin-left: 5%" class="fa-solid fa-arrow-left"></i>
  </a>
  </div>
  <br>
  <div class="container">
      
<h3>Extrato Conta Corrente</h3>
<h4 style="color: #757575; font-weight: lighter; margin-bottom: 5px; margin-top: 5px">Aqui estão suas últimas transações</h4>



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
<tr>
    <td></td><td></td><td></td>

  <td>
    SALDO
  </td>
  <td>R$<?php echo $contac['total']?>  </td>
</tr>
  </tbody>
</table> 


</div>

 <div class="container2">
      
<h3>Extrato Conta Poupança</h3>
<h4 style="color: #757575; font-weight: lighter; margin-bottom: 5px; margin-top: 5px">Aqui estão suas últimas transações</h4>



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
    foreach ($extrato2 as $item){
      $date = date_create($item['data']);
      echo '<tr><td>'.date_format($date,"d-m-Y").'</td>';
      echo '<td>'.$item['id'].'</td>';
      echo '<td>'.$item['tipopagamento'].'</td>';
      echo '<td>'.$item['descricao'].'</td>';
      echo '<td>R$'.$item['valor'].'</td></tr>';
      
    }
    ?>
<tr>
  <td></td><td></td><td></td>
  <td>
    SALDO
  </td>
  <td>R$<?php echo $contap['total']?>  </td>
</tr>
  </tbody>
</table> 


</div>



</body>
</html>