<?php $this->load->view($theme.'/header'); ?>

<h2 class="block_heading"><?=$title;?></h2>

<div class="row-fluid">
	<div class="col-sm-6 login-form">
		<form action="" method="post" accept-charset="utf-8" class="form_login">			

			<div class="control-group<?$e=form_error('username_email');echo (!empty($e)?" error":"")?>">
				<label class="control-label"><?=('login_username_or_email');?></label>
				<div class="controls">	
					<input type="text" class="form-control" name="username_email" value="<?=set_value('username_email');?>" />
					<?=form_error('username_email');?>
				</div>
			</div>
			<div class="control-group<?$e=form_error('password');echo (!empty($e)?" error":"")?>">
				<label class="control-label"><?=('login_password');?></label>
				<div class="controls">	
					<input type="password" class="form-control" name="password" value="<?=set_value('password');?>" />
					<?=form_error('password');?>
				</div>
			</div>
			<br>
			<div class="actions controls control-group">
				<input type="submit" class="btn btn-default" value="<?=('login_submit');?>" />
				<a href="https://godraft.com/auth/connect/facebook" class="btn btn-info"><i class="icon-facebook"></i> Facebook</a>
				<a class="btn btn-warning" href="<?=site_url('login/forgot_password');?>"><?=('login_forgot_password');?></a>
			</div>
			 
		</form>
	</div>
	<div class="col-sm-6"><strong>New to Go Draft? Still Need to Create an Account?</strong><br />
	Registering for Go Draft is fast, free, and easy. You can learn more about about our daily fantasy sports game in our <a title="how fan Go Draft! works" href="https://godraft.com/page/view/how_it_works">How it Works</a> and <a title="Go Draft! faqs" href="https://godraft.com/faq">FAQs</a> section if you still have questions.
	<br /><br /><hr />
		<a class="btn btn-success" href="<?=site_url('registration');?>"><?=('login_register');?></a>
	</div>
</div>



<?php $this->load->view($theme.'/footer'); ?>