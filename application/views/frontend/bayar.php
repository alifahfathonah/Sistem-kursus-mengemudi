<div class="row">
	<div class="col-md-4">
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title">Pilih Pembayaran</h3>
			</div>
			<div class="box-body">
				<form method="post" action="<?= base_url('proses/simpan')?>">
					<div class="form-group">
						<label for="nama">Nama Bank</label>
						<select name="rekening1" required="" class="form-control">
							<option value="" disabled="" selected="">Pilih Rekening</option>
							<?php foreach ($rekening as $r) { 
								echo "<option value='$r->id_rekening'>$r->nm_bank</option>";
							} ?>
						</select>
					</div>
					<div class="form-group">
						<label for="kode_unik">Kode Unik</label>
						<input type="text" class="form-control" name="kode_unik" value="<?= $kode?>" readonly="">
					</div>
					<div class="form-group">
						<label for="Nominal">Nominal</label>
						<input type="text" class="form-control" name="nominal" value="<?= $total ?>" readonly="">
					</div>
					<button type="submit" class="btn btn-primary">Bayar</button>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="box box-warning">
			<div class="box-header with-border">
				<h3 class="box-title">Ketentuan Pembayaran</h3>
			</div>
			<div class="box-body">
				<p><strong>Ketentuan Pembayaran di Lembaga Mengemudi Mitra Utama Pontianak</strong></p>
				<li>Uang Kursus sebesar Rp 1.300.000,-.</li>
				<li>Uang kursus harus dibayar sebesar 50% dari biaya kursus.</li>
				<li>Jika peserta tidak hadir 3x berturut-turut, maka dinyatakan selesai dan uang muka tidak akan di kembalikan.</li>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="warning">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Pemberitahuan</h4>
				</div>
				<div class="modal-body">
					<p>Bukti yang anda upload tidak valid, silahkan bayar dan upload bukti ulang. 3x mengupload bukti tidak valid, maka akun anda akan nonaktif permanen.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
</div>