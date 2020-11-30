<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
        Detail Shift
      </div>
      <div class="card-body">
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <table class="table">
                <tr>
                  <th>Nama Shift</th>
                  <td> :</td>
                  <td><?=$shift[0]['shift'] ?></td>
                </tr>
                <tr>
                  <th>Jam Masuk</th>
                  <td> :</td>
                  <td><?=$shift[0]['jam_masuk'] ?></td>
                </tr>
                <tr>
                  <th>Jam Keluar</th>
                  <td> :</td>
                  <td><?=$shift[0]['jam_keluar'] ?></td>
                </tr>
              </table>
            </div>
          </div>
      </div>
      <div class="card-footer">
        <button class="btn btn-success" data-toggle="modal" data-target="#edit"><i class="fa fa-edit"></i> Edit</button>
        <button class="btn btn-danger" data-toggle="modal" data-target="#hapus"><i class="fa fa-trash" ></i> Hapus</button>
      </div>
    </div>
  </div>
</div>
