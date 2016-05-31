<!DOCTYPE html>
<html lang="en">
	<?php $user = $this->users->get_user($this->users->id()); ?>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<?php $this->load->view(ADMIN_THEME.'/assets/meta.php'); ?>
		<?php $this->load->view(ADMIN_THEME.'/assets/scripts.php'); ?>
		<?php $this->load->view(ADMIN_THEME.'/assets/styles.php');  ?>
		<?php $this->load->view(ADMIN_THEME.'/assets/alerts.php');  ?>
		
	</head>

	<body>
	<?php 
		
		if($this->users->is_loggedin()){
			$this->load->view(THEME.'/nav_logged.php',array('user' => $user));
		}else{
			$this->load->view(ADMIN_THEME.'/nav.php');
		}
		 
	
	?>
	
	
	<div class="container">
		
		
		

