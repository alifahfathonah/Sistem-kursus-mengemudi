<?php


class bayar_model extends CI_Model
{

	function getdata($id)
	{
		$query = $this->db->query("SELECT
			`rekening`.*
			, `bayar`.*
			FROM
			`bayar`
			INNER JOIN `rekening` 
			ON (`bayar`.`id_rekening` = `rekening`.`id_rekening`)

			WHERE id_peserta = '$id'");
		return $query->row();
	}

	function cekdata($id)
	{
		$query = $this->db->query("SELECT COUNT(id) AS jumlah FROM bayar WHERE id_peserta = '$id'");
		return $query->row();
	}

	/*function cekdata1($id)
	{
		$query = $this->db->query("SELECT COUNT(id_pembayaran) AS jumlah FROM pembayaran WHERE id_peserta = '$id'");
		return $query->row();
	}*/

	function cekdata1($id)
	{
		$query = $this->db->query("SELECT * FROM pembayaran WHERE id_peserta = '$id' AND status = 'Proses'");
		return $query;
	}

	function hapusdata($id)
	{
		$this->db->where('id_peserta', $id);
		$this->db->delete('bayar');
		return TRUE;
	}

	function cekstatus($id)
	{
		$query = $this->db->query("SELECT * FROM siswa WHERE id_peserta = '$id'");
		return $query->row();
	}
}
