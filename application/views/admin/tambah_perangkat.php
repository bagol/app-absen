
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
        Form Pengguna
      </div>
      <div class="card-body">
        <form action="<?=base_url("Device/create") ?>" enctype="multipart/form-data" method="post">
          <div class="form-group">
            <label for="nama_perangkat">Nama Perangkat</label>
            <input type="text" name="nama" class="form-control" id="nama_perangkat" placeholder="Masukan Nama Perangkat" required>
            <?=form_error('nama'); ?>
          </div>
          <div class="form-group">
            <label for="lokasi">Lokasi</label>
            <input type="text" name="lokasi" class="form-control" id="lokasi" placeholder="Masukan Lokasi Perangkat" required>
            <?=form_error('lokasi'); ?>
          </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
