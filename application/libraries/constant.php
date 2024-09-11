<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
| CLASS: 			CONTSTANT
| -----------------------------------------------------
| This is site settings constant file.
| -----------------------------------------------------
*/
class Constant {
	
	function __construct() {
		$CI =& get_instance();
		
/*
|--------------------------------------------------------------------------
| DATABASE SETTINGS CONSTANTS
|--------------------------------------------------------------------------
*/
				define("SYSTEM_NAME", $CI->db->get_where('settings' , array('type'=>'system_name'))->row()->description);
				define("SYSTEM_TITLE", $CI->db->get_where('settings' , array('type'=>'system_title'))->row()->description);
				define("ADDRESS", $CI->db->get_where('settings' , array('type'=>'address'))->row()->description);
				define("PHONE", $CI->db->get_where('settings' , array('type'=>'phone'))->row()->description);
				define("CURRENCY", $CI->db->get_where('settings' , array('type'=>'currency'))->row()->description);
				define("SYSTEM_EMAIL", $CI->db->get_where('settings' , array('type'=>'system_email'))->row()->description);
				define("SYSTEM_LOGO", $CI->db->get_where('settings' , array('type'=>'system_logo'))->row()->description);
				define("LANGUAGE", $CI->db->get_where('settings' , array('type'=>'language'))->row()->description);
				define("THEME", $CI->db->get_where('settings' , array('type'=>'theme'))->row()->description);
				define("PURCHASE_PREFIX", $CI->db->get_where('settings' , array('type'=>'purchase_prefix'))->row()->description);
				define("ORDER_PREFIX", $CI->db->get_where('settings' , array('type'=>'order_prefix'))->row()->description);
				define("INVOICE_PREFIX", $CI->db->get_where('settings' , array('type'=>'invoice_prefix'))->row()->description);
				define("DEFAULT_TAX", $CI->db->get_where('settings' , array('type'=>'default_tax_rate'))->row()->description);
				define("DEFAULT_TAX2", $CI->db->get_where('settings' , array('type'=>'default_tax_rate2'))->row()->description);
				define("TAX1", $CI->db->get_where('settings' , array('type'=>'tax1'))->row()->description);
				define("TAX2", $CI->db->get_where('settings' , array('type'=>'tax2'))->row()->description);
				define("TOTAL_ROWS", $CI->db->get_where('settings' , array('type'=>'total_rows'))->row()->description);
				
				$ddf = $CI->db->get_where('settings' , array('type'=>'dateformat'))->row()->description;
				
				if($df = $CI->db->get_where('date_format' , array('id'=>$ddf))->row()) {
					define("JS_DATE", $df->js);
					define("PHP_DATE", $df->php);
					define("MYSQL_DATE", $df->sql);
				} else {
					define("JS_DATE", 'mm-dd-yyyy');
					define("PHP_DATE", 'm-d-Y');
					define("MYSQL_DATE", '%m-%d-%Y');
				}
				define("DEFAULT_DISCOUNT", $CI->db->get_where('settings' , array('type'=>'default_discount'))->row()->description);
				define("DISCOUNT_OPTION", $CI->db->get_where('settings' , array('type'=>'discount_option'))->row()->description);
				define("DISCOUNT_METHOD", $CI->db->get_where('settings' , array('type'=>'discount_method'))->row()->description);
				define("DEFAULT_BONUS", $CI->db->get_where('settings' , array('type'=>'default_bonus'))->row()->description);
				
			
				
			/* ORDER PAGE SETTINGS CONSTANT */
				if($ordlimit = $CI->db->get_where('order_settings' , array('type'=>'order_limit'))->row()->description){
					define("ORDER_LIMIT", $ordlimit);
				}else{
					define("ORDER_LIMIT", 200);
				}
				
				define("DTIME", $CI->db->get_where('order_settings' , array('type'=>'display_time'))->row()->description);
				define("DCUSTOMER", $CI->db->get_where('order_settings' , array('type'=>'default_customer'))->row()->description);
	}
}

/* End of file constant.php */
/* Location: ./application/libraries/constant.php */