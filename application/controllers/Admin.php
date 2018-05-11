<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_basic');
		$this->load->library('upload');

		$login = $this->session->userdata("login_in");
		if(!isset($login))
        {
        	redirect('login','refresh');
        }

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
					'jenis_kelamin' => $this->input->post('jeniskelamin'),
					'nidn' => '000'
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

	function input_jadwal($tak = null)
	{

		// get data user
		$user_akun = $this->m_basic->getAllData('staff', array('username' => $this->session->username))->result_array();

		// get matakuliah
		$matkul = $this->m_basic->getAllData('matakuliah', null, array('id' => 'ASC'))->result_array();

		// get jadwal
		// $jadwal = $this->m_basic->getAllData('jadwal', null, array('semester' => 'ASC'))->result_array();

		// get dosen
		$dosen = $this->m_basic->getAllData('dosen', null, array('nidn' => 'ASC'))->result_array();

		$allTa = $this->m_basic->getDistinctData('tahun_ajaran', 'tahun_ajaran', array('tahun_ajaran', 'DESC'))->result_array();

		// if ($tak !== null) {
		// 	$ta = $this->encrypt->decode($tak);
		// } else {
		// 	$ta = $this->input->post('tahunajaran');
		// }

		$ta = $this->input->post('tahunajaran');
		$tahunajaran = null;

		if (!isset($ta)) {
			$tahunajaran = $this->session->tahun_ajaran;
			$jadwal = $this->m_basic->getAllData('jadwal', array('tahun_ajaran'=>$this->session->tahun_ajaran), array('semester' => 'ASC'))->result_array();
		} else {
			$tahunajaran = $ta;
			$jadwal = $this->m_basic->getAllData('jadwal', array('tahun_ajaran'=>$ta), array('semester' => 'ASC'))->result_array();
		}

		$tambahjadwal = $this->input->post('tambahJadwal');

		$update = false;

		if (isset($tambahjadwal)) {
			$matakuliah = explode(',', $this->input->post('kode-matkul'));
			$dsen = explode('-', $this->input->post('nidn-dosen'));

			$data = array();

			for ($i = 0; $i < count($this->input->post('kelas')); $i++) {
	            $data[$i] = array(
	            		'id_matkul' => $matakuliah[0],
						'kode_matkul' => $matakuliah[1],
						'nama_matkul' => $matakuliah[2],
						'sks' => $matakuliah[3],
						'nidn' => trim(preg_replace('/\s\s+/', ' ', $dsen[0])),
						'nama_dosen' => $dsen[1],
						'status' => $this->input->post('perkuliahan'),
						'kelas' => $this->input->post('kelas')[$i],
						'hari' => $this->input->post('hari'),
						'jam_mulai' => $this->input->post('jam_mulai'),
						'jam_selesai' => $this->input->post('jam_selesai'),
						'ruangan' => $this->input->post('ruangan'),
						'semester' => $matakuliah[4],
						'tahun_ajaran' => $this->input->post('tahunajaran')
	            );
	        };

	        $this->m_basic->insertAllData('jadwal', $data);

	        $this->session->set_flashdata('success', true);

	        //$url = base_url().'admin/input_jadwal/'.$this->encrypt->encode($this->input->post('tahunajaran'));

			redirect($this->uri->uri_string());

	        //redirect($url,'refresh');

			//$update = true;
		}

		// DATA
		$data['user'] = $user_akun[0];
		$data['matkul'] = $matkul;
		$data['jadwal'] = $jadwal;
		$data['dosen'] = $dosen;
		$data['tahunajaran'] = $tahunajaran;
		$data['allTa'] = $allTa;
		$data['update'] = $update;
		$data['tak'] = $tak;

		// funtion view
		$this->set_view('admin/input_jadwal', $data);
	}

	function input_krs()
	{
		// get data user
		$user_akun = $this->m_basic->getAllData('staff', array('username' => $this->session->username))->result_array();

		// get tahun ajaran
		$allTa = $this->m_basic->getDistinctData('tahun_ajaran', 'tahun_ajaran', array('tahun_ajaran', 'DESC'))->result_array();

		// get daftar mahasiswa
		$mahasiswa = $this->m_basic->getAllData('mahasiswa')->result_array();

		$tahunajaran = $this->input->post('tahunajaran');
		$krs = false;
		$ta = "";

		if (!isset($tahunajaran)) {
			$krs = false;
			$mhs = $this->m_basic->getAllData('mahasiswa', array('npm' => $this->input->post('npm')))->result_array();
		} else {
			$krs = TRUE;
			$ta = $this->input->post('tahunajaran');
			$mhs = $this->m_basic->getAllData('mahasiswa', array('npm' => $this->input->post('npm')))->result_array();
		}

		// set user 'kelas'
		//$this->session->set_userdata('kelas', $user_akun[0]['kelas']);

		// get data matakuliah
		$mk = $this->m_basic->getAllData('matakuliah')->result_array();


		// DATA
		$data['user'] = $user_akun[0];
		//$data['krs'] = $this->krs;
		$data['mk'] = $mk;
		$data['krs'] = $krs;
		$data['mhs'] = @$mhs[0];
		$data['ta'] = @$ta;
		$data['allTa'] = $allTa;
		$data['mahasiswa'] = $mahasiswa;

		// funtion view
		$this->set_view('admin/input_krs', $data);

		// SUBMIT PERWALIAN
		$krs = $this->input->post('submitKrs');

		if (isset($krs)) {
			date_default_timezone_set("Asia/Bangkok");
			$date = new DateTime();
			$tglperwalian = $date->format('Y-m-d H:i:s');

			$id_matkul = array();
			$kode_matkul = array();

			for ($i=0; $i < count($this->input->post('kode_matkul')); $i++) {
				$matkul = explode(',', $this->input->post('kode_matkul')[$i]);
				$id_matkul[] = $matkul[0];
				$kode_matkul[] = $matkul[1];
			}

			$data = array();

			for ($i = 0; $i < count($this->input->post('kode_matkul')); $i++) {
	            $data[$i] = array(
	            	'npm' => $mhs[0]['npm'],
	            	'id_matkul' => $id_matkul[$i],
	                'kode_matkul' => $kode_matkul[$i],
	                'kelas' => $mhs[0]['kelas'],
	                'tahun_ajaran' => $this->input->post('tahun_ajaran')
	            );
	        };

	        $data2 = array(
	        	'npm' => $mhs[0]['npm'],
	        	'nidn' => $mhs[0]['nidn'],
	        	'tahun_ajaran' => $this->input->post('tahun_ajaran'),
	        	'tgl_perwalian' => $tglperwalian
	        	);

	        $this->m_basic->insertMultiple('krs', $data, 'stt_perwalian', $data2);
	        //print_r($data);
	        redirect($this->uri->uri_string());
		}
	}

	function input_nilai()
	{
		// get data user
		$user_akun = $this->m_basic->getAllData('staff', array('username' => $this->session->username))->result_array();

		// get tahun ajaran
		$allTa = $this->m_basic->getDistinctData('tahun_ajaran', 'tahun_ajaran', array('tahun_ajaran', 'DESC'))->result_array();

		// get daftar mahasiswa
		$mahasiswa = $this->m_basic->getAllData('mahasiswa')->result_array();

		$tahunajaran = $this->input->post('tahunajaran');
		$krs = false;
		$ta = "";

		if (!isset($tahunajaran)) {
			$krs = false;
		} else {
			$krs = TRUE;
			$ta = $this->input->post('tahunajaran');
			$mhs = $this->m_basic->getAllData('mahasiswa', array('npm' => $this->input->post('npm')))->result_array();
		}

		// set user 'kelas'
		//$this->session->set_userdata('kelas', $user_akun[0]['kelas']);

		// get data matakuliah
		@$mk = $this->m_basic->getAllData('v_mhs_perwalian', array('npm' => $mhs[0]['npm'], 'tahun_ajaran' => $ta))->result_array();

		// DATA
		$data['user'] = $user_akun[0];
		//$data['krs'] = $this->krs;
		$data['mk'] = @$mk;
		$data['krs'] = $krs;
		$data['mhs'] = @$mhs[0];
		$data['ta'] = @$ta;
		$data['allTa'] = $allTa;
		$data['mahasiswa'] = $mahasiswa;

		// funtion view
		$this->set_view('admin/input_nilai', $data);

		// SUBMIT PERWALIAN
		$krs = $this->input->post('submitKrs');

		if (isset($krs)) {

			$data = array();

			for ($i = 0; $i < count($this->input->post('nilai')); $i++) {
	            $data[$i] = array(
	            	'npm' => trim(preg_replace('/\s\s+/', ' ', $this->input->post('npm')[$i])),
	            	'id_matkul' => $this->input->post('id_matkul')[$i],
	                'nidn' => $this->input->post('nidn'),
	                'semester_mhs' => $this->input->post('semester_mhs')[$i],
	                'tahun_ajaran' => $this->input->post('tahun_ajaran'),
	                'nilai' => $this->input->post('nilai')[$i]
	            );
	        };

	        $this->m_basic->insertAllData('nilai', $data);
	        //print_r($data);
	        redirect($this->uri->uri_string());
		}
	}




}
