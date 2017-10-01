<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_baa');
        $this->load->model('m_mahasiswa');
    }

    public function index()
    {
        $this->output->set_output("This is an AJAX endpoint!");
    }

    public function usernameAvailability()
    {
        $username = $this->input->post('username');
        $row = $this->m_baa->getAllData('mahasiswa', array('npm' => $username))->num_rows();

        $npm = $this->m_baa->getAllData('mahasiswa', array('npm' => $username))->result_array();
        
        echo $row.','.$npm[0]['npm'];   
    }

    public function checkRegistration()
    {
        $npm = $this->input->post('npm');

        $row = $this->m_baa->getAllData('mhs_pembayaran', array('npm' => $npm, 'tahun_ajaran' => $this->session->tahun_ajaran, 'status' => 1, 'keterangan' => 0))->num_rows();

        $nama = $this->m_baa->getAllData('mahasiswa', array('npm' => $npm))->result_array();

        echo $row.','.$nama[0]['nama'];
    }

    public function checkNpm()
    {
        $username = $this->input->post('npm');

        $row = $this->m_baa->getAllData('mahasiswa', array('npm' => $username))->num_rows();

        $nama = $this->m_baa->getAllData('mahasiswa', array('npm' => $username))->result_array();

        echo $row.','.$nama[0]['nama'];
        
        echo $row;   
    }

    public function checkNidn()
    {
        $username = $this->input->post('nidn');

        $row = $this->m_baa->getAllData('dosen', array('nidn' => $username))->num_rows();

        $nama = $this->m_baa->getAllData('dosen', array('nidn' => $username))->result_array();

        echo $row.','.$nama[0]['nama'];
        
        echo $row;   
    }

    public function getChat()
    {
        $username = $this->input->post('npm');

        $row = $this->m_mahasiswa->getAllData('chat', array('room'=>$username))->result_array();

        // $row = $this->m_baa->getAllData('mahasiswa', array('npm' => $username))->result_array();

        echo json_encode($row);

    }

    public function postChat()
    {
        $message = $this->input->post('data');
        $user = $this->session->username;

        $data = array(
            'from' => $user,
            'room' => $user,
            'pesan' => $message,
            'tahun_ajaran' => $this->session->tahun_ajaran
        );

        $this->m_mahasiswa->insertData('chat', $data);

    }

    // function checkGolongan()
    // {
    //     $jabfung = $this->input->post('jabfung');
    //     $golongan = $this->m_operator->getDataWhere('golongan', array('jabatan_fungsional' => $jabfung));

    //     echo json_encode($golongan);
    // }

    // function loadMatkul($ta)
    // {

    //     $matkul = $this->m_operator->getDataWhere('matakuliah', array('kode_prodi' => strtolower($this->session->kode_prodi), 'periode' => $ta));

    //     echo json_encode($matkul);
    // }

    // function loadNidn()
    // {
    //     $kdprodi = strtolower($this->session->kode_prodi);
    //     $dosen = $dosen = $this->m_operator->getLeftJoinDosen('dosen_'.$kdprodi);    

    //     echo json_encode($dosen);
    // }

    // function getDataMatkul()
    // {
    //     $matkul = $this->m_operator->getDataWhere('matakuliah', array('kode_matkul' => $this->input->post('kodeMatkul')));

    //     echo json_encode($matkul);
    // }

    // function loadNim()
    // {
    //     $mhs = $this->m_operator->getAllData('mhs', array('nim' => $this->input->post('nim')))->result_array();

    //     echo json_encode($mhs);
    // }

    // function loadNimAngkatan()
    // {
    //     $mhs = $this->m_operator->getAllData('mhs', array('kode_prodi' => $this->session->kode_prodi, 'angkatan' => $this->input->post('angkatan')))->result_array();

    //     echo json_encode($mhs);
    // }
}