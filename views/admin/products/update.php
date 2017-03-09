    <h4>Добавить новый товар</h4>

            <br/>

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
<?php endif; ?>     

<form action="#" method="post" enctype="multipart/form-data">
<p>Название товара</p>
<input type="text" name="name" placeholder="" value="<?php echo $product['name'];?>">

<p>Стоимость, $</p>
<input type="text" name="price" placeholder="" value="<?php echo $product['price'];?>">

<p>Категория</p>
<select name="category_id">
    <?php if (is_array($categoriesList)): ?>
        <?php foreach ($categoriesList as $category): ?>
            <option value="<?php echo $category['id']; ?>">
                <?php echo $category['name']; ?>
            </option>
        <?php endforeach; ?>
    <?php endif; ?>
</select>

<br/><br/>

<p>Производитель</p>
<input type="text" name="brand" placeholder="" value="<?php echo $product['brand'];?>">

<p>Изображение товара</p>
<img src="<?= Product::getImage($product['id']);?>" width="200"><br/>
<input type="file" name="image" placeholder="" value="<?php echo $product['image'];?>">

<p>Детальное описание</p>
<textarea name="description"><?php echo $product['description'];?></textarea>

<br/><br/>

<p>Наличие на складе</p>
<input type="text" name="availability" placeholder="" value="<?php echo $product['availability'];?>">

<br/><br/>

<p>Новинка</p>
<select name="is_new">
    <option value="1" <?php if ($product['is_new'] == 1) echo ' selected="selected"';?>>Да</option>
    <option value="0" <?php if ($product['is_new'] == 0) echo ' selected="selected"';?>>Нет</option>
</select>

<br/><br/>

<p>Рекомендуемые</p>
<select name="is_recommended">
    <option value="1" <?php if ($product['is_recommended'] == 1) echo ' selected="selected"';?>>Да</option>
    <option value="0" <?php if ($product['is_recommended'] == 0) echo ' selected="selected"';?>>Нет</option>
</select>

<br/><br/>

<p>Статус</p>
<select name="visible">
    <option value="1" <?php if ($product['visible'] == 1) echo ' selected="selected"';?>>Отображается</option>
    <option value="0" <?php if ($product['visible'] == 0) echo ' selected="selected"';?>>Скрыт</option>
</select>

<br/><br/>

<input type="submit" name="submit" value="Сохранить">

<br/><br/>

</form>