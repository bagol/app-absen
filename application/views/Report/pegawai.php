<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
        Rekap Laporan Pegawai
      </div>
      <div class="card-body">
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
          <div class="col-sm-2">
            <button id="cari" class="btn btn-primary"> <i class="fa fa-search"></i> Cari</button>
          </div>
        </div>
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
                <tfoot>
                    <tr>
                    <th>NO</th>
                        <th>Nama Pegawai</th>
                        <th>Jumlah Kehadiran</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody id="tdata">

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
      const tdata = document.querySelector("#tdata");
      const kosong = () => {
        return `
          <tr>
            <td colspan="4"> <div class="alert alert-warning text-center">Data Tidak Ada</div></td>
            <td style="display:none;"></td>
            <td style="display:none;"></td>
            <td style="display:none;"></td>
          </tr>
      `;
      }
      const bulan = `
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="periode">Bulan</label>
              </div>
              <select class="custom-select" id="bulan">
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
            <input type="date" class="form-control" id="awal" aria-label="Sizing example input" aria-describedby="inputGroup-tanggal-awal">
          </div>
        </div>
        <div class="col-md-6 col-sm-12">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-tanggal-akhir">Tanggal akhir</span>
            </div>
            <input type="date" class="form-control" id="akhir" aria-label="Sizing example input" aria-describedby="inputGroup-tanggal-akhir">
          </div>
        </div>
      </div>
      `;
      periode.addEventListener("change",()=> {
        if(periode.value === "Bulan"){
          pilih.style.display = 'block';
          tampil.innerHTML = bulan;
        }else if(periode.value === "Tanggal"){
          pilih.style.display = 'block';
          tampil.innerHTML = tanggal;
        }else{
          pilih.style.display = 'none';
          tampil.innerHTML = "";
        }
      })

      const report = (base_url,data = null) => {
        if(data === null){
          return fetch(base_url,{
              method : 'GET',
              headers : {
                'Content-type' : 'application/json'
              }
            }
          )
        }else{
          return fetch(base_url,{
              method : 'POST',
              headers : {
                'Content-type' : 'application/json'
              },
              body : JSON.stringify(data)
            }
          )
        }
      }

      const url = `<?=base_url("Presensi/") ?>`;

      const status = (response) => {
        if (response.status !== 200) {
          console.log("Error : " + response.status);
          return Promise.reject(new Error(response.statusText));
        } else {
          return Promise.resolve(response);
        }
      }

      const cari = document.querySelector("#cari");
      cari.addEventListener("click",()=>{
        const bulan = document.querySelector("#bulan");
        if(periode.value === "Bulan"){
          report(url+"laporanBulan/"+bulan.value)
          .then(status)
          .then(res => res.json())
          .then(data => {
            if(data.length === 0){
              console.log("data tidak ada")
              tdata.innerHTML = kosong();
            }else{
              tampilData(data)

            }
          })
          .catch(err => console.log(err))
        }else if(periode.value === "Tanggal"){

        }else{
          report(url+"laporanBulan/"+`<?=date("m") ?>`)
          .then(status)
          .then(res => res.json())
          .then(data => {
            if(data.length === 0){
              console.log("data tidak ada")
              tdata.innerHTML = kosong();
            }else{
              tampilData(data)

            }
          })
          .catch(err => console.log(err))
        }
      })

      const tampilData = (data) => {
        let html = "";
        let i = 0;
        for(const isi in data){
            html += `
              <tr>
                <td>${++i}</td>
                <td>${data[isi].username}</td>
                <td>${data[isi].jumlah_hadir}</td>
                <td><a href="" class="btn btn-success"><i class="fa fa-search"></i>view</a></td>
                </tr>
            `;
        }
        tdata.innerHTML = html;
      }

      const bulanini = () => {
        report(url+"laporanBulan/"+`<?=date("m") ?>`)
          .then(status)
          .then(res => res.json())
          .then(data => {
            if(data.length === 0){
              console.log("data tidak ada")
              tdata.innerHTML = kosong();
            }else{
              tampilData(data)

            }
          })
          .catch(err => console.log(err))
      }

      bulanini();
  })

</script>
