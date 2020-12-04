// Call the dataTables jQuery plugin
const url = window.location.pathname;
console.log(url);
if (url === "/app-absen/admin/kelola_user") {
  $(document).ready(function () {
    $("#dataTable").DataTable({
      dom: "Bfrtip",
      buttons: [
        {
          extend: "excelHtml5",
          exportOptions: {
            columns: [0, 1, 2, 3, 4],
          },
        },
        {
          extend: "pdfHtml5",
          exportOptions: {
            columns: [0, 1, 2, 3, 4],
          },
        },
      ],
    });
  });
} else if (url === "/app-absen/Presensi/detailAbsen/") {
  $(document).ready(function () {
    $("#dataTable").DataTable({
      dom: "Bfrtip",
      buttons: [
        {
          extend: "excelHtml5",
          exportOptions: {
            columns: [0, 1, 2, 3, 4, 5, 6],
          },
        },
        {
          extend: "pdfHtml5",
          exportOptions: {
            columns: [0, 1, 2, 3, 4, 5, 6],
          },
        },
      ],
    });
  });
} else {
  $(document).ready(function () {
    $("#dataTable").DataTable({
      dom: "Bfrtip",
      buttons: [
        {
          extend: "excelHtml5",
          exportOptions: {
            columns: [0, 1, 2],
          },
        },
        {
          extend: "pdfHtml5",
          exportOptions: {
            columns: [0, 1, 2],
          },
        },
      ],
    });
  });
}
