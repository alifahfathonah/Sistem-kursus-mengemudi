<?php


class jadwal_model extends CI_Model
{

	function getdata($id)
	{
		$query = $this->db->query("SELECT
			`siswa`.*
			, `jadwal`.*
			, DATEDIFF(CURRENT_DATE,jadwal.`tgl_selesai`) AS sisa
			FROM
			`jadwal`
			INNER JOIN `siswa` 
			ON (`jadwal`.`id_peserta` = `siswa`.`id_peserta`)
			WHERE id_instruktur = '$id' AND jadwal.`status` = 'Aktif'
			ORDER BY jam ASC");
		return $query->result();
	}

	function getabsen($id)
	{
		$query = $this->db->query("SELECT
			`absensi`.*
			, `jadwal`.`id_peserta`
			FROM
			`jadwal`
			INNER JOIN `absensi` 
			ON (`jadwal`.`id_jadwal` = `absensi`.`id_jadwal`)
			WHERE jadwal.id_jadwal = '$id' ORDER BY pertemuan ASC");
		return $query->result();
	}

	function cekpertemuan($id)
	{
		$query = $this->db->query("SELECT COUNT(*) AS jumlah FROM absensi WHERE id_jadwal = '$id'");
		return $query->row();
	}

	function getpeserta($id_jadwal)
	{
		$query = $this->db->query("SELECT * FROM jadwal WHERE id_jadwal = '$id_jadwal'");
		return $query->row();
	}

	function cekstatus($id_jadwal)
	{
		$query = $this->db->query("SELECT status,id_instruktur FROM jadwal WHERE id_jadwal = '$id_jadwal'");
		return $query->row();
	}
}
