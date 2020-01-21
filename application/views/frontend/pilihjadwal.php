<?= $this->session->flashdata('message');  ?>
<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Daftar Instruktur</h3>
			</div>
			<div class="box-body">
				<?php foreach ($instruktur as $i) { ?>
					<div class="col-md-3">
						<div class="thumbnail">

							<img src="<?= base_url('assets/img/').$i->foto ?>" width="200" height="150">
							<p align="center"><strong><?= $i->nm_instruktur ?></strong></p>
							<p align="center"><?= $i->jns_kel ?></p>
							<p align="center"><a href="<?= base_url('pilihjadwal/pilih/').$i->id_instruktur?>" class="btn btn-primary">Pilih Instruktur</a></p>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>