// Logic pengisian input peminjaman buku secara otomatis
function setReturnDate() {
  let borrowDate = new Date(document.getElementById("tgl_peminjaman").value);
  let returnDate = new Date(borrowDate);
  returnDate.setDate(borrowDate.getDate() + 7);

  // Format tanggal pengembalian ke format yyyy-mm-dd
  let formattedDate = returnDate.toISOString().split("T")[0];

  document.getElementById("tgl_pengembalian").value = formattedDate;
}

// Logic perhitungan denda dan keterlambatan pengembalian buku secara otomatis
function hitungDenda() {
  const tglPengembalian = new Date(
    document.getElementById("tgl_pengembalian").value
  );
  const bukuKembali = new Date(document.getElementById("buku_kembali").value);
  const keterlambatan = document.getElementById("keterlambatan");
  const denda = document.getElementById("denda");

  if (bukuKembali > tglPengembalian) {
    keterlambatan.value = "Ya";
    denda.value = 10000; // Denda 10.000 jika terlambat
  } else {
    keterlambatan.value = "Tidak";
    denda.value = 0;
  }
}

// Panggil fungsi hitungDenda saat halaman dimuat
window.onload = function () {
  hitungDenda();
};

// Panggil fungsi hitungDenda saat halaman dimuat
window.onload = function () {
  hitungDenda();
};
