<?php

class home_model extends CI_Model
{
	function getinstruktur()
	{
		$query = $this->db->query('SELECT * FROM instruktur ORDER BY RAND() LIMIT 3');
		return $query;
	}

	function gettestimoni()
	{
		$query = $this->db->query('SELECT * FROM siswa WHERE STATUS = "Selesai" AND testimoni IS NOT NULL ORDER BY RAND() LIMIT 3');
		return $query;
	}
}