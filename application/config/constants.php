<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

/*
|--------------------------------------------------------------------------
| DATABASE SETTINGS CONSTANTS
|--------------------------------------------------------------------------
*/
	/*
	require_once( BASEPATH .'database/DB'. EXT );
		$db =& DB();define("SYSTEM_NAME", $db->get_where('settings' , array('type'=>'system_name'))->row()->description);
	define("SYSTEM_TITLE", $db->get_where('settings' , array('type'=>'system_title'))->row()->description);
	define("ADDRESS", $db->get_where('settings' , array('type'=>'address'))->row()->description);
	define("PHONE", $db->get_where('settings' , array('type'=>'phone'))->row()->description);
	define("CURRENCY", $db->get_where('settings' , array('type'=>'currency'))->row()->description);
	define("SYSTEM_EMAIL", $db->get_where('settings' , array('type'=>'system_email'))->row()->description);
	define("SYSTEM_LOGO", $db->get_where('settings' , array('type'=>'system_logo'))->row()->description);
	define("LANGUAGE", $db->get_where('settings' , array('type'=>'language'))->row()->description);
	define("THEME", $db->get_where('settings' , array('type'=>'theme'))->row()->description);
	define("PURCHASE_PREFIX", $db->get_where('settings' , array('type'=>'purchase_prefix'))->row()->description);
	define("ORDER_PREFIX", $db->get_where('settings' , array('type'=>'order_prefix'))->row()->description);
	define("INVOICE_PREFIX", $db->get_where('settings' , array('type'=>'invoice_prefix'))->row()->description);
	define("DEFAULT_TAX", $db->get_where('settings' , array('type'=>'default_tax_rate'))->row()->description);
	define("DEFAULT_TAX2", $db->get_where('settings' , array('type'=>'default_tax_rate2'))->row()->description);
	define("TAX1", $db->get_where('settings' , array('type'=>'tax1'))->row()->description);
	define("TAX2", $db->get_where('settings' , array('type'=>'tax2'))->row()->description);
	define("TOTAL_ROWS", $db->get_where('settings' , array('type'=>'total_rows'))->row()->description);
	
	$ddf = $db->get_where('settings' , array('type'=>'dateformat'))->row()->description;
	
	if($df = $db->get_where('date_format' , array('id'=>$ddf))->row()) {
		define("JS_DATE", $df->js);
		define("PHP_DATE", $df->php);
		define("MYSQL_DATE", $df->sql);
	} else {
		define("JS_DATE", 'mm-dd-yyyy');
		define("PHP_DATE", 'm-d-Y');
		define("MYSQL_DATE", '%m-%d-%Y');
	}
	define("DEFAULT_DISCOUNT", $db->get_where('settings' , array('type'=>'default_discount'))->row()->description);
	define("DISCOUNT_OPTION", $db->get_where('settings' , array('type'=>'discount_option'))->row()->description);
	define("DISCOUNT_METHOD", $db->get_where('settings' , array('type'=>'discount_method'))->row()->description);
	define("DEFAULT_BONUS", $db->get_where('settings' , array('type'=>'default_bonus'))->row()->description);*/
	

	
/* ORDER PAGE SETTINGS CONSTANT */
	/*
	if($ordlimit = $db->get_where('order_settings' , array('type'=>'order_limit'))->row()->description){
			define("ORDER_LIMIT", $ordlimit);
		}else{
			define("ORDER_LIMIT", 200);
		}
		
		define("DTIME", $db->get_where('order_settings' , array('type'=>'display_time'))->row()->description);
		define("DCUSTOMER", $db->get_where('order_settings' , array('type'=>'default_customer'))->row()->description);*/
	
	
	

/* End of file constants.php */
/* Location: ./application/config/constants.php */