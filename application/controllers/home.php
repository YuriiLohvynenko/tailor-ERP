<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {
	
/*
| -----------------------------------------------------
| PRODUCT NAME: 	TAILOR
| -----------------------------------------------------
| AUTHER:			JITENDRA KUMAR
| -----------------------------------------------------
| EMAIL:			support@livesoftwaresolution.com
| -----------------------------------------------------
| COPYRIGHTS:		RESERVED BY LIVE SOFTWARE SOLUTIONS
| -----------------------------------------------------
| WEBSITE:			 www.livesoftwaresolution.com
| -----------------------------------------------------
|
| MODULE: 			HOME
| -----------------------------------------------------
| This is ADMIN module controller file.
| -----------------------------------------------------
*/

	function __construct(){
		parent::__construct();
		$this->load->library('constant');
		$this->load->helper('multi_language');
		$this->load->model('email_model');
		$this->load->model('crud_model');
		/*
		$this->load->libraries('constant');
				$this->load->library('constant');*/
		
	}

	public function index(){
		if($this->session->userdata('user_id')){
		redirect($this->session->userdata('roles').'/dashboard', 'refresh');
		}
		
		$data['page_title'] = get_phrase("login");
        $this->load->view('login', $data);
	}
	
	public function login(){
		
		$user = $this->input->post('email');
		$pass = $this->input->post('password');
		$query = $this->db->query("SELECT * FROM users WHERE email = '".$user."' AND password = '".$pass."' ");
		if ($query->num_rows() > 0)
		{
			$data['user'] = $query->row_array();
			$roles = $this->db->get_where('roles' , array('id'=>$data['user']['role']))->row();
			$data['user']['roles'] = strtolower($roles->name);
			$this->session->set_userdata($data['user']);
			$log = $this->crud_model->create_log(array("user_id" => $data['user']['user_id']));
			$this->email_model->do_email('7', 'users', array_merge($log, array('userId' => $this->session->userdata('user_id')))); 
			$this->session->set_flashdata('login_message', get_phrase('success_login'));
			redirect(strtolower($roles->name.'/dashboard'), 'refresh');
		}
		else
		{
			$this->session->set_flashdata('flash_message', get_phrase('incorrect_login'));
			redirect('home', 'refresh');
		}
	}
	
	/***LOG OUT*****/
	public function logout(){
		$this->session->unset_userdata();
		$this->session->sess_destroy();
		$this->session->set_flashdata('msg', 'logout successfully!!');
		redirect('home', 'refresh');
	}
	
	
	/***DEFAULT NOR FOUND PAGE*****/
	function four_zero_four()
	{
		$page_data['title'] = get_phrase('404_not_found');
		$this->load->view('four_zero_four',$page_data);
	}		
	
}
