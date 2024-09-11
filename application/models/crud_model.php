<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud_model extends CI_Model {

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
| MODEL: 			CRUD_MODEL
| -----------------------------------------------------
| This is MODEL file.
| -----------------------------------------------------
*/
	
	function __construct()
    {
        parent::__construct();
    }
	
	function get_rowValue_by_id($table,$type_id='')
	{
		return $this->db->get_where($table,array('id'=>$type_id),1)->row();	
	}
	
	
	function get_rowValue_by_CustomField($table,$cnd = '', $type_id='')
	{
		return $this->db->get_where($table,array($cnd=>$type_id),1)->row();	
	}
	
	
	function get_value_by_id($table,$type_id='',$field='')
	{
		return $this->db->get_where($table,array('id'=>$type_id))->row()->$field;	
	}
	
	function value_by_id($table,$cnd='',$type_id='',$field='')
	{
		 return $this->db->get_where($table,array($cnd => $type_id))->row()->$field;	
	}
	
	function get_calendar_data($year, $month) {
		
            /*if(CAL_OPT) {
                $query = $this->db->select('date, data')->from('calendar')->like('date', "$year-$month", 'after')->where('user_id', USER_ID)->get();
            } else {*/
                $query = $this->db->select('date, data')->from('calendar')->like('date', "$year-$month", 'after')->get();
            /*}*/
			
		$cal_data = array();

		foreach ($query->result() as $row) {
			$day = (int)substr($row->date,8,2);
			$cal_data[$day] = str_replace("|", "<br>", html_entity_decode($row->data));
		}
		
		return $cal_data;
		
	}
	
	function create_log($data)
	{
		$data['user_id']	=	$data['user_id'];
		$data['timestamp']	=	strtotime(date('Y-m-d').' '.date('H:i:s'));
		$data['ip']			=	$_SERVER["REMOTE_ADDR"];
		//$location 			=	new SimpleXMLElement(file_get_contents('http://freegeoip.net/xml/'.$_SERVER["REMOTE_ADDR"]));
		$location =  json_decode(file_get_contents('http://www.geoplugin.net/json.gp?ip='.$_SERVER['REMOTE_ADDR']));
		$data['location']	=	$location->geoplugin_city.' , '.$location->geoplugin_regionName.' , '.$location->geoplugin_countryName;
		$user_agent = $this->getUserAgent();
		$data['user_agent'] = $user_agent['browser'];
		$data['os_plateform'] = $user_agent['os']; 
		if(!$this->db->insert('log' , $data))
		{
			return false;
		}
		return $data;
	}
	
	function getUserAgent()
	{
			if ($this->agent->is_browser())
			{
			    $agent = $this->agent->browser().' '.$this->agent->version();
			}
			elseif ($this->agent->is_robot())
			{
			    $agent = $this->agent->robot();
			}
			elseif ($this->agent->is_mobile())
			{
			    $agent = $this->agent->mobile();
			}
			else
			{
			    $agent = 'Unidentified User Agent';
			}
			
			return array("browser" => $agent, "os" =>$this->agent->platform());
	}
	/*-----------------------GET LOG HISTORY-----*/
	function get_logs($data="")
	{
		  $this->db->select('*');
		  if($data){
		  	$this->db->where('user_id', $data);
		  }
		  $this->db->order_by("log_id", "DESC"); 
		  $q = $this->db->get("log");
		  if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$datas[] = $row;
			}
				
			return $datas; 
		}
	}
	
	function get_system_settings()
	{
		$query	=	$this->db->get('settings' );
		return $query->result_array();
	}
	
	////////BACKUP RESTORE/////////
	function create_backup($type)
	{
		$this->load->dbutil();
		
		
		$options = array(
                'format'      => 'txt',             // gzip, zip, txt
                'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file
                'add_insert'  => TRUE,              // Whether to add INSERT data to backup file
                'newline'     => "\n"               // Newline character used in backup file
              );
		
		 
		if($type == 'all')
		{
			$tables = array('');
			$file_name	=	'system_backup';
		}
		else 
		{
			$tables = array('tables'	=>	array($type));
			$file_name	=	'backup_'.$type;
		}

		$backup =& $this->dbutil->backup(array_merge($options , $tables)); 


		$this->load->helper('download');
		force_download($file_name.'.sql', $backup);
	}
	
	
	/////////RESTORE TOTAL DB/ DB TABLE FROM UPLOADED BACKUP SQL FILE//////////
	function restore_backup()
	{
		move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/backup.sql');
		$this->load->dbutil();
		
		
		$prefs = array(
            'filepath'						=> 'uploads/backup.sql',
			'delete_after_upload'			=> TRUE,
			'delimiter'						=> ';'
        );
		$restore =& $this->dbutil->restore($prefs); 
		unlink($prefs['filepath']);
	}
	
	/////////DELETE DATA FROM TABLES///////////////
	function truncate($type)
	{
		if($type == 'all')
		{
			$this->db->truncate('employees');
			$this->db->truncate('noticeboard');
			$this->db->truncate('customers');
			$this->db->truncate('orders');
			$this->db->truncate('order_items');
			$this->db->truncate('pattern');
			$this->db->truncate('products');
			$this->db->truncate('purchases');
			$this->db->truncate('purchase_items');
		}
		else
		{	
			$this->db->truncate($type);
		}
	}
	
	
	////////IMAGE URL//////////
	function get_image_url($type = '' , $id = '')
	{
		$dir='';
		if($type)
		{
			$dir = $type.'_image/';	
		}
		if(file_exists('uploads/'.$dir.$id))
			$image_url	=	base_url().'uploads/'.$dir.$id;
		else
			$image_url	=	base_url().'uploads/img_not_found.gif';
			
		return $image_url;
	}
	
	
	/*----------------RECURSIVE FOR BRANCHES----------------*/
	function fetchClothTypeTree($parent='0',$spacing='',$user_tree_array='') 	
	{
	  if (!is_array($user_tree_array))
		$user_tree_array = array();
	  
	  $this->db->select('id, title, parent_cloth_type`');
	  $this->db->from('cloth_types');
	  $this->db->where('parent_cloth_type', $parent);
	  $this->db->order_by("id", "ASC"); 
	  $query = $this->db->get();
	   
	  if ($query->num_rows() > 0) {
		foreach  ($query->result() as $rows) {
		  $user_tree_array[] = array("id" => $rows->id, "title" => $spacing . $rows->title);
		  $user_tree_array = $this->fetchClothTypeTree($rows->id, $spacing . '> ', $user_tree_array);
		}
	  }
	  return $user_tree_array;
	}
	
	/*----------------GET STATE LIST----------------*/
	function get_State_List($param='') 	
	{
	  $query	=	$this->db->get_where('states' , array('country_id' => $param));
	  $states = $query->result_array();
	  return $states;
	}
	
	/*----------------GET Subcategory LIST----------------*/
	function get_Subcategory_List($param='') 	
	{
	  $query	=	$this->db->get_where('subcategories' , array('category_id' => $param));
	  //echo $this->db->last_query();
	  $results = $query->result_array();
	  return $results;
	}
	
	/*----------------GET ROLES LIST----------------*/
	function getRolesList() 	
	{
	  $roles	=	$this->db->get('roles')->result_array();
	  return $roles;
	}
	
	/*----------------GET ALL ROWS LIST----------------*/
	function get_All_List($table='',$cnd='',$param='') 	
	{
	  $query   = $this->db->get_where($table , array($cnd => $param));
	  $results = $query->result_array();
	  return $results;
	}
	
	/*----------------GET ALL ROWS LIST----------------*/
	function get_All_List_orderBy($table='',$cnd='',$param='',$order='',$by='',$limit=NULL) 	
	{
	  if($cnd){$excnd = explode(',',$cnd);}
	  if($param){$exparam = explode(',',$param);}
	  foreach($excnd as $k => $c)
	  {
		$cond[$c] = $exparam[$k];  
	  }
	  if($limit!='')
	  {
	   	$this->db->limit($limit);
	  }
	  $query = $this->db->order_by($order, $by)->get_where($table , $cond);
	  $results = $query->result_array();
	  return $results;
	}
	
	/*----------------GET ALL ROWS LIST----------------*/
	function get_All_table_List($table='') 	
	{
	  $query   = $this->db->get_where($table);
	  $results = $query->result_array();
	  return $results;
	}
	
	/*----------------GET ALL SHIFT LIST----------------*/
	function get_All_shift_List() 	
	{
	  $this->db->select('shifts.id,shifts.title as shift_title,shifts.branch_id,branches.title');
	  $this->db->from('shifts');
	  $this->db->join('branches', 'shifts.branch_id = branches.id');
	  $query = $this->db->get();
	  $results = $query->result_array();
	  return $results;
	}
	
	/*----------------COUNT ALL RECORD----------------*/
	function count_all_record($table='') 	
	{
	  $this->db->from($table);
	  $query = $this->db->get();
	  $results = $query->num_rows();
	  return $results;
	}
	
	/*----------------Return all dates between two dates----------------*/
	public function date_range($first, $last, $step = '+1 day', $output_format = 'Y-m-d' ) 
	{
		$dates = array();
		$current = strtotime($first);
		$last = strtotime($last);
	
		while( $current <= $last ) {
	
			$dates[] = date($output_format, $current);
			$current = strtotime($step, $current);
		}
	
		return $dates;
	}
	
	/*----------------GET MAX ID FROM TABLE----------------*/
	public function get_Max_ID($table='', $param1='', $param2='') 
	{
		$this->db->select_max($param1, $param2);
		$result = $this->db->get($table)->row();
		return $result->$param2;
	}
	
	/*--------- CALCULATION TAX DEDUCTION ----------------*/
	public function get_Tax_Deduction($salary='', $taxid='', $value = '0')
	{
	   $this->db->select('*');
	   $this->db->from('taxslots');
	   $this->db->where("(start <= '$salary' AND end >= '$salary')");
	   $this->db->where("tax_id = '$taxid'");
	   $result = $this->db->get()->result_array();
	   if(!empty($result))
	   {
		  foreach($result as $res)
		  {
			 if($res['tax_type']=='percentage')
			 {
				$value = ($salary*$res['tax_value'])/100;
			 }
			 elseif($res['tax_type']=='fixed')
			 {
				$value = $res['tax_value'];	 
			 }  
		  } 
	   }
	   //echo $value;
	   return $value;
	}
	
	/*----------------GET ALL EMAIL TEMPLATES LIST----------------*/
	public function get_emailTemp_Type_List() 	
	{
	   $this->db->select('type');
	   $this->db->from('emailtemplate');
	   $this->db->where("type != ''");
	   $this->db->group_by("type");
	   $results = $this->db->get()->result_array();
	  return $results;
	}
	
	/*----------------GET ALL EMAIL TEMPLATES LIST----------------*/
	public function get_emailTemp_Title_List($type='') 	
	{
	   $this->db->select('id,type,title');
	   $this->db->from('emailtemplate');
	   $this->db->where("type = '$type'");
	   $results = $this->db->get()->result_array();
	 //echo $this->db->last_query();die;
	  return $results;
	}
	
	
	/*----------------GET ALL EMAIL TEMPLATES LIST----------------*/
	public function getProductNames($term)
    {
	   	$this->db->select('name')->limit('10');
	    $this->db->like('name', $term, 'both');
   		$q = $this->db->get('products');
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}
				
			return $data; 
		}
    }
	/*----------------GET Product BY Name----------------*/
	public function getProductByName($name)
	{
		$q = $this->db->get_where('products', array('name' => $name), 1); 
		  if( $q->num_rows() > 0 )
		  {
			return $q->row();
		  } 
		
		  return FALSE;

	}
	/*----------------GET Product CODES----------------*/
	public function getProductCodes($term)
    {
	   	$this->db->select('code');
	    $this->db->like('code', $term, 'both')->limit('10');
   		$q = $this->db->get('products');
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}
				
			return $data; 
		}
    }
	/*----------------GET Product BY CODE----------------*/
	public function getProductByCode($code) 
	{

		$q = $this->db->get_where('products', array('code' => $code), 1); 
		  if( $q->num_rows() > 0 )
		  {
			return $q->row();
		  } 
		
		  return FALSE;

	}
	/*----------------GET NEXT REFERENCE NUMBER----------------*/
	public function getNextREF($table=NULL,$ref=NULL) 
	{
		$this->db->select_max('id');
		$q = $this->db->get($table);
		if( $q->num_rows() > 0 )
		  {
			$row = $q->row();
			return $ref."-".date('Y').($row->id+1);
		  } 
		return FALSE;
	}
	/*----------------DATE FORMAT----------------*/
	public function dateFormat($inv_date)
	{
            if(JS_DATE == 'dd-mm-yyyy' || JS_DATE == 'mm/dd/yyyy' || JS_DATE == 'dd/mm/yyyy' || JS_DATE == 'dd.mm.yyyy') {
                    $date = substr($inv_date, -4)."-".substr($inv_date, 3, 2)."-".substr($inv_date, 0, 2); 
            } elseif(JS_DATE == 'mm-dd-yyyy' || JS_DATE == 'mm/dd/yyyy' || JS_DATE == 'mm.dd.yyyy') {
                    $date = substr($inv_date, -4)."-".substr($inv_date, 0, 2)."-".substr($inv_date, 3, 2);
            } else {
                $date = $inv_date;
            }
            return $date;
    }
	/*----------------MONEY FORMAT----------------*/
	public function formatMoney($number, $fractional=TRUE) 
	{ 
		if ($fractional) { 
			$number = sprintf('%.2f', $number); 
		} 
		while (true) { 
			$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number); 
			if ($replaced != $number) { 
				$number = $replaced; 
			} else { 
				break; 
			} 
		} 
		return $number; 
	}
	
	/*----------------DATE FORMAT----------------*/
	
	public function clear_tags($str)
	{
		return htmlentities(strip_tags($str, '<code><span><div><label><a><br><p><b><i><del><strike><u><img><video><audio><iframe><object><embed><param><blockquote><mark><cite><small><ul><ol><li><hr><dl><dt><dd><sup><sub><big><pre><code><figure><figcaption><strong><em><table><tr><td><th><tbody><thead><tfoot><h3><h4><h5><h6>'));
	}
	
	/*----------------ADD PURCHASE----------------*/
	public function npQTY($product_id, $quantity, $unit_price, $pur_type) 
	{
		if($pur_type=="cloth"){$table = 'cloth_products';}
		else{{$table = 'products';}}
		$prD = $this->get_rowValue_by_id($table,$product_id);
		$nQTY = $prD->quantity + $quantity;
		$this->db->update($table, array('quantity' => $nQTY, 'cost' => $unit_price), array('id' => $product_id));
	}
	
	public function addPurchase($pdata, $items = array())
	{
		// purchase data
		$purchseData = array(
			'reference_no'			=> $pdata['reference_no'],
		    'supplier_id'			=> $pdata['supplier_id'],
			'supplier_name'			=> $pdata['supplier_name'],
			'date'					=> $pdata['date'],
			'note'	  	 			=> $pdata['note'],
			'purchase_type' 		=> $pdata['pur_type'],
			'total_tax'	  	 	    => $pdata['total_tax'],
			'inv_total'				=> $pdata['inv_total'],
			'total'					=> $pdata['total'],
			'user'					=> $this->session->userdata('name')
		);
		
		if($this->db->insert('purchases', $purchseData)) {
			$purchase_id = $this->db->insert_id();
			
			foreach($items as $data){
				$this->npQTY($data['product_id'], $data['quantity'], $data['unit_price'],$pdata['pur_type']);
			}
		
			$addOn = array('purchase_id' => $purchase_id);
					end($addOn);
					foreach ( $items as &$var ) {
						$var = array_merge($addOn, $var);
			}
				
			if($this->db->insert_batch('purchase_items', $items)) {
				return true;
			}
		}
		return false;
	}
	
	public function upQTY($product_id, $quantity, $pur_type) 
	{
		if($pur_type=="cloth"){$table = 'cloth_products';}
		else{{$table = 'products';}}
		$prD = $this->get_rowValue_by_id($table,$product_id);
		$nQTY = $prD->quantity - $quantity;
		$this->db->update($table, array('quantity' => $nQTY), array('id' => $product_id));
	}
	
	public function updatePurchase($id, $pdata, $items = array())
	{
		$old_items = $this->get_All_List_orderBy('purchase_items','purchase_id',$id,'id','asc');
		$old_inv = $this->get_rowValue_by_id('purchases',$id);
		
		foreach($old_items as $data){
			$item_id = $data->id;
			$item_details = $this->get_rowValue_by_id('purchase_items',$item_id);
			$item_qiantity = $item_details->quantity;
			$product_id = $data->product_id;
			$this->upQTY($product_id, $item_qiantity, $pdata['pur_type']);
		}
		
		$purchseData = array(
			'reference_no'			=> $pdata['reference_no'],
		    'supplier_id'			=> $pdata['supplier_id'],
			'supplier_name'			=> $pdata['supplier_name'],
			'date'					=> $pdata['date'],
			'note'	  	 			=> $pdata['note'],
			'purchase_type' 		=> $pdata['pur_type'],
			'total_tax'	  	 		=> $pdata['total_tax'],
			'inv_total'				=> $pdata['inv_total'],
			'total'					=> $pdata['total'],
			'updated_by'			 => $this->session->userdata('name')
		);

		
		$this->db->where('id', $id);
		if($this->db->update('purchases', $purchseData) && $this->db->delete('purchase_items', array('purchase_id' => $id))) {
			
			foreach($items as $data){
				$this->npQTY($data['product_id'], $data['quantity'],$data['unit_price'],$pdata['pur_type']);
			}
						
			$addOn = array('purchase_id' => $id);
				end($addOn);
				foreach ( $items as &$var ) {
						$var = array_merge($addOn, $var);
				}
		
		
			if($this->db->insert_batch('purchase_items', $items)) {
				return true;
			}
		

	}
	
		return false;
	}
	
	/*----------------GET ALL CLOTH TYPE LIST----------------*/
	public function get_cloth_Type_List() 	
	{
	   $this->db->select('id,title');
	   $this->db->from('cloth_types');
	   $this->db->where("parent_cloth_type = '0'");
	   $this->db->group_by("parent_cloth_type");
	   $results = $this->db->get()->result_array();
	   return $results;
	}
	
	/*----------------GET ALL CLOTH SUBTYPE LIST----------------*/
	public function get_cloth_subType_List($parent_cloth_type='') 	
	{
	   $this->db->select('id,parent_cloth_type,title');
	   $this->db->from('cloth_types');
	   $this->db->where("parent_cloth_type = '$parent_cloth_type'");
	   $results = $this->db->get()->result_array();
	 //echo $this->db->last_query();die;
	  return $results;
	}
	/*----------------GET CALENDAR LIST----------------*/
	public function getEvents($param=NULL) 
	{
		if($param=='calendar')
		{
			$this->db->where('date !=', '')->order_by('date');
		}
		else {
			$dt = date('Y-m-d');
		    $this->db->where('date >=', $dt)->order_by('date','DESC')->limit(5);
		}
		
		$q = $this->db->get('calendar'); 
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}				
			return $data;
		}

	}
	
	public function addEvnets($data = NULL){
		 if($data)
		 {
		 	$res = $this->db->insert('calendar' , $data);
			if($res){
				return true;
			}
			else{
				return false;
			}	
		 }
	}
	
	/*------------------GET New Customer of this Year--------------------*/
    public  function getNewCustomer()
    {
        $this->db->select("*");      
		$this->db->where('EXTRACT(YEAR FROM reg_date) =', date("Y"));
        $this->db->where('status','active');
        $q = $this->db->get('customers');
      // $d= $q->result();
     //echo $this->db->last_query();die;
        if($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }
	
	/*------------------GET Active Customer--------------------*/
    public  function getActiveCustomer()
    {
        $this->db->select("customers.id");  
		$this->db->group_by('customers.id');
		$this->db->where('EXTRACT(YEAR FROM orders.date) =', date("Y"));
        $this->db->where('customers.status','active');		
        $this->db->join('orders', 'orders.customer_id = customers.id');
        $q = $this->db->get('customers');
      //$d= $q->result();
     //echo $this->db->last_query();die;
        if($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }
	
}

