<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// $this->load->model('m_mahasiswa');
		// $this->load->library('upload');	
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
		// $this->check_pembayaran();
		// $data['pembayaran'] = $this->pembayaran;

		// $session = $this->session->userdata('login_in');

		// if ($session == TRUE  && $this->session->role == 1) {
		// 	$this->load->view('header', $data);
		// 	$this->load->view('sidenav', $data);
		// 	$this->load->view($url, $data);
		// 	$this->load->view('footer');
		// } else {
		// 	redirect('login', 'refresh');
		// }

		$this->load->view('header', $data);
		$this->load->view('sidenav', $data);
		$this->load->view($url, $data);
		$this->load->view('footer');
	}

	function index()
	{
		// $user_akun = $this->m_mahasiswa->getMahasiswa($this->session->userdata('username'));
		// $user_profil = $this->m_mahasiswa->getDataUser('mhs_profil', array('nim' => $this->session->username));
		// $user_ortu = $this->m_mahasiswa->getDataUser('mhs_orangtua', array('nim' => $this->session->username));
		// $user_upload = $this->m_mahasiswa->getDataUser('mhs_upload', array('nim' => $this->session->username));
		// $pengumuman = $this->m_mahasiswa->getAllDataOrder('pengumuman', array('role' => $this->session->role, 'status' => 1), array('created', 'DESC'));
		// $this->session->set_userdata('kelas', $user_akun['kelas']);


		// $data['user'] = $user_akun;
		// $data['profil'] = $user_profil;
		// $data['ortu'] = $user_ortu;
		// $data['upload'] = $user_upload;

		// $data['role'] = $this->session->role;
		// $data['pengumuman'] = $pengumuman;

		// if (!empty($user_profil)) {
		// 	$this->session->set_userdata('mhs_profil', TRUE);
		// } else {
		// 	$this->session->set_userdata('mhs_profil', FALSE);
		// }

		// if (!empty($user_ortu)) {
		// 	$this->session->set_userdata('mhs_ortu', TRUE);
		// } else {
		// 	$this->session->set_userdata('mhs_ortu', FALSE);
		// }

		// if (($user_upload['pas_photo'] == null) || ($user_upload['ijazah'] == null)) {
		// 	$this->session->set_userdata('mhs_upload', FALSE);
		// } else {
		// 	$this->session->set_userdata('mhs_upload', TRUE);
		// }


		//$this->set_view('mahasiswa/home', null);	
		$this->load->view('header');
		$this->load->view('sidenav');
		$this->load->view('mahasiswa/home');
		$this->load->view('footer');
	}


}