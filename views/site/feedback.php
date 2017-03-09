<?php $title = 'Contact us';?>
<?php include ROOT.'/views/user/noCatsHeader.php'?>

	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-5 col-sm-offset-4 padding-right">
					<div class="signup-form"><!--sign up form-->
						             <?php if ($result): ?>
                        <p> Message sent! Thank you for your feedback.</p>
                                    <?php endif;?>
                        <h2>Send message:</h2>
                        <form action="#" method="post">
							<input type="email" name='mail' placeholder="email@email.com" value="<?php if(isset($mail)) echo $mail;?>"/>
                            <textarea name='text' class='textare' placeholder="Your feedback"></textarea><br>
							<input type="submit" name='submit' class="btn btn-default" value='Login'/>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
<?php include ROOT.'/views/site/footer.php'?>