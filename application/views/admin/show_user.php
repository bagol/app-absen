<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
        Detail Pengguna
      </div>
      <div class="card-body">
          <div class="row">
            <div class="col-md-3">
              <img src="<?=base_url("assets/images/profile/") ?><?=$user[0]['gambar'] ?>" alt="<?=$user[0]['username'] ?>" class="img-fluid rounded" alt="Responsive image">
            </div>
            <div class="col-md-9 table-responsive">
              <table class="table">
                <tr>
                  <th>NIK</th>
                  <td> </td>
                  <td> <?=$user[0]['nik'] ?></td>
                </tr>
                <tr>
                  <th>Username</th>
                  <td> </td>
                  <td> <?=$user[0]['username'] ?></td>
                </tr>
               <tr>
                  <th>Email</th>
                  <td> </td>
                  <td> <?=$user[0]['email'] ?></td>
                </tr>
                <tr>
                  <th>No Telpon</th>
                  <td> </td>
                  <td> <?=$user[0]['no_telp'] ?></td>
                </tr>
                <tr>
                  <th>Level</th>
                  <td> </td>
                  <td> <?=$user[0]['level'] ?></td>
                </tr>
              </table>
            </div>
          </div>
      </div>
      <div class="card-footer">
        <button class="btn btn-info" data-toggle="modal" data-target="#reset"><i class="fa fa-key"></i> Reset Password</button>
        <button class="btn btn-success" data-toggle="modal" data-target="#edit"><i class="fa fa-edit"></i> Edit</button>
        <button class="btn btn-danger" data-toggle="modal" data-target="#hapus"><i class="fa fa-trash" ></i> Hapus</button>
      </div>
    </div>
  </div>
</div>
