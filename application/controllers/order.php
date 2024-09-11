<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class order extends CI_Controller {

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
| MODULE: 			ORDER
| -----------------------------------------------------
| This is ADMIN module controller file.
| -----------------------------------------------------
*/

	function __construct(){
		parent::__construct();
		$this->load->library('constant');
		$this->load->model('email_model');
		$this->load->model('crud_model');
		$this->load->helper('multi_language');
		if(!$this->session->userdata('user_id') && $this->session->userdata('roles') != 'admin' ){
			$this->session->set_flashdata('flash_message', get_phrase('log_again'));
			redirect('home', 'refresh');
		}
		$this->load->model('order_model');
	}

	public function index(){
		if(!$this->session->userdata('user_id') && $this->session->userdata('roles') != 'admin' ){
			$this->session->set_flashdata('flash_message', get_phrase('log_again'));
			redirect('home', 'refresh');
		}
		if($this->input->post('reference_no')){
		$page_data['order_date']  = $this->input->post('order_date');
		$page_data['reference_no']  = $this->input->post('reference_no');
		$page_data['trial_date']  = $this->input->post('trial_date');
		$page_data['delivery_date']  = $this->input->post('delivery_date');
		$page_data['customers']  = $this->db->get_where('customers', array('id' => $this->input->post('customer')))->result_array();
		
		$this->db->where("quantity IS NOT NULL");
		$page_data['clothes']  = $this->db->get('cloth_products')->result_array();
		$page_data['page_name']  = 'sub_order';
        $page_data['page_title'] = get_phrase('new').' '.get_phrase('order');
        $this->load->view('admin/sub_order', $page_data);
		}
		else
		{
			$this->session->set_flashdata('flash_message', get_phrase('direct_access_not_allowed'));
		    redirect($this->agent->referrer(), 'refresh');	
		}
	}
	
	
	/*---------AJAX PRODUCT------------------*/
	public function ajaxproducts()
	{
	   $gender = $this->input->post('gender'); 
       $products=$this->db->get_where('stitching' , array('gender' => $gender, 'status' => 'active'))->result_array();
		if(!empty($products)){
			foreach($products as $product) {
				echo "<div class=\"col-md-3\">
				<button id=\"prodbtn\" type=\"button\" value='".$product['id']."' class=\"btn btn-grey btn-icon input-block-level\" >".$product['item']."</button></div>";
			}
		}else
		{
			echo "no";	
		}
   }
   
   /*---------AJAX PATTERNS------------------*/
	public function ajaxpatterns()
	{
	    $itemId = $this->input->post('itemId'); 
        $patterns=$this->db->get_where('pattern' , array('item_id' => $itemId, 'status' => 'active'))->result_array();
		if(!empty($patterns)){
			foreach($patterns as $pattern) {
				echo "<div class=\"col-md-3\">
				<button id=\"patternbtn\" type=\"button\" value='".$pattern['id']."' class=\"btn btn-grey btn-icon input-block-level\" >".$pattern['pattern']."</button></div>";
			}
		}else{
			echo 'no';
		}
   }
   
   /*---------AJAX STYLES------------------*/
	public function ajaxstyles()
	{
	    $patternID = $this->input->post('patternID'); 
        $styles=$this->db->get_where('style' , array('pattern_id' => $patternID, 'status' => 'active'))->result_array();
		if(!empty($styles)){
			foreach($styles as $style) {
				echo "<div class=\"col-md-3\">
				<button id=\"stylebtn\" type=\"button\" value='".$style['id']."' class=\"btn btn-grey btn-icon input-block-level\" >".$style['style']."</button></div>";
			}
		}else{
			echo 'no';
		}
    }
	
	
   /*---------AJAX MEASUREMENT------------------*/
	public function ajaxmeasurement()
	{
		//echo "<pre>";
	    $styleID = $this->input->post('styleID'); 
        $measurements=$this->db->get_where('measurement' , array('style_id' => $styleID, 'status' => 'active'))->result_array();
       
		$custID = $this->input->post('cust_id'); 
		$prdID = $this->input->post('prdID'); 
		$patternID = $this->input->post('patternID'); 
		
        if(!empty($custID) && !empty($styleID) && !empty($prdID) && !empty($patternID))
        {
			
			$cust_measurement = (array)$this->order_model->getCustomerMeasurement($custID,$prdID,$patternID,$styleID);
			$cms = (array)json_decode($cust_measurement['measurement']);
			if(!empty($cms))
			{							
				$ckeys 		= @array_keys($cms);
				$cvalues 	= @array_values($cms);
				$merarr = array()		;
				foreach($ckeys as $k => $v)
				{
					if($v==$measurements[$k]['id'])
					{
						$carr = array('cust_measurement'=>$cvalues[$k]);
						$merarr[] = @array_merge($measurements[$k],$carr);
						
					}										
				}
				$measurements = $merarr;
								
			}
			
		}
		//echo "<pre>";
		//print_r($measurements);
		echo json_encode($measurements);
	
    }
	
	/*---------AJAX FABRIC PRODUCTS------------------*/
	public function ajaxFabricProducts()
	{
        $cloth_products=$this->db->get_where('cloth_products' , array('status' => 'active'))->result_array();
		echo json_encode($cloth_products);
    }
	
	
   
   
	/*---------ORDER MODULE------------------*/
	public function add()
	{
		$postData = (array)json_decode($this->input->post('data'));
		$numberOfsubOrder = count($postData);
	//	echo "<pre>";
		
		foreach($postData as $k => $data)
		{
			$cloth_details = '';
			$cloth_types   = '';
			$cloth_styles  = '';
			if($data->cloth_length && $data->payment) {
				if($data->cloth_id!='0') {
                    $cloth_details = $this->crud_model->get_rowValue_by_id('cloth_products', $data->cloth_id);
                    $cloth_types = $this->crud_model->get_rowValue_by_id('cloth_types', $cloth_details->cloth_type_id);
                    $cloth_styles = $this->crud_model->get_rowValue_by_id('cloth_styles', $cloth_details->cloth_style_id);				
                }
			
				/*if(TAX1==1){
					$tax_details = $this->crud_model->get_rowValue_by_id('tax_rates',DEFAULT_TAX); 
					$taxRate = $tax_details->rate;
					$taxType = $tax_details->type;	
					$tax_rate_id[] = $tax_id;	
					
					if($taxType == 1 && $taxRate != 0) {
					$item_tax = (($data->cloth_length) * ($cloth_details->price) * $taxRate / 100);
					$val_tax[] = $item_tax;
					} else {
					$item_tax = $taxRate;	
					$val_tax[] = $item_tax;
					}
					
					if($taxType == 1) { $tax[] = $taxRate."%"; } else { $tax[] = $taxRate;  }			
				} 
				else {
					$item_tax = 0;
					$tax_rate_id[] = 0;
					$val_tax[] = 0;
					$tax[] = "";
				}*/
				
                $clothPrice = ($cloth_details->price) ? ($cloth_details->price*$data->cloth_length) : 0;
				$cloth_id[] 	= ($cloth_details->id) ? $cloth_details->id :$data->cloth_id;
				$cloth_length[] = $data->cloth_length;
				$cloth_style[]  = ($cloth_styles->title) ? $cloth_styles->title : '';
				$cloth_type[] 	= ($cloth_types->title) ? $cloth_types->title : '';
				$cloth_unit[] 	= ($cloth_details->unit) ? $cloth_details->unit : '';
				$cloth_unit_price[] = ($cloth_details->price) ? $cloth_details->price : '';
				$amount[] 		= $data->payment;
				$soprice = $data->payment+$clothPrice;
				$sub_order_price[]  = $soprice;
				if(DEFAULT_BONUS){
					$bonus= $this->crud_model->get_rowValue_by_id('bonus',DEFAULT_BONUS);
					if($bonus->type==1)
					{
						$worker_bonus[]  = ($soprice*$bonus->bonus)/100;
					}
					else
					{
						$worker_bonus[]  = $soprice+$bonus->bonus;
					}
					
				}
				$serial_no[]  	= $k;
				$worker_id[]  	= $data->worker_id;
				$worker_name[]  = $data->worker_name;
				$measurement[]  = json_encode($data->measurement);
				$dates[] = date("Y-m-d");
			}	
		}
				
				$keys = array("cloth_id","cloth_style", "cloth_type", "cloth_unit", "cloth_length","cloth_unit_price", "amount", "sub_order_price", "serial_no", "worker_id", "worker_name", "measurement","created_date", "worker_bonus");
						
				$items = array();
				foreach ( array_map(null, $cloth_id, $cloth_style, $cloth_type, $cloth_unit, $cloth_length, $cloth_unit_price, $amount, $sub_order_price, $serial_no, $worker_id, $worker_name, $measurement, $dates, $worker_bonus) as $key => $value ) {
					$items[] = array_combine($keys, $value);
					
				}
				$ordDetails = array('reference_no'  => $data->reference_no,
								'customer_id'  		=> $data->customer_id,
								'customer_name' 	=> $data->customer_name,
								'item_id'  			=> $data->item_id,
								'item_name' 		=> $data->item_name,
								'pattern_id'  		=> $data->pattern_id,
								'pattern_name' 		=> $data->pattern_name,
								'style_id'  		=> $data->style_id,
								'style_name' 		=> $data->style_name,
								'date'  			=> date("Y-m-d", strtotime($data->order_date)),
								'trial_date' 		=> date("Y-m-d", strtotime($data->trial_date)),
								'delivery_date'  	=> date("Y-m-d", strtotime($data->deliver_date)),
								'no_of_suborder' 	=> $numberOfsubOrder,
								'note'  			=> $this->crud_model->clear_tags($data->remark),
								'inv_total' 		=> array_sum($sub_order_price),
								'total'   			=> array_sum($sub_order_price),
								'worker_total_bonus'=> array_sum($worker_bonus),
								'user'  			=> $this->session->userdata('name')
								);	
								

				/*echo "<pre>";
				print_r($items);
				echo "<hr>";
				print_r($ordDetails);die;
				*/
		
		
		if (!empty($ordDetails) && !empty($items) )
		{
			if($res = $this->order_model->addOrder($ordDetails, $items)) {
				$orders   =  $this->crud_model->get_rowValue_by_id('orders',$res);
				$orders->userId = $orders->customer_id;
			    $mailData->ordStatus = 'inprocess';				
				/*$this->sms_model->send_template_sms('2', 'customers', (array)$orders);*/
				$this->email_model->do_email('6', 'customers', (array)$orders);
				$rnumber  =  $this->crud_model->getNextREF('orders',ORDER_PREFIX);
				if($this->input->post('page')=='tailor')
				{
					echo $res;
				}
				else
				{
				echo json_encode(array($orders->no_of_suborder, $orders->total, $rnumber, $res));
				}
			}
			else
			{
				echo 'fail';	
			}
			
		}
		
	}
	
	/*--------/Code edited by ritu/------------------*/
	
	   /*---------AJAX PATTERNS------------------*/
	public function ajaxpatterns_all()
	{
	    $itemId = $this->input->post('itemId'); 
        $patterns=$this->db->get_where('pattern' , array('item_id' => $itemId, 'status' => 'active'))->result_array();
		if(!empty($patterns)){
				foreach($patterns as $pattern){
				$arr[]=$pattern;
				}
				echo json_encode($arr);
			}else{
			echo json_encode('no');
			}
   }
   
      /*---------AJAX STYLES------------------*/
	public function ajaxstyles_all()
	{
	    $patternID = $this->input->post('patternID'); 
        $styles=$this->db->get_where('style' , array('pattern_id' => $patternID, 'status' => 'active'))->result_array();
		if(!empty($styles)){
			foreach($styles as $style) {
				$arr[]=$style;
				}
				echo json_encode($arr);
			}else{
			echo json_encode('no');
		}
    }
	

   /*---------AJAX MEASUREMENT------------------*/
	public function ajaxmeasurement_all()
	{
		//echo "<pre>";
	    $styleID = $this->input->post('styleID'); 
        $measurements=$this->db->get_where('measurement' , array('style_id' => $styleID, 'status' => 'active'))->result_array();
		echo json_encode($measurements);
    }
	
	
	public function change_tailor($param = '')
	{
		if(!empty($this->input->post('workerId1')) && !empty($this->input->post('subOrderSingleId')))
		{
			$subId = $this->input->post('subOrderSingleId');
			foreach($this->input->post('workerId1') as $k => $workerId)
			{
				$workers = $this->db->get_where('employees', array('emp_id' => $workerId))->row();
				$workerName = $workers->fname.' '.$workers->lname;
				$data = array("worker_id" => $workerId,'worker_name'=>$workerName);
				$this->db->where('id', $subId[$k]);
            	$this->db->update('order_items', $data);
            	
				
			}
			$this->session->set_flashdata('flash_message', get_phrase('updated_successfully'));
			redirect($this->agent->referrer());
				
		}		
	}
	/*---------/END ORDER MODULE------------------*/
	
	
}
