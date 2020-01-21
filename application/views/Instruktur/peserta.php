<div class="box">
	<div class="box-header">
		<h3 class="box-title">Data Siswa</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th class="hidden-xs">No</th>
					<th>Nama</th>
					<th class="hidden-xs">Jenis Kelamin</th>
					<th class="hidden-xs">Alamat</th>
					<th class="hidden-xs">Nomor Telepon</th>
					<th class="hidden-xs">Tanggal Mulai</th>
					<th>Jam</th>
					<th class="hidden-xs">Tanggal Selesai</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($siswa as $i) {
					?>
					<tr>
						<td class="hidden-xs"><?= $no++ ?></td>
						<td><?= $i->nm_peserta ?></td>
						<td class="hidden-xs"><?= $i->jns_kel ?></td>
						<td class="hidden-xs"><?= $i->alamat ?></td>
						<td class="hidden-xs"><?= $i->no_telp ?></td>
						<td class="hidden-xs"><?= $i->tgl_mulai ?></td>
						<td><?= $i->jam ?></td>
						<td class="hidden-xs"><?= $i->tgl_selesai ?></td>
						<td><?= $i->status_siswa?></td>
						<td><div class="btn-group-vertical">
							<a class="btn btn-info" href="<?= base_url('peserta/detail/').$i->id_peserta; ?>"><i class="fa fa-eye"> <span class="hidden-xs">Detail</span></i></a>
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
		<th class="hidden-xs">No</th>
		<th>Nama</th>
		<th class="hidden-xs">Jenis Kelamin</th>
		<th class="hidden-xs">Alamat</th>
		<th class="hidden-xs">Nomor Telepon</th>
		<th class="hidden-xs">Tanggal Mulai</th>
		<th>Jam</th>
		<th class="hidden-xs">Tanggal Selesai</th>
		<th>Status</th>
		<th>Action</th>
	</tr>
</tfoot>
</table>
</div>
<!-- /.box-body -->
</div>