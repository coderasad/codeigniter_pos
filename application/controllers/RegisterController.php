<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterController extends CI_Controller {
	
	public function __construct()
	{
	  parent::__construct();
	  $myId = $this->session->userdata('myid');       
	  if($myId){
		redirect(base_url(''), "refresh");
	  }
	  $this->custom->remember_me_cookie();
	}  

	public function login()
	{
		// echo $this->input->cookie('ckName', true);
		// die();
		$this->load->helper('form');
		$data['title'] = 'Login page';
		$data['log_content'] = $this->load->view('auth/login','',true);
		$this->load->view('master',$data);
	}

	public function login_check()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|regex_match[/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_emails', array('required' => 'Email Required'));

        if ($this->form_validation->run() == FALSE) {
            $data['log_content'] = $this->load->view('auth/login','',true);
			$this->load->view('master',$data);
        } else {   
			$password = md5($this->db->escape_str($this->input->post("password")));
			$password = $this->db->escape_like_str($password);
			$email = $this->db->escape_str($this->input->post("email"));
			$email = $this->db->escape_like_str($email);

			$datas = array(
				"email" => $email,
				"password" => $password
			);
			$dt = $this->om->view("*", "users", $datas);
			if ($dt) {
				foreach ($dt as $d) {
					if ($d->verified_email) {
						$this->session->set_flashdata('error_msg', 'Please Activate Your Account');
						redirect(base_url("login"), "refresh");
					}
					$sdata = [
						'myid' => $d->id,
						'myname' => $d->name
					];	
					$remember_me = $this->input->post('remember_me');
					if ($remember_me) {
						$str = rand(1000, 9999);
						$this->om->UpdateData('users', ['remember_me' => $str], ['id' => $d->id]);
						$this->input->set_cookie('ckName', $str, '172800');
					}								
				}   
				$this->session->set_userdata($sdata);
				$this->session->set_flashdata('success_msg','Log Successfully');
				redirect(base_url(), "refresh");
			} else{
				$msg['error_msg'] = "Incorrect email or password";
				$this->session->set_flashdata($msg);
				redirect(base_url('login'), "refresh");	
			}
		}
	}

	public function forget_password(){		
		$this->load->helper('form');
		$data['title'] = 'Reset page';
		$data['log_content'] = $this->load->view('auth/reset-password','',true);
		$this->load->view('master',$data);
	}

	public function check_account() {
        $this->load->helper('form');
        $this->load->library('form_validation');
		$this->load->helper('string');
		$this->load->helper('date');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_emails', array('required' => 'Email Required'));
		if ($this->form_validation->run() == FALSE) {
            $data['log_content'] = $this->load->view('auth/reset-password','',true);
			$this->load->view('master',$data);
        }else{
			$em = $this->input->post("email");
			$result = $this->om->view('*', 'users', ['email' => $em]);
			if ($result) {
				$newData = [
					'forget_pass' => random_string('alnum', 15),
					'forget_pass_time' => date('Y-m-d H:i:s')
				];
				foreach($result as $r) {
					$this->om->UpdateData('users', $newData, ['id' => $r->id]);
				}
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
	
					<h4 style='text-align: center; margin-top: 50px;'><a href='" . base_url() . "new-password/{$newData['forget_pass']}" . "' style='color: white; width: 225px;  height: 50px; background-color: #FEA641; display: inline-block; line-height: 50px; border-radius: 3px; text-decoration: none;'>Reset Password</a></h4>
	
					<p style='padding: 15px 0;'>If that doesn't work, copy and paste the following link in your browser:</p>
					<a href='" . base_url() . "new-password/{$newData['forget_pass']}" . "' style='padding: 15px 0; color: #FEA641; line-height: 22px;'>" . base_url() . "new-password/{$newData['forget_pass']}" . "</a>
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
			else {
				$this->session->set_flashdata('error_msg', 'This email is not associated with any account.');
				redirect(base_url("reset-password"), "refresh");
			}
		}
		
	}

	public function new_password() {
		$this->load->helper('form');
		$code = $this->uri->segment(2);
		if (strlen($code) != 15) {
			redirect(base_url('login'), "refresh");
		}
		$result = $this->om->view('*', 'users', ['forget_pass' => $code]);
		if ($result) {
			foreach ($result as $r) {				
				$diff_time=(strtotime(date("Y/m/d H:i:s"))-strtotime($r->forget_pass_time))/60;
				if ($diff_time <= 120) {
					// $data['tempId'] = $r->id;
					$this->session->set_userdata('myEmail',$r->email);
					$data['log_content'] = $this->load->view('auth/set-new-password', '', true);
					$this->load->view('master', $data);
				}
				else {
					$this->session->set_flashdata('error_msg', 'Sorry the password reset link expired! Try again.');
					redirect(base_url("reset-password"), "refresh");
				}
			}
		}
	}

	public function update_password() {
		$this->load->library('form_validation');
		$this->load->helper('form');		
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|regex_match[/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/]');
		$this->form_validation->set_rules('re-password', 'Password Confirmation', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE) {
			$data['log_content'] = $this->load->view('auth/set-new-password', '', true);
			$this->load->view('master', $data);
		}else{
			// $password = $this->input->post("password");
			$inputData = [
				'password' =>  md5($this->input->post('password', true)),
				'forget_pass' => '',
				'forget_pass_time' => ''
			];
			$this->om->UpdateData('users', $inputData, ['email' => $this->input->post("myEmail")]);
			$this->session->set_flashdata('success_msg', 'Your password was successfully updated! Login Now.');
			redirect(base_url("login"), "refresh");
		} 		
	}

}
