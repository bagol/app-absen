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
        Anda yakin ingin menghapus shift <b><?=$shift[0]['shift'] ?></b>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
        <form action="<?=base_url("Shift/delete/") ?><?=$shift[0]['id'] ?>">
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
        <form action="<?=base_url("Shift/update/") ?><?=$shift[0]['id'] ?>" method="post">
        <div class="form-group">
          <label for="shift">Nama shift</label>
          <input type="text" name="shift" value="<?=$shift[0]['shift'] ?>" class="form-control" id="shift" aria-describedby="shift">
        </div>
        <div class="form-group">
          <label for="jam_masuk">Jam Masuk</label>
          <input type="text" name="jam_masuk" value="<?=$shift[0]['jam_masuk'] ?>" class="form-control" id="jam_masuk" aria-describedby="jam_masuk">
        </div>
        <div class="form-group">
          <label for="jam_keluar">jam_keluar</label>
          <input type="text" name="jam_keluar" value="<?=$shift[0]['jam_keluar'] ?>" class="form-control" id="jam_keluar" aria-describedby="jam_keluar">
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