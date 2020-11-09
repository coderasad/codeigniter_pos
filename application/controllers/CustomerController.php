<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerController extends CI_Controller {
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
        $data['title'] = 'Customer page';
        $data['num'] = 1;
        $data['customer'] = $this->om->view('*','customer');
		$data['content'] = $this->load->view('customer/customer', $data, true);
		$this->load->view('master', $data);
    }
    
    public function create()
	{
        $data['title'] = 'Customer page';
		$this->load->helper('form');
		$data['content'] = $this->load->view('customer/add-customer', '', true);
		$this->load->view('master', $data);
	}
    public function store()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');
		// $data['js'] = [
		// 	'assets/backend/js/custom/check-email'
		// ];
		$this->form_validation->set_rules('customer_name', 'Customer Name', 'required|min_length[3]');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required', array('required' => 'Mobile Number Required'));
        $this->form_validation->set_rules('email', 'Email', 'required|valid_emails|is_unique[customer.email]', 
        array(
			'required' 	=> 'Email Required',
			'is_unique'	=> 'This Email already exists.'
		));	

		if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Customer page';
			$this->load->helper('form');
            $data['content'] = $this->load->view('customer/add-customer', '', true);
            $this->load->view('master', $data);
		}else {			
			$sdata = [
				'name' => $this->input->post('customer_name', true),
				'email' => $this->input->post('email', true),
				'phone' => $this->input->post('mobile', true),
				'address' => $this->input->post('address', true),
				'opening_balance' => $this->input->post('opening_balance', true),
			];

			if ($this->om->InsertData('customer', $sdata)) {
                $this->session->set_flashdata('success_msg','Customer Add Successfully');	
                redirect(base_url('customer'), "refresh");
			}
		}
	}
    
    public function edit()
	{
        $id = $this->uri->segment(3);
        $data['title'] = 'Customer page';
        $this->load->helper('form');  
        $sdata = [
            'id' => $id
        ];    
		$data['customer'] = $this->om->view('*','customer',$sdata);
		foreach($data['customer'] as $value){
			$tempMail = $value->email;
		}
		$this->session->set_userdata('tmpMail', $tempMail);
		$data['content'] = $this->load->view('customer/customer-edit', $data, true);
		$this->load->view('master', $data);
    }
    
    public function update()
	{
        $id = $this->uri->segment(3);
        $this->load->library('form_validation');
		$this->load->helper('form');
		$this->form_validation->set_rules('customer_name', 'Customer Name', 'required|min_length[3]');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required', array('required' => 'Mobile Number Required'));
        
		if($this->input->post('email') != $this->session->userdata('tmpMail')) {
			$is_unique = '|is_unique[customer.email]';
		}
		else {
			$is_unique = '';
		}			
		$this->form_validation->set_rules('email', 'Email', 'required'.$is_unique);

		if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Customer page';
			$this->load->helper('form');
            $sdata = [
                'id' => $id
            ];    
            $data['customer'] = $this->om->view('*','customer',$sdata);
            $data['content'] = $this->load->view('customer/customer-edit', $data, true);
            $this->load->view('master', $data);
		}else {			
			$sdata = [
				'name' => $this->input->post('customer_name', true),
				'email' => $this->input->post('email', true),
				'phone' => $this->input->post('mobile', true),
				'address' => $this->input->post('address', true),
				'opening_balance' => $this->input->post('opening_balance', true),
            ];            
            if($this->om->UpdateData('customer', $sdata, ['id' => $id])){
				$this->session->set_flashdata('success_msg','Customer Update Successfully');
				$this->session->unset_userdata('tmpMail');	
				redirect(base_url('customer'), "refresh");		
            }
		}
        
	}
    public function destroy()
	{
        $id = $this->uri->segment(3);
        if($this->om->DeleteData('customer',['id' => $id])){
			$this->session->set_flashdata('error_msg','Customer Deleted Successfully');	
			redirect(base_url('customer'), "refresh");
		};
        
	}
    public function ledger()
	{
        $id = $this->uri->segment(3);
		$data['title'] = 'Customer Ledger page';
		// view sell table=============
		$data['sell'] = $this->om->view(
			'sell.*,product.name as pname,orders.order_no as order',
			'sell',
			['order_id'=>$id],
			'','',
			['orders' => 'orders.id = sell.order_id','product' => 'product.id = sell.product_id']
		);
		// view customer table=========
		$data['customer'] = $this->om->view(
			'customer.*,orders.created_at as sdate',
			'orders',
			['orders.id'=>$id],
			'','',
			['customer' => 'customer.id = orders.customer_id']
		);
		// view Orders table=========
		$data['orders'] = $this->om->view(
			'*',
			'orders',
			['orders.id'=>$id]
		);
		$data['content'] = $this->load->view('customer/ledger', $data, true);
		$this->load->view('master', $data);        
	}
    public function ledger_details()
	{
        $id = $this->uri->segment(4);
		$data['title'] = 'Customer Ledger Details page';
		// view customer table=========
		$data['customer'] = $this->om->view(
			'*',
			'customer',
			['customer.id'=>$id]
		);
		// view Orders table========
		$where = "orders.order_no > 0 and orders.customer_id={$id}";

		$data['orders'] = $this->om->view(
			'orders.*',
			'orders',
			$where,
			['orders.id','DESC']
		);
		// die($this->db->last_query());
		$data['content'] = $this->load->view('customer/ledger_details', $data, true);
		$this->load->view('master', $data);        
	}


}
