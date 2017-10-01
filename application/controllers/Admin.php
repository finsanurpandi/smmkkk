<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_basic');
		$this->load->library('upload');	
	}


	function set_view($url, $data=null)
	{

		$session = $this->session->userdata('login_in');

		if ($session == TRUE  && $this->session->role == 0) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view($url, $data);
			$this->load->view('admin/modal', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}

	}


	function index()
	{
		// get data user
		$user_akun = $this->m_basic->getAllData('staff', array('username' => $this->session->username))->result_array();

		// DATA
		$data['user'] = $user_akun[0];

		// funtion view
		$this->set_view('admin/home', $data);	
	}

	function profil()
	{
		// get data user
		$user_akun = $this->m_basic->getAllData('staff', array('username' => $this->session->username))->result_array();

		// DATA
		$data['user'] = $user_akun[0];

		// funtion view
		$this->set_view('admin/profil', $data);	
	}

	function mahasiswa()
	{
		// get data user
		$user_akun = $this->m_basic->getAllData('staff', array('username' => $this->session->username))->result_array();

		// get data mahasiswa
		$mhs = $this->m_basic->getAllData('mahasiswa', null, array('angkatan' => 'ASC'))->result_array();

		// DATA
		$data['user'] = $user_akun[0];
		$data['mhs'] = $mhs;

		// funtion view
		$this->set_view('admin/mahasiswa', $data);

		// Tambah Mahasiswa
		$tmbhMhs = $this->input->post('tambahMahasiswa');
		if (isset($tmbhMhs)) {
			$data = array(
					'npm' => $this->input->post('npm'),
					'nama' => $this->input->post('nama'),
					'angkatan' => $this->input->post('angkatan'),
					'kelas' => $this->input->post('kelas'),
					'jenis_kelamin' => $this->input->post('jeniskelamin')
					);

			$data2 = array(
					'username' => $this->input->post('npm'),
					'password' => md5($this->input->post('npm')),
					'role' => '1'
					);

			$this->m_basic->insertMultiple('mahasiswa', $data, 'login', $data2);

			$this->session->set_flashdata('success', true);

			redirect($this->uri->uri_string());
		}
	}

	function dosen()
	{
		// get data user
		$user_akun = $this->m_basic->getAllData('staff', array('username' => $this->session->username))->result_array();

		// get data mahasiswa
		$dosen = $this->m_basic->getAllData('dosen', null, array('nidn' => 'ASC'))->result_array();

		// DATA
		$data['user'] = $user_akun[0];
		$data['dosen'] = $dosen;

		// funtion view
		$this->set_view('admin/dosen', $data);

		// Tambah Dosen
		$tmbhDosen = $this->input->post('tambahDosen');
		if (isset($tmbhDosen)) {
			$data = array(
					'nidn' => $this->input->post('nidn'),
					'nik' => $this->input->post('nik'),
					'nama' => $this->input->post('nama'),
					'gelar_depan' => $this->input->post('gelar_depan'),
					'gelar_belakang' => $this->input->post('gelar_belakang'),
					'jenis_kelamin' => $this->input->post('jeniskelamin'),
					'jabatan_fungsional' => $this->input->post('jabatan_fungsional'),
					'golongan' => $this->input->post('golongan'),
					'jabatan_struktural' => $this->input->post('jabatan_struktural'),
					);

			$data2 = array(
					'username' => $this->input->post('nidn'),
					'password' => md5($this->input->post('nidn')),
					'role' => '2'
					);

			$this->m_basic->insertMultiple('dosen', $data, 'login', $data2);

			$this->session->set_flashdata('success', true);

			redirect($this->uri->uri_string());
		}
	}

	


}