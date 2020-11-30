
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
        Form Pengguna
      </div>
      <div class="card-body">
        <form action="<?=base_url("Shift/create") ?>" enctype="multipart/form-data" method="post">
          <div class="form-group">
            <label for="nama_shift">Nama Shift</label>
            <input type="text" name="shift" class="form-control" id="nama_shift" placeholder="Masukan Nama Shift" required>
          </div>
          <div class="form-group">
            <label for="Jam_Masuk">Jam Masuk</label>
            <input type="time" name="jam_masuk" class="form-control" id="Jam_Masuk" placeholder="Masukan Jam Masuk" required>
          </div>
          <div class="form-group">
            <label for="JamKeluar">Jam Keluar</label>
            <input type="time" name="jam_keluar" class="form-control" id="JamKeluar" placeholder="Masukan Jam Keluar" required>
          </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
