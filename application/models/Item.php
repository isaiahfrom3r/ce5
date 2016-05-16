<?php

class Item extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
    
    // grab variable 
    function get($page="",$name=""){
	    return 'Lang Item'; 
	    
    }
	

}
?>