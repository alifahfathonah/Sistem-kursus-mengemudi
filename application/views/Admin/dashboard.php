<?= $this->session->flashdata('message');  ?>
<div class="row">
	<div class="col-md-3">

		<!-- Profile Image -->
		<div class="box box-primary">
			<div class="box-body box-profile">
				<img class="profile-user-img img-responsive img-circle" src="<?= base_url('assets/img/').$this->session->userdata('foto')?>" alt="User profile picture">

				<h3 class="profile-username text-center"><?= $this->session->userdata('nama')?></h3>

				<p class="text-muted text-center"><?= $this->session->userdata('jabatan')?></p>

				<ul class="list-group list-group-unbordered">
					<li class="list-group-item">
						<b>Jenis Kelamin</b> <a class="pull-right"><?= $this->session->userdata('jns_kel')?></a>
					</li>
					<li class="list-group-item">
						<b>Tempat Lahir</b> <a class="pull-right"><?= $this->session->userdata('tmpt_lahir')?></a>
					</li>
					<li class="list-group-item">
						<b>Tanggal Lahir</b> <a class="pull-right"><?= $this->session->userdata('tgl_lahir')?></a>
					</li>
				</ul>

				<a href="<?= base_url('dashboard/edit')?>" class="btn btn-primary btn-block"><b>Edit Profil</b></a>
				<a <?= $this->session->userdata('level') == '1' ? 'href="dashboard/addnew"' : 'href="#"'?> class="btn btn-warning btn-block"><b>Tambah Admin</b></a>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->

		<!-- About Me Box -->
		<div class="box box-primary collapsed-box">
			<div class="box-header with-border">
				<h3 class="box-title">About Me</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
					</button>
				</div>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<strong><i class="fa fa-map-marker margin-r-5"></i> Alamat</strong>

				<p class="text-muted">
					<?= $this->session->userdata('alamat')?>
				</p>

				<hr>

				<strong><i class="fa fa-user margin-r-5"></i> Username</strong>

				<p class="text-muted"><?= $this->session->userdata('username')?></p>

				<hr>

				<strong><i class="fa fa-file-text-o margin-r-5"></i> Catatan</strong>

				<p>Dari mana datangnya inspirasi, dari visi turun ke kerja keras tanpa henti. Tak sedikit orang bervisi, tapi segelintir yang mampu menggerakkan banyak pribadi.</p>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
	<!-- /.right colomn -->
	<div class="col-lg-3 col-xs-6 hidden-xs">
		<!-- small box -->
		<div class="small-box bg-aqua">
			<div class="inner">
				<h3><?php foreach ($countproses as $c) {
					echo $c->total;
				} ?></h3>

				<p>Pembayaran Masuk</p>
			</div>
			<div class="icon">
				<i class="ion ion-ios-plus"></i>
			</div>
			<a href="<?= base_url('pembayaran')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6 hidden-xs">
		<!-- small box -->
		<div class="small-box bg-green">
			<div class="inner">
				<h3><?php foreach ($countditerima as $c) {
					echo $c->total;
				} ?></h3>

				<p>Pembayaran Diterima</p>
			</div>
			<div class="icon">
				<i class="ion ion-android-checkmark-circle"></i>
			</div>
			<a href="<?= base_url('pembayaran')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6 hidden-xs">
		<!-- small box -->
		<div class="small-box bg-red">
			<div class="inner">
				<h3><?php foreach ($countditolak as $c) {
					echo $c->total;
				} ?></h3>

				<p>Pembayaran Ditolak</p>
			</div>
			<div class="icon">
				<i class="ion ion-android-remove-circle"></i>
			</div>
			<a href="<?= base_url('pembayaran')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<div class="col-md-9">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">Data Pembayaran Harus Diproses</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
					</button>
				</div>
				<!-- /.box-tools -->
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<!-- /.box-header -->
				<div class="box-body">
					<table class="table table-bordered">
						<tr>
							<th style="width: 10px">#</th>
							<th>Nama Peserta</th>
							<th>Tanggal Upload</th>
							<th>Status</th>
							<th style="width: 40px">Action</th>
						</tr>
						<?php 
						$no = 1;
						foreach ($pembayaran as $p) { ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $p->nm_peserta ?></td>
								<td><?= $p->tgl_upload?></td>
								<td><?= $p->status ?></td>
								<td><a href="<?= base_url('pembayaran/lihat/'.$p->id_pembayaran); ?>" ><span class="badge bg-blue">Detail</span></a></td>
							</tr>
						<?php } ?>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- /.box-body -->
	</div>
	<div class="col-md-9">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">Permintaan Sertifikat</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
					</button>
				</div>
				<!-- /.box-tools -->
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<!-- /.box-header -->
				<div class="box-body">
					<table class="table table-bordered">
						<tr>
							<th style="width: 10px">#</th>
							<th>Nama Peserta</th>
							<th class="hidden-xs">Status Pembelajaran</th>
							<th>Status Sertifikat</th>
							<th style="width: 40px">Action</th>
						</tr>
						<?php 
						$no = 1;
						foreach ($sertifikat as $s) { ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $s->nm_peserta ?></td>
								<td class="hidden-xs"><?= $s->status ?></td>
								<td><?= $s->status1 ?></td>
								<td><a href="<?= base_url('sertifikat/update/'.$s->id_sertifikat); ?>" ><span class="badge bg-blue">Terima/Cetak</span></a></td>
							</tr>
						<?php } ?>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->
</div>
<!-- /.col -->


