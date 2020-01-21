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

				<a href="<?= base_url('dashboard2/edit')?>" class="btn btn-primary btn-block"><b>Edit Profil</b></a>
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

				<p>Ketika kau melakukan sesuatu yang mulia dan indah tapi tak seorang pun memperhatikan, jangan bersedih. Karena matahari pun tampil cantik setiap pagi meski sebagian besar penontonnya masih tidur.</p>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
	<div class="col-lg-3 col-xs-6 hidden-xs">
		<!-- small box -->
		<div class="small-box bg-aqua">
			<div class="inner">
				<h3><?= $aktif->jumlah?></h3>

				<p>Siswa Aktif</p>
			</div>
			<div class="icon">
				<i class="fa fa-user"></i>
			</div>
			<a href="<?= base_url('peserta')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6 hidden-xs">
		<!-- small box -->
		<div class="small-box bg-green">
			<div class="inner">
				<h3><?= $selesai->jumlah?></h3>

				<p>Siswa Selesai</p>
			</div>
			<div class="icon">
				<i class="fa fa-check-square"></i>
			</div>
			<a href="<?= base_url('peserta')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6 hidden-xs">
		<!-- small box -->
		<div class="small-box bg-red">
			<div class="inner">
				<h3><?= $gagal->jumlah?></h3>

				<p>Siswa Gagal</p>
			</div>
			<div class="icon">
				<i class="fa fa-user-times"></i>
			</div>
			<a href="<?= base_url('peserta')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>

	<div class="col-md-9">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">Jadwal Hari ini</h3>
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
							<th>Jam</th>
							<th>Nama Peserta</th>
							<th>Tersisa</th>
							<th style="width: 40px">Action</th>
						</tr>
						<?php 
						$no = 1;
						foreach ($jadwal as $j) { ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $j->jam ?></td>
								<td><?= $j->nm_peserta?></td>
								<td><?php if ($j->sisa < -10): ?>
								<p>10 Hari Pertemuan akan dimulai besok</p>
								<?php else: ?>
									<p><?= abs($j->sisa) ?> Hari Pertemuan</p>
									<?php endif ?></td>
									<td><a href="<?= base_url('jadwal/absensi/'.$j->id_jadwal); ?>" ><span class="badge bg-blue">Absen</span></a></td>
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
					<h3 class="box-title">Peserta Selesai dan Harus Diberi Penilaian</h3>
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
								<th>Tanggal Mulai</th>
								<th>Tanggal Selesai</th>
								<th style="width: 40px">Action</th>
							</tr>
							<?php 
							$no = 1;
							foreach ($nilai as $n) { ?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $n->nm_peserta ?></td>
									<td><?= $n->tgl_mulai ?></td>
									<td><?= $n->tgl_selesai ?></td>
									<td><a href="<?= base_url('penilaian/addnilai/'.$n->id_jadwal); ?>" ><span class="badge bg-blue">Nilai</span></a></td>
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
	</div>
	<!-- /.right colomn -->



