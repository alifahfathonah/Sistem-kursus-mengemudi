<?= $this->session->flashdata('message');  ?>

	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Data Instruktur</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th class="hidden-xs">No</th>
						<th>Jam</th>
						<th>Nama Peserta</th>
						<th class="hidden-xs">Tanggal Mulai</th>
						<th class="hidden-xs">Tanggal Selesai</th>
						<th>Tersisa</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($jadwal as $i) {
						?>
						<tr>
							<td class="hidden-xs"><?= $no++ ?></td>
							<td><?= $i->jam ?></td>
							<td><?= $i->nm_peserta ?></td>
							<td class="hidden-xs"><?= $i->tgl_mulai ?></td>
							<td class="hidden-xs"><?= $i->tgl_selesai ?></td>
							<td><?php if ($i->sisa <= -10): ?>
							<p>10 Hari Pertemuan</p>
							<?php else: ?>
								<p><?= abs($i->sisa) ?> Hari Pertemuan</p>
								<?php endif ?></td>
								<td><div class="btn-group-vertical">
									<a class="btn btn-info" href="<?= base_url('jadwal/absensi/').$i->id_jadwal; ?>"><i class="fa fa-list"> <span class="hidden-xs">Absensi</span></i></a>
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
				<th>Jam</th>
				<th>Nama Peserta</th>
				<th class="hidden-xs">Tanggal Mulai</th>
				<th class="hidden-xs">Tanggal Selesai</th>
				<th>Tersisa</th>
				<th>Action</th>
			</tr>
		</tfoot>
	</table>
</div>
<!-- /.box-body -->
</div>