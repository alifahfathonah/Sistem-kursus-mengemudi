<div class="box">
	<div class="box-header">
		<h3 class="box-title">Permintaan Sertifikat</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Peserta</th>
					<th>Nomor Telepon</th>
					<th class="hidden-xs">Status Peserta</th>
					<th>Status Sertifikat</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($sertifikat as $s) {
					?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $s->nm_peserta ?></td>
						<td><?= $s->no_telp ?></td>
						<td class="hidden-xs"><?= $s->status ?></td>
						<td><?= $s->status1 ?> Terbit</td>
						<td>
							<a class="btn btn-primary" href="<?= base_url('sertifikat/update/'.$s->id_sertifikat); ?>"><i class="fa fa-print"> Cetak</i></button>
							</td>
						</tr>
						<?php
					}
					?>
				</tbody>
				<tfoot>
					<tr>
						<th>No</th>
						<th>Nama Peserta</th>
						<th>Nomor Telepon</th>
						<th class="hidden-xs">Status Peserta</th>
						<th>Status Sertifikat</th>
						<th>Action</th>
					</tfoot>
				</table>
			</div>
			<!-- /.box-body -->
		</div>