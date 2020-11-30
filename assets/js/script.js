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

  // getQr("test");
  $.get("Device/getUniqCode", function (data) {
    let hasil = JSON.parse(data);
    hasil = parseInt(hasil.id) + 1;
    console.log(hasil);
    // let tampil =
    //   document.getElementById("id_device").value + "-" + hasil.toString();
    getQr(hasil.toString());
  });

  function updateQr() {
    $.get("Device/getUniqCode", function (data) {
      let hasil = JSON.parse(data);
      hasil = parseInt(hasil.id) + 1;
      // let tampil =
      //   document.getElementById("id_device").value + "-" + hasil.toString();
      // console.log("qr berhasil di update");
      qr.makeCode(hasil.toString());
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
      updateQr();
    }
  });
});
