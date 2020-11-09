<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductController extends CI_Controller {
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
        $data['title'] = 'product page';
        $data['num'] = 1;
        $data['product'] = $this->om->view(
			'product.*,category.name as cname,brand.name as bname,supplier.name as spname',
			'product',
			'','','',
			['category' => 'product.category_id = category.id','brand' => 'product.brand_id = brand.id','supplier' => 'product.supplier_id = supplier.id'] 
		);
		$data['content'] = $this->load->view('product/product', $data, true);
		$this->load->view('master', $data);
    }
    
    public function create()
	{
        $data['title'] = 'Product page';
		$this->load->helper('form');
		$data['category'] = $this->om->view('*','category');
		$data['brand'] = $this->om->view('*','brand');
		$data['supplier'] = $this->om->view('*','supplier');
		$data['content'] = $this->load->view('product/create', $data, true);
		$this->load->view('master', $data);
	}
    public function store()
	{
		$this->load->helper('form');
		$this->load->helper('string');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required|min_length[3]');
		$this->form_validation->set_rules('sell_price', 'Sell Price', 'required');
		$this->form_validation->set_rules('supplier_price', 'supplier Price', 'required');
		$this->form_validation->set_rules('quantity', 'Quantity', 'required');
		$this->form_validation->set_rules('model', 'Model', 'required');
        $this->form_validation->set_rules('brand_id', 'Brand Name', 'required|greater_than_equal_to[1]', array('greater_than_equal_to' => 'Choose your Brand'));
		$this->form_validation->set_rules('category_id', 'Category Name', 'required|greater_than_equal_to[1]', array('greater_than_equal_to' => 'Choose your category'));
		$this->form_validation->set_rules('supplier_id', 'Supplier Name', 'required|greater_than_equal_to[1]', array('greater_than_equal_to' => 'Choose your category'));
		  
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Product page';
			$this->load->helper('form');
			$data['category'] = $this->om->view('*','category');
			$data['brand'] = $this->om->view('*','brand');
			$data['supplier'] = $this->om->view('*','supplier');
			$data['content'] = $this->load->view('product/create', $data, true);
			$this->load->view('master', $data);
		}else {	
			// $ext = "";
			// if ($_FILES['image']['name']) {
			// 	$extention = pathinfo($_FILES['image']['name']);
			// 	$ext = strtolower($extention['extension']);
			// 	if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png' && $ext != 'gif') {
			// 		$ext = "";
			// 	}
			// 	$id = random_string('alnum', 15);
			// 	$this->custom->UploadImg("assets/backend/images/product/", "{$id}.{$ext}", "image");			
			// 	$ext = "assets/backend/images/product/{$id}.{$ext}";
			// }
			$sdata = [
				'name' => $this->input->post('name', true),
				'category_id' => $this->input->post('category_id', true),
				'brand_id' => $this->input->post('brand_id', true),
				'details' => $this->input->post('details', true),
				'qr_code' => $this->input->post('qr_code', true),
				// 'image' => $ext,
				'sell_price' => $this->input->post('sell_price', true),
				'supplier_price' => $this->input->post('supplier_price', true),
				'model' => $this->input->post('model', true),
				'quantity' => $this->input->post('quantity', true),
				'supplier_id' => $this->input->post('supplier_id', true),
			];
			if ($this->om->InsertData('product', $sdata)) {		
				// update due amount===========
				// $supplier_id = $this->input->post('supplier_id', true);
				// $due_amount = $this->input->post('due_amount', true);
				// $cusId = $this->om->view('customer.due_balance','customer',['id' =>$customer_id ]);
				// foreach($cusId as $data){
				// 	$dueam = $data->due_balance + $due_amount;
				// 	$this->om->Updatedata('customer', ['due_balance' => $dueam], ['id' =>$customer_id]);
				// }	
						
				$this->session->set_flashdata('success_msg','product Add Successfully');	
				redirect(base_url('product'), "refresh");
			}
		}
	}
    
    public function edit()
	{
        $id = $this->uri->segment(3);
        $data['title'] = 'product page';
        $this->load->helper('form');  
        $sdata = [
            'id' => $id
		];   
		$data['product'] = $this->om->view('*','product',$sdata);
		$data['category'] = $this->om->view('*','category');
		$data['brand'] = $this->om->view('*','brand');
		$data['supplier'] = $this->om->view('*','supplier');
		$data['content'] = $this->load->view('product/product-edit', $data, true);
		$this->load->view('master', $data);
    }
    
    public function update()
	{
        $id = $this->uri->segment(3);
        $this->load->library('form_validation');
		$this->load->helper('form');		

		// $ext = "";
		// if ($_FILES['image']['name']) {
		// 	$extention = pathinfo($_FILES['image']['name']);
		// 	$ext = strtolower($extention['extension']);
		// 	if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png' && $ext != 'gif') {
		// 		$ext = "";
		// 	}
		// 	$imgname = random_string('alnum', 15);
		// 	$this->custom->UploadImg("assets/backend/images/product/", "{$imgname}.{$ext}", "image");			
		// 	$ext = "assets/backend/images/product/{$imgname}.{$ext}";
		// }else{
		// 	$ext = $this->input->post('old_img', true);
		// }
		$sdata = [
			'name' => $this->input->post('name', true),
			'category_id' => $this->input->post('category_id', true),
			'brand_id' => $this->input->post('brand_id', true),
			'details' => $this->input->post('details', true),
			'qr_code' => $this->input->post('qr_code', true),
			// 'image' => $ext,
			'sell_price' => $this->input->post('sell_price', true),
			'supplier_price' => $this->input->post('supplier_price', true),
			'model' => $this->input->post('model', true),
			'quantity' => $this->input->post('quantity', true),
			'supplier_id' => $this->input->post('supplier_id', true),
		];
		if ($this->om->Updatedata('product', $sdata,['id'=>$id])) {
			$this->session->set_flashdata('success_msg','Product Update Successfully');	
			redirect(base_url('product'), "refresh");
		}else{
			$this->session->set_flashdata('error_msg','Field required!');	
			redirect(base_url('product/edit'), "refresh");
		}
        
	}
    public function destroy()
	{
        $id = $this->uri->segment(3);
        if($this->om->DeleteData('product',['id' => $id])){
			$this->session->set_flashdata('error_msg','Product Deleted Successfully');	
			redirect(base_url('product'), "refresh");
		};
        
	}


}
