<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
        Rekap Laporan Pegawai
      </div>
      <div class="card-body">
          <form action="<?=base_url("Presensi/laporanBulan") ?>" id="form" method="post" role="form">
        <div class="row">
          <div class="col-sm-10">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="periode">Periode</label>
              </div>
              <select class="custom-select" id="periode">
                <option>Bulan Ini</option>
                <option>Bulan</option>
                <option>Tanggal</option>
              </select>
            </div>
          </div>
            <div id="pilih" class="col-sm-10" style="display:none;"></div>
            <div class="col-sm-2"><button id="cari" class="btn btn-primary "> <i class="fa fa-search"></i>Cari</button></div>
        </div>
          </form>
    </div>
  </div>
</div>
</div>
<div class="row mt-2">
  <div class="col-sm-12 col-md-12 col xl-12">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama Pegawai</th>
                        <th>Jumlah Kehadiran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="tdata">
                    <?php $i = 0;foreach ($datas as $data): ?>
                      <tr>
                        <td><?=++$i ?></td>
                        <td><?=$data['username'] ?></td>
                        <td><?=$data['hadir'] ?></td>
                        <td>
                         <form action="<?=base_url("Presensi/detailAbsen/") ?>" method="post">
                         <input type="hidden" name="nik" value="<?=$data['nik'] ?>">
                         <input type="hidden" name="bulan" value="<?=date("m") ?>">
                          <button type="submit" class="btn btn-success">
                            <i class="fa fa-search"></i>view
                          </button>
                        </td>

                         </form>
                      </tr>
                    <?php endforeach ?>
                      <tr>
                        <th colspan="4" id="keterangan" class="text-center">Laporan : <?=$ket ?></th>
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
<script>
window.addEventListener("DOMContentLoaded",() =>{
      const periode = document.querySelector("#periode");
      const tampil= document.querySelector("#pilih");
      const form = document.querySelector("#form");
      const base_url = `<?=base_url("Presensi/") ?>`;
      const bulan = `
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="periode">Bulan</label>
              </div>
              <select class="custom-select" id="bulanan">
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maeret</option>
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
      `;
      const tanggal = `
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-tanggal-awal">Tanggal Awal</span>
            </div>
            <input type="date" class="form-control" id="awal" name="awal" aria-label="Sizing example input" aria-describedby="inputGroup-tanggal-awal">
          </div>
        </div>
        <div class="col-md-6 col-sm-12">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-tanggal-akhir">Tanggal akhir</span>
            </div>
            <input type="date" class="form-control" name="akhir" id="akhir" aria-label="Sizing example input" aria-describedby="inputGroup-tanggal-akhir">
          </div>
        </div>
      </div>
      `;
      periode.addEventListener("change",()=> {
        if(periode.value === "Bulan"){
          tampil.style.display = 'block';
          tampil.innerHTML = bulan;
          form.action = base_url+"laporanBulan/"+1;
          var bulanan = document.querySelector("#bulanan");
          bulanan.addEventListener("input",()=>{
            form.action = base_url+"laporanBulan/"+bulanan.value;
            console.log(form.action)
          })
          console.log(form.action)
        }else if(periode.value === "Tanggal"){
          console.log("tanggal")
          tampil.style.display = 'block';
          tampil.innerHTML = tanggal;
          form.action = base_url+"laporanPerTanggal/";
          console.log(form.action)
        }else{
          tampil.style.display = 'none';
          tampil.innerHTML = "";
          form.action = base_url+"laporanBulan/";
          console.log(form.action)
        }
      })

})
</script>
