<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Custom
{

	private $CI;

	function __construct()
	{
		// Assign by reference with "&" so we don't create a copy
		$this->CI = &get_instance();
	}

	public function CropImg($source, $dest, $width, $height, $x, $y)
	{
		$this->CI->load->library('image_lib');
		$config['image_library'] = 'gd2';
		$config['library_path'] = '/usr/bin';
		$config['source_image'] = $source;
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = FALSE;
		$config['x_axis'] = $x;
		$config['y_axis'] = $y;
		$config['new_image'] = $dest;
		$config['width'] = $width;
		$config['height'] = $height;
		$this->CI->image_lib->initialize($config);
		$this->CI->image_lib->crop();
		$this->CI->image_lib->clear();
	}

	public function ResizeImg($source, $dest, $width, $height)
	{
		$this->CI->load->library('image_lib');
		$config['source_image'] = $source;
		$config['new_image'] = $dest;
		$config['maintain_ratio'] = FALSE;
		$config['width'] = $width;
		$config['height'] = $height;
		$this->CI->image_lib->initialize($config);
		$this->CI->image_lib->resize();
		$this->CI->image_lib->clear();
	}

	public function UploadImg($dest, $name, $field)
	{
		$this->CI->load->library('upload');
		$config['upload_path'] = "./{$dest}";
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '10000'; //byte 
		$config['max_width'] = '6000';
		$config['max_height'] = '6000';
		$config['file_name'] = $name;
		$this->CI->upload->initialize($config); //upload image data
		$this->CI->upload->do_upload($field);
	}
	public function sendMail($email, $subject, $message)
	{		
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'xxx@gmail.com', // change it to yours
			'smtp_pass' => 'xxx', // change it to yours
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE
		);

		$this->CI->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('xxx@gmail.com'); // change it to yours
		$this->email->to($email); // change it to yours
		$this->email->subject($subject);
		$this->email->message($message);
		if ($this->email->send()) {
			return true;
		}
		return false;
	}
	// remember_me cookie set function============ 
	public function remember_me_cookie()
	{
		$id = $this->CI->session->userdata('myid');
		if (!$id) {
			$ckName = $this->CI->input->cookie('ckName', true);
			if ($ckName && strlen($ckName) == 4) {
				$dt = $this->CI->om->view("*", "users", ['remember_me' => $ckName]);
				if ($dt) {
					foreach ($dt as $d) {
						$sdata = [
							'myid' => $d->id,
							'myname' => $d->name,
							'myemail' => $d->email
						];
						$this->CI->input->set_cookie('ckName', $ckName, 172800);
						$this->CI->session->set_userdata($sdata);
						redirect(base_url(""), "refresh");
					}
				}
			}
		}
	}        
}
