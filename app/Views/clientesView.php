<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">E-mail</th>
      <th scope="col">Cidade</th>
     

    </tr>
  </thead>
  <tbody>

<?php
    foreach ($customers as $customer){
        if ($customer['Nome']=='Admin') continue;
        echo "<tr class=\"table-light\">
        <td>".$customer['Nome']."</td>
        <td>".$customer['Email']."</td>
        <td>".$customer['Cidade']."</td></tr>";

        
    }
?>

</table>
    
</body>
</html>
