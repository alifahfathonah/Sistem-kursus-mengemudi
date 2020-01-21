<?php

class login_model extends CI_Model
{
	function auth_admin($username,$password)
	{
		$query = $this->db->query("SELECT * FROM admin WHERE username='$username' AND PASSWORD='$password'");
		return $query;
	}

	function auth_instruktur($username,$password)
	{
		$query = $this->db->query("SELECT * FROM instruktur WHERE email='$username' AND PASSWORD='$password'");
		return $query; 
	}
}