<style>
table {
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid black;
} 
</style>


<h5>Информация о заказе</h5>
<table>
    <tr>
        <td>Номер заказа</td>
        <td><?= $order['id']; ?></td>
    </tr>
    <tr>
        <td>Имя клиента</td>
        <td><?= $order['user_name']; ?></td>
    </tr>
    <tr>
        <td>Телефон клиента</td>
        <td><?= $order['user_phone']; ?></td>
    </tr>
    <tr>
        <td>адрес клиента</td>
        <td><?= $order['user_addres']; ?></td>
    </tr>
    <tr>
        <td><b>Статус заказа</b></td>
        <td><?= Order::getStatus($order['status']); ?></td>
    </tr>
    <tr>
        <td><b>Дата заказа</b></td>
        <td><?= $order['date']; ?></td>
    </tr>
</table>

<h5>Товары в заказе</h5>

<table>
    <tr>
        <th>ID товара</th>
        <th>Название</th>
        <th>Цена</th>
        <th>Количество</th>
    </tr>
	
	<?php $total = 0;?>
    <?php foreach ($products as $product): ?>
	<?php $total+=$product['price'];?>
        <tr> 
            <td><?= $product['id']; ?></td>
            <td><?= $product['name']; ?></td>
            <td>$<?= $product['price']; ?></td>
            <td><?= $quantity[$product['id']]; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<p> total: $<?= $total;?> </p>