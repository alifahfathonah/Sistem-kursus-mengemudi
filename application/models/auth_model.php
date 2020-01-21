<?php


class auth_model extends CI_Model
{

	function cek($username,$password)
	{
		$query = $this->db->query("SELECT * FROM siswa WHERE username='$username' AND PASSWORD='$password'");
		return $query;
	}
}