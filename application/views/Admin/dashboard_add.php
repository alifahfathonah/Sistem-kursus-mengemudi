<div class="box box-default">
	<div class="box-header with-border">
		<h3 class="box-title">Tambah admin</h3>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-5">
				<form action="<?= base_url('dashboard/addnew')?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" name="nama" required="" class="form-control" id="nama" placeholder="Nama" value="<?= set_value('nama') ?>">
					</div>
					<div class="form-group">
						<label for="tgl">Tanggal Lahir</label>
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input name="tgl_lahir" placeholder="Tanggal Lahir" type="text" value="<?= set_value('tgl_lahir') ?>" required="" id="datepicker" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
						</div>
					</div>
					<div class="form-group">
						<label for="no_telp">Tempat Lahir</label>
						<input type="text" class="form-control" name="tmpt_lahir" id="no_telp" placeholder="Tempat Lahir" required="" value="<?= set_value('tmpt_lahir') ?>">
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<textarea class="form-control" name="alamat" name="alamat" required="" placeholder="Alamat"><?= set_value('alamat') ?></textarea>
					</div>
					<div class="form-group">
						<label for="foto">Foto</label>
						<input type="file" name="foto" id="foto" required="">
					</div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<label for="nama">Jenis Kelamin</label><br>
						<select name="jns_kel" class="form-control" >
							<option value="Laki-Laki">Laki-Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
					<div class="form-group <?php echo form_error('username') ? 'has-error' : null ?>">
						<label for="email">Username</label>
						<input type="text" class="form-control" name="username" placeholder="Username" value="" required="" >
						<span class="help-block"><?php echo form_error('username') ? 'Username sudah digunakan' : null ?></span>
					</div>
					<div class="form-group">
						<label for="Password">Password</label>
						<input type="Password" required="" class="form-control" name="password" placeholder="Password">
					</div>
					<div class="form-group <?php echo form_error('passconf') ? 'has-error' : null ?>">
						<label for="Password">Tulis Ulang Password</label>
						<input type="Password" required="" class="form-control" name="passconf" placeholder="Tulis Ulang Password">
						<span class="help-block"><?php echo form_error('username') ? 'Password tidak sama' : null ?></span>
					</div>
					<div class="form-group">
						<label>Level</label>
						<div class="radio">
							<label for="level">
								<input type="radio" name="level" value="0" checked="">0
							</label>
							<label for="level">
								<input type="radio" name="level" value="1">1
							</label>
						</div>
					</div>
				</div>
			</div>
			<button type="Submit" class="btn btn-primary">Simpan</button>
			<a href="<?= base_url('dashboard')?>" type="Reset" class="btn btn-default">Batal</a>
		</form>
	</div>
</div>