<html>

<style>
table {
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid black;
} 
</style>


<table> 
   <tr>
    <th>ID</th>
    <th>OWNER</th>
    <th>PHONE</th>
    <th>ADDRES</th>
    <th>DATE OF ORDER</th>
    <th>STATUS</th>
    <th>VIEW</th>
    <th>CHANGE</th>
    <th>DELITE</th>
    </tr>
    
    
    <?php foreach($orders as $order): ?>
    <?php switch($order['status']){
    case '1':
        $status = 'in progress'; break;
    case '2':
        $status = 'sent'; break;
    case '3':
        $status = 'arrived'; break;
    case '4':
        $status = 'troubles!'; break;
        }
    ?>
    
    <tr>
        <td><?= $order['id'];?></td>
        <td><?= $order['user_name'];?></td>
        <td><?= $order['user_phone'];?></td>
        <td><?= $order['user_addres'];?></td>
        <td><?= $order['date'];?></td>
        <td><?= $status;?></td>
        <td><a href="/admin/order/view/<?php echo $order['id'];?>">W</a></td>
        <td><a href="/admin/order/update/<?php echo $order['id'];?>" title='Редактировать'>&#920;</a></td>
        <td><a href="/admin/order/delite/<?php echo $order['id'];?>" title='Удалить'>X</a></td>
    </tr>
    <?php endforeach;?>
</table>


</html>