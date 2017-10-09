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

		if ($session == TRUE  && $this->session->role == 4) {
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

		// DATA
		$data['user'] = $user_akun[0];

		// funtion view
		$this->set_view('baa/home', $data);	
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

	function perwalian()
	{
		// get data user
		$user_akun = $this->m_baa->getAllData('staff', array('username' => $this->session->username))->result_array();

		// get mahasiswa
		$mahasiswa = $this->m_baa->getAllData('v_mhs_stt_perwalian', array('tahun_ajaran' => $this->session->tahun_ajaran))->result_array();

		// DATA
		$data['user'] = $user_akun[0];
		$data['mahasiswa'] = $mahasiswa;

		// funtion view
		$this->set_view('baa/perwalian', $data);	
	}

	function detail_perwalian($npm,$nidn)
	{
		// get npm
		$npm = $this->encrypt->decode($npm);

		// get ndn
		$nidn = $this->encrypt->decode($nidn);

		// get data user
		$user_akun = $this->m_baa->getAllData('staff', array('username' => $this->session->username))->result_array();

		// get dosen wali
		$dosen_wali = $this->m_baa->getAllData('dosen', array('nidn' => $nidn))->result_array();

		// get data mahasiswa perwalian
		$mahasiswa = $this->m_baa->getAllData('mahasiswa', array('npm' => $npm))->result_array();

		// get perwalian
		$sttperwalian = $this->m_baa->getAllData('stt_perwalian', array('npm' => $npm, 'tahun_ajaran' => $this->session->tahun_ajaran))->result_array();

		// get data KRS
		$data_krs = $this->m_baa->getAllData('v_mhs_perwalian', array('npm' => $npm))->result_array();

		// get Chat
		$chat = $this->m_baa->getAllData('chat', array('room' => $npm, 'tahun_ajaran' => $this->session->tahun_ajaran))->result_array();

		// DATA
		$data['user'] = $user_akun[0];
		$data['mahasiswa'] = $mahasiswa[0];
		//$data['krs'] = $this->krs;
		$data['perwalian'] = $this->input->post();
		$data['sttperwalian'] = $sttperwalian;
		$data['kode_matkul'] = $this->input->post('kode_matkul');
		$data['totalSks'] = $this->input->post('totalSks');
		$data['matakuliah'] = $this->m_baa->getAllData('matakuliah')->result_array();
		$data['dosen_wali'] = $dosen_wali[0];
		$data['data_krs'] = $data_krs;
		$data['chat'] = $chat;

		$this->set_view('baa/detail_perwalian', $data);	

		// sent chat
		$sendChat = $this->input->post('kirimChat');

		if (isset($sendChat)) {
			$data = array('from' => $user_akun[0]['nidn'],
							'room' => $npm,
							'pesan' => $this->input->post('message'),
							'tahun_ajaran' => $this->session->tahun_ajaran);

			$this->m_baa->insertData('chat', $data);
			redirect($this->uri->uri_string());
		}

		// validasi baa
		$validasi = $this->input->post('v_baa');

		if (isset($validasi)) {
			date_default_timezone_set("Asia/Bangkok");
			$date = new DateTime();
			$tglvalidasi = $date->format('Y-m-d H:i:s');

			$data = array('v_baa' => 1, 'tgl_v_baa' => $tglvalidasi);
			$where = array('npm' => $npm);

			$this->m_baa->updateData('stt_perwalian', $data, $where);
			redirect($this->uri->uri_string());
		}
	}

	function jadwal()
	{
		// get data user
		$user_akun = $this->m_baa->getAllData('staff', array('username' => $this->session->username))->result_array();

		// get matakuliah
		$matkul = $this->m_baa->getAllData('matakuliah', null, array('id' => 'ASC'))->result_array();

		// get jadwal
		$jadwal = $this->m_baa->getAllData('jadwal', null, array('semester' => 'ASC'))->result_array();

		// get dosen
		$dosen = $this->m_baa->getAllData('dosen', null, array('nidn' => 'ASC'))->result_array();

		// DATA
		$data['user'] = $user_akun[0];
		$data['matkul'] = $matkul;
		$data['jadwal'] = $jadwal;
		$data['dosen'] = $dosen;

		// funtion view
		$this->set_view('baa/jadwal', $data);	

		// tambah jadwal
		$tmbhJadwal = $this->input->post('tambahJadwal');
		if (isset($tmbhJadwal)) {
			$matakuliah = explode(',', $this->input->post('kode-matkul'));
			$dsen = explode('-', $this->input->post('nidn-dosen'));

			$data = array(
				'id_matkul' => $matakuliah[0],
				'kode_matkul' => $matakuliah[1],
				'nama_matkul' => $matakuliah[2],
				'sks' => $matakuliah[3],
				'nidn' => trim(preg_replace('/\s\s+/', ' ', $dsen[0])),
				'nama_dosen' => $dsen[1],
				'status' => $this->input->post('perkuliahan'),
				'kelas' => $this->input->post('kelas'),
				'hari' => $this->input->post('hari'),
				'jam_mulai' => $this->input->post('jam_mulai'),
				'jam_selesai' => $this->input->post('jam_selesai'),
				'ruangan' => $this->input->post('ruangan'),
				'semester' => $matakuliah[4],
				'tahun_ajaran' => $this->session->tahun_ajaran
				);

			$this->m_baa->insertData('jadwal', $data);

			$this->session->set_flashdata('success', true);

			redirect($this->uri->uri_string());
			//print_r($data);
			// echo $dsen[0];
		}
	}

	


}