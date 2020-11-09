<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransactionController extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$myId = $this->session->userdata('myid');
		if (!$myId) {
			redirect(base_url('login'), "refresh");
		}
    }
    
    public function receipt()
	{
		$this->load->helper('form');
		$data['title'] = 'Transaction page';
		$data['rand'] = rand(9999,99999);
		$where1 ="supplier.due_balance > 0 ";
		$data['supplier'] = $this->om->view('*', 'supplier', $where1, ['supplier.name','ASC']);
		$where ="customer.due_balance > 0 ";
		$data['customer'] = $this->om->view('*', 'customer', $where, ['customer.name','ASC']);		
		// $data['orders'] = $this->om->view('*', 'orders', $where, ['customer.name','ASC']);		
		$data['content'] = $this->load->view('customer/receipt', $data, true);
		$this->load->view('master', $data);        
	}

    public function store()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->form_validation->set_rules('amount', 'Amount', 'required');
		$this->form_validation->set_rules('date', 'Date', 'required');
		if ($this->form_validation->run() == FALSE) {            
			$data['title'] = 'Transaction page';
			$data['supplier'] = $this->om->view('*','supplier',['supplier.name','ASC']);
			$where ="customer.due_balance > 0 ";
			$data['customer'] = $this->om->view('*', 'customer', $where, ['customer.name','ASC']);		
			$data['content'] = $this->load->view('customer/receipt', $data, true);
			$this->load->view('master', $data); 
		}else {	
			$transection = $this->input->post('transectio_type', true);
			if($transection == 2){
				$sdata = [
					'date' => $this->input->post('date', true),
					'receipt_no' => $this->input->post('receipt_no', true),
					'customer_id' => $this->input->post('customer_id', true),
					'amount' => $this->input->post('amount', true),
					'trns_mode' => $this->input->post('payment_type', true),
					'cheque_no' => $this->input->post('cheque_no', true),
					'bank_name' => $this->input->post('bank_name', true),
				];	
				if ($this->om->InsertData('transection', $sdata)) {
					$cid = $this->input->post('customer_id', true);
					$amount = $this->input->post('amount', true);
					$pre_balance = $this->input->post('pre_balance', true);
					$dataDue = $pre_balance - $amount;
					$this->om->Updatedata('customer', ['due_balance'=>$dataDue], ['id' => $cid] );
					$odata = [
						'receipt_no' => $this->input->post('receipt_no', true),
						'customer_id' => $this->input->post('customer_id', true),
						'paid_amount' => $this->input->post('amount', true),
					];
					$this->om->InsertData('orders', $odata, ['id' => $cid] );
					$this->session->set_flashdata('success_msg','Amount Receipt Successfully');	
					redirect(base_url('customer'), "refresh");
				}
			}
			// supplier data========
			else{
				$sdata = [
					'date' => $this->input->post('date', true),
					'supplier_id' => $this->input->post('supplier_id', true),
					'amount' => $this->input->post('amount', true),
					'trns_mode' => $this->input->post('payment_type', true),
					'cheque_no' => $this->input->post('cheque_no', true),
					'bank_name' => $this->input->post('bank_name', true),
				];	
				if($this->om->InsertData('transection', $sdata)) {					
					$sid = $this->input->post('supplier_id', true);
					$amount = $this->input->post('amount', true);
					$pre_balance = $this->input->post('pre_balance', true);
					$dataDue = $pre_balance - $amount;
					$this->om->Updatedata('supplier', ['due_balance'=>$dataDue], ['id' => $sid] );
					$this->session->set_flashdata('success_msg','Amount Payment Successfully');	
					redirect(base_url('supplier'), "refresh");
				}			
			}
		}
	}

	public function custmer_report(){	
		$id = $this->uri->segment(3);
		$data['title'] = 'Customer Report page';
		$data['customer'] = $this->om->view('*', 'customer', ['customer.id'=>$id]);	
		$data['orders'] = $this->om->view('*', 'orders', ['orders.customer_id'=>$id], ['orders.created_at','ASC']);	
		// $data['sell'] = $this->om->view('*', 'sell', ['orders.customer_id'=>$id], ['orders.created_at','ASC']);	

		$data['transection'] = $this->om->view(
			'orders.due_amount, orders.created_at, transection.receipt_no, transection.amount, transection.date, transection.customer_id', 
			['transection','orders'], 
			['transection.customer_id'=>$id]
		);	
		$data['content'] = $this->load->view('customer/customer_report', $data, true);
		$this->load->view('master', $data); 

	}


}
