<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class User extends CI_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		
	}
	
	
	public function index() {
		

		
	}
	
	/**
	 * register function.
	 * 
	 * @access public
	 * @return void
	 */
	public function register() {
		
		// create the data object
		$data = new stdClass();
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// set validation rules
		$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]|is_unique[users.username]', array('is_unique' => 'This username already exists. Please choose another one.'));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
		
		if ($this->form_validation->run() === false) {
			
			// validation not ok, send validation errors to the view
			
			
		} else {
			
			// set variables from the form
			$username = $this->input->post('username');
			$email    = $this->input->post('email');
			$password = $this->input->post('password');
			
			if ($this->users->create_user($username, $email, $password)) {
				
				
				
			} else {
				
				// user creation failed, this should never happen
				$data->error = 'There was a problem creating your new account. Please try again.';
				
				
				
			}
			
		}
		
		$this->load->view(THEME.'/header');
		$this->load->view(THEME.'/user/register/register', $data);
		$this->load->view(THEME.'/footer');
		
	}
		
	/**
	 * login function.
	 * 
	 * @access public
	 * @return void
	 */
	public function login() {
		
		// create the data object
		$data = new stdClass();
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// set validation rules
		$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
		$this->form_validation->set_rules('password', 'Password', 'required');
	
		
		if ($this->form_validation->run() == false) {
		
			
		} else {
			
			// set variables from the form
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			if ($this->users->resolve_user_login($username, $password)) {
				
				$user_id = $this->users->get_user_id_from_username($username);
				$user    = $this->users->get_user($user_id);
				
				// set session user datas
						
				$this->session->set_userdata('id',(int)$user->id);
				$this->session->set_userdata('username',(string)$user->username);
				$this->session->set_userdata('is_confirmed',(bool)$user->is_confirmed);
				$this->session->set_userdata('email',$user->email);
				$this->session->set_userdata('level',$user->level);
				
				$this->alert->set('Welcome!','success');
				
			} else {
				// login failed
				$this->alert->set('Wrong username or password.!','error');	
			}
			
		}
		
		// send error to the view
		$this->load->view(THEME.'/header');
		$this->load->view(THEME.'/user/login/login', $data);
		$this->load->view(THEME.'/footer');
		
	}
	
	/**
	 * logout function.
	 * 
	 * @access public
	 * @return void
	 */
	public function logout() {
		
		// create the data object
		$data = new stdClass();
		
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			
			// remove session datas
			foreach ($_SESSION as $key => $value) {
				unset($_SESSION[$key]);
			}
			
			// user logout ok
			$this->load->view('header');
			$this->load->view('user/logout/logout_success', $data);
			$this->load->view('footer');
			
		} else {
			
			// there user was not logged in, we cannot logged him out,
			// redirect him to site root
			redirect('/');
			
		}
		
	}
	
}
