<div class="box box-default">
	<div class="box-header with-border">
		<h3 class="box-title">Edit admin</h3>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-5">
				<form action="<?= base_url('dashboard/update')?>" method="post" enctype="multipart/form-data">
					<?php foreach ($profil as $p) { ?>
						<input type="hidden" name="id_admin" value="<?= $p->id_admin ?>">
					<div class="form-group">
						<input type="hidden" name="foto_lama" value="<?= $p->foto ?>">
						<label for="nama">Nama</label>
						<input type="text" name="nama" required="" class="form-control" id="nama" placeholder="Nama" value="<?= $p->nama_admin ?>">
					</div>
					<div class="form-group">
						<label for="tgl">Tanggal Lahir</label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input name="tgl_lahir" placeholder="Tanggal Lahir" type="text" required="" value="<?= $p->tgl_lahir ?>" class="form-control" id="datepicker" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
						</div>
					</div>
					<div class="form-group ">
						<label for="no_telp">Tempat Lahir</label>
						<input type="text" class="form-control" name="tmpt_lahir" id="no_telp" placeholder="Tempat Lahir" required="" value="<?= $p->tmpt_lahir ?>">
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<textarea class="form-control" name="alamat" name="alamat" required="" placeholder="Alamat"><?= $p->alamat ?></textarea>
					</div>
					<div class="form-group">
						<label for="foto">Foto</label>
						<input type="file" name="foto" id="foto" value="">
					</div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<label for="nama">Jenis Kelamin</label><br>
						<select name="jns_kel" class="form-control" >
							<option <?= ($p->jns_kel == "Laki-Laki") ? "selected": "" ?>>Laki-Laki</option>
							<option <?= ($p->jns_kel == "Perempuan") ? "selected": "" ?>>Perempuan</option>
						</select>
					</div>
					<div class="form-group">
						<label for="email">Username</label>
						<input type="text" class="form-control" name="email" id="email" placeholder="Username" required="" readonly="" value="<?= $p->username ?>">
					</div>
					<div class="form-group <?php echo form_error('passconf') ? 'has-error' : null ?>">
						<label for="Password">Password Baru</label>
						<input type="Password" class="form-control" name="password" placeholder="Password Baru" value="">
					</div>
					<div class="form-group <?php echo form_error('passconf') ? 'has-error' : null ?>">
						<label for="password">Tulis Ulang Password</label>
						<input type="password" class="form-control" name="passconf" placeholder="Tulis Ulang Password" value="">
						<span class="help-block"><?php echo form_error('passconf') ? 'Password tidak sama' : null ?></span>
					</div>
				</div>
			</div>
			<button type="Submit" class="btn btn-primary">Simpan</button>
			<a href="<?= base_url('dashboard')?>" type="Reset" class="btn btn-default">Batal</a>
		</form>
	<?php }?>
	</div>
</div>