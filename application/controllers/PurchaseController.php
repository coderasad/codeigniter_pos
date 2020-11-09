<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PurchaseController extends CI_Controller {
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
        $data['title'] = 'Purchase page';
        $data['num'] = 1;
        $data['Purchase'] = $this->om->view('*','purchase');
		$data['content'] = $this->load->view('purchase/purchase', $data, true);
		$this->load->view('master', $data);
    }
    
    public function create()
	{
        $data['title'] = 'Purchase page';
		$this->load->helper('form');
		$data['content'] = $this->load->view('purchase/create', '', true);
		$this->load->view('master', $data);
	}
    public function store()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');
		// $data['js'] = [
		// 	'assets/backend/js/custom/check-email'
		// ];
		$this->form_validation->set_rules('Purchase_name', 'Purchase Name', 'required|min_length[3]');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required', array('required' => 'Mobile Number Required'));
        $this->form_validation->set_rules('email', 'Email', 'required|valid_emails|is_unique[Purchase.email]', 
        array(
			'required' 	=> 'Email Required',
			'is_unique'	=> 'This Email already exists.'
		));	

		if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Purchase page';
			$this->load->helper('form');
            $data['content'] = $this->load->view('Purchase/add-Purchase', '', true);
            $this->load->view('master', $data);
		}else {			
			$sdata = [
				'name' => $this->input->post('Purchase_name', true),
				'email' => $this->input->post('email', true),
				'phone' => $this->input->post('mobile', true),
				'address' => $this->input->post('address', true),
				'due_balance' => $this->input->post('due_balance', true),
			];

			if ($this->om->InsertData('Purchase', $sdata)) {
                $this->session->set_flashdata('success_msg','Purchase Add Successfully');	
                redirect(base_url('Purchase'), "refresh");
			}
		}
	}
    
    public function edit()
	{
        $id = $this->uri->segment(3);
        $data['title'] = 'Purchase page';
        $this->load->helper('form');  
        $sdata = [
            'id' => $id
        ];    
		$data['Purchase'] = $this->om->view('*','Purchase',$sdata);
		foreach($data['Purchase'] as $value){
			$tempMail = $value->email;
		}
		$this->session->set_userdata('tmpMail', $tempMail);
		$data['content'] = $this->load->view('Purchase/Purchase-edit', $data, true);
		$this->load->view('master', $data);
    }
    
    public function update()
	{
        $id = $this->uri->segment(3);
        $this->load->library('form_validation');
		$this->load->helper('form');
		$this->form_validation->set_rules('Purchase_name', 'Purchase Name', 'required|min_length[3]');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required', array('required' => 'Mobile Number Required'));
        
		if($this->input->post('email') != $this->session->userdata('tmpMail')) {
			$is_unique = '|is_unique[Purchase.email]';
		}
		else {
			$is_unique = '';
		}			
		$this->form_validation->set_rules('email', 'Email', 'required'.$is_unique);

		if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Purchase page';
			$this->load->helper('form');
            $sdata = [
                'id' => $id
            ];    
            $data['Purchase'] = $this->om->view('*','Purchase',$sdata);
            $data['content'] = $this->load->view('Purchase/Purchase-edit', $data, true);
            $this->load->view('master', $data);
		}else {			
			$sdata = [
				'name' => $this->input->post('Purchase_name', true),
				'email' => $this->input->post('email', true),
				'phone' => $this->input->post('mobile', true),
				'address' => $this->input->post('address', true),
				'due_balance' => $this->input->post('due_balance', true),
            ];            
            if($this->om->UpdateData('Purchase', $sdata, ['id' => $id])){
				$this->session->set_flashdata('success_msg','Purchase Update Successfully');
				$this->session->unset_userdata('tmpMail');	
				redirect(base_url('Purchase'), "refresh");		
            }
		}
        
	}
    public function destroy()
	{
        $id = $this->uri->segment(3);
        if($this->om->DeleteData('Purchase',['id' => $id])){
			$this->session->set_flashdata('error_msg','Purchase Deleted Successfully');	
			redirect(base_url('Purchase'), "refresh");
		};
        
	}


}
