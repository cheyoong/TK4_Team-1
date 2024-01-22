<?php
include "config.php";
require_once 'supplier_controller.php';
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
        <a class="navbar-brand" href="index.php">Tugas Kelompok 1</a>
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
          <h1>Forms Supplier</h1>
          <ol class="breadcrumb">
            <li><a href="index.html"><i class="fa fa-dashboard"></i> Supplier</a></li>
            <li class="active"><i class="fa fa-edit"></i> Forms</li>
          </ol>
        </div><!-- /.row -->

        <div class="col-lg-6">
          <h2>Data Supplier</h2>
          <div class="table-responsive">
            <button type="button" class="btn btn-default" id="btnTambahData">Tambah Data Baru</button>
            <table class="table table-bordered table-hover tablesorter" id="tableDataPelanggan">
              <thead>
                <tr>
                  <th class="text-center">Id Supplier</th>
                  <th class="text-center">Nama Supplier</th>
                  <th class="text-center">Alamat Supplier</th>
                  <th class="text-center">No Telp Supplier</th>
                  <th class="text-center">Email Supplier</th>
                  <th class="text-center">Id Barang</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // Panggil fungsi get_data dari barang_controller.php
                $barangData = get_data_supplier();

                // Loop through the data and populate the table rows
                if ($barangData->num_rows > 0) {
                  while ($row = $barangData->fetch_assoc()) {
                    echo "<tr>";
                    // Tampilkan data sesuai kolom
                    echo "<td>" . $row["idsupplier"] . "</td>";
                    echo "<td>" . $row["namasupplier"] . "</td>";
                    echo "<td>" . $row["alamatsupplier"] . "</td>";
                    echo "<td>" . $row["notelpsupplier"] . "</td>";
                    echo "<td>" . $row["emailsupplier"] . "</td>";
                    echo "<td>" . $row["idbarang"] . "</td>";
                    // ...
                    echo "<td><a class='btn btn-warning btn-sm' onclick='showEditForm(" . $row["idsupplier"] . ")'>Edit</a></td>";
                    echo "<td><a href='supplier_controller.php?delete_id=" . $row["idsupplier"] . "' class='btn btn-danger btn-sm' name='delete' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a></td>";
                    echo "</tr>";
                  }
                } else {
                  echo "<tr><td colspan='6'>No data available</td></tr>";
                }
                ?>
              </tbody>
            </table>
          </div>

          <form role="form" id="formEditData" method="POST" action="supplier_controller.php">
            <div class="form-group">
              <label>Id Supplier</label>
              <input class="form-control" name="idsupplier" value="<?php echo $user_data['idsupplier']; ?>" readonly>
            </div>
            <div class="form-group">
              <label>Nama Supplier</label>
              <input class="form-control" name="namasupplier" value="<?php echo $user_data['namasupplier']; ?>">
            </div>
            <div class="form-group">
              <label>Alamat Supplier</label>
              <input class="form-control" name="alamatsupplier" value="<?php echo $user_data['alamatsupplier']; ?>">
            </div>
            <div class="form-group">
              <label>No Telp Supplier</label>
              <input class="form-control" name="notelpsupplier" value="<?php echo $user_data['notelpsupplier']; ?>">
            </div>
            <div class="form-group">
              <label>Email Supplier</label>
              <input class="form-control" name="emailsupplier" value="<?php echo $user_data['emailsupplier']; ?>">
            </div>
            <div class="form-group">
              <label>Id Barang</label>
              <input class="form-control" name="idbarang" value="<?php echo $user_data['idbarang']; ?>">
            </div>
            <!-- Add other form fields with their corresponding values -->
            <button type="submit" class="btn btn-default" name="update">Update</button>
            <button type="button" class="btn btn-default" name="cancel" onclick="hideEditForm()">Cancel</button>
          </form>

          <div class="col-lg-6">
            <!-- Formulir untuk Tambah Data -->
            <form role="form" id="formTambahData" style="display: none;" method="POST" action="supplier_controller.php">
              <div class="form-group">
                <label>Id Supplier</label>
                <input class="form-control" name="idsupplier">
              </div>
              <div class="form-group">
                <label>Nama Supplier</label>
                <input class="form-control" name="namasupplier">
              </div>
              <div class="form-group">
                <label>Alamat Supplier</label>
                <input class="form-control" name="alamatsupplier">
              </div>
              <div class="form-group">
                <label>No Telp Supplier</label>
                <input class="form-control" name="notelpsupplier">
              </div>
              <div class="form-group">
                <label>Email Supplier</label>
                <input class="form-control" name="emailsupplier">
              </div>
              <div class="form-group">
                <label>Id Barang</label>
                <input class="form-control" name="idbarang">
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
        url: 'supplier_controller.php',
        data: { get_user_by_id: userId },
        dataType: 'json',
        success: function (response) {
          if (response.success) {
            // Populate the form fields with user data
            document.getElementById("formEditData").style.display = "block";
            document.getElementById("tableDataPelanggan").style.display = "none";
            document.getElementById("btnTambahData").style.visibility = "hidden";

            // Populate the form fields with user data
            document.getElementById("formEditData").elements["idsupplier"].value = response.data.idsupplier;
            document.getElementById("formEditData").elements["namasupplier"].value = response.data.namasupplier;
            document.getElementById("formEditData").elements["alamatsupplier"].value = response.data.alamatsupplier;
            document.getElementById("formEditData").elements["notelpsupplier"].value = response.data.notelpsupplier;
            document.getElementById("formEditData").elements["emailsupplier"].value = response.data.emailsupplier;
            document.getElementById("formEditData").elements["idbarang"].value = response.data.idbarang;
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