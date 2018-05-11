<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Baa extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_baa');
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

	function mahasiswa()
	{
		// get data user
		$user_akun = $this->m_baa->getAllData('staff', array('username' => $this->session->username))->result_array();

		// get data mahasiswa
		$mhs = $this->m_baa->getAllData('mahasiswa', null, array('angkatan' => 'ASC'))->result_array();

		// DATA
		$data['user'] = $user_akun[0];
		$data['mhs'] = $mhs;

		// funtion view
		$this->set_view('baa/mahasiswa', $data);

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

			$this->m_baa->insertMultiple('mahasiswa', $data, 'login', $data2);

			$this->session->set_flashdata('success', true);

			redirect($this->uri->uri_string());
		}
	}

	function detail_mahasiswa($npm)
	{
		$npm = $this->encrypt->decode($npm);

		// get data user
		$user_akun = $this->m_baa->getAllData('staff', array('username' => $this->session->username))->result_array();

		// get data mahasiswa
		$mhs = $this->m_baa->getAllData('mahasiswa', array('npm' => $npm))->result_array();

		// get data orangtua
		$orangtua = $this->m_baa->getAllData('mhs_ortu', array('npm' => $npm))->result_array();

		// get data nilai
		$nilai = $this->m_baa->getAllData('v_nilai', array('npm' => $npm), array('tahun_ajaran' => 'ASC'))->result_array();
		
		// set user 'kelas'
		$this->session->set_userdata('kelas', $mhs[0]['kelas']);

		// DATA
		$data['user'] = $user_akun[0];
		$data['ortu'] = @$orangtua[0];
		$data['mhs'] = $mhs[0];
		$data['nilai'] = $nilai;
		$data['error'] = $this->upload->display_errors();

		// funtion view
		$this->set_view('baa/detail_mahasiswa', $data);

		// $updateProfil = $this->input->post('updateProfil');

		// if (isset($updateProfil)) {
		// 	$data = array(
		// 		'tempat_lahir' => $this->input->post('tempat_lahir'),
		// 		'tanggal_lahir' => $this->input->post('tanggal_lahir'),
		// 		'alamat' => $this->input->post('alamat'),
		// 		'no_tlp' => $this->input->post('no_tlp'),
		// 		'email' => $this->input->post('email'),
		// 		'status_tempat_tinggal' => $this->input->post('stt_tempat_tinggal')
		// 	);

		// 	$img_path = $this->input->post('path');

		// 	$this->configImage('profiles');


		// 	if (!$this->upload->do_upload('gambar')) {
		// 		$this->m_mahasiswa->updateData('mahasiswa', $data, array('npm' => $this->session->username));

		// 		$this->session->set_flashdata('profilsuccess', true);

		// 		redirect($this->uri->uri_string()."?tab=profile");
		// 	} else {

		// 		$fileinfo = $this->upload->data();

		// 		$data['image'] = $fileinfo['file_name'];
		// 		$this->m_mahasiswa->updateData('mahasiswa', $data, array('npm' => $this->session->username));

		// 		@unlink("./assets/uploads/profiles/". $img_path);

		// 		$this->session->set_flashdata('profilsuccess', true);

		// 		redirect($this->uri->uri_string()."?tab=profile", 'refresh');
		// 	}

			

		// 	//redirect($this->uri->uri_string()."?tab=profile");
		// }

		// $updateOrtu = $this->input->post('updateOrtu');

		// if (isset($updateOrtu)) {
		// 	$data = array(
		// 		'nama_ayah' => $this->input->post('nama_ayah'),
		// 		'nama_ibu' => $this->input->post('nama_ibu'),
		// 		'alamat' => $this->input->post('alamat'),
		// 		'no_tlp' => $this->input->post('no_tlp')
		// 	);

		// 	$this->m_mahasiswa->updateData('mhs_ortu', $data, array('npm' => $this->session->username));

		// 	$this->session->set_flashdata('ortusuccess', true);

		// 	redirect($this->uri->uri_string()."?tab=orangtua");
		// }
	}

	function dosen()
	{
		// get data user
		$user_akun = $this->m_baa->getAllData('staff', array('username' => $this->session->username))->result_array();

		// get data mahasiswa
		$dosen = $this->m_baa->getAllData('dosen', array('status' => 1))->result_array();

		// DATA
		$data['user'] = $user_akun[0];
		$data['dosen'] = $dosen;

		// funtion view
		$this->set_view('baa/dosen', $data);

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

			$this->m_baa->insertMultiple('dosen', $data, 'login', $data2);

			$this->session->set_flashdata('success', true);

			redirect($this->uri->uri_string());
		}
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
		$data_krs = $this->m_baa->getAllData('v_mhs_perwalian', array('npm' => $npm, 'tahun_ajaran' => $this->session->tahun_ajaran))->result_array();

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

			// $data = array(
			// 	'id_matkul' => $matakuliah[0],
			// 	'kode_matkul' => $matakuliah[1],
			// 	'nama_matkul' => $matakuliah[2],
			// 	'sks' => $matakuliah[3],
			// 	'nidn' => trim(preg_replace('/\s\s+/', ' ', $dsen[0])),
			// 	'nama_dosen' => $dsen[1],
			// 	'status' => $this->input->post('perkuliahan'),
			// 	'kelas' => $this->input->post('kelas'),
			// 	'hari' => $this->input->post('hari'),
			// 	'jam_mulai' => $this->input->post('jam_mulai'),
			// 	'jam_selesai' => $this->input->post('jam_selesai'),
			// 	'ruangan' => $this->input->post('ruangan'),
			// 	'semester' => $matakuliah[4],
			// 	'tahun_ajaran' => $this->session->tahun_ajaran
			// 	);

			// $this->m_baa->insertData('jadwal', $data);

			// $this->session->set_flashdata('success', true);

			// redirect($this->uri->uri_string());
			//print_r($this->input->post('kelas'));
			// echo $dsen[0];

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
						'tahun_ajaran' => $this->session->tahun_ajaran
	            );
	        };

	        $this->m_baa->insertAllData('jadwal', $data);

	        $this->session->set_flashdata('success', true);

			redirect($this->uri->uri_string());
		}
	}

	


}