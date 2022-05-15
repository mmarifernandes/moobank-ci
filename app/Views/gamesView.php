<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<script src="https://kit.fontawesome.com/84a7caccb6.js" crossorigin="anonymous"></script>
  <title>Document</title>
</head>
<body>
 <h1>Lista de Games</h1>

<div class="side">
<form action="<?php echo base_url('searchg')?>" method="post">
  <input style="margin-bottom: 20px" type="text" name="search" placeholder="Digite um nome..">
      <button style="padding-left: 5px; padding-right: 5px" type="submit"><i class="fa fa-search"></i></button>
</form>

<ol>

<?php
    foreach ($categorias as $categoria){
      echo '<li><a href="'.base_url('category/'.$categoria['id']).'">'.$categoria['nome'].'</a></li>';
    }
?>
</ol>

<ol>

<?php
    foreach ($consoles as $console){
      echo '<li><a href="'.base_url('console/'.$console['console']).'">'.$console['console'].'</a></li>';
    }
          echo '<li><a href="'.base_url('gamesview').'">Todos</a><li>';

?>
</ol>
</div>
<div class="main">
  <table style="background-color: rgb(171, 209, 167);" class="table">
    <thead>
        <tr>
        <th scope="col"></th>
        <!-- <th scope="col">Id Produto</th> -->
        <th scope="col">Produto</th>
        <th scope="col">Tipo</th>
        <th scope="col">Quantidade <a href="<?php echo base_url('quantidadeg') ?>/asc"><i class="fas fa-sort-amount-down-alt"></i></a> <a href="<?php echo base_url('quantidadeg') ?>/desc"><i class="fas fa-sort-amount-down"></i></a></th>
        <th scope="col">Preço  <a href="<?php echo base_url('precog') ?>/asc"><i class="fas fa-sort-amount-down-alt"></i></a> <a href="<?php echo base_url('precog') ?>/desc"><i class="fas fa-sort-amount-down"></i></a></th>
        <!-- <th scope="col">Categoria</th> -->
        <th scope="col">Categoria</th>
        <th scope="col">Console</th>
        <th scope="col"><th>
        <th scope="col"><th>
    

    </tr>
  </thead>
  
  <tbody>
    <?php 
    foreach ($products as $row){
      if($row['tipo'] !== 'Games') continue;
      // print_r($row);
      echo "<tr> <td><img src=".$row['imagem']."></td>";
      // echo "<td>".$row['id']."</td>";
      echo "<td>".$row['nome']."</td>";
      echo "<td>".$row['tipo']."</td>";
      echo "<td>".$row['qnt']."</td>";   
      echo "<td>R$".$row['preco']."</td>";    
      echo "<td>".$row['nomec']."</td>";    
      echo "<td>".$row['console']."</td>";    

   
?>

<td>


    <a href="<?php echo base_url('editp/'.$row['id']);?>" class="btn btn-light">Edit</a>
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
</div>
  </body>
  </html>
