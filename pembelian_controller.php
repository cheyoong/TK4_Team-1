<?php
include "config.php";

if (isset($_POST['submit'])) {
    //   echo "masuk";die;
    // Ambil data dari formulir
    $idpembelian = $_POST['idpembelian'];
    $jumlahpembelian = $_POST['jumlahpembelian'];
    $hargabeli = $_POST['hargabeli'];
    $idbarang = $_POST['idbarang'];

    // Panggil fungsi insert_barang dengan data yang diterima dari formulir
    insert_pembelian($idpembelian, $jumlahpembelian, $hargabeli, $idbarang);

    // Setelah operasi insert selesai, bisa diarahkan kembali ke halaman yang diinginkan
    header("Location: pembelian.php");
    exit();
}

// Check if delete_id parameter is set in the URL
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Call the delete_data_pengguna function to delete the user
    if (delete_data_barang($delete_id)) {
        // Redirect to the same page after deletion
        header("Location: pembelian.php");
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
    $idpembelian = $_POST['idpembelian'];
    $jumlahpembelian = $_POST['jumlahpembelian'];
    $hargabeli = $_POST['hargabeli'];
    $idbarang = $_POST['idbarang'];

    // Panggil fungsi insert_barang dengan data yang diterima dari formulir
    update_pembelian($idpembelian, $jumlahpembelian, $hargabeli, $idbarang);

    // Setelah operasi insert selesai, bisa diarahkan kembali ke halaman yang diinginkan
    header("Location: pembelian.php");
    exit();
}


// Fungsi insert_barang
function insert_pembelian($idpembelian, $jumlahpembelian, $hargabeli, $idbarang)
{
    global $conn;
    $sql = "INSERT INTO pembelian VALUES ('$idpembelian', '$jumlahpembelian', '$hargabeli', '$idbarang')";
    $result = $conn->query($sql);
    return $result;
}

function get_barang_byid($userId)
{
    global $conn;
    $sql = "SELECT * FROM pembelian where idpembelian = '$userId'";
    $result = $conn->query($sql);
    return $result->fetch_assoc(); // Fetch a single row as an associative array
}

function get_data_pembelian()
{
    global $conn;
    $sql = "SELECT * FROM pembelian";
    $result = $conn->query($sql);
    return $result;
}

function delete_data_barang($idpengguna)
{
    global $conn;
    $sql = "DELETE FROM pembelian where idpembelian = '$idpengguna'";
    $result = $conn->query($sql);
    return $result;
}

function update_pembelian($idpembelian, $jumlahpembelian, $hargabeli, $idbarang)
{
    global $conn;

    $sql = "UPDATE 
                pembelian 
            SET jumlahpembelian = '$jumlahpembelian', 
                hargabeli = '$hargabeli', 
                idbarang = '$idbarang'
            WHERE idpembelian = '$idpembelian'";
    // echo $sql;die;
    $result = $conn->query($sql);
    return $result;
}
?>