<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');

class Multilanguage extends CI_Controller
{
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
| WEBSITE:			www.livesoftwaresolution.com
| -----------------------------------------------------
|
| MODULE: 			MULTILANGUAGE
| -----------------------------------------------------
| This is ADMIN module controller file.
| -----------------------------------------------------
*/
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('constant');
		$this->load->model('email_model');
		$this->load->model('crud_model');
		$this->load->helper('multi_language');
		/*cash control*/
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	}
	
	function index()
	{
	}
	
	function select_language($language = 'english')
	{
		$this->session->set_userdata('current_language', $language);
		redirect($this->agent->referrer());
	}
	
	
	
}
