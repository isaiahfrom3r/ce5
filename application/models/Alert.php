<?php

class Alert extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    function set($message="" ,$type="",$location=""){
		if($message != ""){
			if($type == ""){
				$type == "info"; 
			}
			if($location == ""){
				$location = "toast-top-right";
			} 
			$data_toast = array(
	           'ttype'  => $type,
	           'tlocation'     => $location,
	           'tmessage'     => $message
	       );
	       
	       $this->session->set_userdata($data_toast);
       }
       return ;
	}
    
    
	

}
?>