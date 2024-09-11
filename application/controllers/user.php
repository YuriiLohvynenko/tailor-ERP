<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user extends CI_Controller {
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
| MODULE: 			USER
| -----------------------------------------------------
| This is ADMIN module controller file.
| -----------------------------------------------------
*/
	function __construct(){
		
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->library('session');
		$this->load->library('mylib');
		
		if(!$this->session->userdata('userId') || $this->session->userdata('type') != 'user' ){
		
			$this->session->set_flashdata('msg', 'login again');
			redirect('home', 'refresh');
		}
}

	public function index(){
		
		$user = $this->session->userdata('name');
		$params ="user=$user";
		
		$this->mylib->setMethod('accountsummary');
		$this->mylib->setParameters($params);
		$request = $this->mylib->response();
		$data['result'] = $request['metadata']['result'];
		
		//echo "<pre>";print_r($request);die;
		$this->load->view('home/header', $data);
		$this->load->view('user/dashboard', $data);
	}
	
	public function myaccount(){
		
		$user = $this->session->userdata('name');
		$params ="user=$user";
		
		$this->mylib->setMethod('accountsummary');
		$this->mylib->setParameters($params);
		$request = $this->mylib->response();
		$data['crul'] = $request['data']['acct'];
		
		//echo "<pre>";print_r($request);die;
		$this->load->view('home/header');
		$this->load->view('user/myaccount', $data);
	}
	
	public function change_password(){
		
		$this->load->view('home/header');
		$this->load->view('user/change_password');
	}
	
	public function changed_password(){
		
		$user = $this->session->userdata('name');
		$pass = $this->input->post('pass');
		$params ="user=$user&password=$pass";
		
		$this->mylib->setMethod('passwd');
		$this->mylib->setParameters($params);
		$request = $this->mylib->response();
		
		if($request['metadata']['result'] == '1')
		{
			$sql = "update ".USER." SET pass= '".$pass."' where user='".$user."' ";
			$this->db->query($sql);
		}
		
		$this->session->set_flashdata('msg',  $request['metadata']['reason'] );
		redirect('user/change_password/', 'refresh');;
	}
	
	public function template(){
		
		$query = $this->db->query("SELECT * FROM ".TEMP." ");
		
		foreach ($query->result_array() as $key => $value)
		{
			$data['row'][$key] = $value;
		}
		//echo "<pre>";print_r($data);die;
		$this->load->view('home/header');
		$this->load->view('user/template', $data);
	}
	
	
	public function temp_instal(){
		
		$tempId = $this->input->post('user');
		$user = $this->session->userdata('name');
		$pass = $this->session->userdata('user_pass');
		
		$params ="user=$user";
		
		$this->mylib->setMethod('accountsummary');
		$this->mylib->setParameters($params);
		$request = $this->mylib->response();
		if($request['metadata']['result'] == '1' )
		{
			$query = $this->db->query("SELECT * FROM ".TEMP." where id = '".$tempId."' ");
			$row = $query->row_array();
			
			set_time_limit(0);
	
			$file = 'template/'.$row['file'];
			$remote_file = 'setup.zip';
		
			$ftp_server = $request['data']['acct'][0]['domain'];
			$ftp_user_name = $request['data']['acct'][0]['user'];
			$ftp_user_pass = $pass;
		
		
			$conn_id = ftp_connect($ftp_server);
			@$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
		
			if( $login_result ) {
				
				$final = 'public_html/'.$remote_file; 
				$upload1 = ftp_put($conn_id, $final, $file, FTP_BINARY); 
				$upload2 = ftp_put($conn_id, 'public_html/setup.php', 'template/setup.php', FTP_BINARY);
				
				if( $upload1 )
				{
					ftp_chmod($conn_id, 0777, $final);
					ftp_close($conn_id);
					//
					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, "$ftp_server/setup.php");
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
					curl_setopt($ch, CURLOPT_HEADER, FALSE);
					$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
					$response = curl_exec($ch);
					$this->session->set_flashdata('succ', 'template install successfully');
					redirect('user/index/', 'refresh');;
				}
			}
			else {
					$this->session->set_flashdata('msg', 'error server is not connecting. try again');
					redirect('user/index/', 'refresh');;
			}
		}
		
	}
	
}
