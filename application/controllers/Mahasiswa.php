<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
	public $krs = FALSE;

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_mahasiswa');
		$this->load->library('upload');	
	}

	// function configImage($url)
	// {
	// 	$user = $this->session->username;
	// 	$nmfile = "img_".$user."_".time();
	// 	$config['upload_path']   =   "./assets/uploads/".$url."/";
	// 	$config['allowed_types'] =   "gif|jpg|jpeg|png"; 
	// 	$config['max_size']      =   "1000";
	// 	$config['max_width']     =   "1907";
	// 	$config['max_height']    =   "1280";
	// 	$config['file_name']     =   $nmfile;
 
	// 	$this->upload->initialize($config);
	// }

	// function configDokumen()
	// {
	// 	$user = $this->session->username;
	// 	$nmfile = $user."_".time();
	// 	$config['upload_path']   =   "./assets/uploads/documents/mahasiswa";
	// 	$config['allowed_types'] =   "gif|jpg|jpeg|png|pdf"; 
	// 	$config['max_size']      =   "1000";
	// 	$config['file_name']     =   $nmfile;
 
	// 	$this->upload->initialize($config);
	// }

	// function check_pembayaran()
	// {

	// 	// $this->pembayaran = $this->m_mahasiswa->getAllData('mhs_pembayaran', array('nim' => $this->session->username, 'tahun_ajaran' => $this->session->tahun_ajaran, 'status' => 1))->result_array();
	// 	$this->pembayaran = $this->m_mahasiswa->getDataOrder('mhs_pembayaran', array('nim' => $this->session->username, 'tahun_ajaran' => $this->session->tahun_ajaran, 'status' => 1), array('id' => 'DESC'))->result_array();	

	// 	return $this->pembayaran;

	// }

	function set_view($url, $data=null)
	{

		$session = $this->session->userdata('login_in');

		if ($session == TRUE  && $this->session->role == 1) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view($url, $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}

	}

	function check_pembayaran()
	{
		$pembayaran = $this->m_mahasiswa->getAllData('mhs_pembayaran', array('npm' => $this->session->username, 'tahun_ajaran' => $this->session->tahun_ajaran), array('id' => 'ASC'));
		
		$validasi = $pembayaran->result_array();

		if ($pembayaran->num_rows() !== 0 && $validasi[0]['status'] == 1) {
			$this->krs = TRUE;
		}
	}

	function index()
	{
		// get data user
		$user_akun = $this->m_mahasiswa->getAllData('mahasiswa', array('npm' => $this->session->username))->result_array();
		
		// set user 'kelas'
		$this->session->set_userdata('kelas', $user_akun[0]['kelas']);

		//check pembayaran
		$this->check_pembayaran();

		// DATA
		$data['user'] = $user_akun[0];
		$data['krs'] = $this->krs;

		// funtion view
		$this->set_view('mahasiswa/home', $data);	
	}


}