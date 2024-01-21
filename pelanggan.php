<?php
include "config.php";
require_once 'pelanggan_controller.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Forms - SB Admin</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.css" rel="stylesheet">

  <!-- Add custom CSS here -->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
</head>

<body>

  <div id="wrapper">

    <!-- Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Tugas Kelompok 4</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
          <li class="active"><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li><a href="pembelian.php"><i class="fa fa-bar-chart-o"></i> Pembelian</a></li>
          <li><a href="penjualan.php"><i class="fa fa-table"></i> Penjualan</a></li>
          <li><a href="pelanggan.php"><i class="fa fa-edit"></i> Pelanggan</a></li>
          <li><a href="supplier.php"><i class="fa fa-font"></i> Supplier</a></li>
          <li><a href="barang.php"><i class="fa fa-desktop"></i> Barang</a></li>
          <li><a href="pengguna.php"><i class="fa fa-wrench"></i> Pengguna</a></li>
      </div><!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

      <div class="row">
        <div class="col-lg-12">
          <h1>Forms Pelanggan<small>Enter Your Data</small></h1>
          <ol class="breadcrumb">
            <li><a href="index.html"><i class="fa fa-dashboard"></i> Pelanggan</a></li>
            <li class="active"><i class="fa fa-edit"></i> Forms</li>
          </ol>
        </div><!-- /.row -->

        <div class="col-lg-6">
          <h2>Data Pelanggan</h2>
          <div class="table-responsive">
            <button type="button" class="btn btn-default" id="btnTambahData">Tambah Data Baru</button>
            <table class="table table-bordered table-hover tablesorter" id="tableDataPelanggan">
              <thead>
                <tr>
                  <th class="text-center">Id Pelanggan</th>
                  <th class="text-center">Nama Pelanggan</th>
                  <th class="text-center">Alamat Pelanggan</th>
                  <th class="text-center">No Telp Pelanggan</th>
                  <th class="text-center">Email Pelanggan</th>
                  <th class="text-center">Id Penjualan</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // Panggil fungsi get_data dari barang_controller.php
                $barangData = get_data_pelanggan();

                // Loop through the data and populate the table rows
                if ($barangData->num_rows > 0) {
                  while ($row = $barangData->fetch_assoc()) {
                    echo "<tr>";
                    // Tampilkan data sesuai kolom
                    echo "<td>" . $row["idpelanggan"] . "</td>";
                    echo "<td>" . $row["namapelanggan"] . "</td>";
                    echo "<td>" . $row["alamatpelanggan"] . "</td>";
                    echo "<td>" . $row["notelppelanggan"] . "</td>";
                    echo "<td>" . $row["emailpelanggan"] . "</td>";
                    echo "<td>" . $row["idpenjualan"] . "</td>";
                    // ...
                    echo "<td><a class='btn btn-warning btn-sm' onclick='showEditForm(" . $row["idpelanggan"] . ")'>Edit</a></td>";
                    echo "<td><a href='pelanggan_controller.php?delete_id=" . $row["idpelanggan"] . "' class='btn btn-danger btn-sm' name='delete' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a></td>";
                    echo "</tr>";
                  }
                } else {
                  echo "<tr><td colspan='6'>No data available</td></tr>";
                }
                ?>
              </tbody>
            </table>
          </div>

          <form role="form" id="formEditData" method="POST" action="pelanggan_controller.php">
            <div class="form-group">
              <label>Id Pelanngan</label>
              <input class="form-control" name="idpelanggan" value="<?php echo $user_data['idpelanggan']; ?>" readonly>
            </div>
            <div class="form-group">
              <label>Nama Pelanggan</label>
              <input class="form-control" name="namapelanggan" value="<?php echo $user_data['namapelanggan']; ?>">
            </div>
            <div class="form-group">
              <label>Alamat Pelanggan</label>
              <input class="form-control" name="alamatpelanggan" value="<?php echo $user_data['alamatpelanggan']; ?>">
            </div>
            <div class="form-group">
              <label>No Telp Pelanggan</label>
              <input class="form-control" name="notelppelanggan" value="<?php echo $user_data['notelppelanggan']; ?>">
            </div>
            <div class="form-group">
              <label>Email Pelanggan</label>
              <input class="form-control" name="emailpelanggan" value="<?php echo $user_data['emailpelanggan']; ?>">
            </div>
            <div class="form-group">
              <label>ID Penjualan</label>
              <input class="form-control" name="idpenjualan" value="<?php echo $user_data['idpenjualan']; ?>">
            </div>
            <!-- Add other form fields with their corresponding values -->
            <button type="submit" class="btn btn-default" name="update">Update</button>
            <button type="button" class="btn btn-default" name="cancel" onclick="hideEditForm()">Cancel</button>
          </form>

          <div class="col-lg-6">
            <!-- Formulir untuk Tambah Data -->
            <form role="form" id="formTambahData" style="display: none;" method="POST" action="pelanggan_controller.php">
              <div class="form-group">
                <label>Id Pelanggan</label>
                <input class="form-control" name="idpelanggan">
              </div>
              <div class="form-group">
                <label>Nama Pelanggan</label>
                <input class="form-control" name="namapelanggan">
              </div>
              <div class="form-group">
                <label>Alamat Pelanggan</label>
                <input class="form-control" name="alamatpelanggan">
              </div>
              <div class="form-group">
                <label>No Telp Pelanggan</label>
                <input class="form-control" name="notelppelanggan">
              </div>
              <div class="form-group">
                <label>Email Pelanggan</label>
                <input class="form-control" name="emailpelanggan">
              </div>
              <div class="form-group">
                <label>Id Penjualan</label>
                <input class="form-control" name="idpenjualan">
              </div>
              <button type="submit" class="btn btn-default" name="submit">Submit</button>
              <button type="reset" class="btn btn-default" onclick="hideForm()">Cancel</button>
            </form>
          </div>
        </div><!-- /.row -->

      </div><!-- /#page-wrapper -->
    </div>

  </div><!-- /#wrapper -->

  <!-- JavaScript -->
  <script src="js/jquery-1.10.2.js"></script>
  <script src="js/bootstrap.js"></script>

  <script>
    // Fungsi untuk menampilkan formulir
    function showForm() {
      document.getElementById("formEditData").style.display = "none";
      document.getElementById("formTambahData").style.display = "block";
      document.getElementById("tableDataPelanggan").style.display = "none";
      document.getElementById("btnTambahData").style.visibility = "hidden";
    }

    // Fungsi untuk menyembunyikan formulir dan menampilkan kembali data grid
    function hideForm() {
      document.getElementById("formEditData").style.display = "none";
      document.getElementById("formTambahData").style.display = "none";
      document.getElementById("tableDataPelanggan").style.display = "table"; // Menampilkan kembali data grid
      document.getElementById("btnTambahData").style.visibility = "visible";
    }

    // Menambahkan event listener untuk tombol "Tambah Data Baru"
    document.getElementById("btnTambahData").addEventListener("click", showForm);
    // Fungsi untuk menampilkan formulir Edit
    function showEditForm(userId) {
      // Use AJAX to fetch user data by ID
      $.ajax({
        type: 'GET',
        url: 'pelanggan_controller.php',
        data: { get_user_by_id: userId },
        dataType: 'json',
        success: function (response) {
          if (response.success) {
            // Populate the form fields with user data
            document.getElementById("formEditData").style.display = "block";
            document.getElementById("tableDataPelanggan").style.display = "none";
            document.getElementById("btnTambahData").style.visibility = "hidden";

            // Populate the form fields with user data
            document.getElementById("formEditData").elements["idpelanggan"].value = response.data.idpelanggan;
            document.getElementById("formEditData").elements["namapelanggan"].value = response.data.namapelanggan;
            document.getElementById("formEditData").elements["alamatpelanggan"].value = response.data.alamatpelanggan;
            document.getElementById("formEditData").elements["notelppelanggan"].value = response.data.notelppelanggan;
            document.getElementById("formEditData").elements["emailpelanggan"].value = response.data.emailpelanggan;
            document.getElementById("formEditData").elements["idpenjualan"].value = response.data.idpenjualan;
            // Add event listener for the "Cancel" button in the edit form
            document.getElementById("formEditData").elements["cancel"].addEventListener("click", function () {
              hideEditForm();
            });
          } else {
            // alert('Failed to fetch user data.');
          }
        },
        error: function () {
          alert('Error in AJAX request.');
        }
      });
    }

    // Fungsi untuk menyembunyikan formulir Edit dan menampilkan kembali data grid
    function hideEditForm() {
      document.getElementById("formTambahData").style.display = "none";
      document.getElementById("formEditData").style.display = "none";
      document.getElementById("tableDataPelanggan").style.display = "table"; // Menampilkan kembali data grid
      document.getElementById("btnTambahData").style.visibility = "visible";
    }

    function hideEditFormOnLoad() {
      document.getElementById("formTambahData").style.display = "none";
      document.getElementById("formEditData").style.display = "none";
      document.getElementById("tableDataPelanggan").style.display = "table"; // Menampilkan kembali data grid
      document.getElementById("btnTambahData").style.visibility = "visible";
    }
    window.onload = hideEditFormOnLoad;


    // Menambahkan event listener untuk tombol "Tambah Data Baru"
    document.getElementById("btnTambahData").addEventListener("click", function () {
      showEditForm(0); // Pass 0 or any other appropriate value as the user ID for a new entry
    });

  </script>
</body>

</html>