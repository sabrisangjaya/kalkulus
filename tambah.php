<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Program toko</title>
	 <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link href='css/jquery-ui.min.css' type='text/css' rel='stylesheet' >
  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
   <script src="js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
	 
	 	 $(function(){
         // Find any date inputs and override their functionality
         $('input[type="date"]').datepicker();
    });
	 </script>
</head>
<body>
	<div class="container">
	<br/>
		<div class="row">
  <div class="col-md-6">
   <div class="panel panel-default">
  <div class="panel-heading">Tambahkan Barang</div>
  <div class="panel-body">
  <form method="post" action="tambah.php">
  <div class="form-group">
    <label for="namabarang">Kode barang</label>
    <input type="text" name="kode" class="form-control" id="namabarang" placeholder="Masukan kode barang" required>
  </div>
  <div class="form-group">
    <label for="namabarang">Nama barang</label>
    <input type="text" name="nama" class="form-control" id="namabarang" placeholder="Masukan nama barang" required>
  </div>
  <div class="form-group">
    <label for="hargabelibarang">Harga beli barang</label>
    <input type="number" name="beli" class="form-control" id="hargabelibarang" placeholder="Masukan harga beli barang" required>
  </div>
  <div class="form-group">
    <label for="hargabelibarang">Harga jual barang</label>
    <input type="number" name="jual" class="form-control" id="hargabelibarang" placeholder="Masukan harga jual barang" required>
  </div>
  <div class="form-group">
    <label for="tanggalbarang">Tanggal masuk barang</label>
    <input type="date" name="tgl" class="form-control" id="tanggalmasukbarang" placeholder="Masukan tanggal masuk barang" required>
  </div>
  <div class="form-group">
    <label for="stokbarang">Stok barang</label>
    <input type="number" step="1" name="stok" class="form-control" id="stokbarang" placeholder="Masukan stok barang" required>
  </div>


  <button type="submit" name="submit" class="btn btn-default">Submit</button>
</form>
</div>
</div>
  </div>
  <div class="col-md-6">
  <div class="panel panel-default">
  <div class="panel-heading">Data Barang</div>
  <div class="panel-body">
  	<?php
  	include 'koneksi.php';
if (isset($_POST['submit'])){
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$jual = $_POST['jual'];
$beli = $_POST['beli'];
$tgl = $_POST['tgl'];
$stok = $_POST['stok'];
	
$sql = "INSERT INTO barang(kode_barang,nama_barang,beli_barang,jual_barang,stok_barang) VALUES('$kode','$nama','$beli','$jual','$stok')";
if ($result = mysqli_query($con, $sql)) {
 echo "<div class='alert alert-success' role=alert'>Data berhasil ditambahkan!</div><br/>";
} else {
 echo "<div class='alert alert-danger' role=alert'>Error: ".mysqli_error($con)."</div><br/>";
}
}
?>
<table class="table table-bordered">
<thead>
<tr>
	<th>Kode barang</th>
	<th>Nama Barang</th>
	<th>Harga Jual</th>
	<th>Stok</th>
</tr>
</thead>
<?php
$sql="SELECT * FROM  barang";
$query = mysqli_query($con, $sql);
    while($data = mysqli_fetch_array($query)) {
        ?>
        <tr>
        	<td><?php echo $data['kode_barang']; // menampilkan isi field nama ?></td>
            <td><?php echo $data['nama_barang']; // menampilkan isi field nama ?></td>
            <td><?php echo $data['jual_barang']; //menampilkan isi field kelas ?></td>
            <td><?php echo $data['stok_barang']; // menampilkan isi field alamat ?></td>
        </tr>
        <?php
   }
 ?>
</table>
</div>
</div>
  </div>
  </div>
  </div>
  </body>
  </html>