<?php
include "config.php";

if (isset($_POST['submit'])) {
    //   echo "masuk";die;
    // Ambil data dari formulir
    $idsupplier = $_POST['idsupplier'];
    $namasupplier = $_POST['namasupplier'];
    $alamatsupplier = $_POST['alamatsupplier'];
    $notelpsupplier = $_POST['notelpsupplier'];
    $emailsupplier = $_POST['emailsupplier'];
    $idbarang = $_POST['idbarang'];

    // Panggil fungsi insert_barang dengan data yang diterima dari formulir
    insert_supplier($idsupplier, $namasupplier, $alamatsupplier, $notelpsupplier, $emailsupplier,$idbarang);

    // Setelah operasi insert selesai, bisa diarahkan kembali ke halaman yang diinginkan
    header("Location: supplier.php");
    exit();
}

// Check if delete_id parameter is set in the URL
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Call the delete_data_pengguna function to delete the user
    if (delete_data_barang($delete_id)) {
        // Redirect to the same page after deletion
        header("Location: barang.php");
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
    $idsupplier = $_POST['idsupplier'];
    $namasupplier = $_POST['namasupplier'];
    $alamatsupplier = $_POST['alamatsupplier'];
    $notelpsupplier = $_POST['notelpsupplier'];
    $emailsupplier = $_POST['emailsupplier'];
    $idbarang = $_POST['idbarang'];

    // Panggil fungsi insert_barang dengan data yang diterima dari formulir
    update_supplier($idsupplier, $namasupplier, $alamatsupplier, $notelpsupplier, $emailsupplier,$idbarang);

    // Setelah operasi insert selesai, bisa diarahkan kembali ke halaman yang diinginkan
    header("Location: supplier.php");
    exit();
}


// Fungsi insert_barang
function insert_supplier($idsupplier, $namasupplier, $alamatsupplier, $notelpsupplier, $emailsupplier,$idbarang)
{
    global $conn;
    $sql = "INSERT INTO supplier VALUES ('$idsupplier', '$namasupplier', '$alamatsupplier', '$notelpsupplier', '$emailsupplier','$idbarang')";
    $result = $conn->query($sql);
    return $result;
}

function get_barang_byid($userId)
{
    global $conn;
    $sql = "SELECT * FROM supplier where idsupplier = '$userId'";
    $result = $conn->query($sql);
    return $result->fetch_assoc(); // Fetch a single row as an associative array
}

function get_data_supplier()
{
    global $conn;
    $sql = "SELECT * FROM supplier";
    $result = $conn->query($sql);
    return $result;
}

function delete_data_barang($idpengguna)
{
    global $conn;
    $sql = "DELETE FROM barang where idbarang = '$idpengguna'";
    $result = $conn->query($sql);
    return $result;
}

function update_supplier($idsupplier, $namasupplier, $alamatsupplier, $notelpsupplier, $emailsupplier,$idbarang)
{
    global $conn;
    $sql = "UPDATE 
                supplier 
            SET namasupplier = '$namasupplier', 
                alamatsupplier = '$alamatsupplier', 
                notelpsupplier = '$notelpsupplier', 
                emailsupplier = '$emailsupplier',
                idbarang = '$idbarang'
            WHERE idsupplier = '$idsupplier'";
    // echo $sql;die;
    $result = $conn->query($sql);
    return $result;
}
?>