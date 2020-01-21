<?= $this->session->flashdata('message');  ?>

<div class="row">
	<?php echo validation_errors(); ?>
	<div class="col-md-3">
		<button type="button" class="btn btn-success btn-block margin-bottom" data-toggle="modal" data-target="#tambah">Tambah Data</button>
	</div>
</div>
<div class="box">
	<div class="box-header">
		<h3 class="box-title">Data Instruktur</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th class="hidden-xs">Jenis Kelamin</th>
					<th class="hidden-xs">Tempat Lahir</th>
					<th class="hidden-xs">Tanggal Lahir</th>
					<th class="hidden-xs">Alamat</th>
					<th class="hidden-xs">Nomor Telepon</th>
					<th class="hidden-xs">Email</th>
					<th>Foto</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($instruktur as $i) {
					?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $i->nm_instruktur ?></td>
						<td class="hidden-xs"><?= $i->jns_kel ?></td>
						<td class="hidden-xs"><?= $i->tmpt_lahir ?></td>
						<td class="hidden-xs"><?= $i->tgl_lahir ?></td>
						<td class="hidden-xs"><?= $i->alamat ?></td>
						<td class="hidden-xs"><?= $i->no_telp ?></td>
						<td class="hidden-xs"><?= $i->email ?></td>
						<td><img src="<?= base_url('assets/img/').$i->foto ?>"height="55px" width="55px" class='img-square'></td>
						<td><div class="btn-group-vertical">
							<a class="btn btn-info" href="<?= base_url('instruktur/edit/'.$i->id_instruktur); ?>"><i class="fa fa-edit"> Edit</i></a>
							<a class="btn btn-danger" href="<?= base_url('instruktur/hapus/'.$i->id_instruktur); ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?');"><i class="fa fa-trash"> Hapus</i></a>
						</div>
					</ul>
				</div>
			</td>
		</tr>
		<?php
	}
	?>
</tbody>
<tfoot>
	<tr>
		<th>No</th>
		<th>Nama</th>
		<th class="hidden-xs">Jenis Kelamin</th>
		<th class="hidden-xs">Tempat Lahir</th>
		<th class="hidden-xs">Tanggal Lahir</th>
		<th class="hidden-xs">Alamat</th>
		<th class="hidden-xs">Nomor Telepon</th>
		<th class="hidden-xs">Email</th>
		<th>Foto</th>
		<th>Action</th>
	</tr>
</tfoot>
</table>
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->

<!-- /.col -->


<div class="modal fade" id="tambah">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Tambah Instruktur</h4>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('instruktur/tambah')?>" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="nama">Nama</label>
							<input type="text" name="nama" required="" class="form-control" id="nama" placeholder="Nama" value="<?= set_value('nama') ?>">
						</div>
						<div class="form-group">
							<label for="nama">Jenis Kelamin</label><br>
							<select name="jns_kel" class="form-control" >
								<option value="Laki-Laki">Laki-Laki</option>
								<option value="Perempuan">Perempuan</option>
							</select>
						</div>
						<div class="form-group">
							<label for="alamat">Alamat</label>
							<textarea class="form-control" name="alamat" name="alamat" required="" placeholder="Alamat"><?= set_value('alamat') ?></textarea>
						</div>
						<div class="form-group">
							<label for="nama">Tempat Lahir</label>
							<input type="text" name="tmpt_lahir" required="" class="form-control" id="nama" placeholder="Tempat Lahir" value="<?= set_value('tmpt_lahir') ?>">
						</div>
						<div class="form-group">
							<label for="tgl">Tanggal Lahir</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input name="tgl_lahir" placeholder="Tanggal Lahir" type="text" required="" value="<?= set_value('tgl_lahir') ?>" id="datepicker" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
							</div>
						</div>
						<div class="form-group <?php echo form_error('no_telp') ? 'has-error' : null ?>">
							<label for="no_telp">Nomor Telepon</label>
							<input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="Nomor Telepon" required="" value="<?= form_error('no_telp') ? '' : set_value("no_telp")?>">
						</div>
						<div class="form-group <?php echo form_error('email') ? 'has-error' : null ?>">
							<label for="email">Email</label>
							<input type="email" class="form-control" name="email" id="email" placeholder="Email" required="" value="<?= form_error('email') ? '' : set_value("email")?>">
						</div>
						<div class="form-group">
							<label for="foto">Foto</label>
							<input type="file" required="" name="foto" id="foto" value="<?= set_value('foto') ?>">
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
	<!-- /.modal -->