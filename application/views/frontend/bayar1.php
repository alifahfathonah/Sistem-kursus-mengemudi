<div class="row">
	<div class="col-md-7">
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title">Harus Dibayarkan</h3>
			</div>
			<div class="box-body">
				<table class="table">
					<tr>
						<td>Kode Unik</td>
						<td>:</td>
						<td><?= $bayar->kode_unik ?></td>
					</tr>
					<tr>
						<td>Jumlah yang harus dibayarkan</td>
						<td>:</td>
						<td>Rp <?= $jumlah ?></td>
					</tr>
					<tr>
						<td>Nama Bank</td>
						<td>:</td>
						<td><?= $bayar->nm_bank ?></td>
					</tr>
					<tr>
						<td>Kode Bank</td>
						<td>:</td>
						<td><?= $bayar->kode_bank ?></td>
					</tr>
					<tr>
						<td>Nomor Rekening</td>
						<td>:</td>
						<td><?= $bayar->no_rek ?></td>
					</tr>
					<tr>
						<td>Atas Nama</td>
						<td>:</td>
						<td><?= $bayar->pemilik ?></td>
					</tr>
				</table>
				<span><strong>Jumlah pembayaran harus sesuai dengan yang tertera di atas!</strong></span>
			</div>
		</div>
	</div>

	<div class="col-md-3">
		<button type="button" class="btn btn-primary btn-lg btn-block margin-bottom" data-toggle="modal" data-target="#upload">Upload Bukti</button>
		<a href="<?= base_url('bayar/ulang/'.$bayar->id_peserta); ?>" onclick="return confirm('Anda yakin ingin mengubah pembayaran ini?');" class="btn btn-danger btn-lg btn-block margin-bottom">Ganti Pembayaran</a>
	</div>
</div>

<div class="modal fade" id="upload">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Upload Bukti</h4>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('bayar/upload')?>" method="post" enctype="multipart/form-data">
						<input type="hidden" name="id_rek" value="<?= $bayar->id_rekening ?>">
						<div class="form-group">
							<label for="no_rek">No Rekening</label>
							<input type="text" name="no_rek" required="" class="form-control" placeholder="Nomor Rekening" value="<?= set_value("no_rek")?>">
						</div>
						<div class="form-group">
							<label for="nama">Nama Rekening</label>
							<input type="text" name="nama" required="" class="form-control" placeholder="Nama Pemilik Rekening" value="<?= set_value("nama")?>">
						</div>
						<div class="form-group">
							<label for="nama">Nama Bank</label>
							<input type="text" name="nm_bank" required="" class="form-control" placeholder="Nama Bank Pemilik" value="<?= set_value("nm_bank")?>">
						</div>
						<div class="form-group <?php echo form_error('jumlah') ? 'has-error' : null ?>">
							<label for="jumlah">Jumlah Pembayaran</label>
							<input type="text" name="jumlah" required="" class="form-control" placeholder="<?= $bayar->nominal ?>" value="<?= set_value("jumlah")?>">
							<span class="help-block"><?php echo validation_errors(); ?></span>
						</div>
						<div class="form-group">
							<label for="foto">Foto</label>
							<input type="file" required="" name="foto">
						</div>
					</div>
					<div class="modal-footer">
						<button type="Reset" class="btn btn-default pull-left">Reset</button>
						<button type="Submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
</div>

