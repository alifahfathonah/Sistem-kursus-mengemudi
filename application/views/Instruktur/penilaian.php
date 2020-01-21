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
					<th class="hidden-xs">Alamat</th>
					<th class="hidden-xs">Nomor Telepon</th>
					<th class="hidden-xs">Tanggal Mulai</th>
					<th class="hidden-xs">Jam</th>
					<th>Tanggal Selesai</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($nilai as $i) {
					?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $i->nm_peserta ?></td>
						<td class="hidden-xs"><?= $i->jns_kel ?></td>
						<td class="hidden-xs"><?= $i->alamat ?></td>
						<td class="hidden-xs"><?= $i->no_telp ?></td>
						<td class="hidden-xs"><?= $i->tgl_mulai ?></td>
						<td class="hidden-xs"><?= $i->jam ?></td>
						<td><?= $i->tgl_selesai ?></td>
						<td><div class="btn-group-vertical">
							<a class="btn btn-info" href="<?= base_url('penilaian/addnilai/'.$i->id_jadwal); ?>"><i class="fa fa-pencil"> <span class="hidden-xs">Beri Penilaian</span></i></a>
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
		<th class="hidden-xs">Alamat</th>
		<th class="hidden-xs">Nomor Telepon</th>
		<th class="hidden-xs">Tanggal Mulai</th>
		<th class="hidden-xs">Jam</th>
		<th>Tanggal Selesai</th>
		<th>Action</th>
	</tr>
</tfoot>
</table>
</div>
<!-- /.box-body -->
</div>