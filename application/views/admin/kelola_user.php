<div class="card mb-4">
  <div class="card-header">
      <i class="fas fa-table mr-1"></i>
      Data Pengguna
  </div>
  <div class="card-body">
      <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                  <tr>
                      <th>NIK</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>No Telpon</th>
                      <th>Level</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tfoot>
                  <tr>
                      <th>NIK</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>No Telpon</th>
                      <th>Level</th>
                      <th>Action</th>
                  </tr>
              </tfoot>
              <tbody>
                <?php foreach ($users as $user): ?>
                  <tr>
                    <td><?=$user['nik'] ?></td>
                    <td><?=$user['username'] ?></td>
                    <td><?=$user['email'] ?></td>
                    <td><?=$user['no_telp'] ?></td>
                    <td><?=$user['level'] ?></td>
                    <td><a href="<?=base_url("User/show/") ?><?=$user['nik'] ?>" class="btn btn-success"> <i class="fa fa-search"></i> View</a></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
          </table>
      </div>
  </div>
</div>
