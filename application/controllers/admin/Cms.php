<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Cms_model');		
	}

	public function index()
	{
		
		$data['pages'] = $pages = $this->Cms_model->get_all();

		$this->load->view(ADMIN_THEME.'/header');
		$this->load->view(ADMIN_THEME.'/cms/list',$data);
		$this->load->view(ADMIN_THEME.'/footer');
	}
	public function create_page(){
		// set form validation 
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim');
		$this->form_validation->set_rules('keywords', 'Key Words', 'trim');
		$this->form_validation->set_rules('body', 'Body', 'trim|required');
		if ($this->form_validation->run() === false) {
			
			// validation not ok, send validation errors to the view
		} else {			
			// all good so lets first update the .htm file
			$string = strtolower(preg_replace("/[^ \w]+/", "", str_ireplace(' ', '_', $_POST['title'])));
			$file = 'block.htm';
			if (!file_exists(FCPATH.'cms/'.$string)) {
			    mkdir(FCPATH.'cms/'.$string, 0777, true);
			}
			$fh = fopen(FCPATH.'cms/'.$string.'/'.$file, 'w'); // or die("error");  
			fwrite($fh, $_POST['body']);
			
			// ok now how about the .xml 
			unset($_POST['body']); 
			$file = 'info.xml';
			$xml = new SimpleXMLElement('<xml/>');
			$xml->formatOutput = true;
		    $item = $xml->addChild('page');
		    $item->formatOutput = true;
			if($_POST['keywords'] == ""){
				$_POST['keywords'] = $this->options->get('keywords');
			}
			if($_POST['description'] == ""){
				$_POST['description'] = $this->options->get('description');
			}
			
		    foreach($_POST as $key=>$di){		    
		    	$item->addChild($key, $di);
			}
			
			Header('Content-type: text/xml');
			
			$xml->saveXML(FCPATH.'cms/'.$string.'/'.$file);			
			$this->alert->set('Page has been created. <a href="'.base_url().'page/view/'.$string.'">View Now</a>','success');
			redirect('admin/cms');
		}
		
		
		
		// load the page
		$this->load->view(THEME.'/header');
		$this->load->view(ADMIN_THEME.'/cms/page_create');
		$this->load->view(THEME.'/footer');
	}
	public function edit_page($id){
		$data['page'] = $page = $this->Cms_model->get_page($id);
		
		// set form validation 
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim');
		$this->form_validation->set_rules('keywords', 'Key Words', 'trim');
		$this->form_validation->set_rules('body', 'Body', 'trim|required');
		if ($this->form_validation->run() === false) {
			
			// validation not ok, send validation errors to the view
		} else {			
			// all good so lets first update the .htm file
			$string = strtolower(preg_replace("/[^ \w]+/", "", str_ireplace(' ', '_', $_POST['title'])));
			$orig   = strtolower(preg_replace("/[^ \w]+/", "", str_ireplace(' ', '_', $id)));
			ini_set('display_errors', 1); // set to 0 for production version 
			error_reporting(E_ALL);
			if($orig != $string){
				//rename(FCPATH.'cms/'.$orig, FCPATH.'cms/'.$string);
				exec("mv ".FCPATH.'cms/'.$orig." ".FCPATH.'cms/'.$string."");
			}
			$file = 'block.htm';
			
			
			
			if (!file_exists(FCPATH.'cms/'.$string)) {
			    mkdir(FCPATH.'cms/'.$string, 0777, true);
			}
			$fh = fopen(FCPATH.'cms/'.$string.'/'.$file, 'w'); // or die("error");  
			fwrite($fh, $_POST['body']);
			
			// ok now how about the .xml 
			unset($_POST['body']); 
			$file = 'info.xml';
			$xml = new SimpleXMLElement('<xml/>');
			$xml->formatOutput = true;
		    $item = $xml->addChild('page');
		    $item->formatOutput = true;
			if($_POST['keywords'] == ""){
				$_POST['keywords'] = $this->options->get('keywords');
			}
			if($_POST['description'] == ""){
				$_POST['description'] = $this->options->get('description');
			}
			
		    foreach($_POST as $key=>$di){		    
		    	$item->addChild($key, $di);
			}
			
			Header('Content-type: text/xml');
			
			$xml->saveXML(FCPATH.'cms/'.$string.'/'.$file);			
			$this->alert->set('Page has been saved. <a href="'.base_url().'page/view/'.$string.'">View Now</a>','success');
			redirect('admin/cms');
		}
		
		
		$this->load->view(ADMIN_THEME.'/header');
		$this->load->view(ADMIN_THEME.'/cms/page_edit',$data);
		$this->load->view(ADMIN_THEME.'/footer');
	}
	public function edit_content($id){
		
		
		$this->load->view(ADMIN_THEME.'/header');
		$this->load->view(ADMIN_THEME.'/cms/block_edit');
		$this->load->view(ADMIN_THEME.'/footer');
	}
	
	
}
