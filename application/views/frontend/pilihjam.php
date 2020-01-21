<div class="row">
	<div class="col-md-5">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Daftar Jam</h3>
			</div>
			<div class="box-body">
				<form action="<?= base_url('pilihjadwal/simpan')?>" method="post">
					<input type="hidden" name="id" value="<?= $id ?>">
					<button type="submit" name="jam" <?= ($jam1 == null || $jam1->status == 'Tidak Aktif') ? "value='jam1' class='btn btn-primary btn-lg margin-bottom'" : "class='btn btn-danger btn-lg margin-bottom' disabled" ?> onclick="return confirm('Anda yakin ingin memilih jadwal ini? jam yang sudah dipilih tidak dapat dirubah!');">08:00</button>
					<button type="submit" name="jam" <?= ($jam2 == null || $jam2->status == 'Tidak Aktif') ? "value='jam2' class='btn btn-primary btn-lg margin-bottom'" : "class='btn btn-danger btn-lg margin-bottom' disabled" ?> onclick="return confirm('Anda yakin ingin memilih jadwal ini? jam yang sudah dipilih tidak dapat dirubah!');">09:00</button>
					<button type="submit" name="jam" <?= ($jam3 == null || $jam3->status == 'Tidak Aktif') ? "value='jam3' class='btn btn-primary btn-lg margin-bottom'" : "class='btn btn-danger btn-lg margin-bottom' disabled" ?> onclick="return confirm('Anda yakin ingin memilih jadwal ini? jam yang sudah dipilih tidak dapat dirubah!');">10:00</button>
					<button type="submit" name="jam" <?= ($jam4 == null || $jam4->status == 'Tidak Aktif') ? "value='jam4' class='btn btn-primary btn-lg margin-bottom'" : "class='btn btn-danger btn-lg margin-bottom' disabled" ?> onclick="return confirm('Anda yakin ingin memilih jadwal ini? jam yang sudah dipilih tidak dapat dirubah!');">11:00</button>
					<button type="submit" name="jam" <?= ($jam5 == null || $jam5->status == 'Tidak Aktif') ? "value='jam5' class='btn btn-primary btn-lg margin-bottom'" : "class='btn btn-danger btn-lg margin-bottom' disabled" ?> onclick="return confirm('Anda yakin ingin memilih jadwal ini? jam yang sudah dipilih tidak dapat dirubah!');">12:00</button>
					<button type="submit" name="jam" <?= ($jam6 == null || $jam6->status == 'Tidak Aktif') ? "value='jam6' class='btn btn-primary btn-lg margin-bottom'" : "class='btn btn-danger btn-lg margin-bottom' disabled" ?> onclick="return confirm('Anda yakin ingin memilih jadwal ini? jam yang sudah dipilih tidak dapat dirubah!');">13:00</button>
					<button type="submit" name="jam" <?= ($jam7 == null || $jam7->status == 'Tidak Aktif') ? "value='jam7' class='btn btn-primary btn-lg margin-bottom'" : "class='btn btn-danger btn-lg margin-bottom' disabled" ?> onclick="return confirm('Anda yakin ingin memilih jadwal ini? jam yang sudah dipilih tidak dapat dirubah!');">14:00</button>
					<button type="submit" name="jam" <?= ($jam8 == null || $jam8->status == 'Tidak Aktif') ? "value='jam8' class='btn btn-primary btn-lg margin-bottom'" : "class='btn btn-danger btn-lg margin-bottom' disabled" ?> onclick="return confirm('Anda yakin ingin memilih jadwal ini? jam yang sudah dipilih tidak dapat dirubah!');">15:00</button>
					<button type="submit" name="jam" <?= ($jam9 == null || $jam9->status == 'Tidak Aktif') ? "value='jam9' class='btn btn-primary btn-lg margin-bottom'" : "class='btn btn-danger btn-lg margin-bottom' disabled" ?> onclick="return confirm('Anda yakin ingin memilih jadwal ini? jam yang sudah dipilih tidak dapat dirubah!');">16:00</button>
					<button type="submit" name="jam" <?= ($jam10 == null || $jam10->status == 'Tidak Aktif') ? "value='jam10' class='btn btn-primary btn-lg margin-bottom'" : "class='btn btn-danger btn-lg margin-bottom' disabled" ?> onclick="return confirm('Anda yakin ingin memilih jadwal ini? jam yang sudah dipilih tidak dapat dirubah!');">17:00</button>
					<button type="submit" name="jam" <?= ($jam11 == null || $jam11->status == 'Tidak Aktif') ? "value='jam11' class='btn btn-primary btn-lg margin-bottom'" : "class='btn btn-danger btn-lg margin-bottom' disabled" ?> onclick="return confirm('Anda yakin ingin memilih jadwal ini? jam yang sudah dipilih tidak dapat dirubah!');">18:00</button>
					<button type="submit" name="jam" <?= ($jam12 == null || $jam12->status == 'Tidak Aktif') ? "value='jam12' class='btn btn-primary btn-lg margin-bottom'" : "class='btn btn-danger btn-lg margin-bottom' disabled" ?> onclick="return confirm('Anda yakin ingin memilih jadwal ini? jam yang sudah dipilih tidak dapat dirubah!');">19:00</button>
					<button type="submit" name="jam" <?= ($jam13 == null || $jam13->status == 'Tidak Aktif') ? "value='jam13' class='btn btn-primary btn-lg margin-bottom'" : "class='btn btn-danger btn-lg margin-bottom' disabled" ?> onclick="return confirm('Anda yakin ingin memilih jadwal ini? jam yang sudah dipilih tidak dapat dirubah!');">20:00</button>
					<a href="<?= base_url('pilihjadwal')?>" class="btn btn-warning btn-lg margin-bottom">Ubah Instruktur</a>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="box box-success">
			<div class="box-body box-profile">
				<img class="profile-user-img img-responsive" src="<?= base_url('assets/img/').$instruktur->foto ?>" alt="User profile picture">

				<h3 class="profile-username text-center"><?= $instruktur->nm_instruktur?></h3>

				<p class="text-muted text-center"><?= $instruktur->jns_kel?></p>
				<ul class="list-group list-group-unbordered">
					<li class="list-group-item">
						<b>No Telpon</b> <a class="pull-right"><?= $instruktur->no_telp?></a>
					</li>
					<li class="list-group-item">
						<b>Email</b> <a class="pull-right"><?= $instruktur->email?></a>
					</li>
					<li class="list-group-item">
						<b>Alamat</b> <a class="pull-right"><?= $instruktur->alamat?></a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="box box-warning">
			<div class="box-header with-border">
				<h3>Ketentuan</h3>
			</div>
			<div class="box-body">
				<li>Jadwal yang telah dipilih tidak dapat diubah, jadi pastikan bahwa jadwal anda benar!</li>
				<li>Tombol yang berwarna biru berarti jadwal bisa dipilih.</li>
				<li>Tombol yang berwarna merah berarti jadwal tidak bisa dipilih.</li>
			</div>
		</div>
	</div>
</div>