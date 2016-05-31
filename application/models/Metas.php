<?php

class Metas extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
       
    }
    
    // grab meta variables 
    function get(){
	    $controller = $this->router->fetch_class(); // for controller
		$method = $this->router->fetch_method(); // for method
	    
	    try{
		//enter code to catch

	    $xmli = file_get_contents(base_url()."meta/".$controller.".xml");
			
		
		$pages = new SimpleXMLElement($xmli);
		$meta = array();
		$pages = json_decode(json_encode($pages), true);
	    // format pages by usuable arrays 
	   
	    if(!isset($pages['pages'][0])){
		    $temp = $pages['pages']; 
		    unset($pages['pages']);
		    $pages['pages'][0] = $temp;
	    }
	  
	    foreach($pages['pages'] as $page){
		   
			$meta[$page['controller']] = $page; 
	    }
	   
	    if(isset($meta[$method]['seo'])){
		    return $meta[$method]; 
	    }else{
		    $return = array(
				'seo' 			=> 'These are the SEO keys',
				'name' 			=> 'Page Name', 
				'description'	=> 'This is the page description', 
			); 
	    	
			return $return; 
	    }
	    
	    }catch(Exception $ex){
			 
			$this->metas->create_default();

		}
	    
	    
    }
    
    public function get_all_by_controller($name=''){
	    if($name == ''){
		    echo "Name Must be provided"; die;
	    }
	    $controller = $name; // for controller
		$method = $this->router->fetch_method(); // for method
	    
	    try{
		//enter code to catch
			$xmli = file_get_contents(base_url()."meta/".$controller.".xml");
			
		
			$pages = new SimpleXMLElement($xmli);
			$meta = array();
			$pages = json_decode(json_encode($pages), true);
		    // format pages by usuable arrays 
		   
		    if(!isset($pages['pages'][0])){
			    $temp = $pages['pages']; 
			    unset($pages['pages']);
			    $pages['pages'][0] = $temp;
		    }
		    
		    return $pages['pages']; 
			
			
			
		}catch(Exception $ex){
			
			$this->metas->create_default($name);
			
		}
	    
	    
    }
    
    public function create_default($name=''){
	    echo "<h2>Meta File Not Found!</h2>";
		echo "<p>Creating Meta File Now!</p>";
		if($name==''){
			$controller = $this->router->fetch_class(); // for controller
		}else{
			$controller = $name;
		}
		$method = $this->router->fetch_method(); // for method
		// grab all function names 
		$cnames = get_class_methods($controller); 
		

		// don't need meta for those 
		$excludeds = array('__construct','get_instance'); 
		
		$rss = new SimpleXMLElement('<xml/>');
		
		
		foreach($cnames as $c){
			// see if its neeeded 
			if(!in_array($c, $excludeds)){
				$channel = $rss->addChild('pages');
				$channel->addChild('controller',$c);
				$channel->addChild('seo','seo');
				$channel->addChild('name','name');
				$channel->addChild('description','description');

			}
		}
		
		
		

		$dom = new DOMDocument('1.0');
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom_xml = dom_import_simplexml($rss);
		$dom_xml = $dom->importNode($dom_xml, true);
		$dom_xml = $dom->appendChild($dom_xml);
		// DOMDocument method for saving XML file
		$dom->save('meta/'.$controller.'.xml');
		
		// DOMDocument method for outputing as XML string
		$result = $dom->saveXML();

		redirect(str_ireplace('/index.php', '', $_SERVER['REQUEST_URI']), 'refresh');
    }
	

}
?>