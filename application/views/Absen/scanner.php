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

<script>
window.addEventListener("DOMContentLoaded", () => {
  let scanner = new Instascan.Scanner({
    video: document.getElementById("preview"),
    mirror: false,
  });
  scanner.addListener("scan", function (content) {
    alert(content);
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
});
</script>
