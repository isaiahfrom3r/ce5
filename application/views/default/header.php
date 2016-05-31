<!DOCTYPE html>
<html lang="en">

	<?php $user = $this->users->get_user($this->users->id()); ?>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<?php 
			// check if meta was passed 
		
			if(!empty($metas)){
				$this->load->view(THEME.'/assets/meta.php',array('metas' => $metas));  
			}else{
				$this->load->view(THEME.'/assets/meta.php');  
			}
		?>
		<?php $this->load->view(THEME.'/assets/scripts.php'); ?>
		<?php $this->load->view(THEME.'/assets/styles.php');  ?>
		<?php $this->load->view(THEME.'/assets/alerts.php');  ?>
		
	</head>
	<body>
	<?php 
		if($this->users->is_loggedin()){
			$this->load->view(THEME.'/nav_logged.php',array('user' => $user));
		}elseif($this->users->is_admin()){
			$this->load->view(THEME.'/nav.php');
		}else{
			$this->load->view(THEME.'/nav.php');
		}
		 
	
	?>
	
	
	<div class="container">
		
		
		

