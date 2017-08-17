<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->tbl = 'login';
		$this->ta = 'tahun_ajaran';
	}

	function count_user ($user, $pass)
	{
		$this->db->where('username', $user);
		$this->db->where('password', $pass);
		$this->db->where('status', 1);
		
		$query = $this->db->get($this->tbl);

		// return $query->num_rows();
		return $query;
	}

	function ambil_user($user)
    {
        $query = $this->db->get_where($this->tbl, array('username' => $user));
        $query = $query->result_array();
        
        if($query){
            return $query[0];
        }
    }

    function last_login($user, $timestamp)
    {
    	// $this->db->set('last_login', $timestamp);

    	$this->db->where('username', $user);
    	$this->db->update($this->tbl, $timestamp);
    }

    function tahun_ajaran()
    {
    	$this->db->limit(1);
    	$this->db->order_by('tahun_ajaran', 'DESC');
    	$query = $this->db->get($this->ta);

    	return $query->result_array();
    }
}
