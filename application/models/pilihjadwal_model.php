<?php


class pilihjadwal_model extends CI_Model
{
	function getinstruktur()
	{
		return $this->db->get('instruktur');
	}

	function getjadwal($id,$jam)
	{
		$query = $this->db->query("SELECT * FROM jadwal where id_instruktur = '$id' AND jam = '$jam' AND STATUS = 'Aktif' ORDER BY tgl_mulai  DESC LIMIT 1");
		return $query->row();
	}
	
	function getdatainstruktur($id)
	{
		$query = $this->db->query("SELECT * FROM instruktur where id_instruktur = '$id'");
		return $query->row();
	}

	function getjadwalpeserta($id_peserta)
	{
		$query = $this->db->query("SELECT * FROM jadwal WHERE id_peserta = '$id_peserta'");
		return $query->row();
	}

	function getdata($id_peserta)
	{
		$query = $this->db->query("SELECT * FROM siswa WHERE id_peserta = '$id_peserta'");
		return $query->row();
	}
}