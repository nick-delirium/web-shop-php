<?php $title = 'About Product';?>
<?php include ROOT.'/views/site/header.php'?>

                    <div class="col-sm-9 padding-right">
                        <div class="product-details"><!--product-details-->
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="view-product">
                                        <img src="<?php echo $product['image'];?>" alt="" />
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="product-information"><!--/product-information-->
                                        <img src="<?php if ($product['is_new']==1) echo'/templates/images/product-details/new.jpg';?>" class="newarrival" alt="" />
                                        <h2><?php echo $product['name'];?></h2>
                                        
                                        <span>
                                            <span><?php echo $product['price'].'$';?></span>
                                            <label>Количество: </label>
                                            <input type="text" value="3" />
                                            <button type="button" class="btn btn-fefault cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                В корзину
                                            </button>
                                        </span>
                                        <p><b>Наличие:</b> <?php echo $product['availability'];?></p>
                                        <p><b>Состояние:</b> <?php if ($product['is_new']==1) echo 'Новое'; else echo 'отличное';?></p>
                                        <p><b>Производитель:</b> <?php echo $product['brand'];?></p>
                                    </div><!--/product-information-->
                                </div>
                            </div>
                            <div class="row">                                
                                <div class="col-sm-12">
                                    <h5>Описание товара</h5>
                                <?php echo $product['description'];?>    
                                </div>
                            </div>
                        </div><!--/product-details-->

                    </div>
                </div>
            </div>
        </section>
        

        <br/>
        <br/>
        
<?php include ROOT.'/views/site/footer.php'?>
      