<?php
defined('BASEPATH') or exit('No direct script access allowed');

class login extends CI_Controller{
	
	public function __construct()
	{
		parent::__construct();

		if($this->session->userdata('id_jenis_user') == !NULL)
		{
			redirect('./');
		}

	}

	public function index(){

		$this->load->view('login', $d);
	}

	function masuk()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$cek = $this->login_model->cek($username, $password);
		if($cek->num_rows() == 1)
		{
			foreach($cek->result() as $data){
				$sess_data['id_user'] = $data->id;
				$sess_data['username'] = $data->username;
				$sess_data['id_jenis_user'] = $data->level;
				$sess_data['nama_login'] = $data->nama;
				$this->session->set_userdata($sess_data);
			}

			if($this->session->userdata('id_jenis_user') == 'Admin')
			{
				redirect('./');
			}
			elseif($this->session->userdata('id_jenis_user') == 'QA System')
			{
				redirect('./');
			}
			elseif($this->session->userdata('id_jenis_user') == 'SPV. Line')
			{
				redirect('./');
			}
			elseif($this->session->userdata('id_jenis_user') == 'Kepala Bagian')
			{
				redirect('./');
			}
			elseif($this->session->userdata('id_jenis_user') == '')
			{
				$this->session->sess_destroy();
				redirect('./');
			}
		}
		else
		{
			$this->session->set_flashdata('pesan', 'Maaf, kombinasi username dengan password Anda salah!');
			redirect('login');
		}
	}
}