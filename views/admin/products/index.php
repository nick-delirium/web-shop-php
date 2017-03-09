<html>

<style>
table {
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid black;
} 
</style>

<a href='/admin/product/create'><h2>+Add new item</h2></a>
<table> 
   <tr>
    <th>ID</th>
    <th>NAME</th>
    <th>PRICE</th>
    <th>AVAILABILITY</th>
    <th>IS VISIBLE</th>
    <th>UPDATE</th>
    <th>DELITE</th>
    </tr>
    
    
    <?php foreach($productsList as $product): ?>
    <?php $id = $product['category_id'];?>
    <tr>
        <td><?php echo $product['id'];?></td>
        <td><?php echo $product['name'];?></td>
        <td><?php echo $product['price'];?></td>
        <td><?php echo $product['availability'];?></td>
        <td><?php if($product['visible']==1) echo 'yes'; else echo 'no';?></td>
        <td><a href="/admin/product/update/<?php echo $product['id'];?>" title='Редактировать'>&#920;</a></td>
        <td><a href="/admin/product/delite/<?php echo $product['id'];?>" title='Удалить'>X</a></td>
    </tr>
    <?php endforeach;?>
</table>


</html>