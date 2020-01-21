<?php

class proses_model extends CI_Model
{

	function getrek()
	{
		$query = $this->db->query('SELECT * FROM rekening');
		return $query->result();
	}

	function cekdata($id)
	{
		$query = $this->db->query("SELECT COUNT(id) AS jumlah FROM bayar WHERE id_peserta = '$id'");
		return $query->row();
	}

	function cekstatus($id)
	{
		$query = $this->db->query("SELECT * FROM pembayaran WHERE id_peserta = '$id'");
		return $query->row();
	}
}