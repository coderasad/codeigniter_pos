<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SellController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$myId = $this->session->userdata('myid');
		if (!$myId) {
			redirect(base_url('login'), "refresh");
		}
	}

	public function index()
	{
		$data['title'] = 'Sell page';
		$where = "orders.order_no > 0" ;
		$data['orders'] = $this->om->view(
			'orders.*,customer.name as cname',
			'orders',
			$where, ['orders.id','DESC'], '',
			['customer' => 'orders.customer_id = customer.id']
		);
		$data['content'] = $this->load->view('sell/sell', $data, true);
		$this->load->view('master', $data);
	}

	public function create()
	{
		$data['title'] = 'Sell page';
		$this->load->helper('form');
		$data['product'] = $this->om->view('*', 'product');
		$data['customer'] = $this->om->view('*', 'customer');
		$data['content'] = $this->load->view('Sell/create', $data, true);
		$this->load->view('master', $data);
	}
	public function store()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper('string');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('order_no', 'Customer Name', 'required');
		$this->form_validation->set_rules('grand_total', 'Amount', 'required');
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Sell page';;
			$this->load->helper('form');
			$data['product'] = $this->om->view('*', 'product');
			$data['customer'] = $this->om->view('*', 'customer');
			$data['content'] = $this->load->view('Sell/create', $data, true);
			$this->load->view('master', $data);
		}
		else {	
			// order table data insert============
			$order_data = [			
				'customer_id' => $this->input->post('customer_id', true),
				'order_no' => $this->input->post('order_no', true),
				'paid_amount' => $this->input->post('paid_amount', true),
				'due_amount' => $this->input->post('due_amount', true),
				'discount' => $this->input->post('discount', true),
			];
			$order_data = $this->om->InsertData('orders', $order_data);
			
			// Sell table data insert =========
			$order_no = $this->input->post('order_no', true);
			$orderId = $this->om->view('orders.id', 'orders', ['order_no' => $order_no]);			
			foreach($orderId as $orData){
				$order_id = $orData->id;
			}
			$pid = count($this->input->post('t_product_id[]', true));
			for($i=0; $i < $pid; $i++){
				$row['product_id'] = $this->input->post("t_product_id[{$i}]", true);
				$row['quantity'] = $this->input->post("t_quantity[{$i}]", true);
				$row['price'] = $this->input->post("t_price[{$i}]", true);
				$row['order_id'] = $order_id;
				$this->om->InsertData('sell', $row);

				// update product qty===========
				$prodId = $this->om->view('*','product',['id' =>$row['product_id'] ]);
				foreach($prodId as $data){
					$qty = $data->quantity - $row['quantity'];
					$this->om->Updatedata('product', ['quantity' => $qty], ['id' =>$row['product_id'] ]);
				}
			}			
			// update due amount===========
			$customer_id = $this->input->post('customer_id', true);
			$due_amount = $this->input->post('due_amount', true);
			$cusId = $this->om->view('customer.due_balance','customer',['id' =>$customer_id ]);
			foreach($cusId as $data){
				$dueam = $data->due_balance + $due_amount;
				$this->om->Updatedata('customer', ['due_balance' => $dueam], ['id' =>$customer_id]);
			}	
			$this->session->set_flashdata('success_msg', 'Sell Successfully');				
			redirect(base_url('sell'), "refresh");		
			
		}
	}

	public function edit()
	{
		$id = $this->uri->segment(3);
		$data['title'] = 'Sell page';
		$this->load->helper('form');
		$sdata = [
			'id' => $id
		];
		$data['Sell'] = $this->om->view('*', 'Sell', $sdata);
		$data['category'] = $this->om->view('*', 'category');
		$data['brand'] = $this->om->view('*', 'brand');
		$data['supplier'] = $this->om->view('*', 'supplier');
		$data['content'] = $this->load->view('Sell/Sell-edit', $data, true);
		$this->load->view('master', $data);
	}

	public function update()
	{
		$id = $this->uri->segment(3);
		$this->load->library('form_validation');
		$this->load->helper('form');

		$ext = "";
		if ($_FILES['image']['name']) {
			$extention = pathinfo($_FILES['image']['name']);
			$ext = strtolower($extention['extension']);
			if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png' && $ext != 'gif') {
				$ext = "";
			}
			$imgname = random_string('alnum', 15);
			$this->custom->UploadImg("assets/backend/images/Sell/", "{$imgname}.{$ext}", "image");
			$ext = "assets/backend/images/Sell/{$imgname}.{$ext}";
		} else {
			$ext = $this->input->post('old_img', true);
		}
		$sdata = [
			'name' => $this->input->post('name', true),
			'category_id' => $this->input->post('category_id', true),
			'brand_id' => $this->input->post('brand_id', true),
			'details' => $this->input->post('details', true),
			'qr_code' => $this->input->post('qr_code', true),
			'image' => $ext,
			'sell_price' => $this->input->post('sell_price', true),
			'supplier_price' => $this->input->post('supplier_price', true),
			'model' => $this->input->post('model', true),
			'quantity' => $this->input->post('quantity', true),
			'supplier_id' => $this->input->post('supplier_id', true),
		];
		if ($this->om->Updatedata('Sell', $sdata, ['id' => $id])) {
			$this->session->set_flashdata('success_msg', 'Sell Update Successfully');
			redirect(base_url('Sell'), "refresh");
		} else {
			$this->session->set_flashdata('error_msg', 'Field required!');
			redirect(base_url('Sell/edit'), "refresh");
		}
	}
	public function destroy()
	{
		$id = $this->uri->segment(3);
		if ($this->om->DeleteData('Sell', ['id' => $id])) {
			$this->session->set_flashdata('error_msg', 'Sell Deleted Successfully');
			redirect(base_url('Sell'), "refresh");
		};
	}
}
