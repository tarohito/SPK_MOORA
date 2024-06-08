$(document).ready(function () {
  // Menampilkan modal saat dokumen siap
  $("#editModal").modal("show");

  // Tangani submit form edit
  $("#editForm").submit(function (event) {
    event.preventDefault(); // Menghentikan aksi default form

    // Lakukan validasi atau manipulasi form (opsional)

    // Kirim form menggunakan AJAX
    $.ajax({
      type: "POST",
      url: $(this).attr("action"),
      data: $(this).serialize(), // Serialize data form
      success: function (response) {
        // Tanggapan dari server (opsional)
        // Misalnya, periksa apakah perubahan berhasil

        // Tutup modal setelah berhasil
        $("#editModal").modal("hide");

        // Redirect atau tampilkan pesan sukses (sesuai kebutuhan)
        window.location.href = "<?= base_url(data_karyawan) ?>";
      },
      error: function (xhr, status, error) {
        // Tangani kesalahan (opsional)
        console.error(xhr.responseText);
        // Tampilkan pesan error (opsional)
      },
    });
  });
});
