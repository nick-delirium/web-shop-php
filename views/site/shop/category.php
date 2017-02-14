<?php $title = 'Our Catalog';?>
<?php include ROOT.'/views/site/header.php'?>

                    <div class="col-sm-9 padding-right">
                        <div class="features_items"><!--features_items-->
                            
                        <h2 class="title text-center">Последние товары в категории ?></h2>
                            <?php foreach($products as $product):?>
                            <div class="col-sm-4">
                                
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                           
                                            <a href="/product/<?php echo $product['id'];?>"><img src="<?php echo $product['image'];?>" alt="" /> </a>
                                            <h2><?php echo $product['price'].'$'; ?></h2>
                                            <p><?php echo $product['name'];?></p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                            
                                        </div>
                                        <?php if ($product['is_new'] == 1): ?>
                                            <img src='/templates/images/home/new.png' class='new' alt=''>
                                            <?php endif;?>
                                    </div>
                                </div>
                               
                            </div>    <?php endforeach;?>                     </div><!--features_items-->

                       

                    </div>
                </div>
            </div>
        </section>
<div class="col-md-4 col-md-offset-4">
<?php echo $pagination->get(); ?>
</div>
    <?php include ROOT.'/views/site/footer.php'?>
