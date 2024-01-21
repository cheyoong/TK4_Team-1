<?php
include "config.php";

if (isset($_POST['submit'])) {
    //   echo "masuk";die;
    // Ambil data dari formulir
    $idpengguna = $_POST['idpengguna'];
    $namapengguna = $_POST['namapengguna'];
    $password = $_POST['password'];
    $namadepan = $_POST['namadepan'];
    $namabelakang = $_POST['namabelakang'];
    $nohp = $_POST['nohp'];
    $alamat = $_POST['alamat'];
    $idakses = $_POST['idakses'];

    // Panggil fungsi insert_barang dengan data yang diterima dari formulir
    insert_pengguna($idpengguna, $namapengguna, $password, $namadepan, $namabelakang, $nohp, $alamat, $idakses);

    // Setelah operasi insert selesai, bisa diarahkan kembali ke halaman yang diinginkan
    header("Location: pengguna.php");
    exit();
}

// Check if delete_id parameter is set in the URL
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Call the delete_data_pengguna function to delete the user
    if (delete_data_pengguna($delete_id)) {
        // Redirect to the same page after deletion
        header("Location: pengguna.php");
        exit();
    } else {
        echo "Error deleting user.";
        // Handle error scenario
    }
}

if (isset($_GET['get_user_by_id'])) {
    $userId = $_GET['get_user_by_id'];
    $userById = get_pengguna_byid($userId);

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
    $idpengguna = $_POST['idpengguna'];
    $namapengguna = $_POST['namapengguna'];
    $password = $_POST['password'];
    $namadepan = $_POST['namadepan'];
    $namabelakang = $_POST['namabelakang'];
    $nohp = $_POST['nohp'];
    $alamat = $_POST['alamat'];
    $idakses = $_POST['idakses'];

    // Panggil fungsi insert_barang dengan data yang diterima dari formulir
    update_pengguna($idpengguna, $namapengguna, $password, $namadepan, $namabelakang, $nohp, $alamat, $idakses);

    // Setelah operasi insert selesai, bisa diarahkan kembali ke halaman yang diinginkan
    header("Location: pengguna.php");
    exit();
}


// Fungsi insert_barang
function insert_pengguna($idpengguna, $namapengguna, $password, $namadepan, $namabelakang, $nohp, $alamat, $idakses)
{
    global $conn;
    $sql = "INSERT INTO pengguna VALUES ('$idpengguna', '$namapengguna', '$password', '$namadepan', '$namabelakang','$nohp','$alamat','$idakses')";
    $result = $conn->query($sql);
    return $result;
}

function get_pengguna_byid($userId)
{
    global $conn;
    $sql = "SELECT * FROM pengguna where idpengguna = '$userId'";
    $result = $conn->query($sql);
    return $result->fetch_assoc(); // Fetch a single row as an associative array
}

function get_data_pengguna()
{
    global $conn;
    $sql = "SELECT * FROM pengguna";
    $result = $conn->query($sql);
    return $result;
}

function delete_data_pengguna($idpengguna)
{
    global $conn;
    $sql = "DELETE FROM pengguna where idpengguna = '$idpengguna'";
    $result = $conn->query($sql);
    return $result;
}

function update_pengguna($idpengguna, $namapengguna, $password, $namadepan, $namabelakang, $nohp, $alamat, $idakses)
{
    global $conn;
    $sql = "UPDATE 
                pengguna 
            SET namapengguna = '$namapengguna', 
                password = '$password', 
                namadepan = '$namadepan', 
                namabelakang = '$namabelakang', 
                nohp = '$nohp', 
                alamat = '$alamat' 
            WHERE idpengguna = '$idpengguna'";
    $result = $conn->query($sql);
    return $result;
}
?>