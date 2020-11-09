<?php

use App\model\admin\category;

defined('BASEPATH') OR exit('No direct script access allowed');

class SupplierController extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$myId = $this->session->userdata('myid');
		if (!$myId) {
			redirect(base_url('login'), "refresh");
		}
		$this->custom->remember_me_cookie();
    }
    
    public function index()
	{
        $data['title'] = 'Supplier page';
		$data['num'] = 1;
		$data['supplier'] = $this->om->view(
							'supplier.*,category.name as cname,brand.name as bname',
							'supplier',
							'','','',
							['category' => 'supplier.category_id = category.id','brand' => 'supplier.brand_id = brand.id'] 
						);
		$data['content'] = $this->load->view('supplier/supplier', $data, true);
		$this->load->view('master', $data);
	}
	
    public function create()
	{
        $data['title'] = 'Supplier page';
		$this->load->helper('form');
		$data['css'] = [
			'assets/backend/plugins/multi-select/fSelect'
		];
		$data['js'] = [
			"assets/backend/plugins/multi-select/fSelect",			
		];
		$data['category'] = $this->om->view('*','category');
		$data['brand'] = $this->om->view('*','brand');
		$data['content'] = $this->load->view('supplier/add-supplier', $data, true);
		$this->load->view('master', $data);
	}
    public function store()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');		
		$this->form_validation->set_rules('supplier_name', 'Supplier Name', 'required|min_length[3]');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required', array('required' => 'Mobile Number Required'));
        $this->form_validation->set_rules('brand_id', 'Brand Name', 'required|greater_than_equal_to[1]', array('greater_than_equal_to' => 'Choose your Brand'));
        $this->form_validation->set_rules('category_id', 'Category Name', 'required|greater_than_equal_to[1]', array('greater_than_equal_to' => 'Choose your category')); 
        
		if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Supplier page';
			$this->load->helper('form');
			$data['css'] = [
				'assets/backend/plugins/multi-select/fSelect'
			];
			$data['js'] = [
				"assets/backend/plugins/multi-select/fSelect",			
			];
			$data['category'] = $this->om->view('*','category');
			$data['brand'] = $this->om->view('*','brand');
			$data['content'] = $this->load->view('supplier/add-supplier', $data, true);
			$this->load->view('master', $data);
		}else {			
			$sdata = [
				'name' => $this->input->post('supplier_name', true),
				'phone' => $this->input->post('mobile', true),
				'brand_id' => $this->input->post('brand_id', true),
				'category_id' => $this->input->post('category_id', true),
				'address' => $this->input->post('address', true),
				'due_balance' => $this->input->post('due_balance', true),
			];

			if ($this->om->InsertData('supplier', $sdata)) {
                $this->session->set_flashdata('success_msg','Supplier Add Successfully');	
                redirect(base_url('supplier'), "refresh");
			}
		}
	}
    
    public function edit()
	{
        $id = $this->uri->segment(3);
        $data['title'] = 'Supplier page';
		$this->load->helper('form');
		$data['css'] = [
			'assets/backend/plugins/multi-select/fSelect'
		];
		$data['js'] = [
			"assets/backend/plugins/multi-select/fSelect",			
		];
        $sdata = [
            'id' => $id
        ];    
		$data['supplier'] = $this->om->view('*','supplier',$sdata);
		$data['category'] = $this->om->view('*','category');
		$data['brand'] = $this->om->view('*','brand');
		$data['content'] = $this->load->view('supplier/supplier-edit', $data, true);
		$this->load->view('master', $data);
    }
    
    public function update()
	{
        $id = $this->uri->segment(3);
        $this->load->library('form_validation');
		$this->load->helper('form');		
		$this->form_validation->set_rules('supplier_name', 'Supplier Name', 'required|min_length[3]');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required', array('required' => 'Mobile Number Required'));
        $this->form_validation->set_rules('brand_id', 'Brand Name', 'required|greater_than_equal_to[1]', array('greater_than_equal_to' => 'Choose your Brand'));
        $this->form_validation->set_rules('category_id', 'Category Name', 'required|greater_than_equal_to[1]', array('greater_than_equal_to' => 'Choose your category'));         
		
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Supplier page';
			$this->load->helper('form');
			$data['css'] = [
				'assets/backend/plugins/multi-select/fSelect'
			];
			$data['js'] = [
				"assets/backend/plugins/multi-select/fSelect",			
			];
			$sdata = [
				'id' => $id
			];    
			$data['supplier'] = $this->om->view('*','supplier',$sdata);
			$data['category'] = $this->om->view('*','category');
			$data['brand'] = $this->om->view('*','brand');
			$data['content'] = $this->load->view('supplier/supplier-edit', $data, true);
			$this->load->view('master', $data);
		}else {			
			$sdata = [
				'name' => $this->input->post('supplier_name', true),
				'phone' => $this->input->post('mobile', true),
				'brand_id' => $this->input->post('brand_id', true),
				'category_id' => $this->input->post('category_id', true),
				'address' => $this->input->post('address', true),
				'due_balance' => $this->input->post('due_balance', true),
            ];            
            if($this->om->UpdateData('Supplier', $sdata, ['id' => $id])){
				$this->session->set_flashdata('success_msg','Supplier Update Successfully');
				redirect(base_url('supplier'), "refresh");		
            }
		}        
	}
    public function destroy()
	{
        $id = $this->uri->segment(3);
        if($this->om->DeleteData('supplier',['id' => $id])){
			$this->session->set_flashdata('error_msg','Supplier Deleted Successfully');	
			redirect(base_url('supplier'), "refresh");
		};
        
	}


}
