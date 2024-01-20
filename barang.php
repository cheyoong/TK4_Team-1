<?php
include "config.php";
?>
<!DOCTYPE html>

<?php
$sql = "SELECT * FROM pelanggan";
$result = $conn->query($sql);
?>

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
          <h2>Data Pelanggan</h2>
          <div class="table-responsive">
            <table class="table table-bordered table-hover tablesorter">
              <thead>
                <tr>
                  <th class="text-center">Id Pelanggan</th>
                  <th class="text-center">Nama Pelanggan</th>
                  <th class="text-center">Alamat</th>
                  <th class="text-center">No Telp</th>
                  <th class="text-center">Email</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // Loop through the database results and populate the table rows
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["IdPelanggan"] . "</td>";
                    echo "<td>" . $row["NamaPelanggan"] . "</td>";
                    echo "<td>" . $row["AlamatPelanggan"] . "</td>";
                    echo "<td>" . $row["NoTelpPelanggan"] . "</td>";
                    echo "<td>" . $row["EmailPelanggan"] . "</td>";
                    // echo "<td>" . $row["IdPenjualan"] . "</td>";
                
                    // Add Edit and Delete buttons
                    echo "<td><a href='edit_pelanggan.php?id=" . $row["IdPelanggan"] . "' class='btn btn-warning btn-sm'>Edit</a></td>";
                    echo "<td><a href='function.php?id=" . $row["IdPelanggan"] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a></td>";

                    echo "</tr>";
                  }
                } else {
                  echo "<tr><td colspan='6'>No data available</td></tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6">

            <form role="form">
              <div class="form-group">
                <label>Text Input with Placeholder</label>
                <input class="form-control" placeholder="Enter text">
              </div>

              <button type="submit" class="btn btn-default">Submit Button</button>
              <button type="reset" class="btn btn-default">Reset Button</button>

            </form>

          </div>
        </div><!-- /.row -->

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

</body>

</html>