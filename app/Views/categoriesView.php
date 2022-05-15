<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
 

<h1>Lista de Categorias</h1>
  <table style="background-color: rgb(171, 209, 167);, 204); width: 50%" class="table">
    <thead>
        <tr>
        <!-- <th scope="col">#</th> -->
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col"></th>
        <th scope="col"></th>
    

    </tr>
  </thead>
  
  <tbody>
    <?php 
    foreach ($categories as $row){
      echo "<tr> <td>".$row['id']."</td>";
      echo "<td>".$row['nome']."</td>";
   
?>

<td>


    <a href="<?php echo base_url('editca/'.$row['id']);?>" class="btn btn-light">Edit</a>
    </td>
<td>
    <a href="<?php echo base_url('deleteca/'.$row['id']);?>" class="btn btn-danger">Delete</a>
    
   </td></tr>
    

    <?php
    }// foreach
    ?>

</tr>

  </tbody>
</table> 
  </body>
  </html>
