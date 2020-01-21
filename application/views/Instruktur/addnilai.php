<div class="row">
	<div class="col-md-5">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Form Penilaian</h3>
			</div>
			<div class="box-body">
				<form method="post" action="<?= base_url('penilaian/adddata')?>"> 
					<input type="hidden" name="id_peserta" value="<?= $jadwal->id_peserta?>">
					<div class="form-group">
						<label for="nama">Undang-Undang Lalu Lintas dan Angkutan Jalan</label>
						<input type="number" max="80" min="0" name="uullaj" required="" class="form-control" id="nama" placeholder="Range 0-80" required="">
					</div>
					<div class="form-group">
						<label for="kode">Pengetauhan Dasar Kendaraan Bermomtor</label>
						<input type="number" max="80" min="0" class="form-control" name="pdkb" placeholder="Range 0-80" required="">
					</div>

					<div class="form-group">
						<label for="Pemilik">Tata Tertib dan Sopan Santun Berlalu-lintas</label>
						<input type="number" max="80" min="0" class="form-control" name="ttssb" placeholder="Range 0-80" required="">
					</div>
					<div class="form-group">
						<label for="no_rek">Mengemudi Ranmor di Lapangan Praktik</label>
						<input type="number" max="80" min="0" class="form-control" name="mrlp" placeholder="Range 0-80" required="">
					</div>
					<div class="form-group">
						<label for="no_rek">Mengemudi Ranmor di Jalan Raya</label>
						<input type="number" max="80" min="0" class="form-control" name="mrjr" placeholder="Range 0-80" required="">
					</div>
					<div class="form-group">
						<label for="no_rek">Perawatan Kendaraan Bermotor</label>
						<input type="number" max="80" min="0" class="form-control" name="pkb" placeholder="Range 0-80" required=""	>
					</div>
					<button class="btn btn-primary" type="submit">Simpan</button>
					<a href="<?= base_url('penilaian')?>" class="btn btn-danger">Batal</a>
				</form>
			</div>
		</div>
	</div>

	<div class="col-md-4">
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
						<td>Tanggal Mulai</td>
						<td>:</td>
						<td><?= $jadwal->tgl_mulai ?></td>
					</tr>
					<tr>
						<td>Jam</td>
						<td>:</td>
						<td><?= $jadwal->jam ?></td>
					</tr>
					<tr>
						<td>Tanggal selesai</td>
						<td>:</td>
						<td><?= $jadwal->tgl_selesai ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>

	<div class="col-md-7">
		<div class="box box-warning">
			<div class="box-header with-border">
				<h3 class="box-title">Rekap Progres</h3>
			</div>
			<div class="box-body">
				<table class="table">
					<th>Pertemuan</th>
					<th>Tanggal</th>
					<th>Progress</th>
					<?php foreach ($rekap as $r): ?>
						<tr>
							<td>Pertemuan <?= $r->pertemuan ?></td>
							<td><?= $r->tgl ?></td>
							<td><?= $r->keterangan ?></td>
						</tr>
					<?php endforeach ?>
				</table>
			</div>
		</div>
	</div>
</div>
