<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sms_model extends CI_Model {
	
	function __construct()
    {
        parent::__construct();
		$api_key = 'oDZDb5GhjMtAt8h3CnTU_23tWAcUfU';
		$senderId	=	$this->db->get_where('smssender' , array('status' => 'active'), 1)->row()->senderid;
    }

	/***custom email sender****/
	function send_template_sms($eTempId=NULL, $table=NULL, $data = array())
	{	
					if($table=='users'){$condField = 'user_id';}else{$condField = 'id';}
					$query = $this->db->get_where($table , array($condField => $data['userId']));
					//echo $this->db->last_query();
					$userData = $query->row();
					//print_r($userData);
					if($userData->name){$username=$userData->name;}else{$username=$userData->fname.' '.$userData->lname;}
				
					$temp = $this->getSmsTemaplate($eTempId);
					if($temp->status=='active'){
					$rest_amt = $data['total']-$data['paid'];							
					$search = array ('{CURRENT_YEAR}', '{DATE}','{systemName}','{systemUrl}','{systemEmail}', '{systemAddress}','{userName}','{userEmail}','{password}','{smsTitle}','{refNo}','{noofsuborder}','{itemName}', '{total}','{ordStatus}','{totalPay}','{paidAmount}','{dueAmount}','{tax}','{discount}','{paymentType}');
		
					$replace=array(date('Y'), date('d M Y'), SYSTEM_NAME, base_url(), SYSTEM_EMAIL, SYSTEM_ADDRESS, ucwords($username),$userData->email,$data['password'], $temp->title, $data['reference_no'], $data['no_of_suborder'], $data['item_name'], $data['inv_total'], $data['ordStatus'],$data['total'],$data['amount'],$rest_amt,$data['total_tax'],$data['inv_discount'],$data['pay_type']);
				
					$body = stripslashes(str_replace($search,$replace,$temp->content));
					//echo $body;die;
					$sms_text = urlencode($body);					
					//Submit to server
					
					if($this->sendSms($userData->mobile, $body))
					{
						return TRUE;
					}
					else {
						return false;
					}
					
				}	
	}
	
	
	function  sendSms($contacts='', $sms_text='')
	{
					$ch = curl_init();
					curl_setopt($ch,CURLOPT_URL, "http://api.otsdc.com/rest/Messages/SendBulk");
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS, "AppSid=".$api_key."&Recipient=".$contacts."&SenderID=".$senderId."&Body=".$sms_text);
					$response = curl_exec($ch);
					curl_close($ch);
					$res = json_decode($response);
					
					if($res->success==TRUE)
					{
						return TRUE;	
					}
					else {
						return FALSE;
					}
	}
	
	function getSmsTemaplate($sTempId=NULL)
	{
		$query = $this->db->get_where('smstemplate' , array('id' => $sTempId, 'status' => 'active'));
		return $query->row();
	}
	
	
}

