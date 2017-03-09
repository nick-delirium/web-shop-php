<?php $title = 'Cart';?>
<?php include ROOT.'/views/user/noCatsHeader.php'?>

<h1 class='hello'>Your products to buy</h1>
<hr class='hier'>

<?php if ($prodsInCart): ?>
<table class='table-bordered table-stripped table'>
    <tr> 
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Delite</th>
    </tr>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><a href="/product/<?php echo $product['id'];?>"> <?php echo $product['name'];?></a></td>
            <td> <?php echo $product['price'];?></td>
            <td><?php echo $prodsInCart[$product['id']];?></td>
            <td> <a href="/cart/delite/<?php echo $product['id'];?>">x</a> </td>
        </tr>
    <?php endforeach;?>
    <tr>
        <td colspan='3'>total price:</td>
        <td><?php echo $totalPrice;?></td>
    </tr>
</table>
<a href='/checkout'>Оформить заказ.</a>>
<?php else: ?>
<p> there is nothing here :(</p>
<?php endif;?>

<?php include ROOT.'/views/site/footer.php'?>