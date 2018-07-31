<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model{
	function cek($username, $password){
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get('tbl_hak_akses');
	}
}