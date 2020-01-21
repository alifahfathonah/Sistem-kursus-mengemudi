<?= $this->session->flashdata('message');  ?>

<div class="row">
	<?php echo validation_errors(); ?>
	<div class="col-md-3">
		<button type="button" class="btn btn-success btn-block margin-bottom" data-toggle="modal" data-target="#tambah">Tambah Data</button>
	</div>
</div>
<div class="box">
	<div class="box-header">
		<h3 class="box-title">Data siswa</h3>
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
					<th class="hidden-xs">Pekerjaan</th>
					<th class="hidden-xs">Alamat</th>
					<th class="hidden-xs">Nomor Telepon</th>
					<th class="hidden-xs">Username</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($siswa as $s) {
					?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $s->nm_peserta ?></td>
						<td class="hidden-xs"><?= $s->jns_kel ?></td>
						<td class="hidden-xs"><?= $s->tmpt_lahir?></td>
						<td class="hidden-xs"><?= $s->tgl_lahir ?></td>
						<td class="hidden-xs"><?= $s->pekerjaan ?></td>
						<td class="hidden-xs"><?= $s->alamat?></td>
						<td class="hidden-xs"><?= $s->no_telp ?></td>
						<td class="hidden-xs"><?= $s->username ?></td>
						<td><?= $s->status ?></td>
						<td><div class="btn-group-vertical">
							<a class="btn btn-info" href="<?= base_url('siswa/edit/'.$s->id_peserta); ?>"><i class="fa fa-edit"> <span class="hidden-xs">Edit</span></i></button>
								<a class="btn btn-danger" href="<?= base_url('siswa/hapus/'.$s->id_peserta); ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?');"><i class="fa fa-trash"> <span class="hidden-xs">Hapus</span></i></a>
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
			<th class="hidden-xs">Pekerjaan</th>
			<th class="hidden-xs">Alamat</th>
			<th class="hidden-xs">Nomor Telepon</th>
			<th class="hidden-xs">Username</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</tfoot>
</table>
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->


<div class="modal fade" id="tambah">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Tambah siswa</h4>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('siswa/tambah')?>" method="post">
						<div class="form-group">
							<label for="nama">Nama</label>
							<input type="text" name="nama" required="" class="form-control" id="nama" placeholder="Nama" value="<?= set_value('nama') ?>">
						</div>
						<div class="form-group">
							<label for="jns_kel">Jenis Kelamin</label><br>
							<select name="jns_kel" class="form-control" >
								<option value="Laki-Laki">Laki-Laki</option>
								<option value="Perempuan">Perempuan</option>
							</select>
						</div>
						<div class="form-group">
							<label for="tmpt_lahir">Tempat Lahir</label>
							<input type="text" class="form-control" name="tmpt_lahir" id="tmpt_lahir" placeholder="Tempat Lahir" required="" value="<?= set_value("tmpt_lahir")?>">
						</div>
						<div class="form-group">
							<label for="tgl_lahir">Tanggal Lahir</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input name="tgl_lahir" placeholder="Tanggal Lahir" type="text" required="" value="<?= set_value('tgl_lahir') ?>" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
							</div>
						</div>
						<div class="form-group">
							<label for="Pekerjaan">Pekerjaan</label>
							<input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" required="" value="<?= set_value("pekerjaan")?>">
						</div>
						<div class="form-group">
							<label for="alamat">Alamat</label>
							<textarea class="form-control" name="alamat" required="" placeholder="Alamat"><?= set_value('alamat') ?></textarea>
						</div>
						<div class="form-group">
							<label for="no_telp">Nomor Telepon</label>
							<input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="Nomor Telepon" required="" value="<?= set_value("no_telp")?>">
						</div>
						<div class="form-group <?php echo form_error('username') ? 'has-error' : null ?>">
							<label for="username">Username</label>
							<input type="username" class="form-control" name="username" id="username" placeholder="Username" required="" value="<?= form_error('username') ? '' : set_value("username")?>">
						</div>
						<div class="form-group">
							<label for="status">Status</label><br>
							<select name="status" class="form-control">
								<option value="Tidak Aktif">Tidak Aktif</option>
								<option value="Aktif">Aktif</option>
								<option value="Selesai">Selesai</option>
								<option value="Proses">Proses</option>
							</select>
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