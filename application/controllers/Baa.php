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
			$this->load->view('baa/modal', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}

	}


	function index()
	{
		// get data user
		$user_akun = $this->m_baa->getAllData('staff', array('username' => $this->session->username))->result_array();

		// get data registrasi
		$jml_mhs = $this->m_baa->getAllData('mahasiswa', array('status' => 1))->num_rows();
		$jml_register = $this->m_baa->getAllData('mhs_pembayaran', array('tahun_ajaran' => $this->session->tahun_ajaran, 'keterangan' => 0))->num_rows();
		$persentase = round(($jml_register*100)/$jml_mhs, 2);

		// $jml_unregister = $jml_mhs - $jml_register;

		// DATA
		$data['user'] = $user_akun[0];
		$data['persentase'] = $persentase;
		$data['mhs_aktif'] = $jml_mhs;
		$data['mhs_register'] = $jml_register;
		$data['mhs_unregister'] = $jml_mhs - $jml_register;

		// function view
		$this->set_view('baa/dashboard', $data);	
	}

	function profil()
	{
		// get data user
		$user_akun = $this->m_baa->getAllData('staff', array('username' => $this->session->username))->result_array();

		// DATA
		$data['user'] = $user_akun[0];

		// funtion view
		$this->set_view('baa/profil', $data);	
	}

	function registrasi()
	{
		// get data user
		$user_akun = $this->m_baa->getAllData('staff', array('username' => $this->session->username))->result_array();

		//get data pembayaran
		$pembayaran = $this->m_baa->getAllData('v_mhs_pembayaran', array('tahun_ajaran' => $this->session->tahun_ajaran, 'keterangan' => 0), array('id' => 'ASC'));
		// $pembayaran = $this->m_baa->getRegistrasi();

		// DATA
		$data['user'] = $user_akun[0];
		$data['pembayaran'] = $pembayaran->result_array();

		// funtion view
		$this->set_view('baa/registrasi', $data);	

		$tambahRegistrasi = $this->input->post('tambahRegistrasi');

		if (isset($tambahRegistrasi)) {
			//set datetime
			date_default_timezone_set("Asia/Bangkok");
			$date = new DateTime();
			$tgl_validasi = $date->format('Y-m-d H:i:s');

			// SET TANGGAL PEMBAYARAN
			if ($this->input->post('tanggal') == null) {
				$tgl_pembayaran = $tgl_validasi;
			} else {
				$tgl = explode('/', $this->input->post('tanggal'));
				$tgl_pembayaran = $tgl[2].'-'.$tgl[0].'-'.$tgl[1].' '.$this->input->post('waktu');
			}

			$data = array(
				'npm' => $this->input->post('npm'),
				'tahun_ajaran' => $this->session->tahun_ajaran,
				'status' => 1,
				'jumlah' => 500000,
				'tgl_pembayaran' => $tgl_pembayaran,
				'tgl_validasi' => $tgl_validasi,
				'keterangan' => 0
			);

			$this->m_baa->insertData('mhs_pembayaran', $data);

			$this->session->set_flashdata('success', true);

			redirect($this->uri->uri_string());
		}

		
	}

	function pembayaran()
	{
		// get data user
		$user_akun = $this->m_baa->getAllData('staff', array('username' => $this->session->username))->result_array();

		// get data pembayaran
		$pembayaran = $this->m_baa->getAllData('mahasiswa');

		// DATA
		$data['user'] = $user_akun[0];
		$data['pembayaran'] = $pembayaran->result_array();

		// funtion view
		$this->set_view('baa/pembayaran', $data);

		// ADD DATA PEMBAYARAN
		$tambahPembayaran = $this->input->post('tambahPembayaran');

		if (isset($tambahPembayaran)) {
			//set datetime
			date_default_timezone_set("Asia/Bangkok");
			$date = new DateTime();
			$tgl_validasi = $date->format('Y-m-d H:i:s');

			// SET TANGGAL PEMBAYARAN
			if ($this->input->post('tanggal') == null) {
				$tgl_pembayaran = $tgl_validasi;
			} else {
				$tgl = explode('/', $this->input->post('tanggal'));
				$tgl_pembayaran = $tgl[2].'-'.$tgl[0].'-'.$tgl[1].' '.$this->input->post('waktu');
			}

			$data = array(
				'npm' => $this->input->post('npm'),
				'tahun_ajaran' => $this->session->tahun_ajaran,
				'status' => 1,
				'jumlah' => $this->input->post('jumlah'),
				'tgl_pembayaran' => $tgl_pembayaran,
				'tgl_validasi' => $tgl_validasi,
				'keterangan' => 1
			);
			
			$this->m_baa->insertData('mhs_pembayaran', $data);

			$this->session->set_flashdata('success', true);

			redirect($this->uri->uri_string());
		}
	}

	function detailpembayaran($npm)
	{
		$npm = $this->encrypt->decode($npm);

		// get data user
		$user_akun = $this->m_baa->getAllData('staff', array('username' => $this->session->username))->result_array();

		// get data pembayaran
		$pembayaran = $this->m_baa->getAllData('v_mhs_pembayaran', array('npm' => $npm, 'tahun_ajaran' => $this->session->tahun_ajaran));

		// get data mahasiswa
		$mhs = $this->m_baa->getAllData('mahasiswa', array('npm' => $npm))->result_array();

		// DATA
		$data['user'] = $user_akun[0];
		$data['mhs'] = $mhs[0];
		$data['pembayaran'] = $pembayaran->result_array();

		// funtion view
		$this->set_view('baa/detailpembayaran', $data);

	}


}