<style type="text/css">
	.kotak img {
		-webkit-transition: 0.4s ease;
		transition: 0.4s ease;
	}

	.zoom-effect:hover .kotak img {
		-webkit-transform: scale(1.75);
		transform: scale(1.75);
	}
</style>
<div class="box box-default">
	<div class="box-header with-border">
		<h3 class="box-title">Lihat Detail Pembayaran</h3>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-5">
				<?php foreach ($pembayaran as $p) { ?>
				<form action="<?= base_url('/pembayaran/proses')?>" method="post">
				<input type="hidden" name="id_peserta" value="<?= $p->id_peserta ?>">
				<input type="hidden" name="id_pembayaran" value="<?= $p->id_pembayaran ?>">
				<div class="form-group">
					<label for="nama">Nama Peserta</label>
					<input type="text" name="nama" required="" class="form-control" id="nama" placeholder="Nama Peserta" value="<?= $p->nm_peserta ?>" readonly="">
				</div>
				<div class="form-group">
					<label for="kode">No Rekening</label>
					<input type="text" class="form-control" name="kode" id="kode" placeholder="No Rekening" required="" value="<?= $p->no_rekening ?>" readonly="">
				</div>
				<div class="form-group">
					<label for="kode">Nama Rekening</label>
					<input type="text" class="form-control" name="kode" id="kode" placeholder="No Rekening" required="" value="<?= $p->nama ?>" readonly="">
				</div>
				<div class="form-group">
					<label for="Pemilik">Jumlah Pembayaran</label>
					<input type="text" class="form-control" name="pemilik" id="pekerjaan" placeholder="Jumlah Pembayaran" required="" value="<?= $p->jmlh_pembayaran ?>" readonly="">
				</div>
				<div class="form-group">
					<label for="no_rek">Tanggal Upload</label>
					<input type="text" class="form-control" name="no_rek" id="no_rek" placeholder="Tanggal Upload" required="" value="<?= $p->tgl_upload ?>" readonly="">
				</div>
				<div class="form-group">
					<label for="no_rek">Pada Bank</label>
					<input type="text" class="form-control" name="no_rek" id="no_rek" placeholder="Pada Bank" required="" value="<?= $p->nm_bank?>" readonly="">
				</div>
				<div class="form-group">
					<label for="no_rek">Status</label>
					<input type="text" class="form-control" name="no_rek" id="no_rek" placeholder="Status" required="" value="<?= $p->status?>" readonly="">
				</div>
			</div>
			<div class="col-md-5">
				<label>Bukti Pembayaran</label><br>
				<div class="zoom-effect">
					<div class="kotak">
				<div class="thumbnail"><img src="<?= base_url('assets/img/bukti/').$p->bukti_pembayaran ?>"height="450px" width="450px" class='img-square'></div></div></div>
			</div>
		</div>
		<button type="Submit" class="btn btn-primary" onclick="return confirm('Anda yakin data ini sudah valid?')" value="terima" name="submitform" <?= ($p->status == 'Ditolak' || $p->status == 'Diterima') ? 'disabled' : null ?>>Diterima</button>
		<button type="Submit" class="btn btn-danger" onclick="return confirm('Anda yakin data ini tidak valid?')" value="tolak" name="submitform" <?= ($p->status == 'Ditolak' || $p->status == 'Diterima') ? 'disabled' : null ?>>Ditolak</button>
		<a href="<?= base_url('/pembayaran')?>" type="Reset" class="btn btn-default">Batal</a>
	<?php } ?>
	</div>
</form>
</div>
