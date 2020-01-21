<?php echo validation_errors(); ?>
<div class="box box-default">
	<div class="box-header with-border">
		<h3 class="box-title">Edit siswa</h3>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-5">
				<?php foreach ($siswa as $s) { ?>
					<form action="<?= base_url('siswa/update')?>" method="post">
						<input type="hidden" name="id_peserta" value="<?= $s->id_peserta?>">
						<div class="form-group">
							<label for="nama">Nama</label>
							<input type="text" name="nama" required="" class="form-control" id="nama" placeholder="Nama" value="<?= $s->nm_peserta ?>">
						</div>
						<div class="form-group">
							<label for="jns_kel">Jenis Kelamin</label><br>
							<select name="jns_kel" class="form-control" >
								<option <?= ($s->jns_kel == "Laki-Laki") ? "selected": "" ?>>Laki-Laki</option>
								<option <?= ($s->jns_kel == "Perempuan") ? "selected": "" ?>>Perempuan</option>
							</select>
						</div>
						<div class="form-group">
							<label for="tmpt_lahir">Tempat Lahir</label>
							<input type="text" class="form-control" name="tmpt_lahir" id="tmpt_lahir" placeholder="Tempat Lahir" required="" value="<?= $s->tmpt_lahir ?>">
						</div>
						<div class="form-group">
							<label for="tgl_lahir">Tanggal Lahir</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input name="tgl_lahir" placeholder="Tanggal Lahir" type="text" required="" value="<?= $s->tgl_lahir ?>" class="form-control" id="datepicker" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
							</div>
						</div>
						<div class="form-group">
							<label for="Pekerjaan">Pekerjaan</label>
							<input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" required="" value="<?= $s->pekerjaan ?>">
						</div>
					</div>
					<div class="col-md-5">
						<div class="form-group">
							<label for="no_telp">Nomor Telepon</label>
							<input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="Nomor Telepon" required="" value="<?= $s->no_telp ?>">
						</div>
						<div class="form-group">
							<label for="username">Username</label>
							<input type="username" class="form-control" name="username" id="username" placeholder="Username" required="" value="<?= $s->username ?>" readonly>
						</div>
						<div class="form-group">
							<label for="status">Status</label><br>
							<select name="status" class="form-control">
								<option <?= ($s->status == "Tidak Aktif") ? "selected": "" ?>>Tidak Aktif</option>
								<option <?= ($s->status == "Aktif") ? "selected": "" ?>>Aktif</option>
								<option <?= ($s->status == "Ditolak") ? "selected": "" ?>>Ditolak</option>
								<option <?= ($s->status == "Selesai") ? "selected": "" ?>>Selesai</option>
								<option <?= ($s->status == "Proses") ? "selected": "" ?>>Proses</option>
							</select>
						</div>
						<div class="form-group">
							<label for="alamat">Alamat</label>
							<textarea class="form-control" name="alamat" required="" placeholder="Alamat"><?= $s->alamat ?></textarea>
						</div>
					</div>
				</div>
				<button type="Submit" class="btn btn-primary" value="simpan" name="submitform">Simpan</button>
				<button type="Submit" class="btn btn-warning" value="reset" name="submitform" onclick="return confirm('Anda yakin akan mereset password?')">Reset Password</button>
				<a href="<?= base_url('/siswa')?>" type="Reset" class="btn btn-default">Batal</a>
			</form>
		<?php }?>
	</div>
</div>