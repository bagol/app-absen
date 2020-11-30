<div class="card mb-4">
  <div class="card-header">
      <i class="fas fa-table mr-1"></i>
      Data Shift
  </div>
  <div class="card-body">
      <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                  <tr>
                      <th>NO</th>
                      <th>Shift</th>
                      <th>Jam Masuk</th>
                      <th>Jam Keluar</th>
                      <th>Aksi</th>
                  </tr>
              </thead>
              <tfoot>
                  <tr>
                  <th>NO</th>
                      <th>Shift</th>
                      <th>Jam Masuk</th>
                      <th>Jam Keluar</th>
                      <th>Aksi</th>
                  </tr>
              </tfoot>
              <tbody>
                <?php $no = 1;foreach ($shifts as $shift): ?>
                  <tr>
                    <td><?=$no++ ?></td>
                    <td><?=$shift['shift'] ?></td>
                    <td><?=$shift['jam_masuk'] ?></td>
                    <td><?=$shift['jam_keluar'] ?></td>
                    <td><a href="<?=base_url("Shift/show/") ?><?=$shift['id'] ?>" class="btn btn-success"> <i class="fa fa-search"></i> View</a></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
          </table>
      </div>
  </div>
</div>
