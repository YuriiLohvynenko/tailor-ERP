<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {

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
| MODULE: 			ADMIN
| -----------------------------------------------------
| This is ADMIN module controller file.
| -----------------------------------------------------
*/

	function __construct(){
		parent::__construct();
		
		$this->load->library('constant');
		$this->load->helper('multi_language');
		$this->load->model('email_model');
		$this->load->model('sms_model');
		$this->load->model('crud_model');
		$this->load->model('order_model');						
			
		if(!$this->session->userdata('user_id') || $this->session->userdata('roles') != 'admin' ){
			$this->session->set_flashdata('flash_message', get_phrase('log_again'));
			redirect('home', 'refresh');
		}
	}

	public function index(){

		$page_data['page_name']  = 'dashboard';
        $page_data['page_title'] = get_phrase('admin_dashboard');
        $this->load->view('index', $page_data);
			
	}
	
/*	public function tailor(){
		$page_data['page_name']  = 'tailor';
        $page_data['page_title'] = get_phrase('new_order');
        $this->load->view('./admin/tailor', $page_data);			
	}
*/	
	public function dashboard(){
		
		$page_data['page_name']  	= 'dashboard';
        $page_data['page_title'] 	= get_phrase('admin_dashboard');
		/*--------Dashboard------------*/
		$page_data['monthly_sales'] = $this->order_model->getChartData();
		$page_data['yearly_profit'] = $this->order_model->getYearlyProfitChartData();
		$page_data['averageInvoice'] = $this->order_model->getAverageInvoiceChartData();
		//echo "<pre>";
	   //print_r($page_data['averageInvoice']);die;	
	    $cloth_stock 		= $this->order_model->getStockValue('cloth_products');//stock
	    $product_stock 		= $this->order_model->getStockValue('products');//stock
	    $stp = $cloth_stock->stock_by_price + $product_stock->stock_by_price;		
		$stc = $cloth_stock->stock_by_cost + $product_stock->stock_by_cost;
		$page_data['stock'] = (object)array('stock_by_price' => $stp,'stock_by_cost' => $stc);
		$page_data['newCustomer'] = $this->crud_model->getNewCustomer();
		$page_data['activeCustomer'] = $this->crud_model->getActiveCustomer();
		//echo "<pre>";
		//print_r($page_data['monthly_sales'] );
		$page_data['newOrders'] = $this->order_model->getTodaysNewOrder();
        $page_data['workerOrders'] = $this->order_model->getWorkerOrders();
		$page_data['todayReadyOrders'] = $this->order_model->getTodayReadyOrders();
		$page_data['todayNotReadyOrders'] = $this->order_model->getTodayNotReadyOrders();
		/*--------Header------------*/
		$page_data['getEvents'] = $this->crud_model->getEvents('calendar');
		$cDP = $this->order_model->productAlertsNotifications('cloth_products');
		$oDP = $this->order_model->productAlertsNotifications('products');
		$page_data['cDOP'] = array_merge($cDP,$oDP);
		
	    $cloth_stock 		= $this->order_model->getStockValue('cloth_products');//stock
	    $product_stock 		= $this->order_model->getStockValue('products');//stock
	    $stp = $cloth_stock->stock_by_price + $product_stock->stock_by_price;		
		$stc = $cloth_stock->stock_by_cost + $product_stock->stock_by_cost;
		$page_data['stock'] = (object)array('stock_by_price' => $stp,'stock_by_cost' => $stc);
		$page_data['todaysOrders'] = $this->order_model->getTodaysNewOrder();
		//$this->email_model->do_email('4', 'users', array('userId' => '6', 'password' => '123456'));
        $this->load->view('index', $page_data);
	}
	
	/*---------PRODUCT MODULE------------------*/
	
	public function new_product()
	{
		$page_data['page_name']  = 'new_product';
        $page_data['page_title'] = get_phrase('new')." ".get_phrase('product');
		$page_data['categories'] = $this->db->get('categories')->result_array();
		$page_data['sizes'] 	  = $this->db->get('sizes')->result_array();
        $this->load->view('index', $page_data);
	}
	
	public function list_products()
	{
		$page_data['page_name']  = 'list_products';
		$page_data['page_title'] = get_phrase('list')." ".get_phrase('products');
		$page_data['products']  = $this->db->get('products')->result_array();
        $this->load->view('index', $page_data);
	}
	
	public function products($param1 = '', $param2 = '', $param3 = '')
	{
		if ($param1 == 'create') {
			
			$this->form_validation->set_rules('product_code', get_phrase("code"), 'trim|is_unique[products.code]|min_length[2]|max_length[50]|required|xss_clean');
			$this->form_validation->set_rules('product_name', get_phrase("name"), 'required|xss_clean');
			$this->form_validation->set_rules('category', get_phrase("category"), 'required|xss_clean');
			$this->form_validation->set_rules('subcategory', get_phrase("subcategory"), 'xss_clean');
			$this->form_validation->set_rules('product_unit', get_phrase("unit"), 'required|xss_clean');
			$this->form_validation->set_rules('product_cost', get_phrase("cost"), 'xss_clean');
			$this->form_validation->set_rules('product_price', get_phrase("price"), 'required|xss_clean');
			$this->form_validation->set_rules('size', get_phrase("size"), 'xss_clean');
			$this->form_validation->set_rules('product_detail', get_phrase("product_detail_for_invoice"), 'xss_clean');
			$this->form_validation->set_rules('alert_quantity', get_phrase("alert_quantity"), 'required|xss_clean');
			
			$this->form_validation->set_rules('image', get_phrase("image"), 'xss_clean');
			$this->form_validation->set_rules('cf1', get_phrase("pcf1"), 'xss_clean');
			$this->form_validation->set_rules('cf2', get_phrase("pcf2"), 'xss_clean');
			
			if ($this->form_validation->run() == true)
			{
				$filename=substr(number_format(date("YmdHis")*rand(),0,'',''),0,12);
				$image = '';
				
				if($_FILES['image']['name'])
				{
					$path_parts = pathinfo($_FILES['image']['name']);
					$extension  = $path_parts['extension'];
					$image      = $filename.".".$extension;
					$upload 	 = move_uploaded_file($_FILES['image']['tmp_name'],'uploads/products/'.$image);	
				}
				
				$data['code']    	   = $this->input->post('product_code');
				$data['name']           = $this->input->post('product_name');
				$data['image']          = $image;
				$data['unit']    	   = $this->input->post('product_unit');
				$data['cost']	       = $this->input->post('product_cost');
				$data['price']    	  = $this->input->post('product_price');
				$data['alert_quantity'] = $this->input->post('alert_quantity');
				$data['category_id']	= $this->input->post('category');
				$data['subcategory_id'] = $this->input->post('subcategory');
				$data['size_id']     	= $this->input->post('size');
				$data['track_quantity'] = $this->input->post('track_quantity');
				$data['details']     	= $this->input->post('product_detail');
				$data['cf1']    	 	= $this->input->post('cf1');
				$data['cf2']        	= $this->input->post('cf2');
				
			}
			if ($this->form_validation->run() == true && $this->db->insert('products', $data))
			{
				 $this->session->set_flashdata('flash_message', get_phrase('added_successfully'));
				 redirect(base_url().$this->session->userdata('roles'). '/list_products/', 'refresh');
			}
			else
			{ 
				$page_data['message'] 	= validation_errors();
				$page_data['page_name']  = 'new_product';
				$page_data['page_title'] = get_phrase('new')." ".get_phrase('product');
				$page_data['categories'] = $this->db->get('categories')->result_array();
				$page_data['sizes'] 	  = $this->db->get('sizes')->result_array();
				$this->load->view('index', $page_data);
				return false;
			}
        }
		
		if ($param1 == 'do_update') 
		{
			$this->form_validation->set_rules('product_code', get_phrase("code"), 'trim|min_length[2]|max_length[50]|required|xss_clean');
			
			$pr_details = $this->crud_model->get_value_by_id('products',$param2,'code');
			if ($this->input->post('product_code') != $pr_details) {
				$this->form_validation->set_rules('product_code', get_phrase("code"), 'is_unique[products.code]');
			}
			$this->form_validation->set_rules('product_name', get_phrase("name"), 'required|xss_clean');
			$this->form_validation->set_rules('category', get_phrase("category"), 'required|xss_clean');
			$this->form_validation->set_rules('subcategory', get_phrase("subcategory"), 'xss_clean');
			$this->form_validation->set_rules('product_unit', get_phrase("unit"), 'required|xss_clean');
			$this->form_validation->set_rules('product_cost', get_phrase("cost"), 'xss_clean');
			$this->form_validation->set_rules('product_price', get_phrase("price"), 'required|xss_clean');
			$this->form_validation->set_rules('size', get_phrase("size"), 'xss_clean');
			$this->form_validation->set_rules('product_detail', get_phrase("product_detail_for_invoice"), 'xss_clean');
			$this->form_validation->set_rules('alert_quantity', get_phrase("alert_quantity"), 'required|xss_clean');
			
			$this->form_validation->set_rules('image', get_phrase("image"), 'xss_clean');
			$this->form_validation->set_rules('cf1', get_phrase("pcf1"), 'xss_clean');
			$this->form_validation->set_rules('cf2', get_phrase("pcf2"), 'xss_clean');
			
			if ($this->form_validation->run() == true)
			{
				$filename=substr(number_format(date("YmdHis")*rand(),0,'',''),0,12);
				$image = '';
				
				if($_FILES['image']['name'])
				{
					if($this->input->post('primg'))
					{
						unlink('uploads/products/'.$this->input->post('primg'));	
					}
					$path_parts = pathinfo($_FILES['image']['name']);
					$extension  = $path_parts['extension'];
					$image      = $filename.".".$extension;
					$upload 	 = move_uploaded_file($_FILES['image']['tmp_name'],'uploads/products/'.$image);
					$data['image'] = $image;
				}
				
				$data['code']    	   = $this->input->post('product_code');
				$data['name']           = $this->input->post('product_name');
				$data['unit']    	   = $this->input->post('product_unit');
				$data['cost']	       = $this->input->post('product_cost');
				$data['price']    	  = $this->input->post('product_price');
				$data['alert_quantity'] = $this->input->post('alert_quantity');
				$data['category_id']	= $this->input->post('category');
				$data['subcategory_id'] = $this->input->post('subcategory');
				$data['size_id']     	= $this->input->post('size');
				$data['track_quantity'] = $this->input->post('track_quantity');
				$data['details']     	= $this->input->post('product_detail');
				$data['cf1']    	 	= $this->input->post('cf1');
				$data['cf2']        	= $this->input->post('cf2');
				
			}
			if ($this->form_validation->run() == true)
			{
				$this->db->where('id', $param2);
            	$this->db->update('products', $data);
				$this->session->set_flashdata('flash_message', get_phrase('updated_successfully'));
				 redirect(base_url().$this->session->userdata('roles'). '/list_products/', 'refresh');
			}
			else
			{ 
				$page_data['message'] 	= validation_errors();
				$page_data['page_name']  = 'new_product';
				$page_data['page_title'] = get_phrase('new')." ".get_phrase('product');
				$page_data['categories'] = $this->db->get('categories')->result_array();
				$page_data['sizes'] 	  = $this->db->get('sizes')->result_array();
				$this->load->view('index', $page_data);
				return false;
			}
        } 
		else if ($param1 == 'edit_products') 
		{
            $page_data['edit_data'] = $this->db->get_where('products', array('id' => $param2))->result_array();
			$page_data['categories'] = $this->db->get('categories')->result_array();
			$page_data['subcats']	= $this->db->get('subcategories')->result_array();
			$page_data['sizes']  	  = $this->db->get('sizes')->result_array();
			$page_data['page_name']  = 'new_product';
			$page_data['page_title'] = get_phrase('edit')." ".get_phrase('product');
			$this->load->view('index', $page_data);
			
        }
		if ($param1 == 'delete_products') 
		{
		   $this->db->delete('products', array('id' => $param2)); 
           $this->session->set_flashdata('flash_message', get_phrase('deleted_successully'));
		   redirect(base_url().$this->session->userdata('roles'). '/list_products/', 'refresh');
        }
	}
	
	/*================= NEW CLOTH PRODUCT====================*/
	
	public function new_cloth_product()
	{
		$page_data['page_name']  = 'new_cloth_product';
        $page_data['page_title'] = get_phrase('new')." ".get_phrase('cloth')." ".get_phrase('product');
		$page_data['cloth_styles'] = $this->db->get('cloth_styles')->result_array();
		$page_data['cloth_types']  = $this->crud_model->fetchClothTypeTree();
		//echo "<pre>";
		//print_r($page_data['cloth_types']);
        $this->load->view('index', $page_data);
	}
	
	public function cloth_products($param1 = '', $param2 = '', $param3 = '')
	{
		if ($param1 == 'create') {

			$this->form_validation->set_rules('clothStyle', get_phrase("cloth").' '.get_phrase("cloth"), 'required|xss_clean');
			$this->form_validation->set_rules('clothType', get_phrase("cloth").' '.get_phrase("type"), 'xss_clean');
			$this->form_validation->set_rules('product_unit', get_phrase("unit"), 'required|xss_clean');
			$this->form_validation->set_rules('product_cost', get_phrase("cost"), 'xss_clean');
			$this->form_validation->set_rules('product_price', get_phrase("price"), 'required|xss_clean');
			$this->form_validation->set_rules('size', get_phrase("size"), 'xss_clean');
			$this->form_validation->set_rules('product_detail', get_phrase("product_detail_for_invoice"), 'xss_clean');
			$this->form_validation->set_rules('alert_quantity', get_phrase("alert_quantity"), 'required|xss_clean');
			
			$this->form_validation->set_rules('image', get_phrase("image"), 'xss_clean');
			
			if ($this->form_validation->run() == true)
			{
				$filename=substr(number_format(date("YmdHis")*rand(),0,'',''),0,12);
				$image = '';
				
				if($_FILES['image']['name'])
				{
					$path_parts = pathinfo($_FILES['image']['name']);
					$extension  = $path_parts['extension'];
					$image      = $filename.".".$extension;
					$upload 	 = move_uploaded_file($_FILES['image']['tmp_name'],'uploads/products/'.$image);	
				}
				
				$data['image']          = $image;
                                $data['cloth_name']		= $this->input->post('cloth_name');
				$data['unit']    	   = $this->input->post('product_unit');
				$data['cost']	       = $this->input->post('product_cost');
				$data['price']    	  = $this->input->post('product_price');
				$data['alert_quantity'] = $this->input->post('alert_quantity');
				$data['cloth_style_id']	= $this->input->post('clothStyle');
				$data['cloth_type_id'] = $this->input->post('clothType');
				$data['track_quantity'] = $this->input->post('track_quantity');
				
			}
			if ($this->form_validation->run() == true && $this->db->insert('cloth_products', $data))
			{
				 $this->session->set_flashdata('flash_message', get_phrase('added_successfully'));
				 redirect(base_url().$this->session->userdata('roles'). '/list_cloth_products/', 'refresh');
			}
			else
			{ 
				$page_data['message'] 	= validation_errors();
				$page_data['page_name']  = 'new_cloth_product';
				$page_data['page_title']= get_phrase('new')." ".get_phrase('cloth')." ".get_phrase('product');
				$page_data['cloth_styles'] = $this->db->get('cloth_styles')->result_array();
				$page_data['cloth_types']  = $this->crud_model->fetchClothTypeTree();
				$this->load->view('index', $page_data);
				return false;
			}
        }
		
		if ($param1 == 'do_update') 
		{
			$this->form_validation->set_rules('clothStyle', get_phrase("cloth").' '.get_phrase("cloth"), 'required|xss_clean');
			$this->form_validation->set_rules('clothType', get_phrase("cloth").' '.get_phrase("type"), 'xss_clean');
			$this->form_validation->set_rules('product_unit', get_phrase("unit"), 'required|xss_clean');
			$this->form_validation->set_rules('product_cost', get_phrase("cost"), 'xss_clean');
			$this->form_validation->set_rules('product_price', get_phrase("price"), 'required|xss_clean');
			$this->form_validation->set_rules('size', get_phrase("size"), 'xss_clean');
			$this->form_validation->set_rules('product_detail', get_phrase("product_detail_for_invoice"), 'xss_clean');
			$this->form_validation->set_rules('alert_quantity', get_phrase("alert_quantity"), 'required|xss_clean');
			
			$this->form_validation->set_rules('image', get_phrase("image"), 'xss_clean');
			
			if ($this->form_validation->run() == true)
			{
				$filename=substr(number_format(date("YmdHis")*rand(),0,'',''),0,12);
				$image = '';
				
				if($_FILES['image']['name'])
				{
					
					if($this->input->post('primg'))
					{
						@unlink('uploads/products/'.$this->input->post('primg'));
					}
					$path_parts = pathinfo($_FILES['image']['name']);
					$extension  = $path_parts['extension'];
					$image      = $filename.".".$extension;
					$upload 	 = move_uploaded_file($_FILES['image']['tmp_name'],'uploads/products/'.$image);
					$data['image'] = $image;
				}
				$data['cloth_name']		= $this->input->post('cloth_name');
				$data['unit']    	   = $this->input->post('product_unit');
				$data['cost']	       = $this->input->post('product_cost');
				$data['price']    	  = $this->input->post('product_price');
				$data['alert_quantity'] = $this->input->post('alert_quantity');
				$data['cloth_style_id']	= $this->input->post('clothStyle');
				$data['cloth_type_id'] = $this->input->post('clothType');
				$data['track_quantity'] = $this->input->post('track_quantity');
				
			}
			if ($this->form_validation->run() == true)
			{
				$this->db->where('id', $param2);
            	$this->db->update('cloth_products', $data);
				$this->session->set_flashdata('flash_message', get_phrase('updated_successfully'));
				 redirect(base_url().$this->session->userdata('roles'). '/list_cloth_products/', 'refresh');
			}
			else
			{ 
				$page_data['message'] 	= validation_errors();
				$page_data['page_name']  = 'new_cloth_product';
				$page_data['page_title']= get_phrase('new')." ".get_phrase('cloth')." ".get_phrase('product');
				$page_data['cloth_styles'] = $this->db->get('cloth_styles')->result_array();
				$page_data['cloth_types']  = $this->crud_model->fetchClothTypeTree();
				$this->load->view('index', $page_data);
				return false;
			}
        } 
		else if ($param1 == 'edit_products') 
		{
            $page_data['edit_data'] = $this->db->get_where('cloth_products', array('id' => $param2))->result_array();
			$page_data['cloth_styles'] = $this->db->get('cloth_styles')->result_array();
			$page_data['cloth_types']  = $this->crud_model->fetchClothTypeTree();
			$page_data['page_name']  = 'new_cloth_product';
			$page_data['page_title'] = get_phrase('edit')." ".get_phrase('cloth')." ".get_phrase('product');
			$this->load->view('index', $page_data);
			
        }
		if ($param1 == 'delete_products') 
		{
		   $this->db->delete('cloth_products', array('id' => $param2)); 
           $this->session->set_flashdata('flash_message', get_phrase('deleted_successully'));
		   redirect(base_url().$this->session->userdata('roles'). '/list_cloth_products/', 'refresh');
        }
		
	}
	
	public function list_cloth_products()
	{
		$page_data['page_name']  = 'list_cloth_products';
		$page_data['page_title'] = get_phrase('list')." ".get_phrase('cloth')." ".get_phrase('products');
		$page_data['products']  = $this->db->get('cloth_products')->result_array();
        $this->load->view('index', $page_data);
	}
	
	/*---------ORDER MODULE------------------*/
	public function new_order()
	{
		$page_data['page_name']  = 'new_order';
        $page_data['page_title'] = get_phrase('new')." ".get_phrase('order');
		$page_data['customers']  = $this->db->get('customers')->result_array();
		$page_data['rnumber']    = $this->crud_model->getNextREF('orders',ORDER_PREFIX);
        $this->load->view('index', $page_data);
	}
	
	
	public function list_orders()
	{
		$page_data['page_name']  = 'list_orders';
        $page_data['page_title'] = get_phrase('list')." ".get_phrase('orders');
		$page_data['orders']  = $this->db->order_by('id','desc')->get('orders')->result_array();
        $this->load->view('index', $page_data);
	}
	//Order Payment
	public function order_payment()
	{
		$page_data['page_name']		= 'order_payment';
		$page_data['page_title']    = get_phrase('orders')." ".get_phrase('payment');
		$this->load->view('index',$page_data);
	}
	function payment($param1=null, $param2=null)
	{
		if($param1=="do_payment"){
			$this->form_validation->set_rules('amount', get_phrase("amount"), 'required|xss_clean');
			if(DISCOUNT_OPTION==1 && $this->input->post('discount')!=''){
			$this->form_validation->set_rules('discount', get_phrase("discount"), 'required|xss_clean');
			}
			if(TAX2 && $this->input->post('tax')!=''){
			$this->form_validation->set_rules('tax', get_phrase("tax"), 'required|xss_clean');
			}
			$this->form_validation->set_rules('payment_type', get_phrase("pay").' '.get_phrase("type"), 'required|xss_clean');
			$this->form_validation->set_rules('payment_date', get_phrase("date"), 'required|xss_clean');
			if ($this->form_validation->run() == true)
			{
			
			$data['order_id'] = $param2; 
			
			$inv= $this->crud_model->get_rowValue_by_id('orders',$param2);
			if(TAX2 && $this->input->post('tax')!='')
			{
				$taxe = $this->crud_model->get_rowValue_by_id('tax_rates',$this->input->post('tax'));
				if($taxe->type==1)
				{
					$total_tax2 = ($inv->inv_total)*$taxe->rate/100;
					$tax_total= ($inv->inv_total + $total_tax2);
				}
				else
				{
					$total_tax2 = $taxe->rate;
					$tax_total= ($inv->inv_total + $total_tax2);
				}
				
			}
			if(DISCOUNT_OPTION==1 && DISCOUNT_METHOD==1 && $this->input->post('discount')!='')
			{
				
				$discount= $this->crud_model->get_rowValue_by_id('discounts',$this->input->post('discount'));
				if($discount->type==1)
				{
					$dis = ($inv->inv_total*$discount->discount/100);
					$dtotal=$inv->inv_total - $dis + $total_tax2;
				}
				else
				{
					$dis = $discount->discount;
					$dtotal=$inv->inv_total- $dis + $total_tax2;
				}
				
			}
			
			if(DISCOUNT_OPTION==1 && DISCOUNT_METHOD==2 && $this->input->post('discount')!='')
			{
				$discount= $this->crud_model->get_rowValue_by_id('discounts',$this->input->post('discount'));
				if($discount->type==1)
				{
					$dis = ($tax_total*$discount->discount/100);
					$dtotal=$tax_total- $dis;
				}
				else
				{
					$dis = $discount->discount;
					$dtotal=$tax_total- $dis;
				}
				
			}
			$id = $this->crud_model->get_Max_ID('payment','id','payment_id');
			$pid = ($id) ? $id : 1;
			if($pid)
			{
				/*echo $pid;
				die;*/
				if($this->db->get_where('payment',array('id'=>$pid))->row()->order_id==$param2){
					$total=$this->db->get_where('payment',array('id'=>$id))->row();
					if($this->input->post('amount')>$total->rest_amt){
						$this->session->set_flashdata("message",get_phrase("amount_more_than_payment"));
						redirect($this->agent->referrer());
					}
					else
					{
						$data['rest_amt'] = $total->rest_amt - $this->input->post('amount');
					}
				}
				else
				{
					if($this->input->post('amount')>$dtotal){
						$this->session->set_flashdata("message",get_phrase("amount_more_than_payment"));
						redirect($this->agent->referrer());
					}
					else
					{
						$data['rest_amt']=$dtotal - $this->input->post('amount');
					}
				}
			}
			$data['amount'] = $this->input->post('amount');
			$data['dis_id'] = $discount->id;
			$data['tax_id'] = $taxe->id;
			$data['tax_amt'] = $total_tax2;
			$data['dis_amt'] = $dis;
			$data['pay_type'] = $this->input->post('payment_type');
			$data['pay_description'] = $this->input->post('payment_description');
			$data['total_pay'] = $dtotal;
			$data['pay_date'] = date("Y-m-d",strtotime($this->input->post('payment_date')));
			$this->db->insert('payment',$data);
			if($inv->total_tax==0.00)
			{
				$orData = array('total_tax' 	=> $total_tax2,
								'total'			=> $dtotal,
								'total_tax2'	=>$total_tax2,
								'tax_rate2_id' 	=> $taxe->id,
								'inv_discount' 	=> $dis,
								'discount_id' 	=> $discount->id,
								'updated_by'	=> $this->session->userdata('name')
								);
								
				$this->db->where('id',$param2);
				$this->db->update('orders',$orData);
			}
			if($this->input->post('amount'))
			{
				$p= $this->crud_model->get_value_by_id('orders',$param2,'paid');
				$paid= $p + $this->input->post('amount');
				$this->db->where('id',$param2);
				$this->db->update('orders',array('paid' => $paid));
				$mailData = $this->crud_model->get_rowValue_by_id('orders',$param2);			
				$mailData->userId = $mailData->customer_id;
			    $mailData->amount = $this->input->post('amount');				
				$this->sms_model->send_template_sms('3', 'customers', (array)$mailData);
				$this->email_model->do_email('9', 'customers', (array)$mailData);			
			}
			$this->session->set_userdata('flash_message',get_phrase('inserted_successfully'));
			redirect($this->agent->referrer());
			//redirect(base_url().$this->session->userdata('roles'). '/orders/view_invoice/'.$param2, 'refresh');
			}
			else
			{
				$data['message'] = validation_errors();
				$data['page_name'] = 'view_invoice';
				$data['page_title'] = get_phrase('view')." ".get_phrase('invoice');
				$inv= $this->crud_model->get_rowValue_by_id('orders',$param2);
				$customer_id = $inv->customer_id;
				$data['inv'] = $inv;
				$data['customers'] = $this->crud_model->get_rowValue_by_id('customers',$customer_id);
				$data['orders'] =  $this->crud_model->get_All_List('order_items','order_id',$param2);
				$data['discounts']= $this->db->get('discounts')->result();
				$data['pay']= $this->crud_model->get_rowValue_by_id('payment',$param2);
				$data['taxes'] = $this->db->get('tax_rates')->result_array();
				$this->load->view('index',$data);
			}
		}
	}
	//ORDERS
	public function orders($param1 = '' , $param2 = '')
   	{
		if($param1 == 'view_suborder')
		{
			$page_data['page_name']  = 'view_suborder';
			$page_data['suborders']=$this->crud_model->get_All_List('order_items','order_id',$param2);
			$page_data['customer_name']= $this->crud_model->get_value_by_id('orders',$param2,'customer_name');
			$page_data['item']= $this->crud_model->get_value_by_id('orders',$param2,'item_name');
			$page_data['pattern']= $this->crud_model->get_value_by_id('orders',$param2,'pattern_name');
			$page_data['style']= $this->crud_model->get_value_by_id('orders',$param2,'style_name');
			/*echo "<pre>";
			print_r($page_data['suborders']);*/
			$page_data['page_title']=get_phrase('sub')." ".get_phrase('orders');
			$this->load->view('index',$page_data);
			
		}
		if($param1=='search')
		{
			
			if($this->input->post('from_date') && $this->input->post('to_date'))
			{
				$dates = array('from' => date("Y-m-d",strtotime($this->input->post('from_date'))),
								'to'  => date("Y-m-d",strtotime($this->input->post('to_date'))));
				$data['orders'] = $this->order_model->getSubOrdersBtwnDates($dates);
				$data['page_name']		= 'order_payment';
				$data['page_title']    = get_phrase('orders')." ".get_phrase('details');
				if($data!='')
				{
					$this->load->view('index', $data);
				}
			}
		}
		
		/*----------INVOICE DETAILS--------*/
		
		
		if($param1 == 'view_invoice')
		{			
			//echo "hello";			
				$inv= $this->crud_model->get_rowValue_by_id('orders',$param2);
				$customer_id = $inv->customer_id;
				$data['inv'] = $inv;
				$data['customers'] = $this->crud_model->get_rowValue_by_id('customers',$customer_id);
				$data['orders'] =  $this->crud_model->get_All_List('order_items','order_id',$param2);
				$data['picture']= $this->crud_model->get_value_by_id('cloth_products',$param2,'image');
				//$data['rnumber']  =  $this->crud_model->getNextREF('orders',INVOICE_PREFIX);	
				$data['discounts']= $this->db->get('discounts')->result();
				$data['payments']= $this->crud_model->get_All_List('payment','order_id',$param2);
				$data['taxes'] = $this->db->get('tax_rates')->result_array();
				$data['page_name'] = 'view_invoice';
				$data['page_title'] = get_phrase('view')." ".get_phrase('invoice');
				$this->load->view('index',$data);
				
			}
		
		/*-----------------WORK MODEL-------------------------*/
		
		if($param1=='work_order')
			{
			$page_data['page_name']  = 'work_order';
			$page_data['orders']=$this->crud_model->get_rowValue_by_id('orders',$param2);
			$page_data['Edate']=$this->crud_model->get_rowValue_by_id('order_items',$param2);
			$suborders = $this->crud_model->get_All_List('order_items','order_id',$param2);
			$subid= array();
			foreach($suborders as $sub)
			{
				$subid[] = $sub['id'];
			}
			$page_data['subIds'] = $subid;
			$this->session->set_flashdata('message',get_phrase("no_measurement_available"));
			$page_data['page_title']=get_phrase('work')." ".get_phrase('orders');
			$this->load->view('index',$page_data);	
			}
		
	/*----------------SAVING WORK MODEL--------------------*/
	
	if($param1 == 'save')
		{			
				$subordId = $this->input->post('suborderId');
				$updata = array();
				foreach($this->input->post('expected_date') as $k => $dt)
				{
					 $updata = array('expected_date' => date("Y-m-d",strtotime($dt)));
					 $this->db->where('id', $subordId[$k]);
            		 $this->db->update('order_items', $updata);
				}
				
			$page_data['subIds'] = $subid;
			$page_data['page_title']=get_phrase('work')." ".get_phrase('orders');
			$data['expected_date']  = date("Y-m-d",strtotime($this->input->post('expected_date')));
			foreach($suborders as $updt){
			$updtid[]=$updt['id'];
			for($i=0;$i<$updtid;$i++){
			$suborders = $this->crud_model->get_rowValue_by_CustomField('order_items','id',$subIds[$i]);
			}}
			redirect(base_url().$this->session->userdata('roles'). '/orders/work_order/'.$param2, 'refresh');

		}
	
	}
	
	/*----------------TRACK ORDERS---------------*/
	
	public function track_order($param1='', $param2='', $param3='', $param4='')
	{
		
		if($param1=='search_orders')
		
		{
			$page_data['page_name']  = 'search_orders';
			$page_data['page_title'] = get_phrase('search')." ".get_phrase('orders');
			$page_data['dt']    =  $this->db->order_by('id','desc');
			$orders=$this->order_model->getAllOrders();
			$page_data['orders'] = $orders;
			$this->load->view('index',$page_data);
			return false;
		}
		
		if($param1=='track_suborder')
		{
	
			$page_data['page_name']  = 'track_suborder';
			$page_data['page_title'] = get_phrase('track')." ".get_phrase('suborder');
			$page_data['suborders']=$this->crud_model->get_All_List('order_items','order_id',$param2);
			$page_data['orders']=$this->crud_model->get_rowValue_by_id('orders',$param2);
			$this->load->view('index',$page_data);
			return false;
		}
		if($param1 =='inprocess_status') 
		{
		   $data['status'] = 'inprocess';
		   $this->db->where('id', $param2);
		   $this->db->update('order_items', $data);
		   $orders=$this->crud_model->get_rowValue_by_id('orders',$param3);
		  

			$orders->userId = $orders->customer_id;
		    $orders->ordStatus = 'inprocess';	
			$orders->suborderid = $param2;			
			$this->sms_model->send_template_sms('1', 'customers', (array)$orders);
			$this->email_model->do_email('8', 'customers', (array)$orders);
				
			redirect($this->agent->referrer());
        }
		if ($param1 == 'completed_status') 
		{	
			
		   $data['status'] = 'completed';
		   
		   $this->db->where('id', $param2);
		   $this->db->update('order_items', $data);
		   $orders=$this->crud_model->get_rowValue_by_id('orders',$param3);
		  $orders->userId = $orders->customer_id;
	    $orders->ordStatus = 'completed';	
		$orders->suborderid = $param2;			
		$this->sms_model->send_template_sms('1', 'customers', (array)$orders);
		$this->email_model->do_email('8', 'customers', (array)$orders); 
		   redirect($this->agent->referrer());
        }
		if ($param1 == 'to_deliver') 
		{	
			
		   $data['status'] = 'to_deliver';
		   $data['ready_date'] = date('Y-m-d');
		   $this->db->where('id', $param2);
		   $this->db->update('order_items', $data);
		  $orders=$this->crud_model->get_rowValue_by_id('orders',$param3);
		   
		   $orders->userId = $orders->customer_id;
		   $orders->suborderid = $param2;
			    $orders->ordStatus = 'Ready To Deliver';				
				$this->sms_model->send_template_sms('1', 'customers', (array)$orders);
				$this->email_model->do_email('8', 'customers', (array)$orders);
		   redirect($this->agent->referrer());
		   
        }
		if ($param1 == 'delivered_status') 
		{
			//echo $param2;	
			$status=$this->db->get_where('order_items',array('id'=>$param2))->row();
			$id=$status->order_id;
			$data=$this->db->get_where('orders',array('id'=>$id))->row();
			if($data->total == $data->paid)
			{
				
				$this->db->where('id', $param2);
				$this->db->update('order_items',array('status'=>'delivered', 'delivered_date'=>date('Y-m-d')));
				$orders=$this->crud_model->get_rowValue_by_id('orders',$param3);
				$orders->userId = $orders->customer_id;
			    $orders->ordStatus = 'Delivered';
				$orders->suborderid = $param2;
				$this->sms_model->send_template_sms('1', 'customers', (array)$orders);
				$this->email_model->do_email('8', 'customers', (array)$orders);
				redirect($this->agent->referrer(),'refresh');
			}
			else
			{
				$this->session->set_flashdata('flash_message', ucwords(get_phrase("can't_be_delivered_due_to_incomplete_payment")));
				redirect($this->agent->referrer());
			}
        }
		if($param1=='delivered_orders')
		{
			
			$page_data['page_name']  = 'delivered_orders';
			$page_data['page_title'] = get_phrase('delivered')." ".get_phrase('orders');
			$page_data['dt']    =  $this->db->order_by('id','desc');
			$page_data['orders']= $this->db->get('orders')->result_array();
			$this->load->view('index',$page_data);	
		}
		if($param1=='track_delivered_suborder')
		{
	
			$page_data['page_name']  = 'track_delivered_suborder';
			$page_data['page_title'] = get_phrase('track')." ".get_phrase('delivered')." ".get_phrase('suborder');
			$page_data['suborders']=$this->order_model->trackDeliveredSubOrder($param2,'delivered');
			$page_data['orders']=$this->crud_model->get_rowValue_by_id('orders',$param2);
			$this->load->view('index',$page_data);
			return false;
		}
		
		
	}
	

	/*---------PURCHASE MODULE------------------*/
	public function list_purchases()
	{
		$page_data['page_name']  = 'list_purchases';
		$page_data['page_title'] = get_phrase('list')." ".get_phrase('purchases');
		$page_data['purchases']  = $this->db->get_where('purchases', array('purchase_type'=>'other'))->result_array();
        $this->load->view('index', $page_data);
	}
	
	/*---------UI NAME SUGGESSTION------------------*/
	
	public function uiNameSuggestions()
	{
		$term = $this->input->get('term',TRUE);
		if (strlen($term) < 2) die();
		$rows = $this->crud_model->getProductNames($term);
		$json_array = array();
		foreach ($rows as $row)
			 array_push($json_array, $row->name);
	
		echo json_encode($json_array); 
	}
	
	function add_item()
    {
	   if($this->input->get('name')) { $name = $this->input->get('name'); }
	   
	   if($item = $this->crud_model->getProductByName($name)) {
	   		
			$code = $item->code;
			$cost = $item->cost;
			$product_tax = $item->tax_rate;
			
			$tax_rate = $this->crud_model->get_value_by_id('tax_rates',$product_tax,'rate');
			
			$product = array('code' => $code, 'cost' => $cost, 'tax_rate' => $tax_rate);
		
	   }
	   
	  echo json_encode($product);

    }
	
	/*---------UI CODE SUGGESSTION------------------*/
	
	function uiCodeSuggestions()
	{
		$term = $this->input->get('term',TRUE);
	
		if (strlen($term) < 2) die();
	
		$rows = $this->crud_model->getProductCodes($term);
	
		$json_array = array();
		foreach ($rows as $row)
			 array_push($json_array, $row->code);
	
		echo json_encode($json_array); 
	}
	
	function scan_item()
    {
	   if($this->input->get('code')) { $code = $this->input->get('code'); }
	   
	   if($item = $this->crud_model->getProductByCode($code)) {
	   		
			$product_name = $item->name;
			$product_cost = $item->cost;
			$product_tax = $item->tax_rate;
			
			$tax_rate = $this->crud_model->get_value_by_id('tax_rates',$product_tax,'rate');
			
			$product = array('name' => $product_name, 'cost' => $product_cost, 'tax_rate' => $tax_rate);
		
	   }
	   
	  echo json_encode($product);

   }
   
   	
	
	//ACTION
	public function purchases($param1 = '', $param2 = '', $param3 = '')
	{
		if ($param1 == 'create') 
		{
			//validate form input
			$this->form_validation->set_message('is_natural_no_zero',  get_phrase("no_zero_required"));
			$this->form_validation->set_rules('reference_no', get_phrase("ref_no"), 'required|xss_clean');
			$this->form_validation->set_rules('date', get_phrase("date"), 'required|xss_clean');
			$this->form_validation->set_rules('supplier', get_phrase("supplier"), 'required|is_natural_no_zero|xss_clean');
			$this->form_validation->set_rules('note', get_phrase("note"), 'xss_clean');
			
			$quantity  = "quantity";
			$product   = "product";
			$unit_cost = "unit_cost";
			$tax_rate  = "tax_rate";
			
			if ($this->form_validation->run() == true)
			{
				$reference = $this->input->post('reference_no');
				$date  = $this->crud_model->dateFormat(trim($this->input->post('date')));
				$supplier_id = $this->input->post('supplier');
				$supplier_name =  $this->crud_model->get_value_by_id('suppliers',$supplier_id,'fname').' '.$this->crud_model->get_value_by_id('suppliers',$supplier_id,'lname');
				$note = $this->crud_model->clear_tags($this->input->post('note'));
				$inv_total = 0;
				$inv_total_no_tax = 0;
				$pur_type='other';
				
					for($i=1; $i<=500; $i++){
						if( $this->input->post($quantity.$i) && $this->input->post($product.$i) && $this->input->post($unit_cost.$i) ) {
							
							if(TAX1) { 
								$tax_id = $this->input->post($tax_rate.$i);
								$tax_details = $this->crud_model->get_rowValue_by_id('tax_rates',$tax_id);
								$taxRate = $tax_details->rate;
								$taxType = $tax_details->type;	
								$tax_rate_id[] = $tax_id;	
								
								if($taxType == 1 && $taxRate != 0) {
								$item_tax = (($this->input->post($quantity.$i)) * ($this->input->post($unit_cost.$i)) * $taxRate / 100);
								$val_tax[] = $item_tax;
								} else {
								$item_tax = $taxRate;	
								$val_tax[] = $item_tax;
								}
								
								if($taxType == 1) { $tax[] = $taxRate."%"; } else { $tax[] = $taxRate;  }			
							} else {
								$item_tax = 0;
								$tax_rate_id[] = 0;
								$val_tax[] = 0;
								$tax[] = "";
							}
							
							$product_details = $this->crud_model->getProductByCode($this->input->post($product.$i));
							$product_id[] = $product_details->id;
							$product_name[] = $product_details->name;
							$product_code[] = $product_details->code;
						
							$inv_quantity[] = $this->input->post($quantity.$i);
							//$inv_product_code[] = $this->input->post($product.$i);
							$inv_unit_cost[] = $this->input->post($unit_cost.$i);
							
							$inv_gross_total[] = (($this->input->post($quantity.$i)) * ($this->input->post($unit_cost.$i)));
							$inv_total_no_tax += (($this->input->post($quantity.$i)) * ($this->input->post($unit_cost.$i)));
							
						}
					}
					
				if(TAX1) {
					$total_tax = array_sum($val_tax);
				} else {
					$total_tax = 0;
				}
			
					$keys = array("product_id","product_code","product_name", "tax_rate_id", "tax","quantity","unit_price", "gross_total", "val_tax");
				
					$items = array();
					foreach ( array_map(null, $product_id, $product_code, $product_name, $tax_rate_id, $tax, $inv_quantity, $inv_unit_cost, $inv_gross_total, $val_tax) as $key => $value ) {
						$items[] = array_combine($keys, $value);
				}
					
					$inv_total = $inv_total_no_tax + $total_tax;
					
					$invDetails = array('reference_no' => $reference,
						'date' => $date,
						'supplier_id' => $supplier_id,
						'supplier_name' => $supplier_name,
						'note' => $note,
						'pur_type' => $pur_type,
						'inv_total' => $inv_total_no_tax,
						'total_tax' => $total_tax,
						'total' => $inv_total
					);	
				/*echo "<pre>";
				print_r($invDetails); 
				echo "<hr>";
				print_r($items);
				die();*/
			}
			
			
			if ( $this->form_validation->run() == true && $this->crud_model->addPurchase($invDetails, $items) )
			{ 
						
				$this->session->set_flashdata('flash_message', get_phrase('added_successfully'));
			redirect(base_url().$this->session->userdata('roles'). '/list_purchases/', 'refresh');
				
			}
			else
			{ 
			
				$page_data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
			
				$page_data['reference_no'] = array('name' => 'reference_no',
					'id' => 'reference_no',
					'type' => 'text',
					'value' => $this->form_validation->set_value('reference_no'),
				);
				$page_data['date'] = array('name' => 'date',
					'id' => 'date',
					'type' => 'text',
					'value' => $this->form_validation->set_value('date'),
				);
				$page_data['note'] = array('name' => 'note',
					'id' => 'note',
					'type' => 'textarea',
					'value' => $this->form_validation->set_value('note'),
				);
		   
			$page_data['page_name']  = 'new_purchase';
			$page_data['tax_rates']  = $this->db->get('tax_rates')->result_array();
		    $page_data['rnumber']    = $this->crud_model->getNextREF('purchases',PURCHASE_PREFIX);
			$page_data['page_title'] = get_phrase('new')." ".get_phrase('purchase');
			$page_data['suppliers']  = $this->db->get('suppliers')->result_array();
			$this->load->view('index', $page_data);
			return false;
		  
			}
        }
		
		if ($param1 == 'edit_purchases') 
		{		//validate form input
			$this->form_validation->set_message('is_natural_no_zero',  get_phrase("no_zero_required"));
			$this->form_validation->set_rules('reference_no', get_phrase("ref_no"), 'required|xss_clean');
			$this->form_validation->set_rules('date', get_phrase("date"), 'required|xss_clean');
			$this->form_validation->set_rules('supplier', get_phrase("supplier"), 'required|is_natural_no_zero|xss_clean');
			$this->form_validation->set_rules('note', get_phrase("note"), 'xss_clean');
			
			$quantity  = "quantity";
			$product   = "product";
			$unit_cost = "unit_cost";
			$tax_rate  = "tax_rate";
			
			if ($this->form_validation->run() == true)
			{
				$reference = $this->input->post('reference_no');
				$date  = $this->crud_model->dateFormat(trim($this->input->post('date')));
				$supplier_id = $this->input->post('supplier');
				$supplier_name =  $this->crud_model->get_value_by_id('suppliers',$supplier_id,'fname').' '.$this->crud_model->get_value_by_id('suppliers',$supplier_id,'lname');
				$note = $this->crud_model->clear_tags($this->input->post('note'));
				$inv_total = 0;
				$inv_total_no_tax = 0;
				
					for($i=1; $i<=500; $i++){
						
						if( $this->input->post($quantity.$i) && $this->input->post($product.$i) && $this->input->post($unit_cost.$i) ) {
							
							if(TAX1) { 
								$tax_id = $this->input->post($tax_rate.$i);
								$tax_details = $this->crud_model->get_rowValue_by_id('tax_rates',$tax_id);
								$taxRate = $tax_details->rate;
								$taxType = $tax_details->type;	
								$tax_rate_id[] = $tax_id;	
								
								if($taxType == 1 && $taxRate != 0) {
								$item_tax = (($this->input->post($quantity.$i)) * ($this->input->post($unit_cost.$i)) * $taxRate / 100);
								$val_tax[] = $item_tax;
								} else {
								$item_tax = $taxRate;	
								$val_tax[] = $item_tax;
								}
								
								if($taxType == 1) { $tax[] = $taxRate."%"; } else { $tax[] = $taxRate;  }			
							} else {
								$item_tax = 0;
								$tax_rate_id[] = 0;
								$val_tax[] = 0;
								$tax[] = "";
							}
							
							$product_details = $this->crud_model->getProductByCode($this->input->post($product.$i));
							
							$product_id[] = $product_details->id;
							$product_name[] = $product_details->name;
							$product_code[] = $product_details->code;
						
							$inv_quantity[] = $this->input->post($quantity.$i);
							//$inv_product_code[] = $this->input->post($product.$i);
							$inv_unit_cost[] = $this->input->post($unit_cost.$i);
							
							$inv_gross_total[] = (($this->input->post($quantity.$i)) * ($this->input->post($unit_cost.$i)));
							$inv_total_no_tax += (($this->input->post($quantity.$i)) * ($this->input->post($unit_cost.$i)));
							
						}
					}
					
				if(TAX1) {
					$total_tax = array_sum($val_tax);
				} else {
					$total_tax = 0;
				}
			
					$keys = array("product_id","product_code","product_name", "tax_rate_id", "tax","quantity","unit_price", "gross_total", "val_tax");
				
					$items = array();
					foreach ( array_map(null, $product_id, $product_code, $product_name, $tax_rate_id, $tax, $inv_quantity, $inv_unit_cost, $inv_gross_total, $val_tax) as $key => $value ) {
						$items[] = array_combine($keys, $value);
				}
					
					$inv_total = $inv_total_no_tax + $total_tax;
					
					$invDetails = array('reference_no' => $reference,
						'date' => $date,
						'supplier_id' => $supplier_id,
						'supplier_name' => $supplier_name,
						'note' => $note,
						'pur_type'=>'other',
						'inv_total' => $inv_total_no_tax,
						'total_tax' => $total_tax,
						'total' => $inv_total
					);	
			}
			if ( $this->form_validation->run() == true && $this->crud_model->updatePurchase($param2, $invDetails, $items))
			{ 
				$this->session->set_flashdata('flash_message', get_phrase('added_successfully'));
			redirect(base_url().$this->session->userdata('roles'). '/list_purchases/', 'refresh');
			}
			else
			{ 
				$page_data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
			
				$page_data['reference_no'] = array('name' => 'reference_no',
					'id' => 'reference_no',
					'type' => 'text',
					'value' => $this->form_validation->set_value('reference_no'),
				);
				$page_data['date'] = array('name' => 'date',
					'id' => 'date',
					'type' => 'text',
					'value' => $this->form_validation->set_value('date'),
				);
				$page_data['note'] = array('name' => 'note',
					'id' => 'note',
					'type' => 'textarea',
					'value' => $this->form_validation->set_value('note'),
				);
		   
			$page_data['edit_data'] = $this->db->get_where('purchases', array('id' => $param2))->result_array();
			$page_data['rnumber']=$this->crud_model->get_value_by_id('purchases',$param2,'reference_no');
			$page_data['inv_products'] =  $this->crud_model->get_All_List_orderBy('purchase_items','purchase_id',$param2,'id','asc');
			$page_data['suppliers'] = $this->db->get('suppliers')->result_array();
			$page_data['tax_rates']  = $this->db->get('tax_rates')->result_array();
			$page_data['page_name']  = 'new_purchase';
			
			$page_data['page_title'] = get_phrase('edit')." ".get_phrase('purchase');
			$this->load->view('index', $page_data);
			return false;
		  
			}
        } 
		
		if ($param1 == 'delete_purchases') 
		{
		   $this->db->delete('purchases', array('id' => $param2));
		   $this->db->delete('purchase_items', array('purchase_id' => $param2)); 
           $this->session->set_flashdata('flash_message', get_phrase('deleted_successully'));
		   redirect(base_url().$this->session->userdata('roles'). '/list_purchases/', 'refresh');
        }
		
		if ($param1 == 'view_purchase') 
		{
		   $inv = $this->crud_model->get_rowValue_by_id('purchases', $param2);
		   $supplier_id = $inv->supplier_id;
		   $data['inv'] = $inv;
		   $data['supplier'] = $this->crud_model->get_rowValue_by_id('suppliers',$supplier_id);
		   $data['rows'] =  $this->crud_model->get_All_List_orderBy('purchase_items','purchase_id',$param2,'id','asc');
		   /* echo "<pre>";
		   print_r($data['rows']);*/
		   $data['page_title'] = get_phrase('view')." ".get_phrase('purchases');
		   $this->load->view('admin/view_purchase', $data);
		   return false;
        }
		
		if ($param1 == 'pdf') 
		{
		   $inv = $this->crud_model->get_rowValue_by_id('purchases', $param2);
		   $supplier_id = $inv->supplier_id;
		   $data['inv'] = $inv;
		   $data['supplier'] = $this->crud_model->get_rowValue_by_id('suppliers',$supplier_id);
		   $data['rows'] =  $this->crud_model->get_All_List_orderBy('purchase_items','purchase_id',$param2,'id','asc');
		  
		   $data['page_title'] = get_phrase('view')." ".get_phrase('purchases');
		  
		   $html = $this->load->view('admin/view_purchase', $data, TRUE);
		   
		   $this->load->library('MPDF/mpdf');
			
			$mpdf=new mPDF('utf-8','A4', '12', '', 10, 10, 10, 10, 9, 9); 
			$mpdf->useOnlyCoreFonts = true;
			$mpdf->SetProtection(array('print'));
			$mpdf->SetTitle(SYSTEM_NAME);
			$mpdf->SetAuthor(SYSTEM_NAME);
			$mpdf->SetCreator(SYSTEM_NAME);
			$mpdf->SetDisplayMode('fullpage');
			$mpdf->SetAutoFont();
			$search = array("<div class=\"row\">", "<div class=\"col-md-6\">");
			$replace = array("<div style='width: 100%;'>", "<div style='width: 48%; float: left;'>");
			$html = str_replace($search, $replace, $html);
			
			$name = get_phrase("inventory")."-".$inv->id.".pdf";
			$mpdf->WriteHTML($html);
			$mpdf->Output($name, 'D'); 
			return false;
        }
		
		
		$page_data['page_name']  = 'list_purchases';
		$page_data['page_title'] = get_phrase('list')." ".get_phrase('purchases');
		$page_data['purchases']  = $this->db->get_where('purchases', array('purchase_type'=>'other'))->result_array();
        $this->load->view('index', $page_data);
	}
	
	/*---------/END PURCHASE MODULE------------------*/
	
	/*---------CLOTH PURCHASE MODULE------------------*/
	public function cloth_purchase($param1 = '', $param2 = '', $param3 = '')
	{
		if ($param1 == 'create') 
		{
			//validate form input
			$this->form_validation->set_message('is_natural_no_zero',  get_phrase("no_zero_required"));
			$this->form_validation->set_rules('reference_no', get_phrase("ref_no"), 'required|xss_clean');
			$this->form_validation->set_rules('date', get_phrase("date"), 'required|xss_clean');
			$this->form_validation->set_rules('supplier', get_phrase("supplier"), 'required|is_natural_no_zero|xss_clean');
			$this->form_validation->set_rules('note', get_phrase("note"), 'xss_clean');
			
			$quantity  = "quantity";
			$product   = "product";
			$unit_cost = "unit_cost";
			$tax_rate  = "tax_rate";
			
			if ($this->form_validation->run() == true)
			{
				$reference = $this->input->post('reference_no');
				$date  = $this->crud_model->dateFormat(trim($this->input->post('date')));
				$supplier_id = $this->input->post('supplier');
				$pur_type = $this->input->post('pur_type');
				
				$supplier_name =  $this->crud_model->get_value_by_id('suppliers',$supplier_id,'fname').' '.$this->crud_model->get_value_by_id('suppliers',$supplier_id,'lname');
				$note = $this->crud_model->clear_tags($this->input->post('note'));
				$inv_total = 0;
				$inv_total_no_tax = 0;
				
		
				if( $this->input->post($quantity) && $this->input->post($product) && $this->input->post($unit_cost) ) {
					
					if(TAX1) { 
						$tax_id = $this->input->post($tax_rate);
						$tax_details = $this->crud_model->get_rowValue_by_id('tax_rates',$tax_id);
						$taxRate = $tax_details->rate;
						$taxType = $tax_details->type;	
						$tax_rate_id[] = $tax_id;	
						
						if($taxType == 1 && $taxRate != 0) {
						$item_tax = (($this->input->post($quantity)) * ($this->input->post($unit_cost)) * $taxRate / 100);
						$val_tax[] = $item_tax;
						} else {
						$item_tax = $taxRate;	
						$val_tax[] = $item_tax;
						}
						
						if($taxType == 1) { $tax[] = $taxRate."%"; } else { $tax[] = $taxRate;  }			
					} else {
						$item_tax = 0;
						$tax_rate_id[] = 0;
						$val_tax[] = 0;
						$tax[] = "";
					}
					
					$product_details = $this->crud_model->get_rowValue_by_id('cloth_products', $this->input->post($product));
					$product_id[] = $product_details->id;
					$product_name[] = $this->crud_model->get_value_by_id('cloth_types',$product_details->cloth_type_id, 'title');
				
					$inv_quantity[] = $this->input->post($quantity);
					//$inv_product_code[] = $this->input->post($product.$i);
					$inv_unit_cost[] = $this->input->post($unit_cost);
					
					$inv_gross_total[] = (($this->input->post($quantity)) * ($this->input->post($unit_cost)));
					$inv_total_no_tax += (($this->input->post($quantity)) * ($this->input->post($unit_cost)));
					
				}
			
					
				if(TAX1) {
					$total_tax = array_sum($val_tax);
				} else {
					$total_tax = 0;
				}
			
					$keys = array("product_id","product_name", "tax_rate_id", "tax","quantity","unit_price", "gross_total", "val_tax");
				
					$items = array();
					foreach ( array_map(null, $product_id, $product_name, $tax_rate_id, $tax, $inv_quantity, $inv_unit_cost, $inv_gross_total, $val_tax) as $key => $value ) {
						$items[] = array_combine($keys, $value);
				}
					
					$inv_total = $inv_total_no_tax + $total_tax;
					
					$invDetails = array('reference_no' => $reference,
						'date' => $date,
						'supplier_id' => $supplier_id,
						'supplier_name' => $supplier_name,
						'note' => $note,
						'pur_type' => $pur_type,
						'inv_total' => $inv_total_no_tax,
						'total_tax' => $total_tax,
						'total' => $inv_total
					);	
				/*echo "<pre>";
				print_r($invDetails); 
				echo "<hr>";
				print_r($items);
				die();*/
			}
			
			
			if ( $this->form_validation->run() == true && $this->crud_model->addPurchase($invDetails, $items) )
			{ 
						
				$this->session->set_flashdata('flash_message', get_phrase('added_successfully'));
			redirect(base_url().$this->session->userdata('roles'). '/cloth_purchase/', 'refresh');
				
			}
			else
			{ 
			
				$page_data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
			
				$page_data['reference_no'] = array('name' => 'reference_no',
					'id' => 'reference_no',
					'type' => 'text',
					'value' => $this->form_validation->set_value('reference_no'),
				);
				$page_data['date'] = array('name' => 'date',
					'id' => 'date',
					'type' => 'text',
					'value' => $this->form_validation->set_value('date'),
				);
				$page_data['note'] = array('name' => 'note',
					'id' => 'note',
					'type' => 'textarea',
					'value' => $this->form_validation->set_value('note'),
				);
		   
			$page_data['page_name']  = 'cloth_purchase';
			$page_data['tax_rates']  = $this->db->get('tax_rates')->result_array();
		    $page_data['rnumber']    = $this->crud_model->getNextREF('purchases',PURCHASE_PREFIX);
			$page_data['page_title'] = get_phrase('cloth')." ".get_phrase('purchase');
			$page_data['suppliers']  = $this->db->get('suppliers')->result_array();
			$page_data['clothProducts']  = $this->db->get_where('cloth_products',array('id' => $param2))->row();
			$page_data['formshow']  = 'formshow';
			if (TAX1) {
			$page_data['taxes'] = $this->db->get('tax_rates')->result_array();
			}
			
			$this->load->view('index', $page_data);
			return false;
		  
			}
        }
		
		if ($param1 == 'edit_purchases') 
		{		//validate form input
			$this->form_validation->set_message('is_natural_no_zero',  get_phrase("no_zero_required"));
			$this->form_validation->set_rules('reference_no', get_phrase("ref_no"), 'required|xss_clean');
			$this->form_validation->set_rules('date', get_phrase("date"), 'required|xss_clean');
			$this->form_validation->set_rules('supplier', get_phrase("supplier"), 'required|is_natural_no_zero|xss_clean');
			$this->form_validation->set_rules('note', get_phrase("note"), 'xss_clean');
			
			$quantity  = "quantity";
			$product   = "product";
			$unit_cost = "unit_cost";
			$tax_rate  = "tax_rate";
			
			if ($this->form_validation->run() == true)
			{
				$reference = $this->input->post('reference_no');
				$date  = $this->crud_model->dateFormat(trim($this->input->post('date')));
				$supplier_id = $this->input->post('supplier');
				$supplier_name =  $this->crud_model->get_value_by_id('suppliers',$supplier_id,'fname').' '.$this->crud_model->get_value_by_id('suppliers',$supplier_id,'lname');
				$note = $this->crud_model->clear_tags($this->input->post('note'));
				$inv_total = 0;
				$inv_total_no_tax = 0;
				
					for($i=1; $i<=500; $i++){
						
						if( $this->input->post($quantity.$i) && $this->input->post($product.$i) && $this->input->post($unit_cost.$i) ) {
							
							if(TAX1) { 
								$tax_id = $this->input->post($tax_rate.$i);
								$tax_details = $this->crud_model->get_rowValue_by_id('tax_rates',$tax_id);
								$taxRate = $tax_details->rate;
								$taxType = $tax_details->type;	
								$tax_rate_id[] = $tax_id;	
								
								if($taxType == 1 && $taxRate != 0) {
								$item_tax = (($this->input->post($quantity.$i)) * ($this->input->post($unit_cost.$i)) * $taxRate / 100);
								$val_tax[] = $item_tax;
								} else {
								$item_tax = $taxRate;	
								$val_tax[] = $item_tax;
								}
								
								if($taxType == 1) { $tax[] = $taxRate."%"; } else { $tax[] = $taxRate;  }			
							} else {
								$item_tax = 0;
								$tax_rate_id[] = 0;
								$val_tax[] = 0;
								$tax[] = "";
							}
							
							$product_details = $this->crud_model->getProductByCode($this->input->post($product.$i));
							
							$product_id[] = $product_details->id;
							$product_name[] = $product_details->name;
							$product_code[] = $product_details->code;
						
							$inv_quantity[] = $this->input->post($quantity.$i);
							//$inv_product_code[] = $this->input->post($product.$i);
							$inv_unit_cost[] = $this->input->post($unit_cost.$i);
							
							$inv_gross_total[] = (($this->input->post($quantity.$i)) * ($this->input->post($unit_cost.$i)));
							$inv_total_no_tax += (($this->input->post($quantity.$i)) * ($this->input->post($unit_cost.$i)));
							
						}
					}
					
				if(TAX1) {
					$total_tax = array_sum($val_tax);
				} else {
					$total_tax = 0;
				}
			
					$keys = array("product_id","product_code","product_name", "tax_rate_id", "tax","quantity","unit_price", "gross_total", "val_tax");
				
					$items = array();
					foreach ( array_map(null, $product_id, $product_code, $product_name, $tax_rate_id, $tax, $inv_quantity, $inv_unit_cost, $inv_gross_total, $val_tax) as $key => $value ) {
						$items[] = array_combine($keys, $value);
				}
					
					$inv_total = $inv_total_no_tax + $total_tax;
					
					$invDetails = array('reference_no' => $reference,
						'date' => $date,
						'supplier_id' => $supplier_id,
						'supplier_name' => $supplier_name,
						'note' => $note,
						'inv_total' => $inv_total_no_tax,
						'total_tax' => $total_tax,
						'total' => $inv_total
					);	
			}
			if ( $this->form_validation->run() == true && $this->crud_model->updatePurchase($param2, $invDetails, $items))
			{ 
				$this->session->set_flashdata('flash_message', get_phrase('added_successfully'));
			redirect(base_url().$this->session->userdata('roles'). '/list_purchases/', 'refresh');
			}
			else
			{ 
				$page_data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
			
				$page_data['reference_no'] = array('name' => 'reference_no',
					'id' => 'reference_no',
					'type' => 'text',
					'value' => $this->form_validation->set_value('reference_no'),
				);
				$page_data['date'] = array('name' => 'date',
					'id' => 'date',
					'type' => 'text',
					'value' => $this->form_validation->set_value('date'),
				);
				$page_data['note'] = array('name' => 'note',
					'id' => 'note',
					'type' => 'textarea',
					'value' => $this->form_validation->set_value('note'),
				);
		   
			$page_data['edit_data'] = $this->db->get_where('purchases', array('id' => $param2))->result_array();
			$page_data['rnumber']=$this->crud_model->get_value_by_id('purchases',$param2,'reference_no');
			$page_data['inv_products'] =  $this->crud_model->get_All_List_orderBy('purchase_items','purchase_id',$param2,'id','asc');
			$page_data['suppliers'] = $this->db->get('suppliers')->result_array();
			$page_data['tax_rates']  = $this->db->get('tax_rates')->result_array();
			$page_data['page_name']  = 'new_purchase';
			
			$page_data['page_title'] = get_phrase('edit')." ".get_phrase('purchase');
			$this->load->view('index', $page_data);
			return false;
		  
			}
        } 
		
		if ($param1 == 'delete_purchases') 
		{
		   $this->db->delete('purchases', array('id' => $param2));
		   $this->db->delete('purchase_items', array('purchase_id' => $param2)); 
           $this->session->set_flashdata('flash_message', get_phrase('deleted_successully'));
		   redirect(base_url().$this->session->userdata('roles'). '/list_purchases/', 'refresh');
        }
		
		if ($param1 == 'view_purchase') 
		{
		   $inv = $this->crud_model->get_rowValue_by_id('purchases', $param2);
		   $supplier_id = $inv->supplier_id;
		   $data['inv'] = $inv;
		   $data['supplier'] = $this->crud_model->get_rowValue_by_id('suppliers',$supplier_id);
		   $data['rows'] =  $this->crud_model->get_All_List_orderBy('purchase_items','purchase_id',$param2,'id','asc');
		   /* echo "<pre>";
		   print_r($data['rows']);*/
		   $data['page_title'] = get_phrase('view')." ".get_phrase('purchases');
		   $this->load->view('admin/view_purchase', $data);
		   return false;
        }
		
		if ($param1 == 'pdf') 
		{
		   $inv = $this->crud_model->get_rowValue_by_id('purchases', $param2);
		   $supplier_id = $inv->supplier_id;
		   $data['inv'] = $inv;
		   $data['supplier'] = $this->crud_model->get_rowValue_by_id('suppliers',$supplier_id);
		   $data['rows'] =  $this->crud_model->get_All_List_orderBy('purchase_items','purchase_id',$param2,'id','asc');
		  
		   $data['page_title'] = get_phrase('view')." ".get_phrase('purchases');
		  
		   $html = $this->load->view('admin/view_purchase', $data, TRUE);
		   
		   $this->load->library('MPDF/mpdf');
			
			$mpdf=new mPDF('utf-8','A4', '12', '', 10, 10, 10, 10, 9, 9); 
			$mpdf->useOnlyCoreFonts = true;
			$mpdf->SetProtection(array('print'));
			$mpdf->SetTitle(SYSTEM_NAME);
			$mpdf->SetAuthor(SYSTEM_NAME);
			$mpdf->SetCreator(SYSTEM_NAME);
			$mpdf->SetDisplayMode('fullpage');
			$mpdf->SetAutoFont();
			$search = array("<div class=\"row\">", "<div class=\"col-md-6\">");
			$replace = array("<div style='width: 100%;'>", "<div style='width: 48%; float: left;'>");
			$html = str_replace($search, $replace, $html);
			
			$name = get_phrase("inventory")."-".$inv->id.".pdf";
			$mpdf->WriteHTML($html);
			$mpdf->Output($name, 'D'); 
			return false;
        }
		
		
		$page_data['page_name']  = 'cloth_purchase';
		$page_data['page_title'] = get_phrase('cloth')." ".get_phrase('purchases');
		$page_data['purchases']  = $page_data['purchases']  = $this->db->get_where('purchases', array('purchase_type'=>'cloth'))->result_array();
		$page_data['formshow']  = 'formhide';
        $this->load->view('index', $page_data);
		
	}
	
	/*---------BONUS TO EMPLOYEE------------------*/
	
	public function bonus($param1 = '', $param2 = '', $param3 = '')
	{
		if ($param1 == 'add_bonus') {
			
			$data['name']       = $this->input->post('name');
			$data['bonus']  		= $this->input->post('bonus');
			$data['type']       = $this->input->post('type');
			$this->db->insert('bonus', $data);
			$this->session->set_flashdata('flash_message', get_phrase('added_successfully'));
			redirect(base_url().$this->session->userdata('roles'). '/bonus/', 'refresh');
			
		}
		if ($param1 == 'do_update') 
		{
			$data['name']       = $this->input->post('name');
			$data['bonus']  		= $this->input->post('bonus');
			$data['type']       = $this->input->post('type');
            $this->db->where('id', $param2);
            $this->db->update('bonus', $data);
			$this->session->set_flashdata('flash_message', get_phrase('updated_successully'));
            redirect(base_url().$this->session->userdata('roles'). '/bonus/', 'refresh');
        } 
		else if ($param2 == 'edit_bonus') 
		{
            $page_data['edit_data'] = $this->db->get_where('bonus', array('id' => $param3))->result_array();
        }
		if ($param1 == 'delete_bonus') 
		{
            $this->db->where('id', $param2);
            $this->db->delete('bonus');
           $this->session->set_flashdata('flash_message', get_phrase('deleted_successully'));
		   redirect(base_url().$this->session->userdata('roles'). '/bonus/', 'refresh');
        }
		
		$page_data['page_name']  = 'bonus';
        $page_data['page_title'] = get_phrase('bonus');
		$page_data['bonus']= $this->db->get('bonus')->result_array();
        $this->load->view('index', $page_data);
	}
	
	
	/*---------EMPLOYEE MODULE------------------*/
	
	public function new_employee()
	{
		$page_data['page_name']  = 'new_employee';
        $page_data['page_title'] = get_phrase('new')." ".get_phrase('employee');
		$page_data['countries']  = $this->db->get('countries')->result_array();
        $this->load->view('index', $page_data);
	}
	
	public function employees_information()
	{
		$page_data['page_name']  = 'employees_information';
		$page_data['page_title'] = get_phrase('employee')." ".get_phrase('information');
		$page_data['employees']  = $this->db->get('employees')->result_array();
        $this->load->view('index', $page_data);
	}
	
	public function employees($param1 = '', $param2 = '', $param3 = '')
	{
		if ($param1 == 'create') {
			$filename=substr(number_format(date("YmdHis")*rand(),0,'',''),0,12);
			$userpic = '';
			
			if($_FILES['userpic']['name'])
			{
				$path_parts = pathinfo($_FILES['userpic']['name']);
				$extension  = $path_parts['extension'];
				$userpic    = $filename.".".$extension;
				$upload 	 = move_uploaded_file($_FILES['userpic']['tmp_name'],'uploads/users_image/'.$userpic);	
			}
			
            $data['fname']    	   = $this->input->post('fname');
            $data['lname']           = $this->input->post('lname');
			$data['image']           = $userpic;
            $data['email']    	   = $this->input->post('email');
            $data['mobile']          = $this->input->post('mobile');
			$data['phone']	       = $this->input->post('phone');
            $data['gender']    	  = $this->input->post('sex');
			$data['dob']			 = date("Y-m-d",strtotime($this->input->post('dob')));
			$data['country']		 = $this->input->post('country');
			$data['state']     	   = $this->input->post('province');
            $data['city']            = $this->input->post('city');
            $data['nationality']     = $this->input->post('nationality');
            $data['postal_code']     = $this->input->post('postal');
            $data['address']    	 = $this->input->post('address');
           
            $data['reg_date']        = date('Y-m-d');
			
            $this->db->insert('employees', $data);
            $employee_id = mysql_insert_id();
			if($employee_id)
			{
				//$empid['emp_id'] = str_pad($employee_id,10,'0',STR_PAD_LEFT);
				$datas['email']   		= $this->input->post('email');
				$datas['name']    	 = $this->input->post('fname')." ".$this->input->post('lname');
				$datas['password']	 = $this->input->post('password');
				$datas['role']   		 = '1';
				$datas['image']   		= $userpic;
				$datas['date_created'] = date('Y-m-d');
				$datas['status']   	   = 'active';
				$this->db->insert('users', $datas);
				$uId = $this->db->insert_id();
				$this->db->where('id', $employee_id);
            	$this->db->update('employees', array('emp_id'=>$uId));
			}
			$this->email_model->do_email('4', 'users', array('userId' => $uId, 'password' => $this->input->post('password'))); 
			//SEND EMAIL ACCOUNT OPENING EMAIL
            $this->session->set_flashdata('flash_message', get_phrase('added_successfully'));
			redirect(base_url().$this->session->userdata('roles'). '/employees_information/', 'refresh');
        }
		if ($param1 == 'do_update') 
		{
			$user_email = $this->crud_model->value_by_id('employees','id',$param2,'email');
			$filename=substr(number_format(date("YmdHis")*rand(),0,'',''),0,12);
			$userpic = '';
			
			if($_FILES['userpic']['name'])
			{
				$path_parts = pathinfo($_FILES['userpic']['name']);
				$extension  = $path_parts['extension'];
				$userpic    = $filename.".".$extension;
				$upload 	 = move_uploaded_file($_FILES['userpic']['tmp_name'],'uploads/users_image/'.$userpic);
				$data['image']  = $userpic;
				$datas['image']   		= $userpic;	
			}
			
            $data['fname']    	   = $this->input->post('fname');
            $data['lname']           = $this->input->post('lname');
            $data['email']    	   = $this->input->post('email');
            $data['mobile']          = $this->input->post('mobile');
			$data['phone']	       = $this->input->post('phone');
            $data['gender']    	  = $this->input->post('sex');
			$data['dob']			 = date("Y-m-d",strtotime($this->input->post('dob')));
			$data['country']		 = $this->input->post('country');
			$data['state']     	   = $this->input->post('province');
            $data['city']            = $this->input->post('city');
            $data['postal_code']     = $this->input->post('postal');
            $data['address']    	 = $this->input->post('address');
			
			$this->db->where('id', $param2);
            $this->db->update('employees', $data);
            $employee_id = $param2;
			if($employee_id)
			{
				$user_id = $this->crud_model->value_by_id('users','email',$user_email,'user_id');
				$datas['email']   		= $this->input->post('email');
				if($this->input->post('password')){
				$datas['password']   	 = $this->input->post('password');}
				$datas['name']    	 = $this->input->post('fname')." ".$this->input->post('lname');
				$this->db->where('user_id', $user_id);
            	$this->db->update('users', $datas);
			}
            $this->session->set_flashdata('flash_message', get_phrase('updated_successfully'));
			redirect(base_url().$this->session->userdata('roles'). '/employees_information/', 'refresh');
        
        } 
		else if ($param1 == 'edit_employees') 
		{
            $page_data['edit_data'] = $this->db->get_where('employees', array('id' => $param2))->result_array();
			$page_data['countries']  = $this->db->get('countries')->result_array();
			$page_data['page_name']  = 'new_employee';
			$page_data['page_title'] = get_phrase('edit')." ".get_phrase('employee');
			$this->load->view('index', $page_data);
			
        }
		if ($param1 == 'delete_employees') 
		{
		   $this->db->delete('employees', array('id' => $param2)); 
           $this->session->set_flashdata('flash_message', get_phrase('deleted_successully'));
		   redirect(base_url().$this->session->userdata('roles'). '/employees_information/', 'refresh');
        }
	}
	
	public function employees_bonus($param1 = '')
	{
		if ($param1 == 'search') {
		    $this->form_validation->set_rules('employee', get_phrase("employee"), 'required|xss_clean');
			$this->form_validation->set_rules('month', get_phrase("month"), 'required|xss_clean');
			if ($this->form_validation->run() == true)
			{
				$data['employee']  = $this->input->post('employee');
				$data['month']  = $this->input->post('month');
				$page_data['bonus'] = $this->order_model->getEmployeeBonus($data);
			}
			else
			{ 
				$page_data['message'] = validation_errors();
			}
		}
		
		$page_data['page_name']  = 'employee_bonus';
        $page_data['page_title'] = get_phrase('employee').' '.get_phrase('bonus');
		$page_data['employees']= $this->db->get('employees')->result_array();
        $this->load->view('index', $page_data);
	}
	/*---------CUSTOMER MODULE------------------*/
	
	public function new_customer()
	{
		$page_data['page_name']  = 'new_customer';
        $page_data['page_title'] = get_phrase('new')." ".get_phrase('customer');
		$page_data['countries']  = $this->db->get('countries')->result_array();
        $this->load->view('index', $page_data);
	}
	
	public function customers_information()
	{
		$page_data['page_name']  = 'customers_information';
		$page_data['page_title'] = get_phrase('customers')." ".get_phrase('information');
		$page_data['customers']  = $this->db->get('customers')->result_array();
        $this->load->view('index', $page_data);
	}
	
	public function customers($param1 = '', $param2 = '', $param3 = '')
	{
		if ($param1 == 'create') {
			$filename=substr(number_format(date("YmdHis")*rand(),0,'',''),0,12);
			$userpic = '';
			
			if($_FILES['userpic']['name'])
			{
				$path_parts = pathinfo($_FILES['userpic']['name']);
				$extension  = $path_parts['extension'];
				$userpic    = $filename.".".$extension;
				$upload 	 = move_uploaded_file($_FILES['userpic']['tmp_name'],'uploads/users_image/'.$userpic);	
			}
			
            $data['fname']    	   = $this->input->post('fname');
            $data['lname']           = $this->input->post('lname');
			$data['gender']           = $this->input->post('gender');
			$data['company']         = $this->input->post('company');
			$data['image']           = $userpic;
            $data['email']    	   = $this->input->post('email');
            $data['mobile']          = $this->input->post('mobile');
			$data['phone']	       = $this->input->post('phone');
			$data['country']		 = $this->input->post('country');
			$data['state']     	   = $this->input->post('province');
            $data['city']            = $this->input->post('city');
            $data['postal_code']     = $this->input->post('postal');
            $data['address']    	 = $this->input->post('address');
            $data['reg_date']        = date('Y-m-d');
			
            $this->db->insert('customers', $data);
            $customer_id = mysql_insert_id();
			if($customer_id)
			{
				$datas['email']   		= $this->input->post('email');
				$datas['name']    	 = $this->input->post('fname')." ".$this->input->post('lname');
				$datas['password']	 = $this->input->post('password');
				$datas['role']   		 = '3';
				$datas['image']   		= $userpic;
				$datas['date_created'] = date('Y-m-d');
				$datas['status']   	   = 'active';
				$this->db->insert('users', $datas);
				$uId = mysql_insert_id();
				$this->db->where('id', $customer_id);
            	$this->db->update('customers', array('user_id'=>$uId));
				
			}
           
            $this->email_model->do_email('5', 'users', array('userId' => $uId, 'password' => $this->input->post('password'))); 
			//SEND EMAIL ACCOUNT OPENING EMAIL 
            $this->session->set_flashdata('flash_message', get_phrase('added_successfully'));
			redirect(base_url().$this->session->userdata('roles'). '/customers_information/', 'refresh');
        }
		if ($param1 == 'do_update') 
		{
			$user_email = $this->crud_model->value_by_id('customers','id',$param2,'email');
			$filename=substr(number_format(date("YmdHis")*rand(),0,'',''),0,12);
			$userpic = '';
			
			if($_FILES['userpic']['name'])
			{
				$path_parts = pathinfo($_FILES['userpic']['name']);
				$extension  = $path_parts['extension'];
				$userpic    = $filename.".".$extension;
				$upload 	 = move_uploaded_file($_FILES['userpic']['tmp_name'],'uploads/users_image/'.$userpic);
				$data['image']  = $userpic;
				$datas['image']   		= $userpic;	
			}
			
            $data['fname']    	   = $this->input->post('fname');
            $data['lname']           = $this->input->post('lname');
			$data['gender']           = $this->input->post('gender');
			$data['company']         = $this->input->post('company');
            $data['email']    	   = $this->input->post('email');
            $data['mobile']          = $this->input->post('mobile');
			$data['phone']	       = $this->input->post('phone');
           
			$data['country']		 = $this->input->post('country');
			$data['state']     	   = $this->input->post('province');
            $data['city']            = $this->input->post('city');
            $data['postal_code']     = $this->input->post('postal');
            $data['address']    	 = $this->input->post('address');
			
			$this->db->where('id', $param2);
            $this->db->update('customers', $data);
            $customer_id = $param2;
			if($customer_id)
			{
				$user_id = $this->crud_model->value_by_id('users','email',$user_email,'user_id');
				$datas['email']   		= $this->input->post('email');
				if($this->input->post('password')){
				$datas['password']   	 = $this->input->post('password');}
				$datas['name']    	 = $this->input->post('fname')." ".$this->input->post('lname');
				$this->db->where('user_id', $user_id);
            	$this->db->update('users', $datas);
			}
			
            $this->session->set_flashdata('flash_message', get_phrase('updated_successfully'));
			redirect(base_url().$this->session->userdata('roles'). '/customers_information/', 'refresh');
        
        } 
		else if ($param1 == 'edit_customers') 
		{
            $page_data['edit_data'] = $this->db->get_where('customers', array('id' => $param2))->result_array();
			$page_data['countries']  = $this->db->get('countries')->result_array();
			$page_data['page_name']  = 'new_customer';
			$page_data['page_title'] = get_phrase('edit')." ".get_phrase('customer');
			$this->load->view('index', $page_data);
			
        }
		if ($param1 == 'delete_customers') 
		{
		   $this->db->delete('customers', array('id' => $param2)); 
           $this->session->set_flashdata('flash_message', get_phrase('deleted_successully'));
		   redirect(base_url().$this->session->userdata('roles'). '/customers_information/', 'refresh');
        }
	}
	
	/*---------SUPPLIER MODULE------------------*/
	
	public function new_supplier()
	{
		$page_data['page_name']  = 'new_supplier';
        $page_data['page_title'] = get_phrase('new')." ".get_phrase('supplier');
		$page_data['countries']  = $this->db->get('countries')->result_array();
        $this->load->view('index', $page_data);
	}
	
	public function suppliers_information()
	{
		$page_data['page_name']  = 'suppliers_information';
		$page_data['page_title'] = get_phrase('suppliers')." ".get_phrase('information');
		$page_data['suppliers']  = $this->db->get('suppliers')->result_array();
        $this->load->view('index', $page_data);
	}
	
	public function suppliers($param1 = '', $param2 = '', $param3 = '')
	{
		if ($param1 == 'create') {
			$filename=substr(number_format(date("YmdHis")*rand(),0,'',''),0,12);
			$userpic = '';
			
			if($_FILES['userpic']['name'])
			{
				$path_parts = pathinfo($_FILES['userpic']['name']);
				$extension  = $path_parts['extension'];
				$userpic    = $filename.".".$extension;
				$upload 	 = move_uploaded_file($_FILES['userpic']['tmp_name'],'uploads/users_image/'.$userpic);	
			}
			
            $data['fname']    	   = $this->input->post('fname');
            $data['lname']           = $this->input->post('lname');
			$data['company']         = $this->input->post('company');
			$data['image']           = $userpic;
            $data['email']    	   = $this->input->post('email');
            $data['mobile']          = $this->input->post('mobile');
			$data['phone']	       = $this->input->post('phone');
			$data['country']		 = $this->input->post('country');
			$data['state']     	   = $this->input->post('province');
            $data['city']            = $this->input->post('city');
            $data['postal_code']     = $this->input->post('postal');
            $data['address']    	 = $this->input->post('address');
            $data['reg_date']        = date('Y-m-d');
			
            $this->db->insert('suppliers', $data);
            
            $this->session->set_flashdata('flash_message', get_phrase('added_successfully'));
			redirect(base_url().$this->session->userdata('roles'). '/suppliers_information/', 'refresh');
        }
		if ($param1 == 'do_update') 
		{
			$user_email = $this->crud_model->value_by_id('suppliers','id',$param2,'email');
			$filename=substr(number_format(date("YmdHis")*rand(),0,'',''),0,12);
			$userpic = '';
			
			if($_FILES['userpic']['name'])
			{
				$path_parts = pathinfo($_FILES['userpic']['name']);
				$extension  = $path_parts['extension'];
				$userpic    = $filename.".".$extension;
				$upload 	 = move_uploaded_file($_FILES['userpic']['tmp_name'],'uploads/users_image/'.$userpic);
				$data['image']  = $userpic;
				$datas['image']   		= $userpic;	
			}
			
            $data['fname']    	   = $this->input->post('fname');
            $data['lname']           = $this->input->post('lname');
			$data['company']         = $this->input->post('company');
            $data['email']    	   = $this->input->post('email');
            $data['mobile']          = $this->input->post('mobile');
			$data['phone']	       = $this->input->post('phone');
           
			$data['country']		 = $this->input->post('country');
			$data['state']     	   = $this->input->post('province');
            $data['city']            = $this->input->post('city');
            $data['postal_code']     = $this->input->post('postal');
            $data['address']    	 = $this->input->post('address');
			
			$this->db->where('id', $param2);
            $this->db->update('suppliers', $data);
            
            $this->session->set_flashdata('flash_message', get_phrase('updated_successfully'));
			redirect(base_url().$this->session->userdata('roles'). '/suppliers_information/', 'refresh');
        
        } 
		else if ($param1 == 'edit_suppliers') 
		{
            $page_data['edit_data'] = $this->db->get_where('suppliers', array('id' => $param2))->result_array();
			$page_data['countries']  = $this->db->get('countries')->result_array();
			$page_data['page_name']  = 'new_supplier';
			$page_data['page_title'] = get_phrase('edit')." ".get_phrase('supplier');
			$this->load->view('index', $page_data);
			
        }
		if ($param1 == 'delete_suppliers') 
		{
		   $this->db->delete('suppliers', array('id' => $param2)); 
           $this->session->set_flashdata('flash_message', get_phrase('deleted_successully'));
		   redirect(base_url().$this->session->userdata('roles'). '/suppliers_information/', 'refresh');
        }
	}
	
	public function userroles($param1 = '', $param2 = '', $param3 = '')
	{
		if ($param1 == 'do_update') 
		{
			$userdata  = $this->db->get_where('employees',array('id'=>$param2))->row();
			$data['name']           = $userdata->fname.' '.$userdata->lname;
            $data['email']          = $userdata->email;
			$data['password']       = $this->input->post('password');
			$data['role']           = $this->input->post('roles');
			$data['date_created']   = $userdata->reg_date;
			$data['status']         = 'active';
            $this->db->insert('users', $data);
            $this->email_model->account_opening_email('users', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL
            $this->session->set_flashdata('flash_message', get_phrase('added_successfully'));
			redirect(base_url().$this->session->userdata('roles'). '/employees_information/', 'refresh');
        
        } 
		
		
		
	}
	/*---------SMS/EMAIL MODULE------------------*/
	
	public function email()
	{
		$page_data['page_name']  = 'email';
        $page_data['page_title'] = get_phrase('send').' '.get_phrase('email');;
		$customers=  $this->db->select("email, CONCAT_WS(' ', fname, lname ) as name")->get('customers')->result();
		$employees = $this->db->select("email, CONCAT_WS(' ', fname, lname ) as name")->get('employees')->result();		
		$page_data['emails'] = array_merge($customers,$employees);
       $this->load->view('index', $page_data);
	}
	
	public function send_bulk_email()
	{
    		$data['temp']=$this->input->post('template');
			$data['c_email']=$this->input->post('email');
			$data['bcc']=$this->input->post('bcc');
			$data['subject']=$this->input->post('subject');	
			$data['message']=$this->input->post('editor1');					 
			if($_FILES['attachment']['name'])
			{					
				   $number_of_files = sizeof($_FILES['attachment']['tmp_name']);  
				    $files = $_FILES['attachment'];
				    $errors = array();			 
				    for($i=0;$i<$number_of_files;$i++)
				    {
				      if($_FILES['attachment']['error'][$i] != 0) $errors[$i][] = 'Couldn\'t upload file '.$_FILES['attachment']['name'][$i];
				    }
				    if(sizeof($errors)==0)
				    {				     
				      $this->load->library('upload');				     
				      $config['upload_path'] = 'uploads/send_mail';				     
				      $config['allowed_types'] = '*';
					  $config['overwrite'] = TRUE;
				      for ($i = 0; $i < $number_of_files; $i++)
					 {
					        $_FILES['attachment']['name'] = $files['name'][$i];
					        $_FILES['attachment']['type'] = $files['type'][$i];
					        $_FILES['attachment']['tmp_name'] = $files['tmp_name'][$i];
					        $_FILES['attachment']['error'] = $files['error'][$i];
					        $_FILES['attachment']['size'] = $files['size'][$i];					      
					        $this->upload->initialize($config);					      
					        if ($this->upload->do_upload('attachment'))
					        {
					           $data['uploads'][$i] = $this->upload->data()[full_path];
					        }
				      }
				    }
				  }
/*
echo "<pre>";
print_r($data);
				 die;*/

						
	
			
		   if($this->email_model->do_bulk_email($data)){
		   		$this->session->set_flashdata('flash_message', get_phrase('sent_successully'));
		   }
		   else{
		   	   $this->session->set_flashdata('message', $this->upload->display_errors());
		   }		   	
		   redirect(base_url().$this->session->userdata('roles'). '/email', 'refresh');
	}
   
   
    function getTemplate()
	{
		//echo $this->input->post('id');
		$query = $this->db->get_where('emailtemplate' , array('id' => $this->input->post('id')));
		print_r($query->row()->content);
	}
	
	public function sms()
	{
		$page_data['page_name']  = 'sms';
        $page_data['page_title'] = get_phrase('send').' '.get_phrase('sms');
        $this->load->view('index', $page_data);
	}
	
	public function send_sms()
	{							
					$contacts = $this->input->post('number');					
					$sms_text = urlencode($this->input->post('message'));
					if($this->sms_model->sendSms($contacts, $sms_text)==TRUE)
					{
						$this->session->set_flashdata('flash_message', get_phrase('sent_successfully'));		
					}
					else {
						$this->session->set_flashdata('flash_message', get_phrase('not_sent'));
					}
					redirect(base_url().$this->session->userdata('roles'). '/sms/', 'refresh');
        
	}
		
	/*---------UNDER SETTINGS TABS------------------*/
	public function categories($param1 = '', $param2 = '', $param3 = '')
	{
		if ($param1 == 'add_categories') {
			$this->form_validation->set_rules('code', get_phrase("code"), 'trim|is_unique[categories.code]|required|xss_clean');
		$this->form_validation->set_rules('name', get_phrase("name"), 'required|min_length[3]|xss_clean');
			if ($this->form_validation->run() == true)
			{
				$data['code']  = $this->input->post('code');
				$data['name']  = $this->input->post('name');
				$this->db->insert('categories', $data);
				$this->session->set_flashdata('flash_message', get_phrase('added_successfully'));
				redirect(base_url().$this->session->userdata('roles'). '/categories/', 'refresh');
			}
			else
			{ 
				$page_data['message'] = validation_errors();
				$page_data['page_name']  = 'categories';
				$page_data['page_title'] = get_phrase('categories');
				$page_data['categories']= $this->db->get('categories')->result_array();
				$this->load->view('index', $page_data);
				return false;
			}
			
		}
		if ($param1 == 'do_update') 
		{
			$this->form_validation->set_rules('code', get_phrase("code"), 'trim|required|xss_clean');
			$pr_details = $this->crud_model->get_value_by_id('categories',$param2,'code');
			if ($this->input->post('code') != $pr_details) {
				$this->form_validation->set_rules('code', get_phrase("category_code"), 'is_unique[categories.code]');
			}
		$this->form_validation->set_rules('name', get_phrase("name"), 'required|min_length[3]|xss_clean');
		
			if ($this->form_validation->run() == true)
			{
				$data['code']  = $this->input->post('code');
				$data['name']  = $this->input->post('name');
				$this->db->where('id', $param2);
				$this->db->update('categories', $data);
				$this->session->set_flashdata('flash_message', get_phrase('updated_successully'));
				redirect(base_url().$this->session->userdata('roles'). '/categories/', 'refresh');
			}
			else
			{ 
				$page_data['message'] = validation_errors();
				$page_data['page_name']  = 'categories';
				$page_data['page_title'] = get_phrase('categories');
				$page_data['categories']= $this->db->get('categories')->result_array();
				$this->load->view('index', $page_data);
				return false;
			}
        } 
		else if ($param2 == 'edit_categories') 
		{
            $page_data['edit_data'] = $this->db->get_where('categories', array('id' => $param3))->result_array();
        }
		if ($param1 == 'delete_categories') 
		{
            $this->db->where('id', $param2);
            $this->db->delete('categories');
           $this->session->set_flashdata('flash_message', get_phrase('deleted_successully'));
		   redirect(base_url().$this->session->userdata('roles'). '/categories/', 'refresh');
        }
		
		$page_data['page_name']  = 'categories';
        $page_data['page_title'] = get_phrase('categories');
		$page_data['categories']= $this->db->get('categories')->result_array();
        $this->load->view('index', $page_data);
	}
	
	public function subcategories($param1 = '', $param2 = '', $param3 = '')
	{
		if ($param1 == 'create') {
			
			$this->form_validation->set_rules('code', get_phrase("code"), 'trim|is_unique[subcategories.code]|required|xss_clean');
			$this->form_validation->set_rules('name', get_phrase("name"), 'required|min_length[3]|xss_clean');
			if ($this->form_validation->run() == true)
			{
				$data['category_id']  = $this->input->post('category');
				$data['code']  = $this->input->post('code');
				$data['name']  = $this->input->post('name');
				$this->db->insert('subcategories', $data);
				$this->session->set_flashdata('flash_message', get_phrase('added_successfully'));
				redirect(base_url().$this->session->userdata('roles'). '/subcategories/', 'refresh');
			}
			else
			{ 
				$page_data['message'] = validation_errors();
				$page_data['page_name']  = 'subcategories';
				$page_data['page_title'] = get_phrase('subcategories');
				$page_data['subcategories']= $this->db->get('subcategories')->result_array();
				$this->load->view('index', $page_data);
				return false;
			}
			
		}
		if ($param1 == 'do_update') 
		{
			$this->form_validation->set_rules('category', get_phrase("category"), 'required|xss_clean');
			$this->form_validation->set_rules('code', get_phrase("code"), 'trim|required|xss_clean');
			$pr_details = $this->crud_model->get_value_by_id('subcategories',$param2,'code');
			if ($this->input->post('code') != $pr_details) {
				$this->form_validation->set_rules('code', get_phrase("code"), 'is_unique[subcategories.code]');
			}
			$this->form_validation->set_rules('name', get_phrase("name"), 'trim|required|min_length[3]|xss_clean');
			if ($this->form_validation->run() == true)
			{
				$data['category_id']  = $this->input->post('category');
				$data['code']  = $this->input->post('code');
				$data['name']  = $this->input->post('name');
				$this->db->where('id', $param2);
				$this->db->update('subcategories', $data);
				$this->session->set_flashdata('flash_message', get_phrase('updated_successully'));
				redirect(base_url().$this->session->userdata('roles'). '/subcategories/', 'refresh');
			}
			else
			{ 
				$page_data['message'] = validation_errors();
				$page_data['page_name']  = 'subcategories';
				$page_data['page_title'] = get_phrase('subcategories');
				$page_data['subcategories']= $this->db->get('subcategories')->result_array();
		
				$this->load->view('index', $page_data);
				return false;
			}
        } 
		else if ($param2 == 'edit_subcategories') 
		{
            $page_data['edit_data'] = $this->db->get_where('subcategories', array('id' => $param3))->result_array();
        }
		if ($param1 == 'delete_subcategories') 
		{
            $this->db->where('id', $param2);
            $this->db->delete('subcategories');
           $this->session->set_flashdata('flash_message', get_phrase('deleted_successully'));
		   redirect(base_url().$this->session->userdata('roles'). '/subcategories/', 'refresh');
        }
		
		$page_data['page_name']  = 'subcategories';
        $page_data['page_title'] = get_phrase('subcategories');
		$page_data['subcategories']= $this->db->get('subcategories')->result_array();
        $this->load->view('index', $page_data);
	}
	
	public function cloth_styles($param1 = '', $param2 = '', $param3 = '')
	{
		if ($param1 == 'insert') {
		    $this->form_validation->set_rules('title', get_phrase("title"), 'required|min_length[3]|xss_clean');
			if ($this->form_validation->run() == true)
			{
				$data['title']  = $this->input->post('title');
				$this->db->insert('cloth_styles', $data);
				//echo $this->db->last_query();DIE;
				$this->session->set_flashdata('flash_message', get_phrase('added_successfully'));
				redirect(base_url().$this->session->userdata('roles'). '/cloth_styles/', 'refresh');
			}
			else
			{ 
				$page_data['message'] = validation_errors();
				$page_data['page_name']  = 'cloth_styles';
				$page_data['page_title'] = get_phrase('stitching');
				$page_data['cloth_styles']= $this->db->get('cloth_styles')->result_array();
				$this->load->view('index', $page_data);
				return false;
			}
			
		}
		if ($param1 == 'do_update') 
		{
			$this->form_validation->set_rules('title', get_phrase("title"), 'required|min_length[3]|xss_clean');
		
			if ($this->form_validation->run() == true)
			{
				$data['title']  = $this->input->post('title');
				$this->db->where('id', $param2);
				$this->db->update('cloth_styles', $data);
				$this->session->set_flashdata('flash_message', get_phrase('updated_successully'));
				redirect(base_url().$this->session->userdata('roles'). '/cloth_styles/', 'refresh');
			}
			else
			{ 
				$page_data['message'] = validation_errors();
				$page_data['page_name']  = 'cloth_styles';
				$page_data['page_title'] = get_phrase('stitching');
				$page_data['cloth_styles']= $this->db->get('cloth_styles')->result_array();
				$this->load->view('index', $page_data);
				return false;
			}
        } 
		if ($param1 == 'inactive_cloth_styles') 
		{
		   $data['status'] = 'inactive';
		   $this->db->where('id', $param2);
		   $this->db->update('cloth_styles', $data);
           $this->session->set_flashdata('flash_message', get_phrase('updated_successully'));
		   redirect(base_url().$this->session->userdata('roles'). '/cloth_styles/', 'refresh');
        }
		if ($param1 == 'active_cloth_styles') 
		{
		   $data['status'] = 'active';
		   $this->db->where('id', $param2);
		   $this->db->update('cloth_styles', $data);
           $this->session->set_flashdata('flash_message', get_phrase('updated_successully'));
		   redirect(base_url().$this->session->userdata('roles'). '/cloth_styles/', 'refresh');
        }
		if ($param1 == 'delete_cloth_styles') 
		{
            $this->db->where('id', $param2);
            $this->db->delete('cloth_styles');
           $this->session->set_flashdata('flash_message', get_phrase('deleted_successully'));
		   redirect(base_url().$this->session->userdata('roles'). '/cloth_styles/', 'refresh');
        }
		
		$page_data['page_name']  = 'cloth_styles';
        $page_data['page_title'] = get_phrase('cloth').' '.get_phrase('styles');
		$page_data['cloth_styles']= $this->db->get('cloth_styles')->result_array();
        $this->load->view('index', $page_data);
	}
	
	public function cloth_types($param1 = '', $param2 = '', $param3 = '')
	{
		if ($param1 == 'insert') {
		    $this->form_validation->set_rules('title', get_phrase("title"), 'required|min_length[3]|xss_clean');
			$this->form_validation->set_rules('parenttype', get_phrase("parent"), 'xss_clean');
			if ($this->form_validation->run() == true)
			{
				$data['title']  = $this->input->post('title');
				$data['parent_cloth_type']  = $this->input->post('parenttype');
				$data['description']  = $this->input->post('description');
				$this->db->insert('cloth_types', $data);
				//echo $this->db->last_query();DIE;
				$this->session->set_flashdata('flash_message', get_phrase('added_successfully'));
				redirect(base_url().$this->session->userdata('roles'). '/cloth_types/', 'refresh');
			}
			else
			{ 
				$page_data['message'] = validation_errors();
				$page_data['page_name']  = 'cloth_types';
				$page_data['page_title'] = get_phrase('cloth').' '.get_phrase('types');
				$page_data['cloth_types']= $this->db->get('cloth_types')->result_array();
				$this->load->view('index', $page_data);
				return false;
			}
			
		}
		if ($param1 == 'do_update') 
		{
			$this->form_validation->set_rules('title', get_phrase("title"), 'required|min_length[3]|xss_clean');
			$this->form_validation->set_rules('parenttype', get_phrase("parent"), 'xss_clean');
		
			if ($this->form_validation->run() == true)
			{
				$data['title']  = $this->input->post('title');
				$data['parent_cloth_type']  = $this->input->post('parenttype');
				$data['description']  = $this->input->post('description');
				$this->db->where('id', $param2);
				$this->db->update('cloth_types', $data);
				$this->session->set_flashdata('flash_message', get_phrase('updated_successully'));
				redirect(base_url().$this->session->userdata('roles'). '/cloth_types/', 'refresh');
			}
			else
			{ 
				$page_data['message'] = validation_errors();
				$page_data['page_name']  = 'cloth_types';
				$page_data['page_title'] = get_phrase('cloth').' '.get_phrase('types');
				$page_data['cloth_types']= $this->db->get('cloth_types')->result_array();
				$this->load->view('index', $page_data);
				return false;
			}
        } 
		if ($param1 == 'inactive_cloth_types') 
		{
		   $data['status'] = 'inactive';
		   $this->db->where('id', $param2);
		   $this->db->update('cloth_types', $data);
           $this->session->set_flashdata('flash_message', get_phrase('updated_successully'));
		   redirect(base_url().$this->session->userdata('roles'). '/cloth_types/', 'refresh');
        }
		if ($param1 == 'active_cloth_types') 
		{
		   $data['status'] = 'active';
		   $this->db->where('id', $param2);
		   $this->db->update('cloth_types', $data);
           $this->session->set_flashdata('flash_message', get_phrase('updated_successully'));
		   redirect(base_url().$this->session->userdata('roles'). '/cloth_types/', 'refresh');
        }
		if ($param1 == 'delete_cloth_types') 
		{
            $this->db->where('id', $param2);
            $this->db->delete('cloth_types');
           $this->session->set_flashdata('flash_message', get_phrase('deleted_successully'));
		   redirect(base_url().$this->session->userdata('roles'). '/cloth_types/', 'refresh');
        }
		
		$page_data['page_name']  = 'cloth_types';
        $page_data['page_title'] = get_phrase('cloth').' '.get_phrase('types');
		$page_data['cloth_types']= $this->db->get('cloth_types')->result_array();
        $this->load->view('index', $page_data);
	}
	
	public function sizes($param1 = '', $param2 = '', $param3 = '')
	{
		if ($param1 == 'add_sizes') {
			$this->form_validation->set_rules('code', get_phrase("code"), 'trim|is_unique[sizes.code]|required|xss_clean');
		$this->form_validation->set_rules('name', get_phrase("name"), 'required|min_length[3]|xss_clean');
			if ($this->form_validation->run() == true)
			{
				$data['code']  = $this->input->post('code');
				$data['name']  = $this->input->post('name');
				$this->db->insert('sizes', $data);
				$this->session->set_flashdata('flash_message', get_phrase('added_successfully'));
				redirect(base_url().$this->session->userdata('roles'). '/sizes/', 'refresh');
			}
			else
			{ 
				$page_data['message'] = validation_errors();
				$page_data['page_name']  = 'sizes';
				$page_data['page_title'] = get_phrase('sizes');
				$page_data['sizes']= $this->db->get('sizes')->result_array();
				$this->load->view('index', $page_data);
				return false;
			}
			
		}
		if ($param1 == 'do_update') 
		{
			$this->form_validation->set_rules('code', get_phrase("code"), 'trim|required|xss_clean');
			$pr_details = $this->crud_model->get_value_by_id('sizes',$param2,'code');
			if ($this->input->post('code') != $pr_details) {
				$this->form_validation->set_rules('code', get_phrase("category_code"), 'is_unique[sizes.code]');
			}
		$this->form_validation->set_rules('name', get_phrase("name"), 'required|min_length[3]|xss_clean');
		
			if ($this->form_validation->run() == true)
			{
				$data['code']  = $this->input->post('code');
				$data['name']  = $this->input->post('name');
				$this->db->where('id', $param2);
				$this->db->update('sizes', $data);
				$this->session->set_flashdata('flash_message', get_phrase('updated_successully'));
				redirect(base_url().$this->session->userdata('roles'). '/sizes/', 'refresh');
			}
			else
			{ 
				$page_data['message'] = validation_errors();
				$page_data['page_name']  = 'sizes';
				$page_data['page_title'] = get_phrase('sizes');
				$page_data['sizes']= $this->db->get('sizes')->result_array();
				$this->load->view('index', $page_data);
				return false;
			}
        } 
		else if ($param2 == 'edit_sizes') 
		{
            $page_data['edit_data'] = $this->db->get_where('sizes', array('id' => $param3))->result_array();
        }
		if ($param1 == 'delete_sizes') 
		{
            $this->db->where('id', $param2);
            $this->db->delete('sizes');
           $this->session->set_flashdata('flash_message', get_phrase('deleted_successully'));
		   redirect(base_url().$this->session->userdata('roles'). '/sizes/', 'refresh');
        }
		
		$page_data['page_name']  = 'sizes';
        $page_data['page_title'] = get_phrase('sizes');
		$page_data['sizes']= $this->db->get('sizes')->result_array();
        $this->load->view('index', $page_data);
	}
	
	public function stitching($param1 = '', $param2 = '', $param3 = '')
	{
		if ($param1 == 'insert') {
			$this->form_validation->set_rules('gender', get_phrase("gender"), 'trim|required|xss_clean');
		    $this->form_validation->set_rules('item', get_phrase("item"), 'required|min_length[3]|xss_clean');
			if ($this->form_validation->run() == true)
			{
				$data['gender']  = $this->input->post('gender');
				$data['item']  = $this->input->post('item');
				$this->db->insert('stitching', $data);
				//echo $this->db->last_query();DIE;
				$this->session->set_flashdata('flash_message', get_phrase('added_successfully'));
				redirect(base_url().$this->session->userdata('roles'). '/stitching/', 'refresh');
			}
			else
			{ 
				$page_data['message'] = validation_errors();
				$page_data['page_name']  = 'stitching';
				$page_data['page_title'] = get_phrase('stitching');
				$page_data['stitchings']= $this->db->get('stitching')->result_array();
				$this->load->view('index', $page_data);
				return false;
			}
			
		}
		if ($param1 == 'do_update') 
		{
			$this->form_validation->set_rules('gender', get_phrase("gender"), 'trim|required|xss_clean');
			$this->form_validation->set_rules('item', get_phrase("item"), 'required|min_length[3]|xss_clean');
		
			if ($this->form_validation->run() == true)
			{
				$data['gender']  = $this->input->post('gender');
				$data['item']  = $this->input->post('item');
				$this->db->where('id', $param2);
				$this->db->update('stitching', $data);
				$this->session->set_flashdata('flash_message', get_phrase('updated_successully'));
				redirect(base_url().$this->session->userdata('roles'). '/stitching/', 'refresh');
			}
			else
			{ 
				$page_data['message'] = validation_errors();
				$page_data['page_name']  = 'stitching';
				$page_data['page_title'] = get_phrase('stitching');
				$page_data['stitchings']= $this->db->get('stitching')->result_array();
				$this->load->view('index', $page_data);
				return false;
			}
        } 
		if ($param1 == 'inactive_stitching') 
		{
		   $data['status'] = 'inactive';
		   $this->db->where('id', $param2);
		   $this->db->update('stitching', $data);
           $this->session->set_flashdata('flash_message', get_phrase('updated_successully'));
		   redirect(base_url().$this->session->userdata('roles'). '/stitching/', 'refresh');
        }
		if ($param1 == 'active_stitching') 
		{
		   $data['status'] = 'active';
		   $this->db->where('id', $param2);
		   $this->db->update('stitching', $data);
           $this->session->set_flashdata('flash_message', get_phrase('updated_successully'));
		   redirect(base_url().$this->session->userdata('roles'). '/stitching/', 'refresh');
        }
		if ($param1 == 'delete_stitchings') 
		{
            $this->db->where('id', $param2);
            $this->db->delete('stitching');
           $this->session->set_flashdata('flash_message', get_phrase('deleted_successully'));
		   redirect(base_url().$this->session->userdata('roles'). '/stitching/', 'refresh');
        }
		
		$page_data['page_name']  = 'stitching';
        $page_data['page_title'] = get_phrase('stitching');
		$page_data['stitchings']= $this->db->get('stitching')->result_array();
        $this->load->view('index', $page_data);
	}
	
	public function pattern($param1 = '', $param2 = '', $param3 = '')
	{
		if($param1=='add')
		{
			$page_data['page_name']  = 'pattern';
			$page_data['page_title'] = get_phrase('pattern');
			$page_data['stitching']  = $this->db->get_where('stitching' , array('id' => $param2) )->row();
			$page_data['patterns']   = $this->db->get_where('pattern' , array('item_id' => $param2))->result_array();
			$this->load->view('index', $page_data);
			return false;	
		}
		if ($param1 == 'insert') {
			//echo "<pre>";
			//print_r($this->input->post());die;
			$this->form_validation->set_rules('gender', get_phrase("gender"), 'trim|required|xss_clean');
		    $this->form_validation->set_rules('item', get_phrase("item"), 'required|min_length[3]|xss_clean');
			$this->form_validation->set_rules('pattern', get_phrase("pattern"), 'required|min_length[3]|xss_clean');
			if ($this->form_validation->run() == true)
			{
				$data['gender']  = $this->input->post('gender');
				$data['item']    = $this->input->post('item');
				$data['item_id']  = $this->input->post('item_id');
				$data['pattern']  = $this->input->post('pattern');
				
				$this->db->insert('pattern', $data);
				//echo $this->db->last_query();DIE;
				$this->session->set_flashdata('flash_message', get_phrase('added_successfully'));
				redirect($this->agent->referrer(), 'refresh');
			}
			else
			{ 
				$page_data['message'] = validation_errors();
				$page_data['page_name']  = 'pattern';
				$page_data['page_title'] = get_phrase('pattern');
				$page_data['stitching']  = $this->db->get_where('stitching' , array('id' => $param2) )->row();
				$this->load->view('index', $page_data);
				return false;
			}
			
		}
		if ($param1 == 'edit') {
			$page_data['page_name']  = 'pattern';
			$page_data['page_title'] = get_phrase('edit').' '.get_phrase('pattern');
			$page_data['edit_data']= $this->db->get_where('pattern' , array('id' => $param3))->result_array();
			$page_data['patterns']= $this->db->get_where('pattern' , array('item_id' => $param2))->result_array();
			$this->load->view('index', $page_data);
			return false;	
		}
		if ($param1 == 'do_update') 
		{
			$this->form_validation->set_rules('pattern', get_phrase("pattern"), 'required|min_length[3]|xss_clean');
		
			if ($this->form_validation->run() == true)
			{
				$data['pattern']  = $this->input->post('pattern');
				$this->db->where('id', $param2);
				$this->db->update('pattern', $data);
				$this->session->set_flashdata('flash_message', get_phrase('updated_successully'));
				redirect($this->agent->referrer(), 'refresh');
			}
			else
			{ 
				$page_data['message'] = validation_errors();
				$page_data['page_name']  = 'pattern';
				$page_data['page_title'] = get_phrase('pattern');
				$page_data['stitching']  = $this->db->get_where('stitching' , array('id' => $param2) )->row();
				$this->load->view('index', $page_data);
				return false;
			}
        } 
		if ($param1 == 'inactive_pattern') 
		{
		   $data['status'] = 'inactive';
		   $this->db->where('id', $param2);
		   $this->db->update('pattern', $data);
           $this->session->set_flashdata('flash_message', get_phrase('updated_successully'));
		   redirect($this->agent->referrer(), 'refresh');
        }
		if ($param1 == 'active_pattern') 
		{
		   $data['status'] = 'active';
		   $this->db->where('id', $param2);
		   $this->db->update('pattern', $data);
           $this->session->set_flashdata('flash_message', get_phrase('updated_successully'));
		   redirect($this->agent->referrer(), 'refresh');
        }
		
		$page_data['page_name']  = 'pattern';
		$page_data['showpt']  = 'pattern';
        $page_data['page_title'] = get_phrase('pattern');
		$page_data['patterns']= $this->db->get('pattern')->result_array();
        $this->load->view('index', $page_data);
	}
	
	public function style($param1 = '', $param2 = '', $param3 = '')
	{
		if($param1=='add')
		{
			$page_data['page_name']  = 'style';
			$page_data['page_title'] = get_phrase('style');
			$page_data['patterns']   = $this->db->get_where('pattern' , array('id' => $param2))->row();
			$page_data['styles']     = $this->db->get_where('style' , array('pattern_id' => $param2))->result_array();
			
			$this->load->view('index', $page_data);
			return false;	
		}
		if ($param1 == 'insert') {
			/*echo "<pre>";
			print_r($this->input->post());die;*/
			$this->form_validation->set_rules('gender', get_phrase("gender"), 'trim|required|xss_clean');
		    $this->form_validation->set_rules('item', get_phrase("item"), 'required|min_length[3]|xss_clean');
			$this->form_validation->set_rules('pattern', get_phrase("pattern"), 'required|min_length[3]|xss_clean');
			$this->form_validation->set_rules('style', get_phrase("style"), 'required|min_length[3]|xss_clean');
			
			if ($this->form_validation->run() == true)
			{
				$data['gender']  = $this->input->post('gender');
				$data['item']    = $this->input->post('item');
				$data['item_id']  = $this->input->post('item_id');
				$data['pattern_id']  = $this->input->post('pattern_id');
				$data['pattern']  = $this->input->post('pattern');
				$data['style']  = $this->input->post('style');
				
				$this->db->insert('style', $data);
				//echo $this->db->last_query();DIE;
				$this->session->set_flashdata('flash_message', get_phrase('added_successfully'));
				redirect($this->agent->referrer(), 'refresh');
			}
			else
			{ 
				$page_data['message'] = validation_errors();
				$page_data['page_name']  = 'style';
				$page_data['page_title'] = get_phrase('style');
				$page_data['stitching']  = $this->db->get_where('stitching' , array('id' => $param2) )->row();
				$this->load->view('index', $page_data);
				return false;
			}
			
		}
		if ($param1 == 'edit') {
			$page_data['page_name']  = 'style';
			$page_data['page_title'] = get_phrase('edit').' '.get_phrase('style');
			$page_data['edit_data']= $this->db->get_where('style' , array('id' => $param3))->result_array();
			$page_data['styles']= $this->db->get_where('style' , array('pattern_id' => $param2))->result_array();
			$this->load->view('index', $page_data);
			return false;	
		}
		if ($param1 == 'do_update') 
		{
			$this->form_validation->set_rules('style', get_phrase("style"), 'required|min_length[3]|xss_clean');
		
			if ($this->form_validation->run() == true)
			{
				$data['style']  = $this->input->post('style');
				$this->db->where('id', $param2);
				$this->db->update('style', $data);
				$this->session->set_flashdata('flash_message', get_phrase('updated_successully'));
				redirect($this->agent->referrer(), 'refresh');
			}
			else
			{ 
				$page_data['message'] = validation_errors();
				$page_data['page_name']  = 'style';
				$page_data['page_title'] = get_phrase('style');
				$page_data['styles']  = $this->db->get_where('style' , array('id' => $param3) )->row();
				$this->load->view('index', $page_data);
				return false;
			}
        } 
		if ($param1 == 'inactive_style') 
		{
		   $data['status'] = 'inactive';
		   $this->db->where('id', $param2);
		   $this->db->update('style', $data);
           $this->session->set_flashdata('flash_message', get_phrase('updated_successully'));
		   redirect($this->agent->referrer(), 'refresh');
        }
		if ($param1 == 'active_style') 
		{
		   $data['status'] = 'active';
		   $this->db->where('id', $param2);
		   $this->db->update('style', $data);
           $this->session->set_flashdata('flash_message', get_phrase('updated_successully'));
		   redirect($this->agent->referrer(), 'refresh');
        }
		
		$page_data['page_name']  = 'style';
		$page_data['showpt']  = 'style';
        $page_data['page_title'] = get_phrase('style');
		$page_data['styles']= $this->db->get('style')->result_array();
        $this->load->view('index', $page_data);
	}
	
	public function measurement($param1 = '', $param2 = '', $param3 = '')
	{
		if($param1=='add')
		{
			$page_data['page_name']  = 'measurement';
			$page_data['page_title'] = get_phrase('measurement');
			$page_data['styles']   = $this->db->get_where('style' , array('id' => $param2))->row();
			$page_data['measurements'] = $this->db->get_where('measurement' , array('style_id' => $param2))->result_array();
			
			$this->load->view('index', $page_data);
			return false;	
		}
		if ($param1 == 'insert') {
			/*echo "<pre>";
			print_r($this->input->post());die;*/
			$this->form_validation->set_rules('gender', get_phrase("gender"), 'trim|required|xss_clean');
		    $this->form_validation->set_rules('item', get_phrase("item"), 'required|min_length[3]|xss_clean');
			$this->form_validation->set_rules('pattern', get_phrase("pattern"), 'required|min_length[3]|xss_clean');
			$this->form_validation->set_rules('style', get_phrase("style"), 'required|min_length[3]|xss_clean');
			$this->form_validation->set_rules('title', get_phrase("measurement").' '.get_phrase("title"), 'required|min_length[3]|xss_clean');
			$this->form_validation->set_rules('unit', get_phrase("measurement").' '.get_phrase("unit"), 'required|min_length[3]|xss_clean');
			
			if ($this->form_validation->run() == true)
			{
				$data['gender']  = $this->input->post('gender');
				$data['item']    = $this->input->post('item');
				$data['item_id']  = $this->input->post('item_id');
				$data['pattern_id']  = $this->input->post('pattern_id');
				$data['pattern']  = $this->input->post('pattern');
				$data['style_id']  = $this->input->post('style_id');
				$data['style']  = $this->input->post('style');
				$data['measurement_title']  = $this->input->post('title');
				$data['measurement_unit']  = $this->input->post('unit');
				$this->db->insert('measurement', $data);
				$this->session->set_flashdata('flash_message', get_phrase('added_successfully'));
				redirect($this->agent->referrer(), 'refresh');
			}
			else
			{ 
				$page_data['message'] = validation_errors();
				$page_data['page_name']  = 'measurement';
				$page_data['page_title'] = get_phrase('measurement');
				$page_data['styles']   = $this->db->get_where('style' , array('id' => $this->input->post('style_id')))->row();
				$page_data['measurements'] = $this->db->get_where('measurement' , array('style_id' => $this->input->post('style_id')))->result_array();
				$this->load->view('index', $page_data);
				return false;
			}
			
		}
		if ($param1 == 'edit') {
			$page_data['page_name']  = 'measurement';
			$page_data['page_title'] = get_phrase('edit').' '.get_phrase('measurement');
			
			$page_data['edit_data']= $this->db->get_where('measurement' , array('id' => $param3))->result_array();
			$page_data['measurements']= $this->db->get_where('measurement' , array('item_id' => $param2))->result_array();
			$this->load->view('index', $page_data);
			return false;	
		}
		if ($param1 == 'do_update') 
		{
			$this->form_validation->set_rules('title', get_phrase("measurement").' '.get_phrase("title"), 'required|min_length[3]|xss_clean');
			$this->form_validation->set_rules('unit', get_phrase("measurement").' '.get_phrase("unit"), 'required|min_length[3]|xss_clean');
		
			if ($this->form_validation->run() == true)
			{
				$data['measurement_title']  = $this->input->post('title');
				$data['measurement_unit']  = $this->input->post('unit');
				$this->db->where('id', $param2);
				$this->db->update('measurement', $data);
				$this->session->set_flashdata('flash_message', get_phrase('updated_successully'));
				redirect($this->agent->referrer(), 'refresh');
			}
			else
			{ 
				$page_data['message'] = validation_errors();
				$page_data['page_name']  = 'measurement';
				$page_data['page_title'] = get_phrase('measurement');
				$page_data['styles']   = $this->db->get_where('style' , array('id' => $this->input->post('style_id')))->row();
				$page_data['measurements'] = $this->db->get_where('measurement' , array('style_id' => $this->input->post('style_id')))->result_array();
				$this->load->view('index', $page_data);
				return false;
			}
        } 
		if ($param1 == 'inactive_measurement') 
		{
		   $data['status'] = 'inactive';
		   $this->db->where('id', $param2);
		   $this->db->update('measurement', $data);
           $this->session->set_flashdata('flash_message', get_phrase('updated_successully'));
		   redirect($this->agent->referrer(), 'refresh');
        }
		if ($param1 == 'active_measurement') 
		{
		   $data['status'] = 'active';
		   $this->db->where('id', $param2);
		   $this->db->update('measurement', $data);
           $this->session->set_flashdata('flash_message', get_phrase('updated_successully'));
		   redirect($this->agent->referrer(), 'refresh');
        }
		$page_data['page_name']  = 'measurement';
		$page_data['showpt']  = 'measurement';
        $page_data['page_title'] = get_phrase('measurement');
		$page_data['measurements']= $this->db->get('measurement')->result_array();
        $this->load->view('index', $page_data);
	}
	
	public function taxes($param1 = '', $param2 = '', $param3 = '')
	{
		if ($param1 == 'add_taxes') {
			$this->form_validation->set_rules('name', get_phrase("name"), 'trim|required|xss_clean');
		$this->form_validation->set_rules('rate', get_phrase("rate"), 'required|xss_clean');
		$this->form_validation->set_rules('type', get_phrase("type"), 'required|xss_clean');
			if ($this->form_validation->run() == true)
			{
				$data['name']  = $this->input->post('name');
				$data['rate']  = $this->input->post('rate');
				$data['type']  = $this->input->post('type');
				$this->db->insert('tax_rates', $data);
				$this->session->set_flashdata('flash_message', get_phrase('added_successfully'));
				redirect(base_url().$this->session->userdata('roles'). '/taxes/', 'refresh');
			}
			else
			{ 
				$page_data['message'] = validation_errors();
				$page_data['page_name']  = 'taxes';
				$page_data['page_title'] = get_phrase('tax').' '.get_phrase('rates');
				$page_data['taxes']= $this->db->get('tax_rates')->result_array();
				$this->load->view('index', $page_data);
				return false;
			}
			
		}
		if ($param1 == 'do_update') 
		{
			$this->form_validation->set_rules('name', get_phrase("name"), 'trim|required|xss_clean');
		$this->form_validation->set_rules('rate', get_phrase("rate"), 'required|xss_clean');
		$this->form_validation->set_rules('type', get_phrase("type"), 'required|xss_clean');
			if ($this->form_validation->run() == true)
			{
				$data['name']  = $this->input->post('name');
				$data['rate']  = $this->input->post('rate');
				$data['type']  = $this->input->post('type');
				
				$this->db->where('id', $param2);
				$this->db->update('tax_rates', $data);
				$this->session->set_flashdata('flash_message', get_phrase('updated_successully'));
				redirect(base_url().$this->session->userdata('roles'). '/taxes/', 'refresh');
			}
			else
			{ 
				$page_data['message'] = validation_errors();
				$page_data['page_name']  = 'taxes';
				$page_data['page_title'] = get_phrase('tax').' '.get_phrase('rates');
				$page_data['taxes']= $this->db->get('tax_rates')->result_array();
				$this->load->view('index', $page_data);
				return false;
			}
        } 
		else if ($param2 == 'edit_taxes') 
		{
            $page_data['edit_data'] = $this->db->get_where('tax_rates', array('id' => $param3))->result_array();
        }
		if ($param1 == 'delete_taxes') 
		{
            $this->db->where('id', $param2);
            $this->db->delete('taxes');
           $this->session->set_flashdata('flash_message', get_phrase('deleted_successully'));
		   redirect(base_url().$this->session->userdata('roles'). '/taxes/', 'refresh');
        }
		
		$page_data['page_name']  = 'taxes';
        $page_data['page_title'] = get_phrase('tax').' '.get_phrase('rates');
		$page_data['taxes']= $this->db->get('tax_rates')->result_array();
        $this->load->view('index', $page_data);
	}
	
	public function discounts($param1 = '', $param2 = '', $param3 = '')
	{
		if ($param1 == 'add_discounts') {
			$this->form_validation->set_message('is_natural_no_zero', get_phrase('no_zero_required'));
			$this->form_validation->set_rules('name', get_phrase("name"), 'trim|required|xss_clean');
			$this->form_validation->set_rules('discount', get_phrase("discount"), 'trim|required|xss_clean');
			$this->form_validation->set_rules('type', get_phrase("type"), 'trim|is_natural_no_zero|required|xss_clean');
			if ($this->form_validation->run() == true)
			{
				$data['name']  = $this->input->post('name');
				$data['discount']  = $this->input->post('discount');
				$data['type']  = $this->input->post('type');
				$this->db->insert('discounts', $data);
				$this->session->set_flashdata('flash_message', get_phrase('added_successfully'));
				redirect(base_url().$this->session->userdata('roles'). '/discounts/', 'refresh');
			}
			else
			{ 
				$page_data['message'] = validation_errors();
				$page_data['page_name']  = 'discounts';
				$page_data['page_title'] = get_phrase('discounts');
				$page_data['discounts']= $this->db->get('discounts')->result_array();
				$this->load->view('index', $page_data);
				return false;
			}
			
		}
		if ($param1 == 'do_update') 
		{
			$this->form_validation->set_message('is_natural_no_zero', get_phrase('no_zero_required'));
			$this->form_validation->set_rules('name', get_phrase("name"), 'trim|required|xss_clean');
			$this->form_validation->set_rules('discount', get_phrase("discount"), 'trim|required|xss_clean');
			$this->form_validation->set_rules('type', get_phrase("type"), 'trim|is_natural_no_zero|required|xss_clean');
			if ($this->form_validation->run() == true)
			{
				$data['name']  = $this->input->post('name');
				$data['discount']  = $this->input->post('discount');
				$data['type']  = $this->input->post('type');
				$this->db->where('id', $param2);
				$this->db->update('discounts', $data);
				$this->session->set_flashdata('flash_message', get_phrase('added_successfully'));
				redirect(base_url().$this->session->userdata('roles'). '/discounts/', 'refresh');
			}
			else
			{ 
				$page_data['message'] = validation_errors();
				$page_data['page_name']  = 'discounts';
				$page_data['page_title'] = get_phrase('discounts');
				$page_data['discounts']= $this->db->get('discounts')->result_array();
				$this->load->view('index', $page_data);
				return false;
			}
        } 
		if ($param1 == 'delete_discounts') 
		{
            $this->db->where('id', $param2);
            $this->db->delete('discounts');
           $this->session->set_flashdata('flash_message', get_phrase('deleted_successully'));
		   redirect(base_url().$this->session->userdata('roles'). '/discounts/', 'refresh');
        }
		
		$page_data['page_name']  = 'discounts';
        $page_data['page_title'] = get_phrase('discounts');
		$page_data['discounts']= $this->db->get('discounts')->result_array();
        $this->load->view('index', $page_data);
	}



	
	/*---------CHANGE PASSWORD------------------*/
	
	function change_password()
	{
$this->form_validation->set_rules('old_pass', get_phrase("password"), 'required|callback_check_pass');
		$this->form_validation->set_rules('new_pass', get_phrase("new_password"), 'required|min_length[8]|max_length[12]|matches[cn_pass]');
		$this->form_validation->set_rules('cn_pass', get_phrase("confirm_new_password"), 'required');
		
		if ($this->form_validation->run() == false)
		{ //display the form
			//set the flash data error message if there is one
			$page_data['message'] = validation_errors();
			$page_data['min_password_length'] = '8';
			$page_data['old_password'] = array(
				'name' => 'old_pass',
				'type' => 'password',
			);
			$page_data['new_password'] = array(
				'name' => 'new_pass',
				'type' => 'password',
				'pattern' => '^.{'.$page_data['min_password_length'].'}.*$',
			);
			$page_data['new_password_confirm'] = array(
				'name' => 'cn_pass',
				'type' => 'password',
				'pattern' => '^.{'.$page_data['min_password_length'].'}.*$',
			);
			$page_data['user_id'] = array(
				'name'  => 'user_id',
				'type'  => 'hidden',
				'value' => $this->session->userdata('user_id'),
			);

			//render
			$page_data['page_name']  = 'change_password';
			$page_data['page_title'] = get_phrase('change_password');
			$this->load->view('index', $page_data);
			
		}
		else
		{
			$data['password']  = $this->input->post('new_pass');
			$this->db->where('user_id', $this->input->post('user_id'));
			$this->db->update('users', $data);
			$this->session->set_flashdata('flash_message', get_phrase('updated_successully'));
			redirect(base_url().$this->session->userdata('roles'). '/change_password/', 'refresh');
		}
		
	}
	
	/*---------SYSTEM SETTINGS------------------*/
	
	function system_settings()
	{
		
	  if($this->input->post('act')=="setting_update"){
		  	
			if($_FILES['site_logo']['name']){
			 move_uploaded_file($_FILES['site_logo']['tmp_name'], 'uploads/site_logo.png');
			 
			 $filename = 'site_logo.png';
			 $data['description'] = $filename;
			 $this->db->where('type' , 'system_logo');
			 $this->db->update('settings' , $data);
			 }
			  
			 $data['description'] = $this->input->post('system_name');
			 $this->db->where('type' , 'system_name');
			 $this->db->update('settings' , $data);
			 
			 $data['description'] = $this->input->post('system_title');
			 $this->db->where('type' , 'system_title');
			 $this->db->update('settings' , $data);
			 
			 $data['description'] = $this->input->post('address');
			 $this->db->where('type' , 'address');
			 $this->db->update('settings' , $data);
			 
			 $data['description'] = $this->input->post('phone');
			 $this->db->where('type' , 'phone');
			 $this->db->update('settings' , $data);
			 
			  $data['description'] = $this->input->post('system_email');
			 $this->db->where('type' , 'system_email');
			 $this->db->update('settings' , $data);
			 
			 $data['description'] = $this->input->post('currency');
			 $this->db->where('type' , 'currency');
			 $this->db->update('settings' , $data);
			 
			 $data['description'] = $this->input->post('system_email');
			 $this->db->where('type' , 'system_email');
			 $this->db->update('settings' , $data);
			 
			 $data['description'] = $this->input->post('language');
			 $this->db->where('type' , 'language');
			 $this->db->update('settings' , $data);
			 
			 $data['description'] = $this->input->post('theme');
			 $this->db->where('type' , 'theme');
			 $this->db->update('settings' , $data);
			 
			 $data['description'] = $this->input->post('purchase_prefix');
			 $this->db->where('type' , 'purchase_prefix');
			 $this->db->update('settings' , $data);
			 
			 $data['description'] = $this->input->post('order_prefix');
			 $this->db->where('type' , 'order_prefix');
			 $this->db->update('settings' , $data);
			 
			 $data['description'] = $this->input->post('invoice_prefix');
			 $this->db->where('type' , 'invoice_prefix');
			 $this->db->update('settings' , $data);
			 
			 $data['description'] = $this->input->post('tax_rate');
			 $this->db->where('type' , 'default_tax_rate');
			 $this->db->update('settings' , $data);
			 
			 $data['description'] = $this->input->post('tax_rate2');
			 $this->db->where('type' , 'default_tax_rate2');
			 $this->db->update('settings' , $data);
			 
			 if($this->input->post('tax_rate') != 0) { $tax1 = 1; } else { $tax1 = 0; }
			 if($this->input->post('tax_rate2') != 0) { $tax2 = 1; } else { $tax2 = 0; }
			 
			 $data['description'] = $tax1;
			 $this->db->where('type' , 'tax1');
			 $this->db->update('settings' , $data);
			 
			 $data['description'] = $tax2;
			 $this->db->where('type' , 'tax2');
			 $this->db->update('settings' , $data);
			 
			 $data['description'] = $this->input->post('discount_option');
			 $this->db->where('type' , 'discount_option');
			 $this->db->update('settings' , $data);
			 
			 $data['description'] = $this->input->post('discount_method');
			 $this->db->where('type' , 'discount_method');
			 $this->db->update('settings' , $data);
			 
			 $data['description'] = $this->input->post('default_discount');
			 $this->db->where('type' , 'default_discount');
			 $this->db->update('settings' , $data);
			 
			 $data['description'] = $this->input->post('default_bonus');
			 $this->db->where('type' , 'default_bonus');
			 $this->db->update('settings' , $data);
			 
			 $data['description'] = $this->input->post('dateformat');
			 $this->db->where('type' , 'dateformat');
			 $this->db->update('settings' , $data);
			 
			  $data['description'] = $this->input->post('total_rows');
			 $this->db->where('type' , 'total_rows');
			 $this->db->update('settings' , $data);
			 
            $this->session->set_flashdata('flash_message',get_phrase('settings_updated'));
        
		
	  }
        $page_data['page_name']  = 'system_settings';
        $page_data['page_title'] = get_phrase('system_settings');
        $page_data['settings']   = $this->db->get('settings')->result_array();
		$page_data['discounts']   = $this->db->get('discounts')->result();
		$page_data['bonuses']   = $this->db->get('bonus')->result();
        $this->load->view('index', $page_data);
    }
	
	/*---------ORDER SETTINGS------------------*/
	
	function order_settings()
	{
		if($this->input->post('act') == 'order_update'){
			
		 $data['description'] = $this->input->post('order_limit');
		 $this->db->where('type' , 'order_limit');
		 $this->db->update('order_settings' , $data);
		 
		 $data['description'] = $this->input->post('default_customer');
		 $this->db->where('type' , 'default_customer');
		 $this->db->update('order_settings' , $data);
		 
		 $data['description'] = $this->input->post('display_time');
		 $this->db->where('type' , 'display_time');
		 $this->db->update('order_settings' , $data);
		 
		 $this->session->set_flashdata('flash_message',get_phrase('settings_updated'));
		}
		 $page_data['page_name']  = 'order_settings';
		 $page_data['page_title'] = get_phrase('order').' '.get_phrase('configuration');
		 $page_data['customers']  = $this->db->get_where('customers', array('status' => 'active'))->result_array();
		 $this->load->view('index', $page_data);
    }
	
	/*---------SMTP CONFIGURATION------------------*/
	
	public function smtp_configuration()
	{
		if($this->input->post('act')=="smtp_update")
		{
			$arr = array("smtp" => $this->input->post('smtp'),
						  "port" => $this->input->post('port'),
						  "username" => $this->input->post('username'),
						  "password" => $this->input->post('password'));
			$data['description']  = json_encode($arr);
		    $this->db->where('type' , 'smtpConfoguration');
		    $this->db->update('settings' , $data);	
		}
		$page_data['page_name']  = 'smtp_configuration';
        $page_data['page_title'] = get_phrase('smtp_configuration');
		$page_data['smtps']      = json_decode($this->crud_model->value_by_id('settings','type','smtpConfoguration','description'));				
        $this->load->view('index', $page_data);
	}
	
	/*--------------------SMS CONFIGURATION-------------------------*/
	public function manage_sender($param1 = '', $param2 = '', $param3 = '')
	{
		if ($param1 == 'add_smssender') {
			$this->form_validation->set_rules('senderid', get_phrase("sender").' '.get_phrase('id'), 'trim|is_unique[smssender.senderid]|required|xss_clean');
			if ($this->form_validation->run() == true)
			{
				$data['senderid']  = $this->input->post('senderid');
				$data['status']  = $this->input->post('status');
				$this->db->insert('smssender', $data);
				$this->session->set_flashdata('flash_message', get_phrase('added_successfully'));
				redirect(base_url().$this->session->userdata('roles'). '/manage_sender/', 'refresh');
			}
			else
			{ 
				$page_data['message'] = validation_errors();
				$page_data['page_name']  = 'manage_sender';
				$page_data['page_title'] = get_phrase('manage').' '.get_phrase('sender').' '.get_phrase('id');
				$page_data['senderIds']= $this->db->get('smssender')->result_array();
				$this->load->view('index', $page_data);
				return false;
			}
			
		}
		if ($param1 == 'do_update') 
		{
			$this->form_validation->set_rules('senderid', get_phrase("sender").' '.get_phrase('id'), 'trim|required|xss_clean');
			$pr_details = $this->crud_model->get_value_by_id('smssender',$param2,'senderid');
			if ($this->input->post('senderid') != $pr_details) {
				$this->form_validation->set_rules('senderid', get_phrase("sender"), 'is_unique[smssender.senderid]');
			}
		
			if ($this->form_validation->run() == true)
			{
				$data['senderid']  = $this->input->post('senderid');
				$data['status']  = $this->input->post('status');
				$this->db->where('id', $param2);
				$this->db->update('smssender', $data);
				$this->session->set_flashdata('flash_message', get_phrase('updated_successully'));
				redirect(base_url().$this->session->userdata('roles'). '/manage_sender/', 'refresh');
			}
			else
			{ 
				$page_data['message'] = validation_errors();
				$page_data['page_name']  = 'manage_sender';
				$page_data['page_title'] = get_phrase('manage').' '.get_phrase('sender').' '.get_phrase('id');
				$page_data['senderIds']= $this->db->get('smssender')->result_array();
				$this->load->view('index', $page_data);
				return false;
			}
        } 
		if ($param1 == 'delete_senderid') 
		{
            $this->db->where('id', $param2);
            $this->db->delete('smssender');
           $this->session->set_flashdata('flash_message', get_phrase('deleted_successully'));
		   redirect(base_url().$this->session->userdata('roles'). '/manage_sender/', 'refresh');
        }
		
		$page_data['page_name']  = 'manage_sender';
        $page_data['page_title'] = get_phrase('manage').' '.get_phrase('sender').' '.get_phrase('id');
		$page_data['senderIds']= $this->db->get('smssender')->result_array();
        $this->load->view('index', $page_data);
	}

	/*---------------------------------------------------------SMS TEMPLATES---------------------------------*/
	public function sms_templates($param1 = '', $param2 = '', $param3 = '')
	{
		if ($param1 == 'add_sms_template') {
			$this->form_validation->set_rules('content', get_phrase("content"), 'trim|required|xss_clean');
			if ($this->form_validation->run() == true)
			{
				$data['content']  = $this->input->post('content');
				$data['title']  = $this->input->post('title');
				$this->db->insert('smstemplate', $data);
				
				$this->session->set_flashdata('flash_message', get_phrase('added_successfully'));
				redirect(base_url().$this->session->userdata('roles'). '/sms_templates/', 'refresh');
			}
			else
			{ 
				$page_data['message'] = validation_errors();
				$page_data['page_name']  = 'sms_templates';
		        $page_data['page_title'] = get_phrase('manage').' '.get_phrase('sms').' '.get_phrase('templates');
				$page_data['smsTemplates']= $this->db->get('smstemplate')->result_array();
				$this->load->view('index', $page_data);
				return false;
			}
			
		}
		if ($param1 == 'do_update') 
		{
			$this->form_validation->set_rules('content', get_phrase("content"), 'trim|required|xss_clean');		
			if ($this->form_validation->run() == true)
			{
				$data['content']  = $this->input->post('content');
				$data['title']  = $this->input->post('title');
				$this->db->where('id', $param2);
				$this->db->update('smstemplate', $data);
				$this->session->set_flashdata('flash_message', get_phrase('updated_successully'));
				redirect(base_url().$this->session->userdata('roles'). '/sms_templates/', 'refresh');
			}
			else
			{ 
				$page_data['message'] = validation_errors();
				$page_data['page_name']  = 'sms_templates';
		        $page_data['page_title'] = get_phrase('manage').' '.get_phrase('sms').' '.get_phrase('templates');
				$page_data['smsTemplates']= $this->db->get('smstemplate')->result_array();
				$this->load->view('index', $page_data);
				return false;
			}
        } 
		if ($param1 == 'active_sms_templates') 
		{
           		$data['status']  = 'active';
				$this->db->where('id', $param2);
				$this->db->update('smstemplate', $data);
           		$this->session->set_flashdata('flash_message', get_phrase('updated_successully'));
		   		redirect(base_url().$this->session->userdata('roles'). '/sms_templates/', 'refresh');
        }
		if ($param1 == 'inactive_sms_templates') 
		{
                $data['status']  = 'inactive';
				$this->db->where('id', $param2);
				$this->db->update('smstemplate', $data);
            	$this->session->set_flashdata('flash_message', get_phrase('updated_successully'));
		   		redirect(base_url().$this->session->userdata('roles'). '/sms_templates/', 'refresh');
        }
		
		$page_data['page_name']  = 'sms_templates';
        $page_data['page_title'] = get_phrase('manage').' '.get_phrase('sms').' '.get_phrase('templates');
		$page_data['smsTemplates']= $this->db->get('smstemplate')->result_array();
        $this->load->view('index', $page_data);
	}
	
	/*---------EMAIL TEMPLATES------------------*/
	public function new_template()
	{
		$page_data['page_name']  = 'email_templates';
        $page_data['page_title'] = get_phrase('new').' '.get_phrase('email')." ".get_phrase('templates');
        $this->load->view('index', $page_data);
	}
	
	public function email_templates()
	{
		$page_data['page_name']  = 'manage_email_templates';
        $page_data['page_title'] = get_phrase('email')." ".get_phrase('templates');
		$page_data['templates']  = $this->db->get('emailtemplate')->result_array();
        $this->load->view('index', $page_data);
	}
	
	/*---------ACTION ON EMAIL TEMPLATES------------------*/
	
	public function manage_email_templates($param1 = '', $param2 = '', $param3 = '')
	{
		if ($param1 == 'create')
		{
		    $data['subject']         = $this->input->post('subject');
			$data['content']         = $this->input->post('editor1');
			$data['type']         = $this->input->post('type');
			$data['title']         = $this->input->post('title');
			$data['status']          = 'active';
            $data['dateModify']      = date("Y-m-d");
			$this->db->insert('emailtemplate', $data);
            $this->session->set_flashdata('flash_message', get_phrase('added_successfully'));
			redirect(base_url().$this->session->userdata('roles'). '/email_templates', 'refresh');
		}
		if ($param1 == 'do_update') 
		{
            /*$data['email']    	   = $this->input->post('email');*/
            $data['subject']         = $this->input->post('subject');
			$data['content']         = $this->input->post('editor1');
			$data['status']          = $this->input->post('status');
            $data['dateModify']      = date("Y-m-d");
			//print_r($data);die;
			$this->db->where('id', $param2);
            $this->db->update('emailtemplate', $data);
			
            $this->session->set_flashdata('flash_message', get_phrase('updated_successfully'));
			redirect(base_url().$this->session->userdata('roles'). '/email_templates/', 'refresh');
			
        
        } 
		else if ($param1 == 'edit_email_templates') 
		{
            $page_data['edit_data'] = $this->db->get_where('emailtemplate', array('id' => $param2))->result_array();
			$page_data['page_name']  = 'email_templates';
			$page_data['page_title'] = get_phrase('email')." ".get_phrase('templates');
			$this->load->view('index', $page_data);
        }
		if ($param1 == 'inactive_email_templates') 
		{
		   $data['status'] = 'inactive';
		   $this->db->where('id', $param2);
		   $this->db->update('emailtemplate', $data);
           $this->session->set_flashdata('flash_message', get_phrase('deleted_successully'));
		   redirect(base_url().$this->session->userdata('roles'). '/email_templates/', 'refresh');
        }
		if ($param1 == 'active_email_templates') 
		{
		   $data['status'] = 'active';
		   $this->db->where('id', $param2);
		   $this->db->update('emailtemplate', $data);
           $this->session->set_flashdata('flash_message', get_phrase('deleted_successully'));
		   redirect(base_url().$this->session->userdata('roles'). '/email_templates/', 'refresh');
        }
	}
	
	/*---------MANAGE LANGUAGE------------------*/
	
	function manage_languages($param1 = '', $param2 = '', $param3 = '')
	{
        $page_data['page_title'] = get_phrase('manage_languages');
		$page_data['breadcrumbs'] = get_phrase('language_lists');
		
		if ($param1 == 'edit_phrase') 
		{
			
			$page_data['edit_profile'] 	= $param2;
        	$page_data['page_title'] =  get_phrase('edit_phrase');
			$page_data['breadcrumbs'] = get_phrase('you_can_edit_all_phrase');	
		}
		
		if ($param1 == 'update_phrase') 
		{
			$language	=	$param2;
			$total_phrase	=	$this->input->post('total_phrase');
			for($i = 1 ; $i < $total_phrase ; $i++)
			{
				//$data[$language]	=	$this->input->post('phrase').$i;
				//echo $i." => ".$this->input->post('phrase'.$i)."<br/>";
				$this->db->where('phrase_id' , $i);
				$this->db->update('language' , array($language => $this->input->post('phrase'.$i)));
				//echo $this->db->last_query();
				
			}
			
			redirect(base_url().$this->session->userdata('roles'). '/manage_languages/edit_phrase/'.$language, 'refresh');
		}
		
		if ($param1 == 'do_update') {
			$language        = $this->input->post('language');
			$data[$language] = $this->input->post('phrase');
			$this->db->where('phrase_id', $param2);
			$this->db->update('language', $data);
			$this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
			redirect(base_url().$this->session->userdata('roles'). '/manage_languages/', 'refresh');
		}
		
		if ($param1 == 'add_phrase') {
			$data['phrase'] = $this->input->post('phrase');
			$this->db->insert('language', $data);
			$this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
			redirect(base_url().$this->session->userdata('roles'). '/manage_languages/', 'refresh');
		}
		
		if ($param1 == 'add_language') {
			$language = $this->input->post('language');
			$this->load->dbforge();
			$fields = array(
				$language => array(
					'type' => 'LONGTEXT'
				)
			);
			$this->dbforge->add_column('language', $fields);
			
			$this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
			redirect(base_url().$this->session->userdata('roles'). '/manage_languages/', 'refresh');
		}
		
		if ($param1 == 'delete_language') {
			$language = $param2;
			$this->load->dbforge();
			$this->dbforge->drop_column('language', $language);
			$this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
			
			redirect(base_url().$this->session->userdata('roles'). '/manage_languages/', 'refresh');
		}
		
		
		$page_data['page_name']  = 'manage_languages';
        $this->load->view('index', $page_data);
	}
	
	/*---------CHECK PASSWORD------------------*/
	
	public function check_pass($str)
	{
		 //call to model function fo check string match in databse and return result
		 $old_pass = $this->crud_model->value_by_id("users",'user_id',$this->input->post('user_id'),'password');
		if($old_pass!=$str){
		 $this->form_validation->set_message('check_pass', get_phrase("cuurent_password_miss_match"));
			  return FALSE;
		}
		 else
		 {
			 return TRUE;
		 }
	}
	
	/*----------------REPORT MODULE-----------------------*/
	
	public function ready_on_time()
	{		
		$page_data['page_name']  = 'ready_on_time';
        $page_data['page_title'] = get_phrase('ready')." ".get_phrase('on')." ".get_phrase('time');	
		$page_data['orders'] = $this->order_model->getReadyOnTime();
        $this->load->view('index', $page_data);
	}
	
	public function ready_after_time()
	{
		
		$page_data['page_name']  = 'ready_after_time';
        $page_data['page_title'] = get_phrase('ready')." ".get_phrase('after')." ".get_phrase('time');
		$orders = $this->order_model->getReadyAfterTime();
		$page_data['orders'] = $orders;
        $this->load->view('index', $page_data);
	}
	
	public function not_ready_till_time()
	{
		
		$page_data['page_name']  = 'not_ready_till_time';
        $page_data['page_title'] = get_phrase('not')." ".get_phrase('ready')." ".get_phrase('till')." ".get_phrase('time');
		$page_data['orders'] = $this->order_model->getNotReadyTillTime();
        $this->load->view('index', $page_data);
	}
	
	public function new_in_process()
	{
		
		$page_data['page_name']  = 'new_in_process';
        $page_data['page_title'] = get_phrase('new')." ".get_phrase('in')." ".get_phrase('process');
		$orders = $this->order_model->getAllOrders();
		$page_data['orders']= $orders;
        $this->load->view('index', $page_data);
	}
	
	
	public function view_new_suborder($param1='')
	{
		$page_data['page_name']  = 'view_new_suborder';
		$page_data['page_title'] = get_phrase('view')." ".get_phrase('new')." ".get_phrase('suborder');
		$orders = $this->order_model->viewNewSubOrder($param1);
		$page_data['orders']= $orders;
		$this->load->view('index',$page_data);
	}
	
	public function today_new_order()
	{
		
		$page_data['page_name']  = 'today_new_order';
        $page_data['page_title'] = get_phrase("today's")." ".get_phrase('new')." ".get_phrase('order');
		$page_data['orders']= $this->db->get('orders')->result_array();
        $this->load->view('index', $page_data);
	}
	
	public function today_ready_order()
	{
		
		$page_data['page_name']  = "today_ready_order";
        $page_data['page_title'] = get_phrase('today')." ".get_phrase('ready')." ".get_phrase('order');
		$page_data['orders']= $this->order_model->getTodayReadyOrders();
        $this->load->view('index', $page_data);
	}
	
	public function date_today_not_ready()
	{
		
		$page_data['page_name']  = 'date_today_not_ready';
        $page_data['page_title'] = get_phrase('date')." ".get_phrase('today')." ".get_phrase('not')." ".get_phrase('ready');
		$page_data['orders']=$this->order_model->getTodayNotReadyOrders();
        $this->load->view('index', $page_data);
	}
	
	public function purchase_reports()
	{
		
		$page_data['page_name']  = 'purchase_reports';
        $page_data['page_title'] = get_phrase('purchase')." ".get_phrase('reports');
		$page_data['suppliers'] = $this->db->get('suppliers')->result_array();
        $this->load->view('index', $page_data);
	}
	
	function getPurchases()
   {
	   
	   $page_data['page_name']  = 'purchase_reports';
       $page_data['page_title'] = get_phrase('purchase')." ".get_phrase('reports');
	  //if($this->input->get('name')){ $name = $this->input->get('name'); } else { $name = NULL; }
	  if($this->input->post('supplier')){ $supplier = $this->input->post('supplier'); } else { $supplier = NULL; }
	  if($this->input->post('reference_no')){ $reference_no = $this->input->post('reference_no'); } else { $reference_no = NULL; }
	  if($this->input->post('start_date')){ $start_date = $this->input->post('start_date'); } else { $start_date = NULL; }
	  if($this->input->post('end_date')){ $end_date = $this->input->post('end_date'); } else { $end_date = NULL; }
	  if($start_date) {
						$start_date = date("Y-m-d",strtotime($start_date));
						$end_date = date("Y-m-d",strtotime($end_date));
	  }
	  
	  $data = array('supplier' => $supplier,
					'reference_no' => $reference_no,
					'start_date' => $start_date,
					'end_date'=> $end_date);
	  
	 $page_data['purchases'] =  $this->order_model->getPurchaseData($data);
	 $page_data['suppliers'] = $this->db->get('suppliers')->result_array();
	 //echo "<pre>";
	//print_r($page_data['purchases']);
		
	$this->load->view('index', $page_data);
	  
   }
   
	public function product_alert()
	{
		
		$page_data['page_name']  = 'product_alert';
        $page_data['page_title'] = get_phrase('product')." ".get_phrase('alert');
		$page_data['product']=$this->db->get('products')->result_array();
		$page_data['cloth_product'] = $this->db->get('cloth_products')->result_array();
		//$page_data['order']=$this->db->get('orders')->result_array();
        $this->load->view('index', $page_data);
	}
	
	
	/*--------------WORKER MODULE ----------------------*/
	
	public function worker_report()
	{
		;
		$page_data['page_name']  = 'worker_report';
        $page_data['page_title'] = get_phrase('worker')." ".get_phrase('report');
		$page_data['data']= $this->db->get('employees')->result_array();
		$this->load->view('index', $page_data);	
	}
	
	/*----------------TRANSACTION REPORT---------------*/
	
	public function transaction_report()
	{
		$page_data['page_name']  = 'transaction_report';
        $page_data['page_title'] = get_phrase('transaction')." ".get_phrase('report');
		$page_data['payments'] = $this->order_model->transactionCreditReport();
		//$page_data['orders'] = $this->order_model->getAllOrders();
		$page_data['debit_amounts']=$this->order_model->transactionDebitReport();
        $this->load->view('index', $page_data);	
	}
	
	public function report($param1='', $param2='')
	{
		if($param1=='track_worker_report')
		{
			$page_data['page_name']  = 'track_worker_report';
			$page_data['page_title'] = get_phrase('track')." ".get_phrase('worker')." ".get_phrase('report');
			$page_data['employee']=$this->db->get_where('employees', array('emp_id'=>$param2))->row();
			$page_data['assigns_inproces'] = $this->order_model->workerReportsbyStatus($param2, 'assigned','inprocess');
			$page_data['completes'] = $this->order_model->workerReportsbyStatus($param2,'completed');
			$page_data['delivers'] = $this->order_model->workerReportsbyStatus($param2, 'to_deliver','delivered');
			$page_data['emp_id'] = $param2;
			$this->load->view('index', $page_data);	
			
		}
		
		if($param1=='track_worker')
		{
			if($this->input->post('from_date') && $this->input->post('to_date'))
			{
				$from = date("Y-m-d",strtotime($this->input->post('from_date')));
				$to  = date("Y-m-d",strtotime($this->input->post('to_date')));
				$page_data['assigns_inproces'] = $this->order_model->trackWorkerReportsbyStatus($param2, $from, $to, 'assigned','inprocess');
				$page_data['completes'] = $this->order_model->trackWorkerReportsbyStatus($param2, $from, $to, 'completed');
				$page_data['delivers'] = $this->order_model->trackWorkerReportsbyStatus($param2, $from, $to, 'to_deliver','delivered');
				$page_data['employee']=$this->db->get_where('employees', array('emp_id'=>$param2))->row();				
				$page_data['page_name']  = 'track_worker_report';
				$page_data['page_title'] = get_phrase('track')." ".get_phrase('worker')." ".get_phrase('report');
				$this->load->view('index', $page_data);
			}
		}
		
		if($param1 == 'transaction_detail')
		{
			
			if($this->input->post('from_date') && $this->input->post('to_date'))
			{
				$from = date("Y-m-d",strtotime($this->input->post('from_date')));
				$to  = date("Y-m-d",strtotime($this->input->post('to_date')));
				$page_data['debit_amounts'] = $this->order_model->getDebitBtwnDates($from, $to);
				$page_data['payDates'] = $this->order_model->getcreditBtwnDates($from, $to);
				$page_data['orders'] = $this->order_model->getAllOrdersBtwnDates($from, $to);
			}
			$page_data['page_name']  = 'transaction_report';
			$page_data['page_title'] = get_phrase('transaction')." ".get_phrase('report');
			$this->load->view('index', $page_data);
		}
	}
	
	/***DEFAULT CALENDAR*****/
	function calendar()
	{
	   $data['cal_data'] = $this->crud_model->getEvents('calendar');
      $data['page_title'] = get_phrase("calendar");
	  $data['page_name']  = 'calendar';
      $this->load->view('index', $data);
	}
	
	public function addEvents()
	{
			$this->form_validation->set_rules('title', get_phrase("title"), 'xss_clean');
			$this->form_validation->set_rules('start', get_phrase("start").' '.get_phrase("date"), 'xss_clean');
			$this->form_validation->set_rules('end', get_phrase("date"), 'required|xss_clean');
			if ($this->form_validation->run() == true)
			{
				 	$data['data']  = $this->input->post('title');
					$data['date'] = date("Y-m-d",strtotime($this->input->post('start'). ' +1 days'));
					$data['end']  = date("Y-m-d",strtotime($this->input->post('end'). ' +1 days'));
					$data['user_id'] = $this->session->userdata('user_id');
					$res =  $this->crud_model->addEvnets($data);
					if($res)
					{
						 echo $res;
					}
			}
	}
	
	public function deleteEvents()
	{
			$this->form_validation->set_rules('id', get_phrase("id"), 'xss_clean');
			if ($this->form_validation->run() == true)
			{
				 	$del = $this->db->delete('calendar', array('id' => $this->input->post('id')));
					if($del){ 
						echo $del;
					}					
			}
	}

	public function logs(){
		
		$page_data['logs'] = $this->crud_model->get_logs();			
		$page_data['page_name'] = "logs_history";
        $page_data['page_title'] = get_phrase('login').' '.get_phrase('histroy');
        $this->load->view('index', $page_data);
	}
	
	public function clear_logs(){
		$this->db->where('log_id IS NOT NULL');
		$this->db->delete('log');		
		$this->session->set_flashdata('flash_message', get_phrase('deleted_successully'));
		redirect(base_url().$this->session->userdata('roles'). '/logs/', 'refresh');
	}
//---------Changes made from here by Ritu-------------///	
//------All in one tailor--------///
	public function tailor($id="")
	{
		if($id){
			$inv= $this->crud_model->get_rowValue_by_id('orders',$id);
			$page_data['inv'] = $inv;
			$page_data['discounts']= $this->db->get('discounts')->result();
			$page_data['taxes'] = $this->db->get('tax_rates')->result_array();
			$order=$this->db->get_where('orders', array('id' =>$id))->result_array();
			$page_data['sub_order']=$this->db->get_where('order_items', array('order_id' =>$id))->result_array();
			$page_data['edit_data']=$order[0];
			$page_data['payments']= $this->crud_model->get_All_List('payment','order_id',$id);
			$page_data['cust_add'] = $this->db->get_where('customers', array('id' => $page_data['edit_data']['customer_id']))->result_array();
			$page_data['page_title'] = get_phrase('edit')." ".get_phrase('order');
		}
		else
		{
			$page_data['page_title'] = get_phrase('new')." ".get_phrase('order');
			$page_data['rnumber']    = $this->crud_model->getNextREF('orders',ORDER_PREFIX);
			$page_data['cust_add'] = $this->db->get_where('customers', array('id' => DCUSTOMER))->result_array();
			$this->db->where("quantity IS NOT NULL");
			$page_data['clothes']  = $this->db->get('cloth_products')->result_array();
		}
		$page_data['page_name']  = 'tailor';
		$customers = $this->db->get('customers')->result_array();
		$page_data['customers'] = $customers;
      	$page_data['products']=$this->db->get_where('stitching', array('status' => 'active'))->result_array();
		$this->load->view('index', $page_data);
		
	}
	public function view_invoice($param2='')
	{
		$inv= $this->crud_model->get_rowValue_by_id('orders',$param2);
		$customer_id = $inv->customer_id;
		$data['inv'] = $inv;
		$data['customers'] = $this->crud_model->get_rowValue_by_id('customers',$customer_id);
		$data['orders'] =  $this->crud_model->get_All_List('order_items','order_id',$param2);
		$data['picture']= $this->crud_model->get_value_by_id('cloth_products',$param2,'image');
		//$data['rnumber']  =  $this->crud_model->getNextREF('orders',INVOICE_PREFIX);	
		$data['discounts']= $this->db->get('discounts')->result();
		$data['payments']= $this->crud_model->get_All_List('payment','order_id',$param2);
		$data['taxes'] = $this->db->get('tax_rates')->result_array();
		$data['page_name'] = 'show_invoice';
		$data['page_title'] = get_phrase('view')." ".get_phrase('invoice');
		$this->load->view('index',$data);
	}
	public function cust_add()
	{
		$cust_add = $this->db->get_where('customers', array('id' => $this->input->post('id')))->result_array();?>
		<address>
		<h4><strong><?php echo get_phrase('name');?></strong>: <?php echo $cust_add[0]['fname'].' '.$cust_add[0]['lname']; ?></h4>
		<?php echo "<h4><strong>".get_phrase('address')."</strong>:" . $cust_add[0]['address'].", ".$cust_add[0]['city'].", ".$this->crud_model->get_value_by_id('states',$cust_add[0]['state'],$field='name')."-".$cust_add[0]['postal_code']." (".$this->crud_model->get_value_by_id('countries',$cust_add[0]['country'],$field='name').")</h4>";  
		echo "<h4><strong>".get_phrase('email')."</strong>:". $cust_add[0]['email'].' </h4>'; echo "<h4><strong>".get_phrase('phone')."</strong>:". $cust_add[0]['mobile']."</h4"; ?>
		</address>
		<?php 	
	}
}
