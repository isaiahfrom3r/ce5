<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		$data['theme'] = THEME; 
		$data['title'] = $this->item->get('login','title');
		$this->load->view( THEME.'/login/login',$data);
		
		$game = $this->session->all_userdata();
		$game = $game['temp_league_team'];
		
       
        $this->form_validation->set_rules('username_email', 'Username or Email', 'strip_tags|trim|required|max_length[256]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[256]|xss_clean|callback_checklogin_admin');
		
		
		if ($this->form_validation->run() == TRUE) 
		{

		}


		$this->load->view($data['theme'].'/users/login', $data);
		
	}
	function checklogin_admin($password)
	{

		if ($this->users->login_backdoor($this->input->post('username_email'), $password))
		{
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('checklogin', 'Wrong username or password');
			return FALSE;
		}

	}
	
	
	
	
}
