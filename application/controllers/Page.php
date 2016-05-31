<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Cms_model');		
		ini_set('display_errors', 0);
	}

	public function view($id)
	{
		
		$data['page'] = $page = $this->Cms_model->get_page($id);
		
		$meta['metas'] = $this->Cms_model->get_meta($page);
		$this->load->view(THEME.'/header',$meta);
		$this->load->view(THEME.'/page-view',$data);
		$this->load->view(THEME.'/footer');
	}
		
}
