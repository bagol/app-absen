window.addEventListener("DOMContentLoaded", () => {
  let qr = "";
  let getQr = (data) => {
    qr = new QRCode(document.getElementById("qrcode"), {
      text: data,
      width: 300,
      height: 300,
      class: "qr",
    });
  };

  $.get("Device/getUniqCode", function (data) {
    let hasil = JSON.parse(data);
    hasil = parseInt(hasil.id) + 1;

    let tampil =
      document.getElementById("device-id").value + "-" + hasil.toString();
    console.log(tampil);
    getQr(tampil);
  });

  function updateQr() {
    $.get("Device/getUniqCode", function (data) {
      let hasil = JSON.parse(data);
      hasil = parseInt(hasil.id) + 1;
      let tampil =
        document.getElementById("device-id").value + "-" + hasil.toString();
      console.log("qrcode di update");
      qr.makeCode(tampil);
    });
  }

  Pusher.logToConsole = true;

  var pusher = new Pusher("089f7eee4e4c00a7142f", {
    cluster: "ap1",
  });

  var channel = pusher.subscribe("absen");
  channel.bind("my-event", function (data) {
    if (data.status == "update") {
      console.log("di update " + data);
      console.log("terupdate");
      updateQr();
    }
  });
});
