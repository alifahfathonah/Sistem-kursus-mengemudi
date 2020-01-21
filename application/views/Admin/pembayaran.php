<?= $this->session->flashdata('message');  ?>
<div class="row">
	<?php echo validation_errors(); ?>
	<div class="col-md-3">
		<a class="btn btn-danger margin-bottom" href="<?= base_url('pembayaran/hapus')?>" onclick="return confirm('Data yang terhapus adalah data yang ditolak dalam 30 hari terakhir. Yakin akan menghapus data?')">Hapus Data</a>
	</div>
</div>
<div class="box">
	<div class="box-header">
		<h3 class="box-title">Data Pembayaran</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Peserta</th>
					<th class="hidden-xs">No Rekening</th>
					<th class="hidden-xs">Nama Rekening</th>
					<th class="hidden-xs">Jumlah Pembayaran</th>
					<th class="hidden-xs">Bukti Pembayaran</th>
					<th class="hidden-xs">Tanggal Upload</th>
					<th class="hidden-xs">Pada Bank</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($pembayaran as $p) {
					?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $p->nm_peserta ?></td>
						<td class="hidden-xs"><?= $p->no_rekening ?></td>
						<td class="hidden-xs"><?= $p->nama?></td>
						<td class="hidden-xs">Rp <?= number_format($p->jmlh_pembayaran) ?></td>
						<td class="hidden-xs"><img src="<?= base_url('assets/img/bukti/').$p->bukti_pembayaran ?>"height="70px" width="55px" class='img-square'></td>
						<td class="hidden-xs"><?= $p->tgl_upload ?></td>
						<td class="hidden-xs"><?= $p->nm_bank?></td>
						<td><?= $p->status?></td>
						<td>
							<a class="btn btn-info" href="<?= base_url('pembayaran/lihat/'.$p->id_pembayaran); ?>"><i class="fa fa-eye"> <span class="hidden-xs">Detail</span></i></button>
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
						<th class="hidden-xs">No Rekening</th>
						<th class="hidden-xs">Nama Rekening</th>
						<th class="hidden-xs">Jumlah Pembayaran</th>
						<th class="hidden-xs">Bukti Pembayaran</th>
						<th class="hidden-xs">Tanggal Upload</th>
						<th class="hidden-xs">Pada Bank</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</tfoot>
			</table>
		</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->

	<!-- /.col -->


