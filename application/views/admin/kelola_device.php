<div class="card mb-4">
  <div class="card-header">
      <i class="fas fa-table mr-1"></i>
      Data Perangkat
  </div>
  <div class="card-body">
      <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                  <tr>
                      <th>NO</th>
                      <th>Nama Perangkat</th>
                      <th>Lokasi Perangkat</th>
                      <th>Aksi</th>
                  </tr>
              </thead>
              <tfoot>
                  <tr>
                      <th>NO</th>
                      <th>Nama Perangkat</th>
                      <th>Lokasi Perangkat</th>
                      <th>Aksi</th>
                  </tr>
              </tfoot>
              <tbody>
                <?php $no = 1;foreach ($devices as $device): ?>
                  <tr class="text-center">
                    <td><?=$no++ ?></td>
                    <td><?=$device['nama'] ?></td>
                    <td><?=$device['lokasi'] ?></td>
                    <td>
                      <button class="btn btn-success" data-toggle="modal" data-target="#edit<?=$device['id'] ?>"> <i class="fa fa-edit"></i> Edit</button>
                      <button class="btn btn-danger" data-toggle="modal" data-target="#hapus<?=$device['id'] ?>"> <i class="fa fa-trash"></i> hapus</button>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
          </table>
      </div>
  </div>
</div>
