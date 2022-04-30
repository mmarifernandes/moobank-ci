


<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Description</th>
      <th scope="col">Amount</th>
      <th scope="col"><th>
      <th scope="col"><th>
    

    </tr>
  </thead>

  <tbody>
<?php 
    foreach ($orders as $row){
        echo "<tr> <td>".$row['id']."</td>
        <td>".$row['description']."</td>
        <td>".$row['amount']."</td>";
    
   
?>

<td>


    <a href="<?php echo base_url('edit/'.$row['id']);?>" class="btn btn-info">Edit</a>
    </td>
<td>
    <a href="<?php echo base_url('delete/'.$row['id']);?>" class="btn btn-danger">Delete</a>
    
   </td></tr>
    

    <?php
    }// foreach
    ?>

</tr>

  </tbody>
</table>