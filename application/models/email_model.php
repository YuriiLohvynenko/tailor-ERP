<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email_model extends CI_Model {
	
	function __construct()
    {
        parent::__construct();
		$smtp	=	json_decode($this->db->get_where('settings' , array('type' => 'smtpConfoguration'))->row()->description);
		//print_r($smtp);die;
		$config = array();
        $config['useragent']	= "CodeIgniter";
        $config['mailpath']	 = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
        $config['protocol']	 = "smtp";
        $config['smtp_host']	= $smtp->smtp;
        $config['smtp_port']	= $smtp->port;
		$config['smtp_user'] 	= $smtp->username;
		$config['smtp_pass'] 	= $smtp->password;
        $config['mailtype']	 = 'html';
        $config['charset']	  = 'utf-8';
        $config['newline']	  = "\r\n";
        $config['wordwrap']	 = TRUE;
        $this->load->library('email');
        $this->email->initialize($config);
		$this->email->from(SYSTEM_EMAIL, SYSTEM_NAME);
		$this->email->reply_to(SYSTEM_EMAIL, SYSTEM_NAME);
    }

	/***custom email sender****/
	function do_email($eTempId=NULL, $table=NULL, $data = array())
	{	
		if($table=='users'){$condField = 'user_id';}else{$condField = 'id';}
		$query = $this->db->get_where($table , array($condField => $data['userId']));
		//echo $this->db->last_query();die;
		$userData = $query->row();
		//print_r($userData);
		if($userData->name){$username=$userData->name;}else{$username=$userData->fname.' '.$userData->lname;}
		$this->email->to($userData->email);
		
		$logo = '<a href="'.base_url().'" style="text-align:right !important;">
				<img src="'.$this->crud_model->get_image_url('',SYSTEM_LOGO).'" alt="'.SYSTEM_TITLE.'" class="img-responsive" height="30" width="120"></a>';
		$temp = $this->getEmailTemaplate($eTempId);
		
			$rest_amt = $data['total']-$data['paid'];
				
		$search = array ('{CURRENT_YEAR}', '{systemLogo}','{DATE}','{systemName}','{systemUrl}','{systemEmail}', '{systemAddress}','{userName}','{userEmail}','{password}','{resetLink}', '{emailTitle}','{refNo}','{subOrderNo}','{noofsuborder}','{itemName}', '{total}','{ordStatus}','{totalPay}','{paidAmount}','{dueAmount}','{tax}','{discount}','{paymentType}','{ipAddress}','{loginLocation}','{browser}','{osPlateform}','{timeStamp}');
		
		$replace=array(date('Y'), $logo, date('d M Y'), SYSTEM_NAME, base_url(), SYSTEM_EMAIL, SYSTEM_ADDRESS, ucwords($username),$userData->email,$data['password'], $resetpassword, $temp->title, $data['reference_no'], $data['suborderid'], $data['no_of_suborder'], $data['item_name'], $data['inv_total'], ucwords($data['ordStatus']),$data['total'],$data['amount'],$rest_amt,$data['total_tax'],$data['inv_discount'],$data['pay_type'],$data['ip'],$data['location'],$data['user_agent'],$data['os_plateform'],date("D, d M Y h:i:s A",$data['timestamp']));
		
		for($i=0; $i<count($temp); $i++) {
			$subject = str_replace($search,$replace,$temp->subject);
			$body = stripslashes(str_replace($search,$replace,$temp->content));
			//echo $body;die;
			$this->email->subject($subject);
			$this->email->message($body);
		}
		$this->email->send();
		//echo $this->email->print_debugger();die;
	}
	
	
	function do_bulk_email($data = array())
	{
		/*
		echo "<pre>";
				print_r($data);
				 die;*/
		
		 if($data['c_email']){
			$this->email->to(implode(',',$data['c_email']));
		}
		if($data['bcc']){
			$this->email->bcc($data['bcc']);
		}
		if($data['c_email'])
	  
		if($data['uploads'] ){
			foreach($data['uploads'] as $file)
			$this->email->attach($file);
		}

		$temp = $this->getEmailTemaplate($data['temp']);
		$logo = '<a href="'.base_url().'" style="text-align:right !important;">
				<img src="'.$this->crud_model->get_image_url('',SYSTEM_LOGO).'" alt="'.SYSTEM_TITLE.'" class="img-responsive" height="30" width="120"></a>';
		$temp = $this->getEmailTemaplate($eTempId);
		$search = array ('{CURRENT_YEAR}', '{systemLogo}','{DATE}','{systemName}','{systemUrl}','{systemEmail}', '{systemAddress}', '{emailTitle}');
		$replace=array(date('Y'), $logo, date('d M Y'), SYSTEM_NAME, base_url(), SYSTEM_EMAIL, SYSTEM_ADDRESS,$temp->title);
		
		$subject = str_replace($search,$replace,$data['subject']);
		$body = stripslashes(str_replace($search,$replace,$data['message']));
		//echo $body;die;
		$this->email->subject($subject);
		$this->email->message($body);
		
		
        if($send = $this->email->send())
		{
			foreach($data['uploads'] as $file){
				@unlink($file);
			}
			return $send;
		}
		else {
			return FALSE;
		} 
		//echo $this->email->print_debugger();die;
	}
	
	
	function getEmailTemaplate($eTempId=NULL)
	{
		$query = $this->db->get_where('emailtemplate' , array('id' => $eTempId));
		return $query->row();
	}
	
	
}

