
<span></span>
<?php 
	
$toast = $this->session->all_userdata();

if(isset($toast['ttype'])){ ?>
<script>
	var message = '<?php echo  $toast['tmessage']; ?>';
	var type = '<?php echo $toast['ttype'] ?>';
	var tlocation = '<?php echo $toast['tlocation'] ?>';
	
	toastr.options = {
	  "closeButton": true,
	  "debug": false,
	  "positionClass": tlocation,
	  "onclick": null,
	  "showDuration": "1000",
	  "hideDuration": "1000",
	  "timeOut": "5000",
	  "progressBar": true,
	  "extendedTimeOut": "1000",
	  "showEasing": "swing",
	  "hideEasing": "linear",
	  "showMethod": "fadeIn",
	  "hideMethod": "fadeOut"
	}
	
	if(type == "info"){
		toastr.info( message );
	}
	if(type == "success"){
		toastr.success( message );
	}
	if(type == "warning"){
		toastr.warning( message );
	}
	if(type == "error"){
		toastr.error( message );
	}
	
	
		
</script>	

<?php } 
	
	$array_items = array('tmessage' => '', 'ttype' => '', 'tlocation' => '','type' => '','location' => '');

	$this->session->unset_userdata($array_items);
	
	
	
?>
