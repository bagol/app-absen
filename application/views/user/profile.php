<div class="card mb-4">
  <div class="card-header">
      <i class="fas fa-user mr-1"></i>
      Profile <?=$this->session->userdata("username") ?>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-3 col-sm-12">
        <img src="<?=base_url("assets/images/profile/") ?><?=$user[0]['gambar'] ?>" class="img-fluid" alt="foto profile">
      </div>
      <div class="col-md-9 col-sm-12">
        <table class="table">
          <tr>
            <th width="150px">Nama</th>
            <td><?=$user[0]["username"] ?></td>
          </tr>
          <tr>
            <th width="150px">Email</th>
            <td><?=$user[0]["email"] ?></td>
          </tr>
          <tr>
            <th width="150px">No Telpon</th>
            <td><?=$user[0]["no_telp"] ?></td>
          </tr>
          <tr>
            <th width="150px">Jabatan</th>
            <td><?=$user[0]["level"] ?></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div class="card-footer">
    <button class="btn btn-info" data-toggle="modal" data-target="#ubahPassword"><i class="fa fa-key"></i> Ubah Password</button>
    <button class="btn btn-success" data-toggle="modal" data-target="#edit"><i class="fa fa-edit"></i> Suntting</button>
  </div>
</div>
