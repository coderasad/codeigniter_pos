<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller
{

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
		$data['title'] = 'Dashboard page';
		$data['customer_count'] = count($this->om->view('*', 'customer'));
		$data['product_count'] = count($this->om->view('*', 'product'));
		$data['supplier_count'] = count($this->om->view('*', 'supplier'));
		$data['orders_count'] = count($this->om->view('orders.id', 'orders'));
		$data['sell'] = $this->om->view('sell.price', 'sell');
		$data['product'] = $this->om->view('product.supplier_price', 'product');
		$data['content'] = $this->load->view('index', $data, true);
		$this->load->view('master', $data);
	}

	public function register()
	{
		$this->load->helper('form');
		$data['js'] = [
			'assets/backend/js/custom/check-email'
		];
		$data['title'] = 'Register page';
		$data['city'] = $this->om->view('*', 'city');
		$data['content'] = $this->load->view('auth/register', $data, true);
		$this->load->view('master', $data);
	}

	public function register_check()
	{
		$this->load->helper('string');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$data['js'] = [
			'assets/backend/js/custom/check-email'
		];
		$this->form_validation->set_rules('name', 'Full Name', 'required|min_length[3]', array('required' => 'Name Required'));
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|regex_match[/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/]');
		$this->form_validation->set_rules('re-password', 'Password Confirmation', 'required|matches[password]');
		$this->form_validation->set_rules('phone', 'Phone', 'required', array('required' => 'Mobile Number Required'));
		$this->form_validation->set_rules('address', 'Address', 'required', array('required' => 'Address Required'));
		$this->form_validation->set_rules(
			'email',
			'Email',
			'required|valid_emails|is_unique[users.email]',
			array(
				'required' 	=> 'Email Required',
				'is_unique'	=> 'This Email already exists.'
			)
		);
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('condition', 'Terms & Condition', 'required');
		$this->form_validation->set_rules('city_id', 'City', 'required|greater_than_equal_to[1]', array('greater_than_equal_to' => 'Choose your City'));
		if (empty($_FILES['pic']['name'])) {
			$this->form_validation->set_rules('pic', 'Picture', 'required');
		}

		if ($this->form_validation->run() == FALSE) {
			$data['city'] = $this->om->view('*', 'city');
			$data['content'] = $this->load->view('auth/register', $data, true);
			$this->load->view('master', $data);
		} else {
			$ext = "";
			if ($_FILES['pic']['name']) {
				$extention = pathinfo($_FILES['pic']['name']);
				$ext = strtolower($extention['extension']);
				if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png' && $ext != 'gif') {
					$ext = "";
				}
			}
			$sdata = [
				'name' => $this->input->post('name', true),
				'email' => $this->input->post('email', true),
				'phone' => $this->input->post('phone', true),
				'city_id' => $this->input->post('city_id', true),
				'password' => md5($this->input->post('password', true)),
				'gender' => $this->input->post('gender', true),
				'address' => $this->input->post('address', true),
				'pic' => $ext,
				'verified_email' => random_string('alnum', 15)
			];

			if ($this->om->InsertData('users', $sdata)) {
				$id = $this->om->Id;
				$this->custom->UploadImg("assets/backend/images/user/", "{$id}_user.{$ext}", "pic");
				$msg['msg'] = "Registration Successfully";
				$this->session->set_userdata($msg);

				$message = "
					<div style='background-color: #F5F5F5; padding: 0; margin: 0; color: #666674; font-family: sans-serif; font-size: 14px; line-height: 22px;'>
					<table style='background-color: #099181; width: 100%; height: 100px;'>
					<tr>
					<td>
					<p style='text-align:center; margin: 0'><img src='https://www.newsounds.net/assets/images/footer-logo.png' height='60' alt='NewSounds'></p>

					</td>
					</tr>
					</table>

					<table style='width: 100%; padding: 0; margin: 0'>
					<tr>
					<td style='width: 20%'>&nbsp;</td>
					<td>
					<table style='width: 600px; height: auto; z-index: 15; margin: 0; background: white; border: 2px solid #FFFFFF; border-radius: 0 0 5px 5px; box-shadow: 0 0 2px rgba(0, 0, 0, .4); padding:  0 25px;'>
					<tr>
					<td>
					<h1 style='text-align: center; font-size: 2.5em; margin-top: 60px; margin-bottom: 50px; color: #000;'>Welcome to NewSounds!</h1>

					<p style='margin-top: 40px;'>You are one step away from joining the most complete event platform online. <br />
					First you need to confirm your account. Just press the button below.</p>

					<h4 style='text-align: center; margin-top: 50px;'><a href='" . base_url() . "verify-account/{$sdata['verified_email']}" . "' style='color: white; width: 225px;  height: 50px; background-color: #FEA641; display: inline-block; line-height: 50px; border-radius: 3px; text-decoration: none;'>Confirm Account</a></h4>

					<p style='padding: 15px 0;'>If that doesn't work, copy and paste the following link in your browser:</p>
					<a href='" . base_url() . "verify-account/{$sdata['verified_email']}" . "' style='padding: 15px 0; color: #FEA641; line-height: 22px;'>" . base_url() . "verify-account/{$sdata['verified_email']}" . "</a>
					<p style='padding: 15px 0;'>If you have any question, just reply this email-we're always happy to help out.</p>
					<p style='padding: 15px 0;'>Cheers,<br />NewSounds Team</p>
					</td>
					</tr>
					</table>
					</td>
					<td style='width: 20%'>&nbsp;</td>
					</tr>
					</table>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					</div>
				";
				echo $message;
				// $this->custom->sendMail($sdata['email'], 'Account Verification', $message);	
			}
		}
	}

	public function verify_account()
	{
		$code = $this->uri->segment(2);
		if (strlen($code) != 15) {
			redirect(base_url('login'), "refresh");
		}
		$result = $this->om->view('*', 'users', ['verified_email' => $code]);
		if ($result) {
			foreach ($result as $d) {
				$this->om->UpdateData('users', ['verified_email' => ''], ['id' => $d->id]);
				$sdata = [
					'id' => $d->id,
					'name' => $d->name,
					'email' => $d->email
				];
				$this->session->set_userdata($sdata);
				redirect(base_url(''), "refresh");
			}
		} else {
			echo "Invalid Code!";
		}
	}

	public function logout()
	{
		$this->session->unset_userdata("myid");
		$this->session->unset_userdata("myname");
		$this->session->unset_userdata("myemail");
		$this->input->set_cookie('ckName', '', '0');
		redirect(base_url('login'), "refresh");
	}

	public function category()
	{
		$data['title'] = 'Category page';
		$data['num'] = '1';
		$data['num2'] = '1';
		$data['category'] = $this->om->view('*', 'category');
		$data['brand'] = $this->om->view('*', 'brand');
		$data['content'] = $this->load->view('supplier/category', $data, true);
		$this->load->view('master', $data);
	}
public function error_page()
	{
		$data['title'] = '404 page';
		$data['content'] = $this->load->view('errors/html/error_404', $data, true);
		$this->load->view('master', $data);
	}
}
