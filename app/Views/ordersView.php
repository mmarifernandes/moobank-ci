<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
 <h1>Lista de Compras</h1>

<div class="side">
  <h3 style="margin-top: 30px">Gastos</h3>
  <table style=" background-color: rgb(171, 209, 167);" class="table2">
    <thead>
      <tr>
        <th scope="col">Cliente</th>
        <th scope="col">Gasto Total</th>
    </tr>
  </thead>
  
  <tbody>
    <?php
    foreach ($total as $total2){
      echo '<tr>';
      echo "<td>".$total2['cliente']."</td>";
            echo "<td>R$".$total2['total']."</td>";

      echo '</tr>';
    }
?>
</table>
</div>


 <div class="main">
<table style="text-align: left; border-collapse: collapse !important;" class="table">
  <tbody>

<?php
    foreach ($customers as $customer){
        echo "<tr><td style='padding: 0; text-align: left'><h3>".$customer['Nome']."</h3></td></tr>";
?>
    
<tr><td style="padding-top: 0">



  <table style=" background-color: rgb(171, 209, 167);" class="table">
    <thead>
      <tr>
        <th scope="col"></th>
      <!-- <th scope="col">Id Produto</th> -->
      <th scope="col">Produto</th>
      <th scope="col">Tipo</th>
      <th scope="col">Quantidade</th>
      <th scope="col">Preço</th>
      <th scope="col"></th>
        <th scope="col"></th>
    </tr>
  </thead>
  
  <tbody>
    <tr>
    <?php 
            // print_r($total);

    foreach ($orders as $row){
      if ($row['email'] !== $customer['Email']) continue;
      echo "<td><img src=".$row['imagem']."></td>";
      echo "<td>".$row['nome']."</td>";
      echo "<td>".$row['tipo']."</td>";
      echo "<td>".$row['qnt']."</td>";
      echo "<td>R$".$row['preco']."</td>";
      
      
      ?>

<td>


    <a href="<?php echo base_url('edit/'.$row['idorder']);?>" class="btn btn-light">Edit</a>
    </td>
<td>
    <a href="<?php echo base_url('delete/'.$row['idorder']);?>" class="btn btn-danger">Delete</a>
    
   </td></tr>
    

    <?php
    }// foreach

    foreach ($total as $row){
      if ($row['email'] !== $customer['Email']) continue;
      echo "<tr style='background-color: rgb(143, 190, 138);'> <td></td><td></td><td></td><td></td><td></td><td></td><td style='font-weight: bold; font-size: 20px;'>Total: R$".$row['total']."</td>";

      
    }
    ?>

</tr>

  </tbody>
</table> 



  </td></tr>   

        <?php
            }
            ?>   
            </div> 
    </body>
</table>
  </body>
  </html>