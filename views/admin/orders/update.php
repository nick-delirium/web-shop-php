<form action="#" method="post">

<p>Имя клиента</p>
<input type="text" name="userName" placeholder="" value="<?php echo $order['user_name']; ?>">

<p>Телефон клиента</p>
<input type="text" name="userPhone" placeholder="" value="<?php echo $order['user_phone']; ?>">

<p>Комментарий клиента</p>
<input type="text" name="addres" placeholder="" value="<?php echo $order['user_addres']; ?>">

<p>Дата оформления заказа</p>
<input type="text" name="date" placeholder="" value="<?php echo $order['date']; ?>">

<p>Статус</p>
<select name="status">
	<option value="1" <?php if ($order['status'] == 1) echo ' selected="selected"'; ?>>in progress</option>
	<option value="2" <?php if ($order['status'] == 2) echo ' selected="selected"'; ?>>sent</option>
	<option value="3" <?php if ($order['status'] == 3) echo ' selected="selected"'; ?>>arrived</option>
	<option value="4" <?php if ($order['status'] == 4) echo ' selected="selected"'; ?>>troubles!</option>
</select>
<br>
<br>
<input type="submit" name="submit" value="Сохранить">
</form>