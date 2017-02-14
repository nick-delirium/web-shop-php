<?php $title = 'Login';?>
<?php include ROOT.'/views/user/noCatsHeader.php'?>

	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-5 col-sm-offset-4 padding-right">
					<div class="signup-form"><!--sign up form-->
						             
                        <h2>Login:</h2>
                        <?php if(isset($errors) && is_array($errors)): ?>
                            <ul> <?php foreach ($errors as $error): ?>
                                    <li><p class="errors">- <?php echo $error; ?></p></li>
                            <?php endforeach; ?>
                            </ul>
                        <?php endif;?>
                        <form action="#" method="post">
							<input type="text" name='name' placeholder="Name" value=""/>
							<input type="password" name='password' placeholder="Password"/>
							<input type="submit" name='submit' class="btn btn-default" value='Login'/>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
<?php include ROOT.'/views/site/footer.php'?>