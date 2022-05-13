<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Document</title>
</head>
<body>
 <h1>Lista de Produtos</h1>

<?php
// print_r($products);
?>

<form action="searchp" method="post">
  <input type="text" name="search" placeholder="Digite um nome..">
      <button type="submit"><i class="fa fa-search"></i></button>
</form>

  <table style="background-color: rgb(178, 133, 204);" class="table">
    <thead>
        <tr>
        <!-- <th scope="col">#</th> -->
        <th scope="col">Id Produto</th>
        <th scope="col">Produto</th>
        <th scope="col">Tipo</th>
        <th scope="col">Quantidade</th>
        <th scope="col">Preço</th>
        <th scope="col">Categoria</th>
        <th scope="col">Console</th>
        <th scope="col"><th>
        <th scope="col"><th>
    

    </tr>
  </thead>
  
  <tbody>
    <?php 
    foreach ($products as $row){
      // print_r($row);
      echo "<tr> <td>".$row['id']."</td>";
      echo "<td>".$row['nome']."</td>";
      echo "<td>".$row['tipo']."</td>";
      echo "<td>".$row['qnt']."</td>";   
      echo "<td>R$".$row['preco']."</td>";    
      // echo "<td>".$row['categoria']."</td>";    
      // echo "<td>".$row['console']."</td>";    

   
?>

<td>


    <a href="<?php echo base_url('editp/'.$row['id']);?>" class="btn btn-info">Edit</a>
    </td>
<td>
    <a href="<?php echo base_url('deletep/'.$row['id']);?>" class="btn btn-danger">Delete</a>
    
   </td></tr>
    

    <?php
    }// foreach
    ?>

</tr>

  </tbody>
</table> 
  </body>
  </html>
