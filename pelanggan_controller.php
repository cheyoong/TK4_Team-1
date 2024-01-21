<?php
include "config.php";

if (isset($_POST['submit'])) {
    //   echo "masuk";die;
    // Ambil data dari formulir
    $idpelanggan = $_POST['idpelanggan'];
    $namapelanggan = $_POST['namapelanggan'];
    $alamatpelanggan = $_POST['alamatpelanggan'];
    $notelppelanggan = $_POST['notelppelanggan'];
    $emailpelanggan = $_POST['emailpelanggan'];
    $idpenjualan = $_POST['idpenjualan'];

    // Panggil fungsi insert_barang dengan data yang diterima dari formulir
    insert_pelanggan($idpelanggan, $namapelanggan, $alamatpelanggan, $notelppelanggan, $emailpelanggan,$idpenjualan);

    // Setelah operasi insert selesai, bisa diarahkan kembali ke halaman yang diinginkan
    header("Location: pelanggan.php");
    exit();
}

// Check if delete_id parameter is set in the URL
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Call the delete_data_pengguna function to delete the user
    if (delete_data_barang($delete_id)) {
        // Redirect to the same page after deletion
        header("Location: pelanggan.php");
        exit();
    } else {
        echo "Error deleting user.";
        // Handle error scenario
    }
}

if (isset($_GET['get_user_by_id'])) {
    $userId = $_GET['get_user_by_id'];
    $userById = get_barang_byid($userId);

    if ($userById) {
        echo json_encode(['success' => true, 'data' => $userById]);
        exit();
    } else {
        echo json_encode(['success' => false]);
        exit();
    }
}

if (isset($_POST['update'])) {
    //   echo "masuk";die;
    // Ambil data dari formulir
    $idpelanggan = $_POST['idpelanggan'];
    $namapelanggan = $_POST['namapelanggan'];
    $alamatpelanggan = $_POST['alamatpelanggan'];
    $notelppelanggan = $_POST['notelppelanggan'];
    $emailpelanggan = $_POST['emailpelanggan'];
    $idpenjualan = $_POST['idpenjualan'];
    // Panggil fungsi insert_barang dengan data yang diterima dari formulir
    update_pelanggan($idpelanggan, $namapelanggan, $alamatpelanggan, $notelppelanggan, $emailpelanggan,$idpenjualan);

    // Setelah operasi insert selesai, bisa diarahkan kembali ke halaman yang diinginkan
    header("Location: pelanggan.php");
    exit();
}


// Fungsi insert_barang
function insert_pelanggan($idpelanggan, $namapelanggan, $alamatpelanggan, $notelppelanggan, $emailpelanggan,$idpenjualan)
{
    global $conn;
    $sql = "INSERT INTO pelanggan VALUES ('$idpelanggan', '$namapelanggan', '$alamatpelanggan', '$notelppelanggan', '$emailpelanggan','$idpenjualan')";
    $result = $conn->query($sql);
    return $result;
}

function get_barang_byid($userId)
{
    global $conn;
    $sql = "SELECT * FROM pelanggan where idpelanggan = '$userId'";
    $result = $conn->query($sql);
    return $result->fetch_assoc(); // Fetch a single row as an associative array
}

function get_data_pelanggan()
{
    global $conn;
    $sql = "SELECT * FROM pelanggan";
    $result = $conn->query($sql);
    return $result;
}

function delete_data_barang($idpengguna)
{
    global $conn;
    $sql = "DELETE FROM pelanggan where idpelanggan = '$idpengguna'";
    $result = $conn->query($sql);
    return $result;
}

function update_pelanggan($idpelanggan, $namapelanggan, $alamatpelanggan, $notelppelanggan, $emailpelanggan,$idpenjualan)
{
    global $conn;

    $sql = "UPDATE 
                pelanggan 
            SET namapelanggan = '$namapelanggan', 
                alamatpelanggan = '$alamatpelanggan', 
                notelppelanggan = '$notelppelanggan', 
                emailpelanggan = '$emailpelanggan',
                idpenjualan = '$idpenjualan'
            WHERE idpelanggan = '$idpelanggan'";
    $result = $conn->query($sql);
    return $result;
}
?>