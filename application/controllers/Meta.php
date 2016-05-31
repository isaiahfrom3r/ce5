<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meta extends CI_Controller {


	public function edit($name)
	{
		$data['metas'] = $metas = $this->metas->get_all_by_controller($name);
		$data['controller'] =  $name; 
				
		$this->load->view(ADMIN_THEME.'/header');
		$this->load->view(ADMIN_THEME.'/meta/edit',$data);
		$this->load->view(ADMIN_THEME.'/footer');
	}
	
	public function index(){
	
		foreach(glob(APPPATH . 'controllers/*php') as $controller)
		{
		   $list[] = str_ireplace(APPPATH.'controllers/', '', $controller); 
		}
		$data['list'] =  $list; 
		$this->load->view(ADMIN_THEME.'/header');
		$this->load->view(ADMIN_THEME.'/meta/list',$data);
		$this->load->view(ADMIN_THEME.'/footer');
	}
}
