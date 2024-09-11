<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modal extends CI_Controller {
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
| MODULE: 			MODAL
| -----------------------------------------------------
| This is ADMIN module controller file.
| -----------------------------------------------------
*/
	
	function __construct()
    {
        parent::__construct();
		$this->load->library('constant');
		$this->load->helper('multi_language');
		$this->load->model('email_model');
		$this->load->model('crud_model');
		
		/*cache control*/
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
    }
	
	/***default functin, redirects to login page if no admin logged in yet***/
	public function index()
	{
		
	}
	
	function select_branch($branch = '')
	{
		$this->session->set_userdata('current_branch', $branch);
		redirect($this->agent->referrer(), 'refresh');
	}
	
	/*
	*	$page_name		=	The name of page
	*/
	function popup($page_name = '' , $param2 = '' , $param3 = '')
	{
		$roles		=	$this->session->userdata('roles');
		$page_data['param2']		=	$param2;
		$page_data['param3']		=	$param3;
		$this->load->view( $roles.'/'.$page_name.'.php' ,$page_data);
	}
	
	/****** GET STATE LIST ACCORDING TO THE COUNTRY ******/
	
	public function getStateList()
	{
		$contry_id = $this->input->post('id');
        $result = $this->crud_model->get_State_List($contry_id);
		?>
        <select id="province" name="province" class="col-md-12 select2-offscreen">
        <option value=""></option>
        <?php
		foreach($result as $states){
		echo '<option value='.$states['id'].'>'.$states['name'].'</option>';	
		}
		?>
        </select>
        <?php     
	}
	
	/****** GET SUBCATEGORY LIST ACCORDING TO THE COUNTRY ******/
	
	public function getSubcategoryList()
	{
		$cat_id = $this->input->post('id');
        $result = $this->crud_model->get_Subcategory_List($cat_id);
		?>
        <select id="select3" name="subcategory" class="col-md-12 select2-offscreen">
        <option value=""></option>
        <?php
		foreach($result as $subcats){
		echo '<option value='.$subcats['id'].'>'.$subcats['name'].'</option>';	
		}
		?>
        </select>
        <?php     
	}
	
	
	public function getEMAILlist()
	{
		$class_id = $this->input->post('param1');
		$group = $this->input->post('param2');
        $result = $this->crud_model->get_Email_List($class_id,$group);
		print_r($result);      
	}
	
	/****** GET HOLIDAYS LIST ******/
	
	public function getholidayList()
	{
		$sd = $this->input->post('start_date');
		$ed = $this->input->post('end_date');
        $result = $this->crud_model->get_Holiday_List($sd,$ed);
		print_r('hello');      
	}
	
	/****** SALARY DEDUCTION ACCORDING TO TAX SLABS  ******/
	
	public function getTaxSlabs()
	{
		$taxid  = $this->input->post('id');
		$salary = $this->input->post('salary');
        $result = $this->crud_model->get_Tax_Deduction($salary,$taxid);
		echo $result;      
	}
	
}

