<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_model extends CI_Model {

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
| MODEL: 			ORDER_MODEL
| -----------------------------------------------------
| This is MODEL file.
| -----------------------------------------------------
*/
	public function __construct()
	{
		parent::__construct();

	}
	/*------------------GET Employee Bonus--------------------*/
    public  function getEmployeeBonus($data = array())
    {
        $yQuery = 'SELECT order_items.id as sid, 
        						orders.reference_no, 
        						order_items.sub_order_price as subOrdPrice, 
        						order_items.worker_bonus as workerbonus, 
        						order_items.worker_name as workerName 
        						FROM order_items 
        						LEFT JOIN orders on orders.id = order_items.order_id
        						WHERE DATE_FORMAT(order_items.created_date, "%m/%Y") = "'.$data['month'].'" AND
        						order_items.worker_id = "'.$data['employee'].'" ';
		$q = $this->db->query($yQuery);
        //echo $this->db->last_query();die;
        if($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $datas[] = $row;
            }
			return $datas;
        }
        return false;
    }
	/*------------------GET Today Not Ready Orders--------------------*/
    public  function getTodayNotReadyOrders($id=Null, $param = NULL)
    {
        $this->db->select("orders.reference_no as ref, orders.customer_name as customer, orders.id as oid, orders.date as od,  orders.delivery_date as dd, orders.trial_date as td, order_items.ready_date as rd,  COUNT(order_items.id) as ord_Itms_Id,  order_items.status as st");
        $this->db->group_by('orders.id');
		if($id && $param=='worker'){
			$this->db->where('order_items.worker_id',$id);
		}
		if($id && $param=='customer'){
			$this->db->where('orders.customer_id',$id);
		}
		$this->db->where('orders.delivery_date',date("Y-m-d"));
        $this->db->where('order_items.status !=','to_deliver');
        $this->db->join('order_items', 'order_items.order_id = orders.id');
        $q = $this->db->get('orders');
       // $d= $q->result();
       //echo $this->db->last_query();die;
        if($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }
	/*------------------GET Today Ready Orders--------------------*/
    public  function getTodayReadyOrders($id=NULL, $param = NULL)
    {
        $this->db->select("orders.reference_no as ref, orders.customer_name as customer, orders.id as oid, orders.date as od,  orders.delivery_date as dd, orders.trial_date as td, order_items.ready_date as rd,  COUNT(order_items.id) as ord_Itms_Id,  order_items.status as st");
        $this->db->group_by('orders.id');
		if($id && $param=='worker'){
			$this->db->where('order_items.worker_id',$id);
		}
		if($id && $param=='customer'){
			$this->db->where('orders.customer_id',$id);
		}
        $this->db->where('order_items.ready_date', date('Y-m-d'));
		$this->db->where('orders.delivery_date',date("Y-m-d"));
        $this->db->where('order_items.status ','to_deliver');
        $this->db->join('order_items', 'order_items.order_id = orders.id');
        $q = $this->db->get('orders');
       // $d= $q->result();
       // echo $this->db->last_query();die;
        if($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }
	
	/*------------------GET NOT Ready TILL TIMES--------------------*/
    public  function getNotReadyTillTime()
    {
        $this->db->select("orders.reference_no as ref, orders.customer_name as customer, orders.id as oid, orders.date as od,  orders.delivery_date as dd, orders.trial_date as td, order_items.ready_date as rd,  COUNT(order_items.id) as ord_Itms_Id,  order_items.status as st");
        $this->db->group_by('orders.id');
		$this->db->where('orders.delivery_date <', date("Y-m-d"));
        $this->db->where('order_items.status !=','to_deliver');
		$this->db->where('order_items.status !=','delivered');
        $this->db->join('order_items', 'order_items.order_id = orders.id');
        $q = $this->db->get('orders');
       //$d= $q->result();
      // echo $this->db->last_query();die;
        if($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }
	
	/*------------------GET Ready After TIMES--------------------*/
    public  function getReadyAfterTime()
    {
        $this->db->select("orders.reference_no as ref, orders.customer_name as customer, orders.id as oid, orders.date as od,  orders.delivery_date as dd, orders.trial_date as td, order_items.ready_date as rd,  COUNT(order_items.id) as ord_Itms_Id,  order_items.status as st");
        $this->db->group_by('orders.id');
		$this->db->where('order_items.ready_date > orders.delivery_date');
        $this->db->where('order_items.status','to_deliver');
		$this->db->where('order_items.status !=','delivered');
        $this->db->join('order_items', 'order_items.order_id = orders.id');
        $q = $this->db->get('orders');
       //$d= $q->result();
     // echo $this->db->last_query();die;
        if($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }
	
	/*------------------GET Ready After TIMES--------------------*/
    public  function getReadyOnTime()
    {
        $this->db->select("orders.reference_no as ref, orders.customer_name as customer, orders.id as oid, orders.date as od,  orders.delivery_date as dd, orders.trial_date as td, order_items.ready_date as rd,  COUNT(order_items.id) as ord_Itms_Id,  order_items.status as st");
        $this->db->group_by('orders.id');
		$this->db->where('order_items.ready_date = orders.delivery_date');
        $this->db->where('order_items.status','to_deliver');
		$this->db->where('order_items.status !=','delivered');
        $this->db->join('order_items', 'order_items.order_id = orders.id');
        $q = $this->db->get('orders');
       //$d= $q->result();
     // echo $this->db->last_query();die;
        if($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }
	
    /*------------------GET WORKER ORDER--------------------*/
    public  function getWorkerOrders()
    {
        $this->db->select("TRIM(BOTH ' ' FROM CONCAT_WS(' ', employees.fname, employees.lname )) as empname, employees.image as pic, employees.id as eid, employees.emp_id as empId, COUNT(order_items.id) as cEOId ");
        $this->db->group_by('order_items.worker_id');
        $this->db->where('order_items.status != ','completed');
        $this->db->where('order_items.status != ','delivered');
        $this->db->where('order_items.status != ','to_deliver');
        $this->db->join('order_items', 'employees.emp_id = order_items.worker_id');
        $q = $this->db->get('employees');
        //$d= $q->result();
        //echo $this->db->last_query();die;
        if($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }
/*------------------TODAY WORKK--------------------*/	
	public function productAlertsNotifications($table='')
	{
	  $data = array();
	  $this->db->where('quantity <= alert_quantity', NULL, FALSE)->where('track_quantity', 1);
	  if($table=='cloth_products')
	  {
		  	$this->db->join('cloth_types', 'cloth_types.id = cloth_products.cloth_type_id');
	  		$this->db->where('cloth_types.status','active');
	  }
	  $q = $this->db->get($table); 
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}		
		}
		return $data;
	//echo  $this->db->count_all_results();
	  
	}
	
	public function getTodaysNewOrder()
	{
	  $data = array();
	  $this->db->select('orders.reference_no as ref, orders.customer_name as customer, orders.date as date, orders.trial_date as trialDate, orders.delivery_date as deliveryDate, order_items.sub_order_price as total, order_items.expected_date as expectedDate, order_items.ready_date as readyDate, order_items.delivered_date as deliveredDate, order_items.status as status, order_items.id as sbId');
	  $dt  = date('Y-m-d');
	   $this->db->order_by('order_items.id','DESC');
	  $dt1 = date('Y-m-d',strtotime('-3 days'));
	  $dt2 = date('Y-m-d',strtotime('3 days'));
	  $this->db->where("date = '$dt'", NULL, FALSE);
	 // $this->db->or_where("date >= '$dt1'", NULL, FALSE);
	  $this->db->join('order_items', 'orders.id = order_items.order_id');
	  $q = $this->db->get('orders'); 
	  //$d= $q->result();
	  //echo $this->db->last_query();die;
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}		
		}
		return $data;
	//echo  $this->db->count_all_results();
	  
	}
	
	public function getSubOrderProgress($wId = NULL) 
	{		
	  $this->db->select('orders.item_name as item, orders.customer_name as customer, orders.date as date, orders.trial_date as trialDate, orders.delivery_date as deliveryDate, order_items.*');
	   $this->db->order_by('order_items.id','DESC');
	  $this->db->limit('10');
	  $this->db->from('order_items');
	  $this->db->join('orders', 'orders.id = order_items.order_id');
	  if($wId && $this->session->userdata('roles') == 'tailor')
	  {
	  	 $this->db->where('order_items.worker_id',$wId);
	  }
	  $this->db->where("( order_items.status = 'assigned' OR order_items.status = 'inprocess' OR order_items.status = 'completed' )");
	  
	  $results = $this->db->get()->result();
	  //echo $this->db->last_query();die;
	  foreach (($results) as $row) {
				$data[] = $row;
	  }
	    return $data;
		 
	}
	
	/*--------------------Get Chart Data-------------------------*/
	public function getChartData() {
		$myQuery = "SELECT S.month,
					   COALESCE(S.orders, 0) as orders,
					   COALESCE( P.purchases, 0 ) as purchases,
					   COALESCE(S.tax1, 0) as tax1,
					   COALESCE(S.tax2, 0) as tax2,
					   COALESCE( P.ptax, 0 ) as ptax
					FROM (	SELECT	date_format(date, '%Y-%m') Month,
								SUM(total) Orders,
								SUM(total_tax) tax1,
								SUM(total_tax2) tax2
						FROM orders
						WHERE orders.date >= date_sub( now( ) , INTERVAL 12 MONTH )
						GROUP BY date_format(date, '%Y-%m')) S
					LEFT JOIN (	SELECT	date_format(date, '%Y-%m') Month,
									SUM(total_tax) ptax,
									SUM(total) purchases
							FROM purchases
							GROUP BY date_format(date, '%Y-%m')) P
					ON S.Month = P.Month
					GROUP BY S.Month
					ORDER BY S.Month";
		$q = $this->db->query($myQuery);
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}
				
			return $data;
		}
		
	}
	
	public  function getYearlyProfitChartData()
	{
		$yQuery = "SELECT S.year,
					   COALESCE(S.orders, 0) as orders,
					   COALESCE( P.purchases, 0 ) as purchases				 
					FROM (	SELECT	date_format(date, '%Y') Year,
								(SUM(total)-SUM(worker_total_bonus)) Orders
						FROM orders
						GROUP BY date_format(date, '%Y')) S
					LEFT JOIN (	SELECT	date_format(date, '%Y') Year,
									SUM(total) purchases
							FROM purchases
							GROUP BY date_format(date, '%Y')) P
					ON S.Year = P.Year
					GROUP BY S.Year
					ORDER BY S.Year";
		$q = $this->db->query($yQuery);
		//echo $this->db->last_query();die;
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}
			
			return $data;
		}
	}
	
	public  function getAverageInvoiceChartData()
	{	
		$iQuery = "SELECT S.year,
					   COALESCE(S.orders, 0) as orders,
					   COALESCE( P.order_items, 0 ) as order_items				 
					FROM (	SELECT	date_format(date, '%Y') Year,
								COUNT(id) Orders
						FROM orders
						GROUP BY date_format(date, '%Y')) S
					LEFT JOIN (	SELECT	date_format(created_date, '%Y') Year,
							COUNT(id) order_items
							FROM order_items
							GROUP BY date_format(created_date, '%Y')) P
					ON S.Year = P.Year
					GROUP BY S.Year
					ORDER BY S.Year";
		$q = $this->db->query($iQuery);
		//echo $this->db->last_query();die;
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}
			
			return $data;
		}
	}
/*--------------------Get Stock Value-------------------------*/
	public function getStockValue($table='') 
	{
		$q = $this->db->query("SELECT SUM(by_price) as stock_by_price, SUM(by_cost) as stock_by_cost FROM ( Select COALESCE(sum($table.quantity), 0)*price as by_price, COALESCE(sum($table.quantity), 0)*cost as by_cost FROM $table GROUP BY $table.id )a");
		 if( $q->num_rows() > 0 )
		  {
			return $q->row();
		  } 
		
		  return FALSE;
	}
/*------------------/TODAY WORKK--------------------*/
	
	public function getAllOrders() 
	{
		$q = $this->db->get('orders');
		if($q->num_rows() > 0) {
			foreach (($q->result_array()) as $row) {
				$data[] = $row;
			}
				
			return $data;
		}
	}
	public function getAllSubOrderById($id) 
	{
		$q = $this->db->get_where('order_items', array('order_id' => $id));
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}
			//print_r($data);	
			return $data;
		}
	}
	
	public function countSubOrderStatus($id='', $status='') 
	{
		$q = $this->db->get_where('order_items', array('order_id' => $id, 'status' => $status));
		//echo $this->db->last_query();
		$count=$q->num_rows();
		if($count > 0) {
			return $count;
		}
		else
		{
			return 0;
		}
	}
	
	
	
	public function getSubOrderStatusById($id) 
	{
		$q = $this->db->get_where('order_items', array('order_id' => $id, 'status' => $status));
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}
			//print_r($data);	
			return $data;
		}
	}
	
	public function countStatus($id='', $status='') 
	{
		$q = $this->db->get_where('order_items', array('worker_id' => $id, 'status' => $status));
		$count=$q->num_rows();
		if($count > 0) {
			return $count;
		}
		else
		{
			return 0;
		}
	} 
	
	
	public function getAllInvoiceTypes() 
	{
		$q = $this->db->get('invoice_types');
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}
				
			return $data;
		}
	}
	public function getAllInvoiceTypesFor() 
	{
		$q = $this->db->get_where('invoice_types', array('type' => 'real'));
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}
				
			return $data;
		}
	}
	
	public function getInvoiceTypeByID($id) 
	{

		$q = $this->db->get_where('invoice_types', array('id' => $id), 1); 
		  if( $q->num_rows() > 0 )
		  {
			return $q->row();
		  } 
		
		  return FALSE;

	}
	
	public function updateProductQuantity($product_id, $warehouse_id, $quantity)
	{

		// update the product with new details
		if($this->addQuantity($product_id, $warehouse_id, $quantity))
		{
			return true;
		} 
			
			return false;
	}
	
	public function calculateAndUpdateQuantity($item_id, $product_id, $quantity, $warehouse_id)
	{
		//check if entry exist then update else inster
		if($this->getProductQuantity($product_id, $warehouse_id)) {
			
			//get product details to calculate quantity
			$warehouse_quantity = $this->getProductQuantity($product_id, $warehouse_id);	
			$warehouse_quantity = $warehouse_quantity['quantity'];
			$item_details = $this->getItemByID($item_id);
			$item_quantity = $item_details->quantity;
			$after_quantity = $warehouse_quantity + $item_quantity;
			$new_quantity = $after_quantity - $quantity;
			
			if($this->updateQuantity($product_id, $warehouse_id, $new_quantity)){
					return TRUE;
			}
			
		} else {
						
			if($this->insertQuantity($product_id, $warehouse_id, -$quantity)){
				return TRUE;
			}
		}
		
		return FALSE;
	}
	
	public function CalculateOldQuantity($item_id, $product_id, $quantity, $warehouse_id)
	{

			
			//get product details to calculate quantity
			$warehouse_quantity = $this->getProductQuantity($product_id, $warehouse_id);	
			$warehouse_quantity = $warehouse_quantity['quantity'];
			$item_details = $this->getItemByID($item_id);
			$item_quantity = $item_details->quantity;
			$after_quantity = $warehouse_quantity + $item_quantity;
			
			
			if($this->updateQuantity($product_id, $warehouse_id, $after_quantity)){
					return TRUE;
			}
			

		
		return FALSE;
	}
	
	
	public function getItemByID($id)
	{

		$q = $this->db->get_where('order_items', array('id' => $id), 1); 
		  if( $q->num_rows() > 0 )
		  {
			return $q->row();
		  } 
		
		  return FALSE;

	}
	
	public function getCustomerOrdersById( $id=NULL, $param=NULL) 
	{
		$this->db->select('order_items.id as oid, order_items.status as status, order_items.worker_name as worker_name, order_items.sub_order_price as sub_order_price,  orders.*');
		$this->db->order_by('order_items.id', 'DESC');
		$this->db->join('orders', 'orders.id = order_items.order_id');
		$this->db->where('orders.customer_id',$id);
		$this->db->where('order_items.status != ','delivered');
		$this->db->where('order_items.status != ','to_deliver');
		$q = $this->db->get('order_items');
		//echo $this->db->last_query();die;
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}
				
			return $data;
		}
	}
	
	public function getCustomerCompletedOrdersById( $id=NULL) 
	{
		$this->db->select('order_items.id as oid, order_items.status as status, order_items.worker_name as worker_name, order_items.sub_order_price as sub_order_price, orders.*');
		$this->db->order_by('order_items.id', 'DESC');
		$this->db->join('orders', 'orders.id = order_items.order_id');
		$this->db->where('orders.customer_id',$id);
		$this->db->where('order_items.status','to_deliver');
		$q = $this->db->get('order_items');
		//echo $this->db->last_query();die;
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}
				
			return $data;
		}
	}
	
	public function getWorkerOrdersById( $id=NULL, $param=NULL) 
	{
		$this->db->select('order_items.id as oid, order_items.status as status, order_items.sub_order_price as sub_order_price, orders.*');
		$this->db->order_by('order_items.id', 'DESC');
		$this->db->join('orders', 'orders.id = order_items.order_id');
		$this->db->where('order_items.worker_id',$id);
		$this->db->where('order_items.status != ','delivered');
		$this->db->where('order_items.status != ','to_deliver');
		$q = $this->db->get('order_items');
		//echo $this->db->last_query();die;
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}
				
			return $data;
		}
	}
	
	public function getWorkerCompletedOrdersById( $id=NULL) 
	{
		$this->db->select('order_items.id as oid, order_items.status as status, order_items.sub_order_price as sub_order_price, orders.*');
		$this->db->order_by('order_items.id', 'DESC');
		$this->db->join('orders', 'orders.id = order_items.order_id');
		$this->db->where('order_items.worker_id',$id);
		$this->db->where('order_items.status','to_deliver');
		$q = $this->db->get('order_items');
		//echo $this->db->last_query();die;
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}
				
			return $data;
		}
	}
	
	
	public function getmonthlyPurchases() 
	{
		$myQuery = "SELECT date_format( date, '%b' ) as month, SUM( total ) as purchases FROM purchases WHERE date >= date_sub( now( ) , INTERVAL 12 MONTH ) GROUP BY date_format( date, '%b' ) ORDER BY date_format( date, '%m' ) ASC";
		$q = $this->db->query($myQuery);
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}
				
			return $data;
		}
	}
	
	public function getmonthlySales() 
	{
		$myQuery = "SELECT date_format( date, '%b' ) as month, SUM( total ) as sales FROM sales WHERE in_type = 'real' AND date >= date_sub( now( ) , INTERVAL 12 MONTH ) GROUP BY date_format( date, '%b' ) ORDER BY date_format( date, '%m' ) ASC";
		$q = $this->db->query($myQuery);
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}
				
			return $data;
		}
	}
	
	public function getAllInvoiceItems($sale_id) 
	{
		$this->db->order_by('id', 'asc');
		$q = $this->db->get_where('sale_items', array('sale_id' => $sale_id));
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}
				
			return $data;
		}
	}
        
        public function getAllInvoiceItemsWithDetails($sale_id) 
	{
            $this->db->select('sale_items.id, sale_items.product_name, sale_items.product_code, sale_items.quantity, sale_items.serial_no, sale_items.tax, sale_items.unit_price, sale_items.val_tax, sale_items.discount_val, sale_items.gross_total, products.details');	
            $this->db->join('products', 'products.id=sale_items.product_id', 'left');
            $this->db->order_by('id', 'asc');
		$q = $this->db->get_where('sale_items', array('sale_id' => $sale_id));
		if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$data[] = $row;
			}
				
			return $data;
		}
	}
        
	public function getInvoiceByID($id)
	{

		$q = $this->db->get_where('sales', array('id' => $id), 1); 
		  if( $q->num_rows() > 0 )
		  {
			return $q->row();
		  } 
		
		  return FALSE;

	}

	
	public function getInvoiceBySaleID($sale_id)
	{

		$q = $this->db->get_where('sales', array('id' => $sale_id), 1); 
		  if( $q->num_rows() > 0 )
		  {
			return $q->row();
		  } 
		
		  return FALSE;

	}
	
	public function getclothByID($id) 
	{
		$q = $this->db->get_where('cloth_products', array('id' => $id), 1); 
		  if( $q->num_rows() > 0 )
		  {
			return $q->row();
		  } 
		
		  return FALSE;

	}
	
	
	public function nsQTY($cloth_id, $quantity) {
		$prD = $this->getclothByID($cloth_id);
		$nQTY = $prD->quantity - $quantity;
		$this->db->update('cloth_products', array('quantity' => $nQTY), array('id' => $cloth_id));
	}
	
	public function addOrder($ordDetails = array(), $items = array())
	{
			
		// order data
		$orderData = array(
			'reference_no'			=> $ordDetails['reference_no'],
			'customer_id'			=> $ordDetails['customer_id'],
			'customer_name'			=> $ordDetails['customer_name'],
			'item_id'  				=> $ordDetails['item_id'],
			'item_name' 			=> $ordDetails['item_name'],
			'pattern_id'  			=> $ordDetails['pattern_id'],
			'pattern_name' 			=> $ordDetails['pattern_name'],
			'style_id'  			=> $ordDetails['style_id'],
			'style_name' 			=> $ordDetails['style_name'],
			'date'					=> $ordDetails['date'],
			'trial_date' 			=> $ordDetails['trial_date'],
			'delivery_date'  		=> $ordDetails['delivery_date'],
			'no_of_suborder' 		=> $ordDetails['no_of_suborder'],
			'note'	  	 			=> $ordDetails['note'],
			'inv_total'				=> $ordDetails['inv_total'],
			'total'					=> $ordDetails['total'],
			'worker_total_bonus'	=> $ordDetails['worker_total_bonus'],
			'user'					=> $ordDetails['user']
		);
		/*echo "<pre>";
		print_r($items);
		echo "<hr>";
		print_r($orderData);die;*/
		if($this->db->insert('orders', $orderData)) {
			$order_id = $this->db->insert_id();
						
			foreach($items as $idata){
				$this->nsQTY($idata['cloth_id'], $idata['cloth_length']);
			}
			
			$addOn = array('order_id' => $order_id);
					end($addOn);
					foreach ( $items as &$var ) {
						$var = array_merge($addOn, $var);
			}
				
			if($this->db->insert_batch('order_items', $items)) {
				return $order_id;
			}
		}
		
		return false;
	}
	
	public function usQTY($product_id, $quantity) {
		$prD = $this->getProductByID($product_id);
		$nQTY = $prD->quantity + $quantity;
		$this->db->update('products', array('quantity' => $nQTY), array('id' => $product_id));
	}
	
	public function updateOrder($id, $ordDetails = array(), $items = array())
	{
				
			
			
			// Order data
			$orderData = array(
			'reference_no'			=> $ordDetails['reference_no'],
			'customer_id'			=> $ordDetails['customer_id'],
			'customer_name'			=> $ordDetails['customer_name'],
			'item_id'  				=> $ordDetails['item_id'],
			'item_name' 			=> $ordDetails['item_name'],
			'pattern_id'  			=> $ordDetails['pattern_id'],
			'pattern_name' 			=> $ordDetails['pattern_name'],
			'style_id'  			=> $ordDetails['style_id'],
			'style_name' 			=> $ordDetails['style_name'],
			'date'					=> $ordDetails['date'],
			'trial_date' 			=> $ordDetails['trial_date'],
			'delivery_date'  		=> $ordDetails['delivery_date'],
			'no_of_suborder' 		=> $ordDetails['no_of_suborder'],
			'note'	  	 			=> $ordDetails['note'],
			'inv_total'				=> $ordDetails['inv_total'],
			'total'					=> $ordDetails['total'],
			'worker_total_bonus'	=> $ordDetails['worker_total_bonus'],
			'user'					=> $ordDetails['user']
		);
			
			$this->db->where('id', $id);
			if($this->db->update('orders', $saleData) && $this->db->delete('order_items', array('order_id' => $id))) {
				foreach($items as $idata){
					$this->nsQTY($idata['product_id'], $idata['quantity']);
					$this->updateProductQuantity($idata['product_id'], $warehouse_id, $idata['quantity']);
				}
						
				$addOn = array('sale_id' => $id);
					end($addOn);
					foreach ( $items as &$var ) {
							$var = array_merge($addOn, $var);
					}
			
				if($this->db->insert_batch('order_items', $items)) {
					return true;
				}

		}
	
		return false;
	}
	
	
	
	public function deleteInvoice($id)
	    {
	        $inv = $this->getInvoiceByID($id);
	        $warehouse_id = $inv->warehouse_id;
	        $items = $this->getAllInvoiceItems($id);
	       
	        foreach($items as $item) {
	            $product_id = $item->product_id;
	            $item_details = $this->getProductQuantity($product_id, $warehouse_id);
	            $pr_quantity = $item_details['quantity'];
	            $inv_quantity = $item->quantity;
	            $new_quantity = $pr_quantity + $inv_quantity;
	           
	            $this->updateQuantity($product_id, $warehouse_id, $new_quantity);
                    $this->usQTY($product_id, $item->quantity);
	        }
	       
	        if($this->db->delete('sale_items', array('sale_id' => $id)) && $this->db->delete('sales', array('id' => $id))) {
	            return true;
	        }
	    return FALSE;
	    }  
		
		public function deleteQuote($id)
	    {
	       
	        if($this->db->delete('quote_items', array('quote_id' => $id)) && $this->db->delete('quotes', array('id' => $id))) {
	            return true;
	        }
			
	    return FALSE;
	    }     
	
	public function addDelivery($data = array())
	{
		if($this->db->insert('deliveries', $data)) {
				return true;
		}
		
		return false;
	}
	
	public function updateDelivery($id, $data = array())
	{
		$this->db->where('id', $id);
		if($this->db->update('deliveries', $data)) {
				return true;
		}
		
		return false;
	}
	
	public function getDeliveryByID($id)
	{

		$q = $this->db->get_where('deliveries', array('id' => $id), 1); 
		  if( $q->num_rows() > 0 )
		  {
			return $q->row();
		  } 
		
		  return FALSE;

	}
	
	public function deleteDelivery($id)
	{
	   
		if($this->db->delete('deliveries', array('id' => $id))) {
			return true;
		}
		
	return FALSE;
	}
	
	/*----------------GET SUB ORDERS BETWEEN DATES----------------*/
	public function getSubOrdersBtwnDates($dates=NULL) 	
	{
		
	   $this->db->select('*');
	   $this->db->from('orders');
	   $this->db->where("date between '$dates[from]' AND '$dates[to]'");
	   $results = $this->db->get()->result_array();
	   //echo $this->db->last_query(); die;
	   //print_r($results); die;
	  return $results;
	}
	
	/*----------------TRACK WORKER REPORT -----------------*/
	
	public function trackWorkerReport($workerId='', $datefrom = '', $dateto='', $status='') 	
	{
		$this->db->select('*');
		$this->db->from('order_items');
		$this->db->join('orders', 'orders.id = order_items.order_id');
		$this->db->where('order_items.worker_id',$workerId);
		$this->db->where("orders.date BETWEEN '$datefrom' and '$dateto' ");
		$this->db->where('order_items.status',$status);
		$results = $this->db->get()->result();
		//echo $this->db->last_query();die;
	  	return $results;
	}
	
	/*public function trackWorkerReportsbyStatus($workerId='', $datefrom = '', $dateto='', $status1='', $status2='') 	
	{
		
		$this->db->select('orders.item_name as itemName,orders.date as date,orders.trial_date as trialDate,orders.delivery_date as deliveryDate,order_items.*');
		$this->db->from('order_items');
		$this->db->join('orders', 'orders.id = order_items.order_id');
		$this->db->where('order_items.worker_id',$workerId);
		$this->db->where("orders.date BETWEEN '$datefrom' and '$dateto' ");
		$this->db->where('order_items.status',$status1);
		$this->db->or_where('order_items.status',$status2);
		
		$results = $this->db->get()->result();
		//echo $this->db->last_query();die;
	  	return $results;
	}*/
	
	public function trackWorkerReportsbyStatus($workerId='', $datefrom = '', $dateto='', $status1='', $status2='') 	
	{
		$results = $this->db->query("SELECT `orders`.`item_name` as itemName, `orders`.`date` as date, `orders`.`trial_date` as trialDate, `orders`.`delivery_date` as deliveryDate, `order_items`.* FROM (`order_items`) JOIN `orders` ON `orders`.`id` = `order_items`.`order_id` WHERE `order_items`.`worker_id` ='$workerId' AND `orders`.`date` BETWEEN '$datefrom' and '$dateto' AND (`order_items`.`status` = '$status1' OR `order_items`.`status` = '$status2')")->result_array();
	  	return $results;
	}
	
	public function getTransactionBtwnDates($dates=NULL) 	
	{
		
	   $this->db->select('*');
	   $this->db->from('payment');
	   $this->db->where("pay_date between '$dates[from]' AND '$dates[to]'");
	   $results = $this->db->get()->result_array();
	  	return $results;
	}
	
	public function getPurchaseData($data = array())
	{
	
		$this->db->select("purchases.id as id, date, reference_no, purchases.purchase_type as ptype, supplier_name, GROUP_CONCAT(CONCAT(purchase_items.product_name, ' (', purchase_items.quantity, ')') SEPARATOR ', <br>') as iname, COALESCE(inv_total, 0), COALESCE(total_tax, 0), total", FALSE)
   ->from('purchases')
   ->join('purchase_items', 'purchase_items.purchase_id=purchases.id', 'left')
   ->group_by('purchases.id'); 
   //if($name) { $this->datatables->like('purchase_items.product_name', $name); }
   if($data['supplier']) { $this->db->like('purchases.supplier_id', $data['supplier']); }
   if($data['reference_no']) { $this->db->like('purchases.reference_no', $data['reference_no'], 'both'); }
   if($data['start_date']) { $this->db->where('purchases.date BETWEEN "'. $data['start_date']. '" and "'.$data['end_date'].'"'); }
  	$q = $this->db->get();
	//echo $this->db->last_query();
	if($q->num_rows() > 0) {
			foreach (($q->result()) as $row) {
				$datas[] = $row;
			}
				
			return $datas;
		}
	}
	
	public function trackDeliveredSubOrder($id='',$status='')
	{
		$results = $this->db->get_where('order_items',array('order_id'=>$id,'status'=>$status))->result_array();
		return $results;
	}
	
	/*-------------------- Devendra WORK----------------*/
	public function workerReportsbyStatus($workerId='', $status1='', $status2='') 	
	{
		$results = $this->db->query("SELECT `orders`.`item_name` as itemName, `orders`.`date` as date, `orders`.`trial_date` as trialDate, `orders`.`delivery_date` as deliveryDate, `order_items`.* FROM (`order_items`) JOIN `orders` ON `orders`.`id` = `order_items`.`order_id` WHERE `order_items`.`worker_id` ='$workerId' AND (`order_items`.`status` = '$status1' OR `order_items`.`status` = '$status2')")->result_array();
	  	return $results;
	}
	
	public function transactionCreditReport() 	
	{
		$this->db->select('payment.*,orders.customer_name');
		$this->db->from('payment');
		$this->db->join('orders', 'orders.id = payment.order_id');
		$results = $this->db->get()->result_array();
	  	return $results;
	}
	
	public function transactionDebitReport() 	
	{
		$results = $this->db->get('purchases')->result_array();
	  	return $results;
	}
	
	public function getDebitBtwnDates($fromDate='',$toDate='') 	
	{
	   $this->db->select('*');
	   $this->db->from('purchases');
	   $this->db->where("date between '$fromDate' AND '$toDate'");
	   $results = $this->db->get()->result_array();
	  	return $results;
	}
	
	public function getCreditBtwnDates($fromDate='',$toDate='') 	
	{
		$this->db->order_by('pay_date', 'desc');
		$this->db->select('payment.*,orders.customer_name');
		$this->db->from('payment');
		$this->db->join('orders', 'orders.id = payment.order_id');
		$this->db->where("pay_date between '$fromDate' AND '$toDate'");
		$results = $this->db->get()->result_array();
		//echo $this->db->last_query();die;
	  	return $results;
	}
	
	public function getAllOrdersBtwnDates($fromDate='',$toDate='') 	
	{
		$this->db->select('*');
		$this->db->from('orders');
		$this->db->where("date between '$fromDate' AND '$toDate'");
		$results = $this->db->get()->result_array();
	  	return $results;
	}
	
	public function viewNewSubOrder($id='') 	
	{
		$this->db->select('orders.*,order_items.cloth_style,order_items.cloth_type,order_items.cloth_unit_price,order_items.amount,order_items.sub_order_price,order_items.status');
		$this->db->from('order_items');
		$this->db->join('orders', 'orders.id = order_items.order_id');
		$this->db->where('orders.id',$id);
		$this->db->where('order_items.status','inprocess');
		$results = $this->db->get()->result_array();
		//echo $this->db->last_query(); die;
	  	return $results;
	}
	
	public function getCustomerMeasurement($cust_id='',$prdID='',$patternID='',$styleID='') 	
	{
		$this->db->select('order_items.measurement');
		$this->db->from('order_items');
		$this->db->join('orders', 'orders.id = order_items.order_id');
		$this->db->where('orders.customer_id',$cust_id);
		$this->db->where('orders.item_id',$prdID);
		$this->db->where('orders.pattern_id',$patternID);
		$this->db->where('orders.style_id',$styleID);
		$this->db->order_by('order_items.id','DESC');
		$this->db->limit(1);
		$results = $this->db->get()->row();
		//echo $this->db->last_query(); die;
		if(!empty($results)){
			return $results;
	  	}
	  	else{
			return false;
		}
	}	
	
}
