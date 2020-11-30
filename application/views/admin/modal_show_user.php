<!-- Modal Hapus -->
<div class="modal fade" id="hapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Anda yakin ingin menghapus <b><?=$user[0]['username'] ?></b>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
        <form action="<?=base_url("User/delete/") ?><?=$user[0]['nik'] ?>">
        <button type="submit" class="btn btn-success">Iya</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Data Pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?=base_url("User/update/") ?><?=$user[0]['nik'] ?>" enctype="multipart/form-data" method="post">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" name="username" value="<?=$user[0]['username'] ?>" class="form-control" id="username" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" name="email" value="<?=$user[0]['email'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

        </div>
        <div class="form-group">
          <label for="no_telp">No Telpon</label>
          <input type="text" name="no_telp" value="<?=$user[0]['no_telp'] ?>" class="form-control" id="no_telp" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <label for="Level">Level</label>
          <select class="form-control" name="level" id="Level">
            <option value="admin" <?=$user[0]['level'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
            <option value="karyawan" <?=$user[0]['level'] == 'karyawan' ? 'selected' : ''; ?>>Karyawan</option>
          </select>
        </div>
        <div class="form-group">
            <label for="Gambar">Gambar</label> <br>
            <input type="file" name="gambar" id="gambar" accept="image/jpeg,image/png" >
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
        <button type="submit" class="btn btn-success">Iya</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Resert -->
<div class="modal fade" id="reset" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reset Password Pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?=base_url("User/resetPassword/") ?><?=$user[0]['nik'] ?>" method="post">
          anda yakin ingin mereset password pengguna <b><?=$user[0]['username'] ?></b>
          <input type="hidden" name="email" value="<?=$user[0]['email'] ?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
        <button type="submit" class="btn btn-success">Iya</button>
        </form>
      </div>
    </div>
  </div>
</div>
