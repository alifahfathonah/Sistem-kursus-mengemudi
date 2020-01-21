<?= $this->session->flashdata('message');  ?>
<div class="row">
  <div class="col-md-7">
    <div class="box box-warning">
      <div class="box-header">
        <h3 class="box-title">Daftar Absen</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">
        <table class="table table-striped">
          <tr>
            <th>Pertemuan</th>
            <th>Tanggal</th>
            <th>Progress</th>
          </tr>
          <?php foreach ($absensi as $a): ?>
            <tr>
              <td><?= $a->pertemuan ?></td>
              <td><?= $a->tgl?></td>
              <td><?= $a->keterangan ?></td>
            </tr>
          <?php endforeach ?>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
  <div class="col-md-5">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Form Absen</h3>
      </div>
      <div class="box-body">
        <p><?php if ($pertemuan > 10): ?>
        Tidak ada lagi pertemuan. jadwal sudah selesai
        <?php else: ?>
          Pertemuan ke <strong><?= $pertemuan?></strong>
          <?php endif ?></p>
          <form method="post" action="<?= base_url('jadwal/addabsensi');?>">
            <div class="form-group">
              <label for="tgl_lahir">Tanggal Lahir</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input name="tgl" placeholder="" type="text" required="" value="<?= date('Y-m-d')?>" id="datepicker" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
              </div>
            </div>
            <div class="form-group">
              <input type="hidden" name="id" value="<?= $id_jadwal ?>">
              <label for="nama">Progress</label>
              <textarea name="progress" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="formsubmit" value="ok" <?= $pertemuan > '10' ? 'disabled' : null ?>>Simpan</button>
            <button type="submit" class="btn btn-danger" name="formsubmit" value="failed" onclick="return confirm('Anda yakin peserta 3 hari tidak hadir? peserta akan dianggap sudah menyelesaikan dan gagal. jadwal akan dihapus') <?= $pertemuan > '10' ? 'disabled' : null ?>">3 Hari Tidak Hadir</button>
            <a href="<?= base_url('jadwal')?>" class="btn btn-warning">Back</a>
          </form>
        </div>
      </div>
    </div>
  </div>
