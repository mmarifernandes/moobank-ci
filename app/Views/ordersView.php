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


<table style="text-align: left; border-collapse: collapse !important;" class="table">
  <tbody>
<?php
    foreach ($customers as $customer){
        echo "<tr><td style='padding: 0; text-align: left'><h3>".$customer['Nome']."</h3></td></tr>";
?>
    
<tr><td style="padding-top: 0">



  <table style=" background-color: rgb(178, 133, 204);" class="table">
    <thead>
      <tr>
        <!-- <th scope="col">#</th> -->
      <th scope="col">Id Produto</th>
      <th scope="col">Produto</th>
      <th scope="col">Tipo</th>
      <th scope="col">Preço</th>
      <th scope="col"></th>
        <th scope="col"></th>
    </tr>
  </thead>
  
  <tbody>
    <?php 
    foreach ($orders as $row){
      if ($row['email'] !== $customer['Email']) continue;
      echo "<tr> <td>".$row['idproduto']."</td>";
      echo "<td>".$row['nome']."</td>";
      echo "<td>".$row['tipo']."</td>";
      echo "<td>R$".$row['preco']."</td>";
      
      
      ?>

<td>


    <a href="<?php echo base_url('edit/'.$row['idproduto']);?>" class="btn btn-info">Edit</a>
    </td>
<td>
    <a href="<?php echo base_url('delete/'.$row['idproduto']);?>" class="btn btn-danger">Delete</a>
    
   </td></tr>
    

    <?php
    }// foreach

    foreach ($total as $row){
      if ($row['email'] !== $customer['Email']) continue;
      echo "<tr> <td></td><td></td><td></td><td></td><td></td><td style='font-weight: bold; font-size: 20px;'>Total: R$".$row['total']."</td>";

      
    }
    ?>

</tr>

  </tbody>
</table> 



  </td></tr>   

        <?php
            }// foreach customers
            ?>    
    </body>
</table>
  </body>
  </html>
