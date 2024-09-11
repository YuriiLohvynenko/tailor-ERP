<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller {
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
| MODULE: 			Customer
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
		$this->load->model('order_model');
		$this->session->set_userdata( array('cust_id'  => $this->crud_model->value_by_id('customers', 'user_id', $this->session->userdata('user_id'), 'id')));
		if(!$this->session->userdata('user_id') || $this->session->userdata('roles') != 'customer' ){
			$this->session->set_flashdata('flash_message', get_phrase('log_again'));
			redirect('home', 'refresh');
		}
	}

	public function index(){
		$page_data['page_name']  = 'dashboard';
        $page_data['page_title'] = get_phrase('customer').' '.get_phrase('dashboard');
        $this->load->view('index', $page_data);
	}
	
	public function dashboard(){
		$page_data['page_name']  = 'dashboard';
        $page_data['page_title'] = get_phrase('dashboard');
		$page_data['customerOrders'] = $this->order_model->getCustomerOrdersById($this->session->userdata('cust_id'));
		$page_data['completeOrders']  = $this->order_model->getCustomerCompletedOrdersById($this->session->userdata('cust_id'));
		$page_data['todayReadyOrders'] = $this->order_model->getTodayReadyOrders($this->session->userdata('cust_id'), 'customer');
		$page_data['todayNotReadyOrders'] = $this->order_model->getTodayNotReadyOrders($this->session->userdata('cust_id'), 'customer');
		$page_data['getEvents'] = $this->crud_model->getEvents('calendar');
        $this->load->view('index', $page_data);
	}
	
	function calendar()
	{
	   $data['cal_data'] = $this->crud_model->getEvents('calendar');
      $data['page_title'] = get_phrase("calendar");
	  $data['page_name']  = 'calendar';
      $this->load->view('index', $data);
	}
	/*---------ORDER MODULE------------------*/
	public function completed_orders()
	{
		$page_data['page_name']  = 'completed_orders';
        $page_data['page_title'] = get_phrase('complete')." ".get_phrase('orders');
		$page_data['suborders']  = $this->order_model->getCustomerCompletedOrdersById($this->session->userdata('cust_id'));
        $this->load->view('index', $page_data);
	}
	
	public function orders()
	{
		$page_data['page_name']  = 'orders';
        $page_data['page_title'] = get_phrase('orders');
		$page_data['suborders']  = $this->order_model->getCustomerOrdersById($this->session->userdata('cust_id'));
		//echo "<pre>";
		//print_r($page_data['suborders']);
        $this->load->view('index', $page_data);
	}
	
	
	
	public function email()
	{
		$page_data['page_name']  = 'email';
        $page_data['page_title'] = get_phrase('send').' '.get_phrase('email');;
		$customers=  $this->db->select("email, CONCAT_WS(' ', fname, lname ) as name")->get('customers')->result();
		$employees = $this->db->select("email, CONCAT_WS(' ', fname, lname ) as name")->get('employees')->result();		
		$page_data['emails'] = array_merge($customers,$employees);
       $this->load->view('index', $page_data);
	}
	
	public function send_bulk_email()
	{
    		$data['temp']=$this->input->post('template');
			$data['c_email']=$this->input->post('email');
			$data['bcc']=$this->input->post('bcc');
			$data['subject']=$this->input->post('subject');	
			$data['message']=$this->input->post('editor1');					 
			if($_FILES['attachment']['name'])
			{					
				   $number_of_files = sizeof($_FILES['attachment']['tmp_name']);  
				    $files = $_FILES['attachment'];
				    $errors = array();			 
				    for($i=0;$i<$number_of_files;$i++)
				    {
				      if($_FILES['attachment']['error'][$i] != 0) $errors[$i][] = 'Couldn\'t upload file '.$_FILES['attachment']['name'][$i];
				    }
				    if(sizeof($errors)==0)
				    {				     
				      $this->load->library('upload');				     
				      $config['upload_path'] = 'uploads/send_mail';				     
				      $config['allowed_types'] = '*';
					  $config['overwrite'] = TRUE;
				      for ($i = 0; $i < $number_of_files; $i++)
					 {
					        $_FILES['attachment']['name'] = $files['name'][$i];
					        $_FILES['attachment']['type'] = $files['type'][$i];
					        $_FILES['attachment']['tmp_name'] = $files['tmp_name'][$i];
					        $_FILES['attachment']['error'] = $files['error'][$i];
					        $_FILES['attachment']['size'] = $files['size'][$i];					      
					        $this->upload->initialize($config);					      
					        if ($this->upload->do_upload('attachment'))
					        {
					          $data['uploads'][$i] = $this->upload->data()[full_path];
					        }
				      }
				    }
				  }

		   if($this->email_model->do_bulk_email($data)){
		   		$this->session->set_flashdata('flash_message', get_phrase('sent_successully'));
		   }
		   else{
		   	   $this->session->set_flashdata('message', $this->upload->display_errors());
		   }		   	
		   redirect(base_url().$this->session->userdata('roles'). '/email', 'refresh');
	}
   
   
    function getTemplate()
	{
		//echo $this->input->post('id');
		$query = $this->db->get_where('emailtemplate' , array('id' => $this->input->post('id')));
		print_r($query->row()->content);
	}
	/*---------CHANGE PASSWORD------------------*/
	
	function change_password()
	{
$this->form_validation->set_rules('old_pass', get_phrase("password"), 'required|callback_check_pass');
		$this->form_validation->set_rules('new_pass', get_phrase("new_password"), 'required|min_length[8]|max_length[12]|matches[cn_pass]');
		$this->form_validation->set_rules('cn_pass', get_phrase("confirm_new_password"), 'required');
		
		if ($this->form_validation->run() == false)
		{ //display the form
			//set the flash data error message if there is one
			$page_data['message'] = validation_errors();
			$page_data['min_password_length'] = '8';
			$page_data['old_password'] = array(
				'name' => 'old_pass',
				'type' => 'password',
			);
			$page_data['new_password'] = array(
				'name' => 'new_pass',
				'type' => 'password',
				'pattern' => '^.{'.$page_data['min_password_length'].'}.*$',
			);
			$page_data['new_password_confirm'] = array(
				'name' => 'cn_pass',
				'type' => 'password',
				'pattern' => '^.{'.$page_data['min_password_length'].'}.*$',
			);
			$page_data['user_id'] = array(
				'name'  => 'user_id',
				'type'  => 'hidden',
				'value' => $this->session->userdata('user_id'),
			);

			//render
			$page_data['page_name']  = 'change_password';
			$page_data['page_title'] = get_phrase('change_password');
			$this->load->view('index', $page_data);
			
		}
		else
		{
			$data['password']  = $this->input->post('new_pass');
			$this->db->where('user_id', $this->input->post('user_id'));
			$this->db->update('users', $data);
			$this->session->set_flashdata('flash_message', get_phrase('updated_successully'));
			redirect(base_url().$this->session->userdata('roles'). '/change_password/', 'refresh');
		}
		
	}
	
	/*---------CHECK PASSWORD------------------*/
	
	public function check_pass($str)
	{
		 //call to model function fo check string match in databse and return result
		 $old_pass = $this->crud_model->value_by_id("users",'user_id',$this->input->post('user_id'),'password');
		if($old_pass!=$str){
		 $this->form_validation->set_message('check_pass', get_phrase("cuurent_password_miss_match"));
			  return FALSE;
		}
		 else
		 {
			 return TRUE;
		 }
	}
	
	public function logs(){
		
		$page_data['logs'] = $this->crud_model->get_logs($this->session->userdata('user_id'));
		$page_data['page_name'] = "logs_history";
        $page_data['page_title'] = get_phrase('login').' '.get_phrase('histroy');
        $this->load->view('index', $page_data);
	}
	
	public function clear_logs(){

		$this->db->delete('log', array('user_id' => $this->session->userdata('user_id')));

		$this->session->set_flashdata('flash_message', get_phrase('deleted_successully'));
		redirect(base_url().$this->session->userdata('roles'). '/logs/', 'refresh');
	}
	
}
