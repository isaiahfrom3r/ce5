<?php
class Cms_model extends CI_Model {

	 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

	public function get_page($name){
		$rout = FCPATH.'/cms/'.$name; 
		// get xml data
		$page['id'] = $name; 
		
		if(file_exists($rout.'/info.xml')){
			$xmli = file_get_contents($rout.'/info.xml');
			$info = new SimpleXMLElement($xmli);
			$info = json_decode(json_encode($info), true);
			if(isset($info['page'])){
				$info = $info['page'];
			}
			$page['title'] 		 	= $info['title']; 
			$page['description'] 	= $info['description']; 
			$page['keywords'] 		= $info['keywords']; 
		
		}
		
		// get content
		if(file_exists($rout.'/block.htm')){
			$block = file_get_contents($rout.'/block.htm');
			$page['body'] = $block; 
		
		}
		
		return $page;
	}
	public function get_all(){
		$dir = array_filter(glob('./cms/*'), 'is_dir');
		foreach($dir as $key=>$r){
			 // save the directory
			 $path = str_ireplace('./cms/', '', $r);
			 
			 $pages[$key] = $this->get_page($path);
			 
			 
		}
		return $pages;
	}
	public function get_meta($page){
		return array(
			'seo' 			=> $page['keywords'],
			'name' 			=> $page['title'],
			'description' 	=> $page['description'],	
		);
	}
	
}

?>