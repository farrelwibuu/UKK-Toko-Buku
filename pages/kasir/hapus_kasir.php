<?php
include "../../conf/conn.php";
$id = $_GET['id'];

// Hapus referensi di tabel 'detail_penjualan' terlebih dahulu
$query_detail_penjualan = "DELETE FROM detail_penjualan WHERE id_penjualan IN (SELECT id_penjualan FROM penjualan WHERE id_kasir = '$id')";
if ($koneksi->query($query_detail_penjualan)) {
    // Jika berhasil menghapus dari tabel 'detail_penjualan', lanjutkan menghapus dari tabel 'penjualan'
    $query_penjualan = "DELETE FROM penjualan WHERE id_kasir = '$id'";
    if ($koneksi->query($query_penjualan)) {
        // Jika berhasil menghapus dari tabel 'penjualan', lanjutkan menghapus dari tabel 'kasir'
        $query_kasir = "DELETE FROM kasir WHERE id_kasir = '$id'";
        if ($koneksi->query($query_kasir)) {
            // Tampilkan pesan sukses dan redirect ke halaman data kasir
            echo '<script>
                alert("Data Berhasil Dihapus !!!");
                window.location.href="../../index.php?page=data_kasir";
            </script>';
        } else {
            // Tampilkan pesan error jika gagal menghapus data dari tabel 'kasir'
            echo '<script>
                alert("Data Gagal Dihapus dari tabel \'kasir\' !!!");
                window.location.href="../../index.php?page=data_kasir";
            </script>';
        }
    } else {
        // Tampilkan pesan error jika gagal menghapus data dari tabel 'penjualan'
        echo '<script>
            alert("Data Gagal Dihapus dari tabel \'penjualan\' !!!");
            window.location.href="../../index.php?page=data_kasir";
        </script>';
    }
} else {
    // Tampilkan pesan error jika gagal menghapus data dari tabel 'detail_penjualan'
    echo '<script>
        alert("Data Gagal Dihapus dari tabel \'detail_penjualan\' !!!");
        window.location.href="../../index.php?page=data_kasir";
    </script>';
}
?>
