<div class="box box-default">
	<div class="box-header with-border">
		<h3 class="box-title">Edit rekening</h3>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-5">
				<?php foreach ($rekening as $r) { ?>
					<form action="<?= base_url('rekening/update')?>" method="post">
						<input type="hidden" name="id_rekening" value="<?= $r->id_rekening?>">
						<div class="form-group">
							<label for="nama">Nama Bank</label>
							<input type="text" name="nama" required="" class="form-control" id="nama" placeholder="Nama" value="<?= $r->nm_bank?>">
						</div>
						<div class="form-group">
							<label for="kode">Kode Bank</label>
							<input type="text" class="form-control" name="kode" id="kode" placeholder="Kode Bank" required="" value="<?= $r->kode_bank ?>">
						</div>

						<div class="form-group">
							<label for="Pemilik">Atas Nama</label>
							<input type="text" class="form-control" name="pemilik" id="pekerjaan" placeholder="Atas Nama" required="" value="<?= $r->pemilik ?>">
						</div>
						<div class="form-group <?php echo form_error('no_rek') ? 'has-error' : null ?>">
							<label for="no_rek">Nomor Rekening</label>
							<input type="text" class="form-control" name="no_rek" id="no_rek" placeholder="Nomor Rekening" required="" value="<?= $r->no_rek ?>">
						</div>
					</div>
				</div>
				<button type="Submit" class="btn btn-primary">Simpan</button>
				<a href="<?= base_url('/rekening')?>" type="Reset" class="btn btn-default">Batal</a>
			</form>
		<?php }?>
	</div>
</div>