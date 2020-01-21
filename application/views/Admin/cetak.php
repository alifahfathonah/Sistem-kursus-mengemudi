<section class="invoice" id="depan">
  <div class="row no-print">
    <div class="col-xs-12">
      <button onclick="window.print();" class="btn btn-primary margin-bottom">Print</button>
      <button type="button" class="btn btn-warning margin-bottom" data-toggle="modal" data-target="#upload">Upload Hasil Scan</button>
    </div>
  </div>
  <div class="row">
    <div style="width:1000px; height:675px; padding:10px; text-align:center; border: 10px solid #787878">
      <div style="width:960px; height:630px; padding:10px; text-align:center; border: 5px solid #787878">
        <span style="font-size:13px; font-weight:bold">PUSAT KEGIATAN BELAJAR MASYARAKAT</span><br>
        <span style="font-size:13px; font-weight:bold">KURSUS MEGEMUDI MOBIL</span><br>
        <span style="font-size:45px; font-weight:bold">MITRA UTAMA</span><br>
        <span style="font-size:13px; font-weight:bold">SK. DINAS : No. 72/KEP/2018</span><br>
        <span style="font-size:15px; font-weight:bold">JL. Tani Makmur Gg. Pemangkat III No. 48 Pontianak 78117 Telp 0821-4808-4444</span>
        <br>
        <span style="font-size:45px"><u><b>SERTIFIKAT</b></u></span>
        <br>
        <span style="font-size:15px"><u><b>No.<?= $sertifikat->id_sertifikat?>/PKBM/MU/<?= $year ?>/201</b></u></span><br/><br/>
        <span style="font-size:15px">Kursus Mengemudi Mobil Mitra Utama Menetapkan :</span> <br/></br>
        <table align="center" style="text-align: left; font-size: 15px">
         <tr>
           <td>Nama&nbsp;</td>
           <td>&nbsp;:&nbsp;</td>
           <td>&nbsp;<?= $nilai->nm_peserta?></td>
         </tr>
         <tr>
           <td>Tempat/Tanggal Lahir&nbsp;</td>
           <td>&nbsp;:&nbsp;</td>
           <td>&nbsp;<?= $nilai->tmpt_lahir?>, <?= $tgllahir ?></td>
         </tr>
         <tr>
           <td>Pekerjaan&nbsp;</td>
           <td>&nbsp;:&nbsp;</td>
           <td>&nbsp;<?= $nilai->pekerjaan?></td>
         </tr>
         <tr>
           <td>Alamat&nbsp;</td>
           <td>&nbsp;:&nbsp;</td>
           <td>&nbsp;<?= $nilai->alamat?></td>
         </tr>
       </table><br>
       <span style="font-size: 18px;">Hasil evaluasi telah memenuhi persyaratan mengemudi kendaraan bermotor dengan Surat Izin Mengemudi (SIM) Golongan "A" (Pemula)</span> <br/></br>
       <span style="font-size: 18px;">Pontianak, <?= $tanggal ?></span> <br>
       <span style="font-size: 18px;" >Ketua</span> <br><br><br>
       <span style="font-size: 18px;">Danang</span>
     </div>
   </div>
   <br>
 </div>
</section>

<section class="invoice">
  <div class="row">
    <br><br><br><br>
    <table class="table" style="font-size: 20px;">
      <th>No.</th>
      <th>Materi Keterampilan</th>
      <th>Nilai</th>
      <tr>
        <td>A</td>
        <td>Teori</td>
        <td></td>
      </tr>
      <tr>
        <td>1</td>
        <td>Undang-Undang Lalu Lintas dan Angkutan Jalan</td>
        <td><?= $nilai->uullaj ?></td>
      </tr>
      <tr>
        <td>2</td>
        <td>Pengetauhan Dasar Kendaraan Bermomtor</td>
        <td><?= $nilai->pdkb ?></td>
      </tr>
      <tr>
        <td>3</td>
        <td>Tata Tertib dan Sopan Santun Berlalu-lintas</td>
        <td><?= $nilai->ttssb ?></td>
      </tr>
      <tr>
        <td>B</td>
        <td>Praktek</td>
        <td></td>
      </tr>
      <tr>
        <td>1</td>
        <td>Mengemudi Ranmor di Lapangan Praktik</td>
        <td><?= $nilai->mrlp ?></td>
      </tr>
      <tr>
        <td>2</td>
        <td>Mengemudi Ranmor di Jalan Raya</td>
        <td><?= $nilai->mrjr ?></td>
      </tr>
      <tr>
        <td>3</td>
        <td>Perawatan Kendaraan Bermotor</td>
        <td><?= $nilai->pkb ?></td>
      </tr>
      <tr>
        <td></td>
        <td>Jumlah</td>
        <td><?= $nilai->jumlah?></td>
      </tr>
    </table>
    <br>
  </div>
</section>

<div class="modal fade" id="upload">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Upload Hasil Scan</h4>
        </div>
        <form method="post" action="<?= base_url().'sertifikat/upload'?>" enctype="multipart/form-data">
          <div class="modal-body">
            <?php if ($sertifikat->scan != null): ?>
              <div class="thumbnail">
                <img src="<?= base_url('assets/img/sertifikat/').$sertifikat->scan?>" height="500px" width="500px" class='img-square'>
              </div>
              <?php else: ?>
                <p>Belum ada data terupload. Upload Data Scan?</p>
              <?php endif ?>
              <input type="hidden" name="id_sertifikat" value="<?= $sertifikat->id_sertifikat?>">
              <div class="form-group">
                <label for="foto">Hasil Scan</label>
                <input type="file" required="" name="foto">
              </div> 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary pull-right">Simpan</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="finally">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Upload Berhasil</h4>
            </div>
            <div class="modal-body">
              <p>Upload Berhasil</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>