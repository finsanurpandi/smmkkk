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
			$this->load->view('mahasiswa/modal', $data);
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

	function profil()
	{
		// get data user
		$user_akun = $this->m_mahasiswa->getAllData('mahasiswa', array('npm' => $this->session->username))->result_array();

		// get data orangtua
		$orangtua = $this->m_mahasiswa->getAllData('mhs_ortu', array('npm' => $this->session->username))->result_array();
		
		// set user 'kelas'
		$this->session->set_userdata('kelas', $user_akun[0]['kelas']);

		//check pembayaran
		$this->check_pembayaran();

		// DATA
		$data['user'] = $user_akun[0];
		$data['ortu'] = @$orangtua[0];
		$data['krs'] = $this->krs;

		// funtion view
		$this->set_view('mahasiswa/profil', $data);
	}

	function editdata()
	{
		// get data user
		$user_akun = $this->m_mahasiswa->getAllData('mahasiswa', array('npm' => $this->session->username))->result_array();

		// get data orangtua
		$orangtua = $this->m_mahasiswa->getAllData('mhs_ortu', array('npm' => $this->session->username))->result_array();
		
		// set user 'kelas'
		$this->session->set_userdata('kelas', $user_akun[0]['kelas']);

		//check pembayaran
		$this->check_pembayaran();

		// DATA
		$data['user'] = $user_akun[0];
		$data['ortu'] = @$orangtua[0];
		$data['krs'] = $this->krs;
		$data['error'] = $this->upload->display_errors();

		// funtion view
		$this->set_view('mahasiswa/editdata', $data);

		$updateProfil = $this->input->post('updateProfil');

		if (isset($updateProfil)) {
			$data = array(
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'alamat' => $this->input->post('alamat'),
				'no_tlp' => $this->input->post('no_tlp'),
				'email' => $this->input->post('email'),
				'status_tempat_tinggal' => $this->input->post('stt_tempat_tinggal')
			);

			$img_path = $this->input->post('path');

			$this->configImage('profiles');


			if (!$this->upload->do_upload('gambar')) {
				$this->m_mahasiswa->updateData('mahasiswa', $data, array('npm' => $this->session->username));

				$this->session->set_flashdata('profilsuccess', true);

				redirect($this->uri->uri_string()."?tab=profile");
			} else {

				$fileinfo = $this->upload->data();

				$data['image'] = $fileinfo['file_name'];
				$this->m_mahasiswa->updateData('mahasiswa', $data, array('npm' => $this->session->username));

				@unlink("./assets/uploads/profiles/". $img_path);

				$this->session->set_flashdata('profilsuccess', true);

				redirect($this->uri->uri_string()."?tab=profile", 'refresh');
			}

			

			//redirect($this->uri->uri_string()."?tab=profile");
		}

		$updateOrtu = $this->input->post('updateOrtu');

		if (isset($updateOrtu)) {
			$data = array(
				'nama_ayah' => $this->input->post('nama_ayah'),
				'nama_ibu' => $this->input->post('nama_ibu'),
				'alamat' => $this->input->post('alamat'),
				'no_tlp' => $this->input->post('no_tlp')
			);

			$this->m_mahasiswa->updateData('mhs_ortu', $data, array('npm' => $this->session->username));

			$this->session->set_flashdata('ortusuccess', true);

			redirect($this->uri->uri_string()."?tab=orangtua");
		}
	}

	function krs()
	{
		// get data user
		$user_akun = $this->m_mahasiswa->getAllData('mahasiswa', array('npm' => $this->session->username))->result_array();
		
		// set user 'kelas'
		$this->session->set_userdata('kelas', $user_akun[0]['kelas']);

		//check pembayaran
		$this->check_pembayaran();

		// get data matakuliah
		$mk = $this->m_mahasiswa->getAllData('matakuliah')->result_array();

		// get perwalian
		$perwalian = $this->m_mahasiswa->getAllData('stt_perwalian', array('npm' => $this->session->username, 'tahun_ajaran' => $this->session->tahun_ajaran))->num_rows();
		
		// get dosen wali
		$dosen_wali = $this->m_mahasiswa->getAllData('dosen', array('nidn' => $user_akun[0]['nidn']))->result_array();

		// DATA
		$data['user'] = $user_akun[0];
		$data['krs'] = $this->krs;
		$data['mk'] = $mk;
		@$data['dosen_wali'] = $dosen_wali[0];

		// funtion view
		if ($perwalian !== 1) {
			$this->set_view('mahasiswa/krs', $data);	
		} else {
			$url = base_url().'mahasiswa/perwalian';
			redirect($url,'refresh');
		}
		
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
	            	'npm' => $this->session->username,
	            	'id_matkul' => $id_matkul[$i],
	                'kode_matkul' => $kode_matkul[$i],
	                'kelas' => $user_akun[0]['kelas'],
	                'tahun_ajaran' => $this->session->tahun_ajaran
	            );
	        };

	        $data2 = array(
	        	'npm' => $this->session->username,
	        	'nidn' => $user_akun[0]['nidn'],
	        	'tahun_ajaran' => $this->session->tahun_ajaran,
	        	'tgl_perwalian' => $tglperwalian
	        	);

	        $this->m_mahasiswa->insertMultiple('krs', $data, 'stt_perwalian', $data2);

	        redirect($this->uri->uri_string());
			
		}

		// PROSES PROGRAM KEKHUSUSAN
		$pk = $this->input->post('pilihPk');
		if (isset($pk)) {
			$data = array(
				'program_kekhususan' => $this->input->post('programkekhususan')
			);

			$this->m_mahasiswa->updateData('mahasiswa', $data, array('npm' => $this->session->username));

			//$this->session->set_flashdata('ortusuccess', true);

			redirect($this->uri->uri_string());
		}

	}

	function perwalian()
	{
		// get data user
		$user_akun = $this->m_mahasiswa->getAllData('mahasiswa', array('npm' => $this->session->username))->result_array();
		
		// set user 'kelas'
		$this->session->set_userdata('kelas', $user_akun[0]['kelas']);

		//check pembayaran
		$this->check_pembayaran();

		// get perwalian
		$perwalian = $this->m_mahasiswa->getAllData('stt_perwalian', array('npm' => $this->session->username, 'tahun_ajaran' => $this->session->tahun_ajaran))->num_rows();
		$sttperwalian = $this->m_mahasiswa->getAllData('stt_perwalian', array('npm' => $this->session->username, 'tahun_ajaran' => $this->session->tahun_ajaran))->result_array();

		// get dosen wali
		$dosen_wali = $this->m_mahasiswa->getAllData('dosen', array('nidn' => $user_akun[0]['nidn']))->result_array();

		// get data KRS
		$data_krs = $this->m_mahasiswa->getAllData('v_mhs_perwalian', array('npm' => $user_akun[0]['npm']))->result_array();

		// get Chat
		$chat = $this->m_mahasiswa->getAllData('chat', array('room' => $user_akun[0]['npm'], 'tahun_ajaran' => $this->session->tahun_ajaran))->result_array();

		// DATA
		$data['user'] = $user_akun[0];
		$data['krs'] = $this->krs;
		$data['perwalian'] = $this->input->post();
		$data['sttperwalian'] = $sttperwalian;
		$data['kode_matkul'] = $this->input->post('kode_matkul');
		$data['totalSks'] = $this->input->post('totalSks');
		$data['matakuliah'] = $this->m_mahasiswa->getAllData('matakuliah')->result_array();
		$data['dosen_wali'] = $dosen_wali[0];
		$data['data_krs'] = $data_krs;
		$data['chat'] = $chat;

		// funtion view
		if ($perwalian !== 1) {
			$url = base_url().'mahasiswa/krs';
			redirect($url,'refresh');
		} else {
			$this->set_view('mahasiswa/perwalian', $data);	
		}

		// sent chat
		$sendChat = $this->input->post('kirimChat');

		if (isset($sendChat)) {
			$data = array('from' => $user_akun[0]['npm'],
							'room' => $user_akun[0]['npm'],
							'pesan' => $this->input->post('message'),
							'tahun_ajaran' => $this->session->tahun_ajaran);

			$this->m_mahasiswa->insertData('chat', $data);
			redirect($this->uri->uri_string());
		}
	}

	function administrasi()
	{
		// get data user
		$user_akun = $this->m_mahasiswa->getAllData('mahasiswa', array('npm' => $this->session->username))->result_array();
		
		// set user 'kelas'
		$this->session->set_userdata('kelas', $user_akun[0]['kelas']);

		//check pembayaran
		$this->check_pembayaran();

		// get data pembayaran
		$allTa = $this->m_mahasiswa->getAllData('tahun_ajaran')->result_array();
		$ta = $this->input->post('tahunajaran');
		$tahunajaran = null;


		if (!isset($ta)) {
			$pembayaran = $this->m_mahasiswa->getAllData('v_mhs_pembayaran', array('npm' => $this->session->username, 'tahun_ajaran' => $this->session->tahun_ajaran));
			$tahunajaran = $this->session->tahunajaran;
		} else {
			$pembayaran = $this->m_mahasiswa->getAllData('v_mhs_pembayaran', array('npm' => $this->session->username, 'tahun_ajaran' => $ta));
			$tahunajaran = $ta;
		}
		

		// DATA
		$data['user'] = $user_akun[0];
		$data['krs'] = $this->krs;
		$data['pembayaran'] = $pembayaran->result_array();
		$data['tahunajaran'] = $tahunajaran;
		$data['allTa'] = $allTa;

		// funtion view
		$this->set_view('mahasiswa/administrasi', $data);
	}

}