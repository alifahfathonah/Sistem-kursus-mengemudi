<?php


class dashboard2_model extends CI_Model
{

	function getjadwal($id)
	{
		$query = $this->db->query("SELECT
			`siswa`.nm_peserta
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

	function getnilai($id_instruktur)
	{
		$query = $this->db->query("SELECT
			`siswa`.*
			, `jadwal`.*
			,`siswa`.`status` AS status_siswa
			FROM
			`jadwal`
			INNER JOIN `siswa` 
			ON (`jadwal`.`id_peserta` = `siswa`.`id_peserta`)
			WHERE id_instruktur = '$id_instruktur' AND siswa.`status` = 'Penilaian'
			ORDER BY tgl_selesai ASC");
		return $query->result();
	}

	function siswaaktif($id_instruktur)
	{
		$query = $this->db->query("SELECT
			COUNT(*) AS jumlah
			FROM
			`jadwal`
			INNER JOIN `siswa` 
			ON (`jadwal`.`id_peserta` = `siswa`.`id_peserta`)
			WHERE id_instruktur = '$id_instruktur' AND siswa.`status` = 'Aktif'");
		return $query->row();
	}

	function siswaselesai($id_instruktur)
	{
		$query = $this->db->query("SELECT
			COUNT(*) AS jumlah
			FROM
			`jadwal`
			INNER JOIN `siswa` 
			ON (`jadwal`.`id_peserta` = `siswa`.`id_peserta`)
			WHERE id_instruktur = '$id_instruktur' AND siswa.`status` = 'Selesai' OR siswa.`status` = 'Penilaian'");
		return $query->row();
	}

	function siswagagal($id_instruktur)
	{
		$query = $this->db->query("SELECT
			COUNT(*) AS jumlah
			FROM
			`jadwal`
			INNER JOIN `siswa` 
			ON (`jadwal`.`id_peserta` = `siswa`.`id_peserta`)
			WHERE id_instruktur = '$id_instruktur' AND siswa.`status` = 'Gagal'");
		return $query->row();
	}

	function getprofile($id_instruktur)
	{
		$query = $this->db->query("SELECT * FROM instruktur WHERE id_instruktur='$id_instruktur'");
		return $query->row();
	}
}