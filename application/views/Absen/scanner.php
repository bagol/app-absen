<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
        Scanner Absen
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="container">
              <video id="preview" width="100%" height="85%"></video>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
<script src="<?=base_url("assets/js/instascan.min.js") ?>"></script>
<script>
window.addEventListener("DOMContentLoaded", () => {
  let scanner = new Instascan.Scanner({
    video: document.getElementById("preview"),
    mirror: false,
  });
  scanner.addListener("scan", function (content) {
    let code = content.split("-");
    absen(code[0]);
  });
  Instascan.Camera.getCameras()
    .then(function (cameras) {
      if (cameras.length > 0) {
        scanner.start(cameras[1]);
      } else {
        console.error("No cameras found.");
      }
    })
    .catch(function (e) {
      console.error("terjadi kesalahan :" + e);
    });

    const absen = (device1) => {
      const base_url = `<?=base_url("Presensi/absen/") ?><?=$shift ?>`;
      fetch(base_url,{
					method : 'POST',
					headers : {
						'Content-type' : 'application/json'
					},
					body : JSON.stringify({'device' : device1,'nik':<?=$this->session->userdata("nik") ?>})
				}
			)
			.then(res => res.text())
			.then(teks => alert(teks))
			.catch(err => alert(err));
    }
});
</script>
