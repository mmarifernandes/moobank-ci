<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Lista de Clientes</h1>

<table style="background-color: rgb(178, 133, 204);" class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">E-mail</th>
      <th scope="col">Cidade</th>
      <th scope="col"></th>
      <th scope="col"></th>

     

    </tr>
  </thead>
  <tbody>

<?php
    foreach ($customers as $customer){
        if ($customer['Nome']=='Admin') continue;
        echo "<tr>
        <td>".$customer['Nome']."</td>
        <td>".$customer['Email']."</td>
        <td>".$customer['Cidade']."</td>";

        
    
?>

<td>


    <a href="<?php echo base_url('edit/'.$customer['Email']);?>" class="btn btn-info">Edit</a>
    </td>
<td>
    <a href="<?php echo base_url('delete/'.$customer['Email']);?>" class="btn btn-danger">Delete</a>
    
   </td></tr>


       <?php
    }// foreach
    ?>
</table>
    
</body>
</html>
