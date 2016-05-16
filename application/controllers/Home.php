<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	public function index()
	{
		$this->load->view(THEME.'/header');
		$this->load->view(THEME.'/home');
		$this->load->view(THEME.'/footer');
	}
}
