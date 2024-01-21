<?php
include "config.php";
require_once 'barang_controller.php';
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
          <h1>Forms Barang<small>Enter Your Data</small></h1>
          <ol class="breadcrumb">
            <li><a href="index.html"><i class="fa fa-dashboard"></i> Barang</a></li>
            <li class="active"><i class="fa fa-edit"></i> Forms</li>
          </ol>
        </div><!-- /.row -->

        <div class="col-lg-6">
          <h2>Data Barang</h2>
          <div class="table-responsive">
            <button type="button" class="btn btn-default" id="btnTambahData">Tambah Data Baru</button>
            <table class="table table-bordered table-hover tablesorter" id="tableDataPelanggan">
              <thead>
                <tr>
                  <th class="text-center">Id Barang</th>
                  <th class="text-center">Nama Barang</th>
                  <th class="text-center">Keterangan</th>
                  <th class="text-center">Satuan</th>
                  <th class="text-center">Id Pengguna</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // Panggil fungsi get_data dari barang_controller.php
                $barangData = get_data_barang();
                // $barangData = mysqli_fetch_all($barangData, MYSQLI_ASSOC);
                
                // Loop through the data and populate the table rows
                if ($barangData->num_rows > 0) {
                  while ($row = $barangData->fetch_assoc()) {
                    echo "<tr>";
                    // Tampilkan data sesuai kolom
                    echo "<td>" . $row["idbarang"] . "</td>";
                    echo "<td>" . $row["namabarang"] . "</td>";
                    echo "<td>" . $row["keterangan"] . "</td>";
                    echo "<td>" . $row["satuan"] . "</td>";
                    echo "<td>" . $row["idpengguna"] . "</td>";
                    // ...
                    // $deleteData = delete_data_pengguna();
                    // Add Edit and Delete buttons
                    echo "<td><a class='btn btn-warning btn-sm' onclick='showEditForm(" . $row["idbarang"] . ")'>Edit</a></td>";
                    // echo "<td><a class='btn btn-warning btn-sm'>Edit</a></td>";
                    echo "<td><a href='barang_controller.php?delete_id=" . $row["idbarang"] . "' class='btn btn-danger btn-sm' name='delete' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a></td>";
                    // ...
                    // echo "<td><a href='pengguna_controller.php?delete_id=" . $row["idpengguna"] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a></td>";
                    // ...
                

                    echo "</tr>";
                  }
                } else {
                  echo "<tr><td colspan='6'>No data available</td></tr>";
                }
                ?>
              </tbody>
            </table>
          </div>

          <form role="form" id="formEditData" method="POST" action="barang_controller.php">
            <div class="form-group">
              <label>Id Barang</label>
              <input class="form-control" name="idbarang" value="<?php echo $user_data['idbarang']; ?>" readonly>
            </div>
            <div class="form-group">
              <label>Nama Barang</label>
              <input class="form-control" name="namabarang" value="<?php echo $user_data['namabarang']; ?>">
            </div>
            <div class="form-group">
              <label>Keterangan</label>
              <input class="form-control" name="keterangan" value="<?php echo $user_data['keterangan']; ?>">
            </div>
            <div class="form-group">
              <label>Satuan</label>
              <input class="form-control" name="satuan" value="<?php echo $user_data['satuan']; ?>">
            </div>
            <div class="form-group">
              <label>Id Pengguna</label>
              <input class="form-control" name="idpengguna" value="<?php echo $user_data['idpengguna']; ?>">
            </div>
            <!-- Add other form fields with their corresponding values -->
            <button type="submit" class="btn btn-default" name="update">Update</button>
            <button type="button" class="btn btn-default" name="cancel" onclick="hideEditForm()">Cancel</button>
          </form>

          <div class="col-lg-6">
            <!-- Formulir untuk Tambah Data -->
            <form role="form" id="formTambahData" style="display: none;" method="POST" action="barang_controller.php">
              <div class="form-group">
                <label>Id Barang</label>
                <input class="form-control" name="idbarang">
              </div>
              <div class="form-group">
                <label>Nama Barang</label>
                <input class="form-control" name="namabarang">
              </div>
              <div class="form-group">
                <label>Keterangan</label>
                <input class="form-control" name="keterangan">
              </div>
              <div class="form-group">
                <label>Satuan</label>
                <input class="form-control" name="satuan">
              </div>
              <div class="form-group">
                <label>Id Pengguna</label>
                <input class="form-control" name="idpengguna">
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
        url: 'barang_controller.php',
        data: { get_user_by_id: userId },
        dataType: 'json',
        success: function (response) {
          if (response.success) {
            // Populate the form fields with user data
            document.getElementById("formEditData").style.display = "block";
            document.getElementById("tableDataPelanggan").style.display = "none";
            document.getElementById("btnTambahData").style.visibility = "hidden";

            // Populate the form fields with user data
            document.getElementById("formEditData").elements["idbarang"].value = response.data.idbarang;
            document.getElementById("formEditData").elements["namabarang"].value = response.data.namabarang;
            document.getElementById("formEditData").elements["keterangan"].value = response.data.keterangan;
            document.getElementById("formEditData").elements["satuan"].value = response.data.satuan;
            document.getElementById("formEditData").elements["idpengguna"].value = response.data.idpengguna;
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