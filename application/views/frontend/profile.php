<?= $this->session->flashdata('message');  ?>
<?php if ($sertifikat !=null): ?>
		<?php if ($sertifikat->scan != null): ?>
			<div class="alert alert-success fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-check"></i> Pemeritahuan!</h4>Sertifikat sudah diproses dan dapat di download di menu <b>Lihat Nilai</b>.</div>
		<?php endif ?>
		
	<?php endif ?>
<div class="row">
	<div class="col-md-6">
		<button class="btn btn-primary margin-bottom" data-toggle="modal" data-target="#edit">Edit Data</button>
		<button class="btn btn-danger margin-bottom" data-toggle="modal" data-target="#pass">Ubah Password</button>
		<button class="btn btn-success margin-bottom" data-toggle="modal" <?= $profile->status == 'Selesai' ? 'data-target="#nilai"' : 'data-target="#coba"' ?>>Lihat Nilai</button>
		<button class="btn btn-warning margin-bottom" data-toggle="modal" <?= $profile->status == 'Selesai' && $profile->testimoni == null ? 'data-target="#test"' : 'data-target="#coba"' ?>>Beri Review</button>
	</div>
</div>

<div class="row">
	<div class="col-md-7">
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title">Main Navigation</h3>
			</div>
			<div class="box-body">
				<table class="table" style="height: 100px">
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td><?= $profile->nm_peserta ?></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td>:</td>
						<td><?= $profile->jns_kel ?></td>
					</tr>
					<tr>
						<td>Tempat Lahir</td>
						<td>:</td>
						<td><?= $profile->tmpt_lahir ?></td>
					</tr>
					<tr>
						<td>Tanggal Lahir</td>
						<td>:</td>
						<td><?= $profile->tgl_lahir ?></td>
					</tr>
					<tr>
						<td>Pekerjaan</td>
						<td>:</td>
						<td><?= $profile->pekerjaan ?></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td><?= $profile->alamat ?></td>
					</tr>
					<tr>
						<td>No Telp</td>
						<td>:</td>
						<td><?= $profile->no_telp ?></td>
					</tr>
					<tr>
						<td>Username</td>
						<td>:</td>
						<td><?= $profile->username ?></td>
					</tr>
					<tr>
						<td>Status</td>
						<td>:</td>
						<td><strong><?= $profile->status ?></strong></td>
					</tr>
					<tr>
						<td>Testimoni</td>
						<td>:</td>
						<td><?= $profile->testimoni == null ? 'Belum Menulis Testimoni' : $profile->testimoni; ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-5">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Daftar Absen</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
					</button>
				</div>
			</div>
			<div class="box-body">
				<?php if ($hitung->sisa <= -10): ?>
					<p>Tersisa <strong>10 Hari Pertemuan.</strong></p>
				<?php else: ?>
					<p>Tersisa <strong><?= abs($hitung->sisa) ?> Hari Pertemuan.</strong></p>
				<?php endif ?>
				<ol>
					<li><?php if ($absen1 != null): ?>
						Hadir
					<?php else: ?>
						Belum Ada Data
					<?php endif ?>
					</li>
					<li><?php if ($absen2 != null): ?>
						Hadir
					<?php else: ?>
						Belum Ada Data
					<?php endif ?>
					</li>
					<li><?php if ($absen3 != null): ?>
						Hadir
					<?php else: ?>
						Belum Ada Data
					<?php endif ?></li>
					<li><?php if ($absen4 != null): ?>
						Hadir
					<?php else: ?>
						Belum Ada Data
					<?php endif ?></li>
					<li><?php if ($absen5 != null): ?>
						Hadir
					<?php else: ?>
						Belum Ada Data
					<?php endif ?></li>
					<li><?php if ($absen6 != null): ?>
						Hadir
					<?php else: ?>
						Belum Ada Data
					<?php endif ?></li>
					<li><?php if ($absen7 != null): ?>
						Hadir
					<?php else: ?>
						Belum Ada Data
					<?php endif ?></li>
					<li><?php if ($absen8 != null): ?>
						Hadir
					<?php else: ?>
						Belum Ada Data
					<?php endif ?></li>
					<li><?php if ($absen9 != null): ?>
						Hadir
					<?php else: ?>
						Belum Ada Data
					<?php endif ?></li>
					<li><?php if ($absen10 != null): ?>
						Hadir
					<?php else: ?>
						Belum Ada Data
					<?php endif ?></li>
				</ol>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="test">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Review Anda Selama Belajar</h4>
				</div>
				<form action="<?= base_url('profile/testi')?>" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label>Review Anda</label>
							<textarea class="form-control" rows="3" placeholder="Tulis Review Anda Terhadap Pelayanan Kami&hellip;" name="testi"></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary" >Simpan</button>
					</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

	<div class="modal modal fade" id="edit">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Edit Data</h4>
					</div>
					<div class="modal-body">
						<form method="post" action="<?= base_url('profile/update')?>">
							<div class="form-group">
								<label for="nama">Nama</label>
								<input type="text" name="nama" required="" class="form-control" id="nama" placeholder="Nama" value="<?= $profile->nm_peserta ?>" readonly>
								<span class="help-block">Silahkan hubungi admin untuk perubahan nama.</span>
							</div>
							<div class="form-group">
								<label for="jns_kel">Jenis Kelamin</label><br>
								<select name="jns_kel" class="form-control" >
									<option <?= ($profile->jns_kel == "Laki-Laki") ? "selected" : "" ?>>Laki-Laki</option>
									<option <?= ($profile->jns_kel == "Perempuan") ? "selected" : "" ?>>Perempuan</option>
								</select>
							</div>
							<div class="form-group">
								<label for="tmpt_lahir">Tempat Lahir</label>
								<input type="text" class="form-control" name="tmpt_lahir" id="tmpt_lahir" placeholder="Tempat Lahir" required="" value="<?= $profile->tmpt_lahir ?>">
							</div>
							<div class="form-group">
								<label for="tgl_lahir">Tanggal Lahir</label>
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input name="tgl_lahir" placeholder="Tanggal Lahir" type="text" required="" value="<?= $profile->tgl_lahir ?>" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
								</div>
							</div>
							<div class="form-group">
								<label for="Pekerjaan">Pekerjaan</label>
								<input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" required="" value="<?= $profile->pekerjaan ?>">
							</div>
							<div class="form-group">
								<label for="alamat">Alamat</label>
								<textarea class="form-control" name="alamat" required="" placeholder="Alamat"><?= $profile->alamat ?></textarea>
							</div>
							<div class="form-group">
								<label for="no_telp">Nomor Telepon</label>
								<input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="Nomor Telepon" required="" value="<?= $profile->no_telp ?>">
							</div>
							<div class="form-group">
								<label for="username">Username</label>
								<input type="username" class="form-control" name="username" id="username" placeholder="Username" required="" value="<?= $profile->username ?>" readonly="">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>

		<div class="modal fade" id="pass">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Ubah Password</h4>
						</div>
						<div class="modal-body">
							<form action="<?= base_url('profile/pass')?>" method="post">
								<input type="hidden" name="passasli" value="<?= $profile->password ?>">
								<div class="form-group">
									<label for="nama">Password Lama</label>
									<input type="password" name="passlama" required="" class="form-control"  placeholder="Password Lama" value="<?= set_value("passlama")?>" required="">
								</div>
								<div class="form-group <?php echo form_error('passbaru') ? 'has-error' : null ?>">
									<label for="kode">Password Baru</label>
									<input type="password" class="form-control" name="passbaru" placeholder="Password Baru" required="" value="">
									<span class="help-block"><?php echo form_error('passbaru'); ?></span>
								</div>
								<div class="form-group <?php echo form_error('passconf') ? 'has-error' : null ?>">
									<label for="Pemilik">Tulis Ulang</label>
									<input type="password" class="form-control" name="passconf" placeholder="Tulis Ulang Password Baru" required="" value="">
									<span class="help-block"><?php echo form_error('passconf'); ?></span>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
								<button type="Submit" class="btn btn-primary">Simpan</button>
							</div>
						</form>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->

			<div class="modal fade" id="nilai">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Nilai Anda</h4>
              </div>
              <div class="modal-body">
                <table class="table">
					<tr>
						<td>Undang-Undang Lalu Lintas dan Angkutan Jalan</td>
						<td>:</td>
						<td><?= $nilai->uullaj ?></td>
					</tr>
					<tr>
						<td>Pengetauhan Dasar Kendaraan Bermomtor</td>
						<td>:</td>
						<td><?= $nilai->pdkb ?></td>
					</tr>
					<tr>
						<td>Tata Tertib dan Sopan Santun Berlalu-lintas</td>
						<td>:</td>
						<td><?= $nilai->ttssb ?></td>
					</tr>
					<tr>
						<td>Mengemudi Ranmor di Lapangan Praktik</td>
						<td>:</td>
						<td><?= $nilai->mrlp ?></td>
					</tr>
					<tr>
						<td>Mengemudi Ranmor di Jalan Raya</td>
						<td>:</td>
						<td><?= $nilai->mrjr ?></td>
					</tr>
					<tr>
						<td>Perawata Kendaraan Bermotor</td>
						<td>:</td>
						<td><?= $nilai->pkb ?></td>
					</tr>
					<tr>
						<td><strong>Jumlah</strong></td>
						<td><strong>:</strong></td>
						<td><strong><?= $nilai->jumlah ?></strong></td>
					</tr>
				</table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <?php if ($sertifikat != null): ?>
                	<a href="<?= base_url('profile/download/');?>" class="btn btn-success">Download Sertifikat</a>
                <?php else: ?>
                	<a href="<?= base_url('profile/sertifikat/'.$profile->id_peserta);?>" class="btn btn-primary">Ajukan Sertifikat</a>
                <?php endif ?>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

<div class="modal fade" id="coba">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Review Anda Selama Belajar</h4>
				</div>
					<div class="modal-body">
						<p>Anda Belum Menyelesaikan Kursus Anda.</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>

