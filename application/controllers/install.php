<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
| MODULE: 			INSTALL
| -----------------------------------------------------
| This is INSTALL module controller file.
| -----------------------------------------------------
*/


class Install extends CI_Controller {
	
	public $mysqli;

	function __construct()
    {
        parent::__construct();
		
		// Cache control
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Thu, 31 Dec 2037 05:00:00 GMT"); 
	}
	
	function index()
	{
		$this->load->view('install/index');
	}
	
	// -----------------------------------------------------------------------------------
	
	/*
	 * Install the script here
	 */
	function do_install()
	{
		$db_verify	=	$this->checkDBConn();
		
		if($db_verify == true)
		{							
			// Run the installer sql schema		
		
			$schema = read_file('./uploads/tailor.sql');  			
			
		   $this->mysqli->multi_query($schema);
		   $this->mysqli_last_result();
			
		 	/*
			 $cities = read_file('./uploads/cities.sql');
						 $this->mysqli->multi_query($cities);*/
						 
			// Replace the admin login credentials
			
			$this->mysqli->query("UPDATE users SET email='".$this->input->post('email')."', password='".$this->input->post('password')."' WHERE user_id=1 and role=2"); 
			
			// Replace the system name	
			$this->mysqli->query("UPDATE settings SET description='".$this->input->post('system_name')."' WHERE type='system_name' ");								
			
			// Replace the system title
			$this->mysqli->query("UPDATE settings SET description='".$this->input->post('system_name')."' WHERE type='system_title' ");	
		
			$this->mysqli->close();
			
			// Replace the database settings
			$data = read_file('./application/config/database.php');
			
			$data = str_replace('db_name',		$this->input->post('db_name'),		$data);
			$data = str_replace('db_uname',		$this->input->post('db_uname'),		$data);
			$data = str_replace('db_password',	$this->input->post('db_password'),	$data);						
			$data = str_replace('db_hname',		$this->input->post('db_hname'),		$data);
			write_file('./application/config/database.php', $data);
			
			// Replace new default routing controller
			$data2 = read_file('./application/config/routes.php');
			$data2 = str_replace('install','home',$data2);
			write_file('./application/config/routes.php', $data2);
				
			// Redirect to login page after completing installation
			$this->session->set_flashdata('installation_result' , 'success');
			redirect(base_url() , 'refresh');
		}
		else 
		{
			$this->session->set_flashdata('installation_result' , 'failed');
			redirect(base_url().'install' , 'refresh');
		}
	}
	
	// -------------------------------------------------------------------------------------------------
	
	/* 
	 * Database validation check from user input settings
	 */
	
	function checkDBConn()
	{
		$this->mysqli = new mysqli($this->input->post('db_hname'),$this->input->post('db_uname'),$this->input->post('db_password'),$this->input->post('db_name'));
		if(!$this->mysqli)
		{
			$this->mysqli->close();
		 	return false;
		}
		return true;
	}
	
	function mysqli_last_result() {
	    while ($this->mysqli->more_results()) {
	        $this->mysqli->use_result(); 
	        $this->mysqli->next_result();
	    }
	    return $this->mysqli->store_result();
	}
	
}

/* End of file install.php */
/* Location: ./system/application/controllers/install.php */