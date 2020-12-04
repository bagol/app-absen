<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
        Rekap Laporan Pegawai
      </div>
      <div class="card-body">
      <form action="<?=base_url("Presensi/detailAbsen/") ?>" method="post"></form>
        <div class="row">
          <div class="col-sm-10">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="periode">Bulan</label>
              </div>
              <select class="custom-select" name="bulan" id="periode">
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
              </select>
            </div>
          </div>
            <div class="col-sm-2"><button id="cari" type="submit" class="btn btn-primary "> <i class="fa fa-search"></i>Cari</button></div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row mt-2">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-boddy">
      <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th>Device</th>
                    </tr>
                </thead>
                <tbody id="tdata">
                      <?php if ($datas == []) { ?>
                        <tr>
                            <th colspan="7" id="keterangan" class="text-center">Tidak Ada data </th>
                            <td style="display:none"></td>
                            <td style="display:none"></td>
                            <td style="display:none"></td>
                            <td style="display:none"></td>
                            <td style="display:none"></td>
                            <td style="display:none"></td>
                        </tr>
                      <?php } ?>
                      <?php $i = 0;foreach ($datas as $data): ?>
                        <tr>
                          <td><?=++$i ?></td>
                          <td><?=$data['username'] ?></td>
                          <td><?=$data['tanggal'] ?></td>
                          <td><?=$data['jam'] ?></td>
                          <td><?=$data['status'] ?></td>
                          <td><?=$data['keterangan'] ?></td>
                          <td><?=$data['nama'] ?></td>
                        </tr>
                      <?php endforeach; ?>
                      <tr>
                        <th colspan="7" id="keterangan" class="text-center">Laporan : </th>
                        <td style="display:none"></td>
                        <td style="display:none"></td>
                        <td style="display:none"></td>
                        <td style="display:none"></td>
                        <td style="display:none"></td>
                        <td style="display:none"></td>
                    </tr>
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>

