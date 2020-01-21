<?php echo validation_errors(); ?>
<div class="box box-default">
	<div class="box-header with-border">
		<h3 class="box-title">Edit Instruktur</h3>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-5">
				<form action="<?= base_url('instruktur/update')?>" method="post" enctype="multipart/form-data">
					<?php foreach ($instruktur as $i) { ?>
						<input type="hidden" name="id_instruktur" value="<?= $i->id_instruktur ?>">
					<div class="form-group">
						<input type="hidden" name="foto_lama" value="<?= $i->foto ?>">
						<label for="nama">Nama</label>
						<input type="text" name="nama" required="" class="form-control" id="nama" placeholder="Nama" value="<?= $i->nm_instruktur ?>">
					</div>
					<div class="form-group">
						<label for="nama">Tempat Lahir</label>
						<input type="text" name="tmpt_lahir" required="" class="form-control" id="nama" placeholder="Tempat Lahir" value="<?= $i->tmpt_lahir ?>">
					</div>
					<div class="form-group">
						<label for="tgl">Tanggal Lahir</label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input name="tgl_lahir" placeholder="Tanggal Lahir" type="text" required="" value="<?= $i->tgl_lahir ?>" class="form-control" id="datepicker" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
						</div>
					</div>
					<div class="form-group <?php echo form_error('no_telp') ? 'has-error' : null ?>">
						<label for="no_telp">Nomor Telepon</label>
						<input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="Nomor Telepon" required="" value="<?= $i->no_telp ?>">
					</div>
					<div class="form-group">
						<label for="foto">Foto</label>
						<input type="file" name="foto" id="foto" value="<?= $i->foto ?>">
					</div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<label for="nama">Jenis Kelamin</label><br>
						<select name="jns_kel" class="form-control" >
							<option <?= ($i->jns_kel == "Laki-Laki") ? "selected": "" ?>>Laki-Laki</option>
							<option <?= ($i->jns_kel == "Perempuan") ? "selected": "" ?>>Perempuan</option>
						</select>
					</div>
					<div class="form-group <?php echo form_error('email') ? 'has-error' : null ?>">
						<label for="email">Email</label>
						<input type="email" class="form-control" name="email" id="email" placeholder="Email" required="" value="<?= $i->email ?>">
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<textarea class="form-control" name="alamat" name="alamat" required="" placeholder="Alamat"><?= $i->alamat ?></textarea>
					</div>
				</div>
			</div>
			<button type="Submit" class="btn btn-primary" value="simpan" name="submitform">Simpan</button>
			<button type="Submit" class="btn btn-warning" value="reset" name="submitform" onclick="return confirm('Anda yakin akan mereset password?')">Reset Password</button>
			<a href="<?= base_url('/instruktur')?>" type="Reset" class="btn btn-default">Batal</a>
		</form>
	<?php }?>
	</div>
</div>