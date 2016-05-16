<!DOCTYPE html>
<html lang="en">
	<?php $user = $this->users->get_user($this->users->id()); ?>

	<head>
		<meta charset="utf-8">
		<title>Thing</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<?php $this->load->view(THEME.'/assets/scripts.php'); ?>
		<?php $this->load->view(THEME.'/assets/styles.php');  ?>
		<?php $this->load->view(THEME.'/assets/alerts.php');  ?>
		
	</head>
	<body>
	<?php 
		if($this->users->is_loggedin()){
			$this->load->view(THEME.'/nav_logged.php',array('user' => $user));
		}else{
			$this->load->view(THEME.'/nav.php');
		}
		 
	
	?>
	
	
	<div class="container">
		
		
		

