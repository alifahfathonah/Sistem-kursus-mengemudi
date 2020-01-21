<div class="row">
	<div class="col-md-7">
		<div class="box box-success">
			<div class="box-header with-border">
				<h3 class="box-title">Biodata Siswa</h3>
			</div>
			<div class="box-body">
				<table class="table">
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td><?= $siswa->nm_peserta ?></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td>:</td>
						<td><?= $siswa->jns_kel ?></td>
					</tr>
					<tr>
						<td>Tempat Lahir</td>
						<td>:</td>
						<td><?= $siswa->tmpt_lahir ?></td>
					</tr>
					<tr>
						<td>Tanggal Lahir</td>
						<td>:</td>
						<td><?= $siswa->tgl_lahir ?></td>
					</tr>
					<tr>
						<td>Pekerjaan</td>
						<td>:</td>
						<td><?= $siswa->pekerjaan ?></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td><?= $siswa->alamat ?></td>
					</tr>
					<tr>
						<td>No Telp</td>
						<td>:</td>
						<td><?= $siswa->no_telp ?></td>
					</tr>
					<tr>
						<td>Username</td>
						<td>:</td>
						<td><?= $siswa->username ?></td>
					</tr>
					<tr>
						<td>Status</td>
						<td>:</td>
						<td><strong><?= $siswa->status ?></strong></td>
					</tr>
					<tr>
						<td>Testimoni</td>
						<td>:</td>
						<td><?= $siswa->testimoni == null ? 'Belum Menulis Testimoni' : $siswa->testimoni; ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Daftar Absensi</h3>
			</div>
			<div class="box-body">
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
		<a href="<?= base_url('jadwal/absensi/'.$siswa->id_peserta)?>" class="btn btn-success margin-bottom">Tambah Absen</a>
		<a href="<?= base_url('peserta')?>" class="btn btn-danger margin-bottom">Kembali</a>
	</div>	
</div>