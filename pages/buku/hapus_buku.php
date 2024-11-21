<?php
include "../../conf/conn.php";
$id = $_GET['id'];

// Hapus referensi di tabel 'pasok' terlebih dahulu
$query_pasok = "DELETE FROM pasok WHERE id_buku = '$id'";
if ($koneksi->query($query_pasok)) {
    // Jika berhasil menghapus dari tabel 'pasok', lanjutkan menghapus dari tabel 'buku'
    $query_buku = "DELETE FROM buku WHERE id_buku = '$id'";
    if ($koneksi->query($query_buku)) {
        // redirect ke halaman index.php
        header("location: ../../index.php?page=data_buku");
    } else {
        // pesan error gagal menghapus data dari tabel 'buku'
        echo "Data Gagal Dihapus dari tabel 'buku' !!!";
    }
} else {
    // pesan error gagal menghapus data dari tabel 'pasok'
    echo "Data Gagal Dihapus dari tabel 'pasok' !!!";
}
?>
