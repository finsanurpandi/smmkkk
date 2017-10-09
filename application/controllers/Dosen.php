<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_dosen');
		$this->load->library('upload');	
	}

	function configImage($url)
	{
		$user = $this->session->username;
		$nmfile = "img_".$user."_".time();
		$config['upload_path']   =   "./assets/uploads/".$url."/";
		$config['allowed_types'] =   "gif|jpg|jpeg|png"; 
		$config['max_size']      =   "1000";
		$config['max_width']     =   "1907";
		$config['max_height']    =   "1280";
		$config['file_name']     =   $nmfile;
 
		$this->upload->initialize($config);
	}

	function set_view($url, $data=null)
	{

		$session = $this->session->userdata('login_in');

		if ($session == TRUE  && $this->session->role == 2) {
			$this->load->view('header', $data);
			$this->load->view('sidenav', $data);
			$this->load->view($url, $data);
			//$this->load->view('admin/modal', $data);
			$this->load->view('footer');
		} else {
			redirect('login', 'refresh');
		}

	}


	function index()
	{
		// get data user
		$user_akun = $this->m_dosen->getAllData('dosen', array('nidn' => $this->session->username))->result_array();

		// DATA
		$data['user'] = $user_akun[0];

		// funtion view
		$this->set_view('dosen/home', $data);	
	}

	function profil()
	{
		// get data user
		$user_akun = $this->m_dosen->getAllData('dosen', array('nidn' => $this->session->username))->result_array();

		// DATA
		$data['user'] = $user_akun[0];
		
		// funtion view
		$this->set_view('dosen/profil', $data);
	}

	function editdata()
	{
		// get data user
		$user_akun = $this->m_dosen->getAllData('dosen', array('nidn' => $this->session->username))->result_array();

		// DATA
		$data['user'] = $user_akun[0];
		$data['error'] = $this->upload->display_errors();

		// funtion view
		$this->set_view('dosen/editdata', $data);

		$updateProfil = $this->input->post('updateProfil');

		if (isset($updateProfil)) {
			$data = array(
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'tgl_lahir' => $this->input->post('tanggal_lahir'),
				'no_hp' => $this->input->post('no_hp'),
				'email' => $this->input->post('email')
			);

			$img_path = $this->input->post('path');

			$this->configImage('profiles');


			if (!$this->upload->do_upload('gambar')) {
				$this->m_dosen->updateData('dosen', $data, array('nidn' => $this->session->username));

				$this->session->set_flashdata('profilsuccess', true);

				redirect($this->uri->uri_string()."?tab=profile");
			} else {

				$fileinfo = $this->upload->data();

				$data['image'] = $fileinfo['file_name'];
				$this->m_dosen->updateData('dosen', $data, array('nidn' => $this->session->username));

				@unlink("./assets/uploads/profiles/". $img_path);

				$this->session->set_flashdata('profilsuccess', true);

				redirect($this->uri->uri_string());
			}

		}

	}

	function perwalian()
	{
		// get data user
		$user_akun = $this->m_dosen->getAllData('dosen', array('nidn' => $this->session->username))->result_array();

		// get mahasiswa
		$mahasiswa = $this->m_dosen->getAllData('mahasiswa', array('nidn' => $this->session->username))->result_array();

		// status perwalian
		$status = $this->m_dosen->getAllData('stt_perwalian', array('nidn' => $this->session->username, 'tahun_ajaran' => $this->session->tahun_ajaran))->result_array();

		// DATA
		$data['user'] = $user_akun[0];
		$data['mahasiswa'] = $mahasiswa;
		$data['status'] = $status;

		// funtion view
		$this->set_view('dosen/perwalian', $data);	
	}

	function detail_perwalian($npm)
	{
		// get npm
		$npm = $this->encrypt->decode($npm);

		// get data user
		$user_akun = $this->m_dosen->getAllData('dosen', array('nidn' => $this->session->username))->result_array();

		// get data mahasiswa perwalian
		$mahasiswa = $this->m_dosen->getAllData('mahasiswa', array('npm' => $npm))->result_array();

		// get perwalian
		$sttperwalian = $this->m_dosen->getAllData('stt_perwalian', array('npm' => $npm, 'tahun_ajaran' => $this->session->tahun_ajaran))->result_array();

		// get data KRS
		$data_krs = $this->m_dosen->getAllData('v_mhs_perwalian', array('npm' => $npm))->result_array();

		// get Chat
		$chat = $this->m_dosen->getAllData('chat', array('room' => $npm, 'tahun_ajaran' => $this->session->tahun_ajaran))->result_array();

		// DATA
		$data['user'] = $user_akun[0];
		$data['mahasiswa'] = $mahasiswa[0];
		//$data['krs'] = $this->krs;
		$data['perwalian'] = $this->input->post();
		$data['sttperwalian'] = $sttperwalian;
		$data['kode_matkul'] = $this->input->post('kode_matkul');
		$data['totalSks'] = $this->input->post('totalSks');
		$data['matakuliah'] = $this->m_dosen->getAllData('matakuliah')->result_array();
		// $data['dosen_wali'] = $dosen_wali[0];
		$data['data_krs'] = $data_krs;
		$data['chat'] = $chat;

		$this->set_view('dosen/detail_perwalian', $data);	

		// sent chat
		$sendChat = $this->input->post('kirimChat');

		if (isset($sendChat)) {
			$data = array('from' => $user_akun[0]['nidn'],
							'room' => $npm,
							'pesan' => $this->input->post('message'),
							'tahun_ajaran' => $this->session->tahun_ajaran);

			$this->m_dosen->insertData('chat', $data);
			redirect($this->uri->uri_string());
		}

		// validasi dosen
		$validasi = $this->input->post('v_dosen');

		if (isset($validasi)) {
			date_default_timezone_set("Asia/Bangkok");
			$date = new DateTime();
			$tglvalidasi = $date->format('Y-m-d H:i:s');

			$data = array('v_dosen' => 1, 'tgl_v_dosen' => $tglvalidasi);
			$where = array('npm' => $npm);

			$this->m_dosen->updateData('stt_perwalian', $data, $where);
			redirect($this->uri->uri_string());
		}
	}

	function jadwal()
	{
		// get data user
		$user_akun = $this->m_dosen->getAllData('dosen', array('nidn' => $this->session->username))->result_array();

		// get jadwal
		$jadwal = $this->m_dosen->getAllData('jadwal', array('nidn' => $this->session->username, 'tahun_ajaran' => $this->session->tahun_ajaran))->result_array();

		// DATA
		$data['user'] = $user_akun[0];
		$data['jadwal'] = $jadwal;
		
		// funtion view
		$this->set_view('dosen/jadwal', $data);
	}

	function detail_jadwal($idmatkul, $kelas)
	{
		$idmatkul = $this->encrypt->decode($idmatkul);
		$kelas = $this->encrypt->decode($kelas);

		// get data user
		$user_akun = $this->m_dosen->getAllData('dosen', array('nidn' => $this->session->username))->result_array();

		// get detail jadwal
		$jadwal = $this->m_dosen->getAllData('jadwal', array('id_matkul' => $idmatkul, 'kelas' => $kelas, 'tahun_ajaran' => $this->session->tahun_ajaran))->result_array();

		// get detail mahasiswa
		$mhs = $this->m_dosen->getAllData('v_mhs_jadwal', array('id_matkul' => $idmatkul, 'kelas' => $kelas, 'tahun_ajaran' => $this->session->tahun_ajaran), array('npm' => 'ASC'))->result_array();

		// DATA
		$data['user'] = $user_akun[0];
		$data['jadwal'] = $jadwal[0];
		$data['mhs'] = $mhs;
		
		// funtion view
		$this->set_view('dosen/detail_jadwal', $data);
	}


}