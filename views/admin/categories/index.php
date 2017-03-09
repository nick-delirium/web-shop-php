<style>
table {
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid black;
} 
</style>
<a href="create/"><h4>+ add category</h4></a>
<table>
    <tr>
        <th> ID</th>
        <th> NAME</th>
        <th> IS VISIBLE</th>
        <th> CHANGE</th>
        <th> DELITE</th>
    </tr>
    <?php foreach($categories as $category): ?>
    <tr>  
        <td> <?php echo $category['id'];?> </td>
        <td> <?php echo $category['name'];?> </td>
        <td><?php echo $category['status'] == 1 ? ' yes' : ' no';?> </td>
        <td><a href="/admin/category/update/<?php echo $category['id'];?>">O</a> </td>
        <td><a href="/admin/category/delite/<?php echo $category['id'];?>">X</a> </td>
    </tr>
      <?php endforeach;?>
</table>

