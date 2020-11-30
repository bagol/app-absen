
<!-- Modal Hapus -->
<?php foreach ($devices as $he): ?>
<div class="modal fade" id="hapus<?=$he['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Anda yakin ingin menghapus Device <b><?=$he['nama'] ?></b>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
        <form action="<?=base_url("device/delete/") ?><?=$he['id'] ?>">
        <button type="submit" class="btn btn-success">Iya</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>


<!-- Modal Edit -->
<?php foreach ($devices as $de): ?>
<div class="modal fade" id="edit<?=$de['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Data Pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?=base_url("Device/update/") ?><?=$de['id'] ?>" method="post">
        <div class="form-group">
            <label for="nama_perangkat">Nama Perangkat</label>
            <input type="text" name="nama" value="<?=$de['nama'] ?>" class="form-control" id="nama_perangkat" placeholder="Masukan Nama Perangkat">
          </div>
          <div class="form-group">
            <label for="lokasi">Lokasi</label>
            <input type="text" name="lokasi" class="form-control" value="<?=$de['lokasi'] ?>" id="lokasi" placeholder="Masukan Lokasi Perangkat" >
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
<?php endforeach; ?>