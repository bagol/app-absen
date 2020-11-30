<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
        Form Pengguna
      </div>
      <div class="card-body">
        <form action="<?=base_url("user/create") ?>" enctype="multipart/form-data" method="post">
          <div class="form-group">
            <label for="NIK">NIK</label>
            <input type="text" name="nik" class="form-control" id="NIK" placeholder="Masukan NIK" maxlength="16" value="<?=set_value("nik") ?>" required>
            <?=form_error('nik'); ?>
          </div>
          <div class="form-group">
            <label for="Username">Username</label>
            <input type="text" name="username" value="<?=set_value("username") ?>" class="form-control" id="Username" placeholder="Masukan Username" required>
            <?=form_error("username"); ?>
          </div>
          <div class="form-group">
            <label for="Password">Password</label>
            <input type="password" name="password" class="form-control" id="Password" placeholder="Masukan Password" minlength="6" required>
            <?=form_error('password'); ?>
          </div>
          <div class="form-group">
            <label for="Email">Email</label>
            <input type="Email" name="email" class="form-control" id="Email" value="<?=set_value("email") ?>" placeholder="Masukan Email" required>
            <?=form_error('email'); ?>
          </div>
          <div class="form-group">
            <label for="No Telpon">No Telpon</label>
            <input value="<?=set_value("no_telp") ?>" type="text" name="no_telp" class="form-control" id="No Telpon" placeholder="Masukan No Telpon" maxlength="13" minlength="12" required>
            <?=form_error('no_telp'); ?>
          </div>
          <div class="form-group">
            <label for="Level">Level</label>
            <select class="form-control" name="level" id="Level">
              <option value="admin">Admin</option>
              <option value="karyawan">Karyawan</option>
            </select>
          </div>
          <div class="form-group">
            <label for="Gambar">Gambar</label> <br>
            <input type="file" name="gambar" id="gambar"  accept="image/jpeg,image/png" required>
          </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
