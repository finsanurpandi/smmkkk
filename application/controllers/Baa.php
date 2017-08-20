<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Baa extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_baa');
		$this->load->library('upload');	
	}


	function set_view($url, $data=null)
	{

		$session = $this->session->userdata('login_in');

		if ($session == TRUE  && $this->session->role == 3) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view($url, $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}

	}

	function index()
	{
		// get data user
		$user_akun = $this->m_baa->getAllData('staff', array('username' => $this->session->username))->result_array();

		// DATA
		$data['user'] = $user_akun[0];

		// funtion view
		$this->set_view('baa/home', $data);	
	}

	function registrasi()
	{
		// get data user
		$user_akun = $this->m_baa->getAllData('staff', array('username' => $this->session->username))->result_array();

		// get data pembayaran
		$pembayaran = $this->m_baa->getAllData('v_mhs_pembayaran', array('tahun_ajaran' => $this->session->tahun_ajaran));

		// DATA
		$data['user'] = $user_akun[0];
		$data['pembayaran'] = $pembayaran->result_array();

		// funtion view
		$this->set_view('baa/registrasi', $data);	
	}


}